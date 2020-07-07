<?php
session_start();
$uid=$_SESSION['bid'];
session_unset($_SESSION['bid']);
echo "<script>window.location=\"blindlog.php\"</script>";
?>