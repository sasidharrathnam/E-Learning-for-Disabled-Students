<?php
session_start();
include 'connection.php';
$uid=$_SESSION['bid'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED CERTIFICATE PAGE PRESS TAB TO NAVIGATE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function my(id)
		{
			var p=document.getElementById(id).innerHTML;
			var msg=new SpeechSynthesisUtterance(p);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp()
		{
			var msg=new SpeechSynthesisUtterance("YOU HAVE NOT PASSED ANY COURSE SO FAR SO YOU ARE REDIRECTED TO HOME PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindacc.php";
		}
		function sp1(d)
		{
			var msg=new SpeechSynthesisUtterance(d);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body>
<?php
$sql="select * from blindstudentcourse where STUDENTID='$uid' AND MARKS>5;";
$res=mysqli_query($conn,$sql);
$i=1;
if(mysqli_num_rows($res)<1)
{
	echo "<script>sp()</script>";
}
else
{
	$i=1;
	while($row=mysqli_fetch_assoc($res))
	{
		$id=$row['COURSECODE'];
		$sql2="select * from CERTIFICATE where COURSECODE='$id' and STUDENT='$uid';";
		$res2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($res2);
		$sql3="select * from COURSES where COURSECODE='$id';";
		$row3=mysqli_fetch_assoc(mysqli_query($conn,$sql3));
		echo "<a href=\"".$row2['LOCATION']."\" tabindex=".$i." id=".$row['COURSECODE']." onkeyup=\"my(this.id)\"  download>".$row3['COURSENAME']."</a>"; 
	}
}

?><br>
<a href="blindacc.php" tabindex="<?php echo $i+1;?>" onkeyup="sp1('back');" id="back">BACK</a>
</body>
</html>