<!--<!DOCTYPE html>
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

require('server.php');
 echo "<div class='all'>";
// Fetch image details from the database
$query = "SELECT title1,introduction,title2,application FROM images";
$result = mysqli_query($conn, $query);

// Display the image details in div containers
while ($row = mysqli_fetch_assoc($result)) {
    $title1 = $row['title1'];
    $introduction = $row['introduction'];
    $title2 = $row['title2'];
    $application = $row['application'];

    // Display the image details in a div container
    echo "<div class='row-container'>";
    echo "<h2>$title1</h2>";
    echo "<p>$introduction</p>";
    echo "</div>";
    echo "<div class='row-container1'>";
    echo "<h2>$title2</h2>";
    echo "<p>$application</p>";
    echo "</div>";
}
echo "</div>";

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>-->

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
$query = "SELECT title1,introduction,title2,application FROM images";
$result = mysqli_query($conn, $query);

// Display the image details in div containers
while ($row = mysqli_fetch_assoc($result)) {
    $title1 = $row['title1'];
    $introduction = $row['introduction'];
    $title2 = $row['title2'];
    $application = $row['application'];

    // Display the image details in a div container
    echo "<div class='row-container0'>";
    echo "<h2>$title1</h2>";
    echo "<p>$introduction</p>";
    echo "</div>";

    // Display the application content as a list
    echo "<div class='row-container1'>";
    echo "<h2>$title2</h2>";
    echo "<ul class='application-list'>";
    $points = explode(".", $application); // split the content into points
    foreach ($points as $point) {
        $point = trim($point);
        if (!empty($point)) {
            echo "<li>$point.</li>";
        }
    }
    echo "</ul>";
    echo "</div>";
}
echo "</div>";

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>

 