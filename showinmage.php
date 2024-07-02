<?php
include 'connect.php';

$sql = "SELECT name FROM image_details";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
    <title>Document</title>
</head>
<body>
    
<h1>Image Gallery</h1>
    <div class="gallery">
        <?php foreach ($image_names as $image): ?>
            <img src="upload/<?php echo $image; ?>" alt="<?php echo $image; ?>">
        <?php endforeach; ?>
    </div>
</body>
</html>