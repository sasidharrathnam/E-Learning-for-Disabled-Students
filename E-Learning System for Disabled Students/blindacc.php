<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED YOUR HOME PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp(d)
		{
			var msg=new SpeechSynthesisUtterance(d);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body style="background-color: skyblue;">
<div class="container" >
    <div id="leftcolumn">
        <div id="menu">
        <div id="empty"></div>
        <div id="course" >
            <a href="blindenroll.php" tabindex="2.1" onkeyup="sp('enroll course')">ENROLL COURSES</a></div><br><br>
        <div id="quiz" >
            <a href="blindquiz.php" tabindex="2.2" onkeyup="sp('quiz')">QUIZ</a></div><br><br>
          <div id="enroll" >
            <a href="blindcourse.php" tabindex="2.5" onkeyup="sp('courses enrolled')">COURSES ENROLLED</a></div><br><br>
        
        <div id="certificates" >
            <a href="blindcert.php" tabindex="2.3" onkeyup="sp('certificates')">CERTIFICATES</a></div><br><br>
        
        <div id="logout" >
            <a href="blindlogout.php" tabindex="2.4" onkeyup="sp('logout')">LOGOUT</a></div><br><br>
    </div>
    </div>
    <div id="midcolumn">
        <br>
        <br>    
    </div>
    <p><a href='video1.html' target="_blank" onkeyup="sp('Click to watch the video1')">video1</a></p>
    <p><a href='video2.html' target="_blank" onkeyup="sp('Click to watch the video2')">video2</a></p>   

</div>
    
</body>  
    
</html>