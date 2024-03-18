<?php
require('server.php');
$result=mysqli_query($conn, "SELECT*FROM engincollege ORDER BY id DESC");
?>
<html>
<head>
<title>ADMIN</title>
<link rel="stylesheet" href="AD_delete.css">
</head>
<body>
<div class="headdel"><p>DELETE ENGINEERING COLLEGES</p></div>
 
<table>
<tr>
<th>ID</th><th>COLLEGE NAME</th><th>LINK</th><th class="decor">DELETE</th>
</tr>
<?php
while($user_data = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$user_data['id']."</td>";
echo"<td>".$user_data['title']."</td>";
echo"<td>".$user_data['url']."</td>";
echo"<td class='decor'><a href='AD_delete_engin.php? id=$user_data[id]'>DELETE</a></td></tr>";
}
?>
</table>
 
</body>
</html>