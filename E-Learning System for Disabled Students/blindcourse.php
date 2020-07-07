<?php
session_start();
$uid=$_SESSION['bid'];
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLINDCOURSE</title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED YOUR COURSE PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp()
		{
			var msg=new SpeechSynthesisUtterance("YOU HAVE NOT ENROLLED ANY COURSE SO FAR. SO YOU ARE REDIRECTED TO HOME PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindacc.php";
		}
		function my(id)
		{
			var p=document.getElementById(id).innerHTML;
			var msg=new SpeechSynthesisUtterance(p);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp1(d)
		{
			var t=document.getElementById(d).innerHTML;
			var msg=new SpeechSynthesisUtterance(t);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body>
<?php
$sql="select * from blindstudentcourse where STUDENTID='$uid';";
$res=mysqli_query($conn,$sql);
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
		$sql2="select * from courses where COURSECODE='$id';";
		$res2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($res2);
		echo "<a href=\"blindcoursetwo.php?a=".$row['COURSECODE']."\" tabindex=".$i." id=".$row['COURSECODE']." onkeyup=\"my(this.id)\"  >".$row2['COURSENAME']."</a>"; 
	}
}

?><br>
<a href="blindacc.php" tabindex="<?php echo $i+1;?>" onkeyup="sp1('back');" id="back">BACK</a>
</body>
</html>