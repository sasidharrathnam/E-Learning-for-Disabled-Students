<?php
include 'connection.php';
if (isset($_POST['submit'])) {
	$ud=$_POST['username'];
	$pwd=$_POST['pwd'];
	if(empty($ud)||empty($ud))
	{
		echo "<script>alert('empty fields detected');</script>";

	}
	else
	{
		if(strcmp($ud,"admin")==0 && strcmp($pwd, "admin")==0)
		{
			echo "<script>window.location='adminhome.php';</script>";
		}
		else
		{
			echo "<script>alert('invalid user credentials');</script>";
		}
	}
}
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Startup</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    
</head>
<body>
<div id="header">
<img src="logo.png" id="logo">
<h1 id="title" tabindex="1">PARAM INSTITUTIONS</h1>  

</div>
<div class="container" >
    <div id="leftcolumn">
        <div id="menu" style="height: 350px;">
            <div id="empty"></div>

                <div id="dedulog" >
                    <a href="startup_stu_login.php" tabindex="2.1">Student Login</a></div>
                
                <div id="teacherlog" >
                    <a href="startup_teach_login.php" tabindex="2.2">Teacher Login</a></div>
                
                <div id="studentsignup" >
                    <a href="startup_stu_sign.php" tabindex="2.4">Student signup</a></div>

                <div id="teachersignup" >
                    <a href="startup_teach_sign.php" tabindex="2.3">Teacher signup</a></div>

                <div id="admin" style="padding: 10px; margin: 20px;background-color: white;font-size: 20px;">
                    <a href="adminlog.php" tabindex="2.5">Admin Login</a></div>
                
                
        </div>
    </div>
<div id="column">

<center>
	<h1>ADMIN LOGIN</h1><br><br><br>
	<form action="adminlog.php" method="post">
		<table>
			<tr>
				<th>USERNAME:</th>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<th>PASSWORD:</th>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<th colspan="2" align="center"><input type="submit" name="submit"></th>
			</tr>
		</table>
		
	</form>
</center>
       
</div>

<div id="bottom">
    <a href="about.html">ABOUT US</a><br><br>
    <a href="contact.html" id="contact">CONTACT US</a>
</div>

</body>
</html>