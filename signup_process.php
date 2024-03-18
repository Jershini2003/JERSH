<?php
require('server.php');
/*CREATE TABLE signup (
  userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(30),
  password1 VARCHAR(30)
);*/
$userid="";
    $name = $_POST["username"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];
    $passwd1 = $_POST["password1"];
session_start();
if (isset($_POST['submit'])) 
{ 
$sql = "INSERT INTO signup(userid,username,email,password,password1) 
                    VALUES ('$userid','$name','$email','$passwd','$passwd1')";
             if ($conn->query($sql) === TRUE) {
                header('location: index.php');
               
              }

              else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
            $conn->close();	
 
        ?> 
 