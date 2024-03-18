<?php
require('server.php');
include_once("AD_delete_courses1.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  // rest of your code
} else {
  echo "No ID parameter provided in the URL.";
}
$result=mysqli_query($conn,"DELETE FROM images WHERE id='$id'");
header("location:AD_delete_courses1.php");
?>

 
