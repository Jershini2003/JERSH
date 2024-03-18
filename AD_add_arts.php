<?php
/* CREATE TABLE IF NOT EXISTS links (
    id INT(11) NOT NULL AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/
require('server.php');

if (isset($_POST['link_url']) && isset($_POST['link_title'])) {
  $link_url = mysqli_real_escape_string($conn, $_POST['link_url']);
  $link_title = mysqli_real_escape_string($conn, $_POST['link_title']);
  $link_address = mysqli_real_escape_string($conn, $_POST['link_address']);
  $link_image = $_FILES['link_image']['name'];

  // Upload image to server and get the file path
  $target_dir = "uploads/";
  
  // Create the directory if it doesn't exist
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  
  $target_file = $target_dir . basename($_FILES["link_image"]["name"]);

  if (move_uploaded_file($_FILES["link_image"]["tmp_name"], $target_file)) {
    $image_path = $target_file;

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO links (url, title,address, image_path) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $link_url, $link_title,$link_address,$image_path);
    if ($stmt->execute()) {
      header("location:AD_add_arts.html");
    } else {
      echo "Error: " . $conn->error;
    }
    $stmt->close();
  } else {
    echo "Error uploading file";
  }
}
$conn->close();

?>



