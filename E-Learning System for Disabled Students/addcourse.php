<?php
include "connection.php";
if(isset($_POST['submit']))
{
	$code=$_POST['code'];
	$name=$_POST['name'];
	if(empty($code)||empty($name))
	{
		echo "<script>alert('does not leave empty places');</script>";
	}
	else
	{
		$sql="insert into COURSES (COURSECODE,COURSENAME) VALUES('$code','$name');";
		mysqli_query($conn,$sql);
		echo "success";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD COURSE</title>
	<style type="text/css">
		table,td,th
		{
			border: 2px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
		table{
			margin-top: 100px;
			margin-left: 350px;
		}
		tr:hover
		{
			background-color: yellow;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="acc.css">
</head>
<body>
	<div id="top">
	<img src="logo.png">
	<h2 class="wel"> WELCOME ADMIN</h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<form action="addcourse.php" method="post">
	<table>
	<tr><th>COURSE CODE:</th><td><input type="text" name="code"><br></td></tr>
	<tr><th>COURSE NAME:</th><td><input type="text" name="name"><br></td></tr>
	<tr><th colspan="2"><input type="submit" name="submit"></th></tr>
	</table>
</form>
</body>
</html>