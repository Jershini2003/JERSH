
<?php
require('server.php');
$error_message = '';
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  	$query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn, $query);
    
  	if (mysqli_num_rows($results) == 1) {
  	  
  	  header('location: user.php');
  	}
    else if($username == "jershini" && $password == "2003"){
      header('location: AD_admin.html');
  		 }
       else{
         
        $error_message = "Wrong username or password";
       }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>
            LOGIN PAGE
        </title>
    </head>
    <body>
         <?php if($error_message): ?>
            <div class="err"><p class="error"><?php echo $error_message; ?></P></div>
            <?php endif; ?>
         <form method="post">
        <div class="login">
        <img src="icon.jpg" class="icon">
            <p class="head">LOGIN</p>           
            <p class="username">USERNAME<p>
            <input type="text" name="username"  id="username" required >
            <P class="password">PASSWORD</P>
            <input type="password" name="password"  id="password" required>
            <input type="submit" name="submit" value="LOGIN">
            <a href="signup.html">create new account</a>
            </div>
        </form>  
         
        </body>
   </html>

   
 