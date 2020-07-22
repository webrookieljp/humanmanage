<?php
include ("conn.php");
?>
<html>
<head>
	<title>登录</title>
	<meta charset="utf-8">
	<script>
	function check() {
		var name = document.getElementById('name').value;
		var pwd = document.getElementById('pwd').value;
		if (name==null||name=="") {
			alert("用户名不能为空！");
			return false;
		} else if (pwd==null||pwd=="") {
			alert("密码不能为空！");
			return false;
		}
		return true;
	}
	</script>
</head>
<body style="background:url('./image/login_bg.jpg') no-repeat;background-size:cover;">
<br/><br/><br/><br/><br/><br/>
<h2 align="center">人事管理系统</h2>
<form action="result.php?action=login" method="post" theme="simple" onsubmit="return check();">
<table align="center">
	<caption>用户登录</caption>
	<tr>
		<td>
			用户名：<input type="text" name="name" id="name" size="20"/>
		</td>
	</tr>
	<tr>
		<td>
			密　码：<input type="password" name="pwd" id="pwd" size="20"/>
		</td>
	</tr>
	<tr>
		<td align="center">
			<input type="submit" value="登录">
			<input type="reset" value="重置">
		</td>
	</tr>
</table>
</form>
</body>
</html>
