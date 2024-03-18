<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" href="engincollege.css">
</head>
<body>
<div class="engineering"><p>ENGINEERING COLLEGES<p></div>
<?php
 require('server.php');

// Prepare and execute SQL statement to select all data from the "links" table
$sql = "SELECT title,address,url, image_path FROM engincollege ORDER BY title ASC";
$result = $conn->query($sql);

// Check if any data is returned from the query
if ($result->num_rows > 0) {
  // Output data for each row
  while($row = $result->fetch_assoc()) {
    // Create a div tag for each link with a simple design
    echo '<div class="link">';
    echo '<h3 class="h3">' . $row["title"] . '</h3>';
    echo '<h4 class="h4">' . $row["address"] . '</h4>';
    echo '<a href="' . $row["url"] .'" target="_blank">' . $row["url"] .'</a>';
    echo '<div class="column-container">';
    // Loop through each column and create a div for it
    foreach($row as $key => $value) {
      if ($key == "image_path") {
        
        echo '<img src="' . $value .'" alt="' . $row["title"] . '" height="180cm" align=top>';
       
      } else {
       
      }
    }
    echo '</div>';
    echo '</div>';
  }
} else {
  // If no data is returned from the query, display a message
  echo "No links found.";
}

// Close connection
$conn->close();

?>


</body>
</html>
