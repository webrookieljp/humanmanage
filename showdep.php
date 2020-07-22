<?php include "conn.php"; ?>
<html>
<head>
	<title>查看部门详情</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">部门详情</h1>
	<table border="1" cellspacing="1" cellpadding="2" align="center">
		<?php 
		$sql="select * from deps where dep_id={$_GET['id']}";
		$result=mysqli_query($conn,$sql);
		$dep=mysqli_fetch_array($result);
		$man=@mysqli_fetch_array(mysqli_query($conn, "select emp_name from emps where emp_id={$dep[2]}"));
		$empcount=mysqli_fetch_array(mysqli_query($conn, "select count(*) from emps where dep_id={$dep[0]}"));
		?>
		<tr>
			<td class="key">部门编号</td>
			<td class="value"><?php echo $dep[0]; ?></td>
		</tr>
		<tr>
			<td class="key">部门名称</td>
			<td class="value"><?php echo $dep[1]; ?></td>
		</tr>
		<tr>
			<td class="key">部门主管</td>
			<td class="value"><?php echo $man[0]; ?></td>
		</tr>
		<tr>
			<td class="key">部门人数</td>
			<td class="value"><?php echo $empcount[0]; ?></td>
		</tr>
		<tr>
			<td class="key">部门员工</td>
			<td class="value">
			<textarea cols="30" rows="4" readonly="true"><?php 
					$sql="select emp_name from emps where dep_id={$dep[0]}";
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
