<?php include "conn.php"; ?>
<html>
<head>
	<title>查看员工信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 250px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">员工详细信息</h1>
	<table border="1" cellspacing="1" cellpadding="2" align="center" table-layout="fixed">
		<?php 
		$emp=mysqli_fetch_array(mysqli_query($conn, "select * from emps where emp_id={$_GET['id']}"));
		$job=mysqli_fetch_array(mysqli_query($conn, "select * from jobs where job_id={$emp[4]}"));
		$man=mysqli_fetch_array(mysqli_query($conn, "select emp_name from emps where emp_id={$emp[6]}"));
		$dep=mysqli_fetch_array(mysqli_query($conn, "select dep_name from deps where dep_id={$emp[7]}"));
		?>
		<tr>
			<td class="key">员工编号</td>
			<td class="value"><?php echo $emp[0]; ?></td>
			<td rowspan="5" valign="top"><img src="<?php echo $emp[9] ?>" alt="员工照片" width="150" height="200"></td>
		</tr>
		<tr>
			<td class="key">员工名称</td>
			<td class="value"><?php echo $emp[1]; ?></td>
		</tr>
		<tr>
			<td class="key">联系电话</td>
			<td class="value"><?php echo $emp[2]; ?></td>
		</tr>
		<tr>
			<td class="key">电子邮件</td>
			<td class="value"><?php echo $emp[3]; ?></td>
		</tr>
		<tr>
			<td class="key">职位</td>
			<td class="value"><?php echo $job[1]; ?></td>
		</tr>
		<tr>
			<td class="key">入职日期</td>
			<td class="value"><?php echo $emp[5]; ?></td>
		</tr>
		<tr>
			<td class="key">所属领导</td>
			<td class="value"><?php echo $man[0]; ?></td>
		</tr>
		<tr>
			<td class="key">所属部门</td>
			<td class="value"><?php echo $dep[0]; ?></td>
		</tr>
		<tr>
			<td class="key">基本工资</td>
			<td class="value"><?php echo $job[2]; ?></td>
		</tr>
		<tr>
			<td class="key">奖金</td>
			<td class="value"><?php echo $emp[8]; ?></td>
		</tr>
	</table>
</body>
</html>
