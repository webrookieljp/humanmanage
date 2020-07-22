<?php
include "conn.php";
$pageSize=10;
?>
<body>
	<h1 align="center">部门列表</h1>
	<div style="width:100%;height:500px;">
	<table border="1" cellspacing="1" cellpadding="2" align="center">
		<tr align="center" bgcolor="silver" height="40">
			<th width="80">部门编号</th><th width="100">部门名称</th><th width="100">部门主管</th><th colspan="3" width="130">操作</th>
		</tr>
		<?php
		if (!isset($_GET['page'])) $_GET['page']=1;
	  	$offset=($_GET['page']-1)*$pageSize;
		$sql="select * from deps limit $offset,$pageSize";
		$result=mysqli_query($conn,$sql);
		while($dep=mysqli_fetch_array($result)) {
			$man=@mysqli_fetch_array(mysqli_query($conn, "select emp_name from emps where emp_id={$dep[2]}"));
			echo "<tr height='40'>";
			echo "<td>{$dep[0]}</td>";
			echo "<td>{$dep[1]}</td>";
			echo "<td>{$man[0]}</td>";
			echo "<td><a href='showdep.php?id={$dep[0]}'>查看</a></td>";
			echo "<td><a href='editdep.php?id={$dep[0]}'>修改</a></td>";
			echo "<td><a href='result.php?action=deldep&id={$dep[0]}' onClick=\"if(!confirm('确定删除该部门信息吗？'))return false;else return true;\">删除</a></td>";
			echo "<tr>";
		}
		 ?>
	</table>
	</div>
	<div style="text-align:center;">
	<?php
	$row=mysqli_fetch_array(mysqli_query($conn,"select count(*) from deps"));
	$total=ceil($row[0]/$pageSize);
	echo "第".$_GET['page']."/".$total."页&nbsp;&nbsp;&nbsp;";
	echo "<a href='deps.php?page=1'>首页</a>&nbsp;";
	if ($_GET['page']>1)
		echo '<a href="deps.php?page='.($_GET['page']-1).'">上一页</a>&nbsp;';
	else
		echo '上一页&nbsp;';
	if ($_GET['page']<$total)
		echo '<a href="deps.php?page='.($_GET['page']+1).'">下一页</a>&nbsp;';
	else
		echo '下一页&nbsp;';
	echo "<a href='deps.php?page=$total'>尾页</a>&nbsp;";
	mysqli_close($conn);
	?>
	</div>
</body>
</html>
