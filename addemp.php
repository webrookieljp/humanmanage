<?php include "conn.php"; ?>
<html>
<head>
	<title>新增员工信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">新增员工信息</h1>
	<br/><br/>
	<form action="result.php?action=addemp" method="post" enctype="multipart/form-data">
		<table border="1" cellspacing="1" cellpadding="2" align="center">
			<tr>
				<td class="key">员工姓名</td>
				<td class="value"><input type="text" name="name" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td class="key">联系电话</td>
				<td class="value"><input type="text" name="phone" size="30" maxlength="12"></td>
			</tr>
			<tr>
				<td class="key">电子邮件</td>
				<td class="value"><input type="text" name="email" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td class="key">职位</td>
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
				<td class="key">入职日期</td>
				<td class="value"><input type="text" name="date" size="30" maxlength="10">格式：YYYY-mm-dd</td>
			</tr>
			<tr>
				<td class="key">所属领导</td>
				<td class="value">
					<select name="manager">
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
				<td class="key">所属部门</td>
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
				<td class="key">奖金</td>
				<td class="value"><input type="text" name="bonus" size="30" maxlength="12" value="0"></td>
			</tr>
			<tr>
				<td class="key">员工照片</td>
				<td class="value"><input type="file" name="img"/></td>
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
