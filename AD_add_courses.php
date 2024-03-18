<?php
/* CREATE TABLE images (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    introduction LONGTEXT NOT NULL,
    application LONGTEXT NOT NULL,
    title1 VARCHAR(255) NOT NULL,
    title2 VARCHAR(255) NOT NULL
); */
require('server.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the image details
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Get the form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $introduction = $_POST['introduction'];
    $application = $_POST['application'];
    $title1 = $_POST['title1'];
    $title2 = $_POST['title2'];

    // Check if the connection is successful
    if ($conn) {
        // Escape special characters in the form data
        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);
        $introduction = mysqli_real_escape_string($conn, $introduction);
        $application = mysqli_real_escape_string($conn, $application);
        $title1 = mysqli_real_escape_string($conn, $title1);
        $title2 = mysqli_real_escape_string($conn, $title2);

        // Insert the data into the database
        $query = "INSERT INTO images (title, description, image_name, introduction, application, title1, title2) 
                  VALUES ('$title', '$description', '$image_name', '$introduction', '$application', '$title1', '$title2')";
        $result = mysqli_query($conn, $query);

        // Check if the insertion is successful
        if ($result) {
            // Move the image to the uploads directory
            move_uploaded_file($image_tmp, "uploads/$image_name");

            // Display a success message
            echo "Image has been added successfully!";
        } else {
            // Display an error message
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Display an error message if the connection fails
        echo "Error: Unable to connect to the database.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
