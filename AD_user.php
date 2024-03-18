<?php
include_once("server.php");
$result=mysqli_query($conn, "SELECT*FROM signup ORDER BY username DESC");
?>
<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" href="AD_colleges.css">
</head>
<body>
<div class="header">
        <p>USER DETAILS</p>
</div>
 
<table width = '80%' border=1>
<tr>
<th>USERID</th><th>USERNAME</th><th>EMAIL</th><th>PASSWORD</th><th>UPDATION</th>
</tr>
<?php
while($user_data = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$user_data['userid']."</td>";
echo"<td>".$user_data['username']."</td>";//20
echo"<td>".$user_data['email']."</td>";
echo"<td>".$user_data['password']."</td>";
echo"<td><a href='AD_user_delete.php? id=$user_data[userid]'>delete</a></td></tr>";
}
?>
</table>