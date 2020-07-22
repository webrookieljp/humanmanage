<html>
<head>
	<title>新增职位信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">新增职位信息</h1>
	<br/><br/>
	<form action="result.php?action=addjob" method="post"\>
		<table border="1" cellspacing="1" cellpadding="2" align="center">
			<tr>
				<td class="key">职位名称</td>
				<td class="value"><input type="text" name="name" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td class="key">基本工资</td>
				<td class="value"><input type="text" name="salary" size="30" maxlength="12"></td>
			</tr>
		</table>
		<br>
		<div align="center">
			<input type="submit" value="添加"/>
			<input type="reset" value="重置"/>
		</div>
	</form>
</body>
</html>
