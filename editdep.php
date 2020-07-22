<?php include "conn.php"; ?>
<html>
<head>
	<title>修改部门信息</title>
	<style>
	.key{width: 100px;}
	.value{width: 400px;}
	tr{height: 40px;}
	</style>
</head>
<body>
	<h1 align="center">修改部门信息</h1>
	<form action="result.php?action=editdep" method="post">
		<table border="1" cellspacing="1" cellpadding="2" align="center">
			<?php 
			$dep=mysqli_fetch_array(mysqli_query($conn, "select * from deps where dep_id={$_GET['id']}"));
			?>
			<tr>
				<td class="key">部门编号</td>
				<td class="value"><input type="text" name="id" size="30" maxlength="30" value="<?php echo $dep[0]; ?>" readonly="true"></td>
			</tr>
			<tr>
				<td class="key">部门名称</td>
				<td class="value"><input type="text" name="name" size="30" maxlength="30" value="<?php echo $dep[1]; ?>"></td>
			</tr>
			<tr>
				<td class="key">部门主管</td>
				<td class="value">
					<select name="manager">
						<option value="0">----请选择主管----</option>
						<?php 
						$sql="select emp_id,emp_name from emps order by emp_id";
						$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_array($result)) {
							if ($row[0]==$dep[2]) {
								echo "<option value='{$row[0]}' selected='selected'>{$row[1]}</option>";
							} else {
								echo "<option value='{$row[0]}'>{$row[1]}</option>";
							}
						}
						?>
					</select>
				</td>
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