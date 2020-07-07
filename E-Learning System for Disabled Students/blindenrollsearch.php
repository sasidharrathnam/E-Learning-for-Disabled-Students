<?php
session_start();
$uid=$_SESSION['bid'];
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSES</title>
	<script type="text/javascript">
		function al()
		{
			var msg=new SpeechSynthesisUtterance("no such result found you are redirected to course selection page");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindenroll.php";
		}
		function sp()
		{
			var msg=new SpeechSynthesisUtterance("empty fields are detected you are redirected");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindenroll.php";
		}

	</script>
</head>
<body>

</body>
</html>
<?php
if (isset($_POST['submit'])) 
{
	$search=strtoupper($_POST['search']);
	if(empty($search))
	{
		echo "<script>sp();</script>";
	}
	else
	{
		echo $search;
		
		$sql="select * from COURSES where COURSECODE='$search';";
		$res=mysqli_query($conn,$sql);
		$check=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);
		if($check<1)
		{
			echo "<script>al();</script>";

		}
		else
		{
			echo "<script>window.location='blindteachersel.php?a=".$search."';</script>";
		}
	}
}
?>