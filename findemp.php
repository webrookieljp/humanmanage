<?php include "conn.php"; ?>
<html>
<head>
	<title>查找员工信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">查找员工信息</h1>
	<br/><br/>
	<div align="center">
	<form action="" method="post" onsubmit="return check()" name="find">
		<table>
			<tr>
				<td><input name="type" type="radio" value="emp_name" />按姓名查找</td>
				<td><input type="text" size="30" maxlength="30" name="emp_name"></td>
			</tr>
			<tr>
				<td><input name="type" type="radio" value="emp_id" />按工号查找</td>
				<td><input type="text" size="30" maxlength="11" name="emp_id"></td>
			</tr>
			<tr>
				<td><input name="type" type="radio" value="manager_id" />按领导查找</td>
				<td class="value">
					<select name="manager_id">
						<option value="0">----请选择领导----</option>
						<?php 
						$sql="select emp_id,emp_name from emps order by emp_id";
						$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_array($result)) {
							echo "<option value='{$row[0]}'>{$row[1]}</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input name="type" type="radio" value="dep_id" />按部门查找</td>
				<td class="value">
					<select name="dep_id">
						<option value="0">----请选择部门----</option>
						<?php 
						$sql="select dep_id,dep_name from deps order by dep_id";
						$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_array($result)) {
							echo "<option value='{$row[0]}'>{$row[1]}</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input name="type" type="radio" value="job_id" />按职位查找</td>
				<td class="value">
					<select name="job_id">
						<option value="0">----请选择职位----</option>
						<?php 
						$sql="select job_id,job_name from jobs order by job_id";
						$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_array($result)) {
							echo "<option value='{$row[0]}'>{$row[1]}</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="查找"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
<script>
function check() {
	var type=document.getElementsByName('type');
	for (var i = type.length - 1; i >= 0; i--) {
		if (type[i].checked){
			document.find.action="find.php?type="+type[i].value;
			return true;
		}
	}
	alert("请选择一种查找方式！");
	return false;
}
</script>