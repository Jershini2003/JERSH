<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" href="courses.css">
</head>
<body>
<div class="courses"><p> COURSES<p></div>
<?php
require('server.php');
 echo "<div class='all'>";
// Fetch image details from the database
$query = "SELECT title, description, image_name FROM images";
$result = mysqli_query($conn, $query);

// Display the image details in div containers
while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $description = $row['description'];
    $image_name = $row['image_name'];

    // Display the image details in a div container
    echo "<div class='row-container'>";
    echo "<img src='uploads/$image_name' alt='$title'>";
    echo "<h2>$title</h2>";
    echo "<button onclick=\"window.location.href='coursecontent.php';\" class='button2'>START</button>";
    echo "<p>$description</p>";
    echo "</div>";
}
echo "</div>";

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>



  