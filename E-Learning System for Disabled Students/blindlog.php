<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var alpha=[];
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOU HAVE ENTERED LOGIN PAGE FOR BLIND USERS");
			msg.lang="en-US";
			speechSynthesis.speak(msg);			
		}

		function my(event,d) {

			var s=event.code;
			var o=s[3];
				

			
			if(event.code=='Tab')
			{
				var msg=new SpeechSynthesisUtterance("PLEASE ENTER YOUR "+d+" USING KEYBOARD AND ENTER FOR COMPLETION");
				msg.lang="en-US";
				speechSynthesis.speak(msg);
				document.getElementById("f"+d).innerHTML="";
			}
			else if(event.keyCode==8)
			{
				var p=document.getElementById('f'+d);
				var l=p.innerHTML;
				l=l.slice(0,-1);
				p.innerHTML=l;
				alpha[d]=l;
			}
			else if(event.keyCode>=48 && event.keyCode<=57)
			{
				var num=event.keyCode-48;
				var p=document.getElementById('f'+d);
				var l=p.innerHTML;
				
				l=l+num;
				p.innerHTML=l;	
				alpha[d]=l;
				var msg=new SpeechSynthesisUtterance(num);
				msg.lang="en-US";
				speechSynthesis.speak(msg);
			}
			else
			{
				var p=document.getElementById('f'+d);
				var l=p.innerHTML;
				
				l=l+o;
				p.innerHTML=l;	
				alpha[d]=l;
				var msg=new SpeechSynthesisUtterance(o);
				msg.lang="en-US";
				speechSynthesis.speak(msg);
								
				
			}

		}
		
		function sp(d)
		{
			
			var msg=new SpeechSynthesisUtterance(d);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function dp(d)
		{
			d=d.substring(1);
			d="f"+d;
			var f=document.getElementById(d).innerHTML;
			var msg=new SpeechSynthesisUtterance(f);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function wrong()
		{
			var msg=new SpeechSynthesisUtterance("YOUR CREDENTIALS DOES NOT MATCH");
			msg.lang="en-US";
			speechSynthesis.speak(msg);		
			window.location="blindlog.php";	
		}
		function success()
		{
			var msg=new SpeechSynthesisUtterance("YOU HAVE SUCCESSFULLY LOGGED IN");
			msg.lang="en-US";
			speechSynthesis.speak(msg);		
			window.location="blindacc.php";	
		}

	</script>

</head>

<body style="background-color: skyblue;">
	<form action="blindacc.php" method="post">
		
		<p tabindex="1" onkeyup="sp('username');">USERNAME:</p><input type="text" id="username" onkeyup="my(event,'username');" tabindex="2" name="uid"><br><p id="cusernme" tabindex="3" onkeyup="dp('cusername');">check username</p>
		<p tabindex="4" onkeyup="sp('password');">PASSWORD:</p><input type="text" id="pwd" onkeyup="my(event,'pwd');" tabindex="5" name="pwd"><br><p id="cpwd" tabindex="6" onkeyup="dp('cpwd');">check pwd</p>
		<input type="submit" name="submit" tabindex="7" onkeyup="sp('submit');">
	</form>
	<a href="final.html" onkeyup="sp('signup page')">signup</a>
	
<br><p id="fusername"></p>
<br><p id="fpwd"></p>

</body>
</html>

<?php
	include "connection.php";
	if(isset($_POST['submit']))
	{
		$uid=strtolower($_POST['uid']);
		$pass=strtolower($_POST['pwd']);
		$sql= "select * from student where USERNAME='$uid';";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		if(strcmp($row['PASSWORD'],$pass)!=0)
		{
			echo "<script>wrong();</script>";
		}
		else
		{
			session_start();
			$_SESSION['bid']=$uid;
			echo "<script>success();</script>";

		}
	}
?>