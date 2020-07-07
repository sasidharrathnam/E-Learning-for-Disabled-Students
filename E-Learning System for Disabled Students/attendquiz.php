<?php
session_start();
$uid=$_SESSION['bid'];
include "connection.php";
$ccode= $_GET['a'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>ATTEND QUIZ</title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("PLEASE SELECT THE SUBJECT YOU WANT TO ATTEDN THE QUIZ FOR");
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
		function noquiz()
		{
			
			var msg=new SpeechSynthesisUtterance("NO QUIZ HAS BEEN SCHEDULED NOW");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindquiz.php";
		}

	</script>
</head>
<body>
<?php
$sql="select * from blindstudentcourse where STUDENTID='$uid' and COURSECODE='$ccode';";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$tid=$row['TEACHERID'];
$sql2="select * from courseteacher where COURSECODE='$ccode' and TEACHER='$tid';";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);
if($row2['STATUS']==2)
{
	echo "<a href=\"marks.php?a=".$ccode.":".$tid."\" id=\"res\" onkeyup=\"my(this.id)\">ATTEMPT QUIZ</a>" ;
}
else
{
	echo "<script>noquiz();</script>";
}
?>
</body>
</html>

