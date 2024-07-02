<?php
// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "PEXEL";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$image_names = [];
if (isset($_POST['submit'])) {
    if (isset($_FILES['gallery-image'])) {
        $image = $_FILES['gallery-image'];
        $fileName = $image['name'];
        $size = $image['size'];
        $fileTemp = $image['tmp_name']; 
        $type = $image['type'];
        $size_converted = $size / 1048576;
        $date = date("Y-m-d-H-i-s");
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newfilename = $date . "." . $extension;

        if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
            if ($size_converted < 5) {
                move_uploaded_file($fileTemp, 'images/' . $newfilename);
                $query = "INSERT INTO image_details (name) VALUES ('$newfilename')";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "File uploaded successfully";
                } else {
                    echo "Failed to upload file to database";
                }
            } else {
                die("Error: File is too large");
            }
        } else {
            die("Error: File type not supported");
        }
    } else {
        echo "No files uploaded";
    }
}

$sql = "SELECT name FROM image_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $image_names[] = $row['name'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Pixels Photography</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <a class="logo" href="index.html">Pixels Photography Admin</a>
            </div>
            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link active" href="admin.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact Messages</a></li>
                <li class="nav-item"><a class="nav-link" href="content.php">Content Management</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.html">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="admin-container">
        <section id="dashboard" class="section">
            <h2>Dashboard</h2>
            <p>Welcome to the admin panel! Use the navigation to manage the website.</p>
        </section>

        <section id="gallery" class="section">
            <h2>Manage Gallery</h2>
            <form id="galleryForm" action="" method="post" enctype="multipart/form-data">
                <label for="gallery-image">Upload Image:</label>
                <input type="file" id="gallery-image" name="gallery-image" accept="image/*">
                <button type="submit" name="submit">Upload</button>
            </form>

            <div class="gallery-list">
                <!-- Dynamically list gallery images here -->
                <?php foreach ($image_names as $image_name): ?>
                    <div class="gallery-item">
                        <img src="images/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <script src="admin.js"></script>
</body>
</html>

