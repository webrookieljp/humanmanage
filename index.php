<?php
	session_start();
  	if(!isset($_SESSION['name'])||empty($_SESSION['name']))
    	echo "<script>alert('请先登录！');location.href='login.php';</script>";
?>
<html>
<head>
	<title>人事管理系统</title>
</head>
<frameset rows="171px,*" framespacing="0" frameborder="no" border="0">
	<frame src="top.php" />
	<frameset class="bottom" cols="440px,*">
		<frame src="left.php">
		<frame src="" name="right">
	</frameset>
</frameset>
</html>
