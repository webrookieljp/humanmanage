<?php include "conn.php"; ?>
<html>
<head>
	<title>查看职位详情</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">职位详情</h1>
	<table border="1" cellspacing="1" cellpadding="2" align="center">
		<?php 
		$sql="select * from jobs where job_id={$_GET['id']}";
		$result=mysqli_query($conn,$sql);
		$job=mysqli_fetch_array($result);
		$empcount=mysqli_fetch_array(mysqli_query($conn, "select count(*) from emps where job_id={$job[0]}"));
		?>
		<tr>
			<td class="key">职位编号</td>
			<td class="value"><?php echo $job[0]; ?></td>
		</tr>
		<tr>
			<td class="key">职位名称</td>
			<td class="value"><?php echo $job[1]; ?></td>
		</tr>
		<tr>
			<td class="key">基本工资</td>
			<td class="value"><?php echo $job[2]; ?></td>
		</tr>
		<tr>
			<td class="key">在职人数</td>
			<td class="value"><?php echo $empcount[0]; ?></td>
		</tr>
		<tr>
			<td class="key">在职员工</td>
			<td class="value">
			<textarea cols="30" rows="4" readonly="true"><?php 
					$sql="select emp_name from emps where job_id={$job[0]}";
					$result=mysqli_query($conn,$sql);
					while ($row=mysqli_fetch_array($result)) {
						echo "{$row[0]}\n";
					}
					mysqli_close($conn);
				?></textarea>
			</td>
		</tr>
	</table>
</body>
</html>
