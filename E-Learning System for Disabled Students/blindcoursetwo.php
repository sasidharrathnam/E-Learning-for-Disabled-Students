<?php
session_start();
$uid=$_SESSION['bid'];
include "connection.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSE PAGE</title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOU CAN DOWNLOAD YOUR MATERIALS HERE. PRESS TAB TO NAVIGATE BETWEEN THE MATERIALS");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp()
		{
			var msg=new SpeechSynthesisUtterance("TEACHER HAS NOT UPLOADED ANY MATERIAL SO FAR. YOU ARE REDIRECTED TO HOME PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			//window.location="blindcourse.php";
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
$ccode=$_GET['a'];
$sql="select * from BLINDSTUDENTCOURSE where COURSECODE='$ccode' and STUDENTID='$uid';";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$tid=$row['TEACHERID'];
$sql2="select * from TEACHER where USERNAME='$tid';";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);
$tname=$row2['NAME'];
$sql3="select * from uploads where COURSECODE='$ccode' and TEACHER='$tid';";
$res3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($res3)<1)
{
	echo "<script>sp()</script>";
}
else
{
	$i=0;
	echo "<h3 align=\"center\" tabindex=\"1\" onkeyup=\"my(this.id)\" id=\"res\">FACULTY NAME IS ".$tname."</h3><br><br>";
	while($row3=mysqli_fetch_assoc($res3))
	{
		$loc=$row3['LOCATION'];
		$d=fopen($loc, "r");
		$s=fread($d, filesize($loc));
		fclose($d);

		echo "<a href=".$s."  tabindex=".$i." id=".$row3['COURSECODE']." onkeyup=\"my(this.id)\">".$row3['TOPIC']."</a>";
		$i=$i+1;
		
		
	}

}
?><br>
<a href="blindcourse.php" onkeyup="sp1('back');" id="back">BACK</a>
</body>
</html>
