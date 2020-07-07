<?php
session_start();
$uid=$_SESSION['bid'];
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED YOUR ENROLL COURSE PAGE PLEASE ENTER TAB TO PROCEED");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp(event,d)
		{
			
			if(event.code=='Tab')
			{
				var msg=new SpeechSynthesisUtterance(d);
				msg.lang="en-US";
				speechSynthesis.speak(msg);
			}
			else if(event.keyCode>=48 && event.keyCode<=57)
			{
				var num=event.keyCode-48;
				var l=document.getElementById('ss');
				q=l.innerHTML;
				q=q+num;
				l.innerHTML=q;
				var msg=new SpeechSynthesisUtterance(num);
				msg.lang="en-US";
				speechSynthesis.speak(msg);

			}
			else
			{
				var p=event.code;
				var o=p[3];
				var l=document.getElementById('ss');
				q=l.innerHTML;
				q=q+o;
				l.innerHTML=q;
				var msg=new SpeechSynthesisUtterance(o);
				msg.lang="en-US";
				speechSynthesis.speak(msg);

			}
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
<form action="blindenrollsearch.php" method="post">
	<input type="text" name="search" tabindex="1" onkeyup="sp(event,'search function for courses');">
	<input type="submit" name="submit" tabindex="2" onkeyup="sp(event,'submit');">
</form>
<table>
	<?php
	$sql="select * from COURSES;";
	$res=mysqli_query($conn,$sql);
	$i=3;
	while($row=mysqli_fetch_assoc($res))
	{
		$id=$row['COURSECODE'];
		$sql2="select * from blindstudentcourse where COURSECODE='$id' and STUDENTID='$uid';";
		$res2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)<1)
		{
			echo "<a href=\"blindteachersel.php?a=".$row['COURSECODE']."\" id=".$row['COURSENAME']." onkeyup=\"sp1(this.id);\" tabindex=".$i.">".$row['COURSENAME']."</a><br>";
			$i=$i+1;
		}
	}
	?>
</table>
<a href="blindacc.php" tabindex="<?php echo $i+1;?>" onkeyup="sp1('back');" id="back">BACK</a>

<p id="ss"></p>
</body>
</html>