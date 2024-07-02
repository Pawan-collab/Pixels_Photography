
<?php
include 'connect.php';
$image_names = []; 
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $insertquery = "insert into student_table(name,email) values('$name','$email')";
    
   
    
if(isset($_FILES['image'])){
    $image =$_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo"<br>";
    $size_converted = $size/1048576 ;
    $date = date("Y-m-d-H-i-s");
    
    // print_r($_FILES);
    $extension= pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date.".".$extension;
    if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
    {
        if($size_converted<5)
        {
        move_uploaded_file($fileTemp,'upload/'.$newfilename);
         $query = "insert into image_details(name) values('$newfilename')";
         echo"File uploaded successfully";
    }
    else{
        
        die("Error: File is too large");
    }
    }
    else{
        die("Error: File is not supported");
       
    }
       
}
else{
    echo"no files";
}
$res = mysqli_query($conn,$query);
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
}
?>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter your name">
        <br>
        <input type="email" name="email" ><br>
        <input type="file" name="image"><br>
        <input type="submit" name="submit" value="Submit">
        
</form>
<h1>Image Gallery</h1>
    <div class="gallery">
        <?php foreach ($image_names as $image): ?>
            <img src="upload/<?php echo $image; ?>" alt="<?php echo $image; ?>">
        <?php endforeach; ?>
    </div>

</body>
</html>