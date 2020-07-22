<?php include "conn.php"; ?>
<html>
<head>
	<title>修改职位信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">修改职位信息</h1>
	<form action="result.php?action=editjob" method="post">
		<table border="1" cellspacing="1" cellpadding="2" align="center">
			<?php 
			$job=mysqli_fetch_array(mysqli_query($conn, "select * from jobs where job_id={$_GET['id']}"));
			?>
			<tr>
				<td class="key">职位编号</td>
				<td class="value"><input type="text" name="id" size="30" maxlength="30" value="<?php echo $job[0]; ?>" readonly="true"></td>
			</tr>
			<tr>
				<td class="key">职位名称</td>
				<td class="value"><input type="text" name="name" size="30" maxlength="30" value="<?php echo $job[1]; ?>"></td>
			</tr>
			<tr>
				<td class="key">基本工资</td>
				<td class="value"><input type="text" name="salary" size="30" maxlength="30" value="<?php echo $job[2]; ?>"></td>
			</tr>
		</table>
		<br>
		<div align="center">
			<input type="submit" value="修改"/>
			<input type="reset" value="重置"/>
		</div>
	</form>
</body>
</html>
<?php mysqli_close($conn); ?>