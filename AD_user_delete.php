<?php
include_once("server.php");
$id=$_GET['id'];
$result=mysqli_query($conn,"DELETE FROM signup WHERE userid=$id");
header("location:AD_user.php");
?>
 