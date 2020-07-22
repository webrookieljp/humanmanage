<?php
include "conn.php";
session_start();
$action=$_GET['action'];
switch ($action) {
 	case 'login':
		$sql="select count(*) from user where user_name='{$_POST['name']}' and password='{$_POST['pwd']}'";
		$result=mysqli_query($conn,$sql);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		$row=mysqli_fetch_array($result);
		if($row[0]==1) {
			$_SESSION['name']=$_POST['name'];
			echo "<script>window.location.href='index.php';</script>";
		} else {
			echo "<script>alert('用户名或密码错误，请重新登录');window.location.href='login.php';</script>";
		}
		mysqli_close($conn);
 		break;
 	case 'addjob':
 		$sql="select count(*) from jobs where job_name='{$_POST['name']}'";
 		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		if($row[0]==1) {
			echo "<script>alert('职位名称已存在，请使用其它名称');</script>";
		} else {
			$sql="insert into jobs(job_name, salary) values ('{$_POST['name']}', {$_POST['salary']})";
			if(mysqli_query($conn,$sql))
				echo "<script>alert('职位添加成功');</script>";
			else
				echo "<script>alert('职位添加失败');</script>";
		}
		echo "<script>location.href='jobs.php';</script>";
		mysqli_close($conn);
 		break;
 	case 'adddep':
 		$sql="select count(*) from deps where dep_name='{$_POST['name']}'";
 		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		if($row[0]==1) {
			echo "<script>alert('部门名称已存在，请使用其它名称');</script>";
		} else {
			if ($_POST['manager']==0)
				$sql="insert into deps(dep_name) values ('{$_POST['name']}')";
			else
				$sql="insert into deps(dep_name, manager_id) values ('{$_POST['name']}', {$_POST['manager']})";
			if(mysqli_query($conn,$sql))
				echo "<script>alert('部门添加成功');</script>";
			else
				echo "<script>alert('部门添加失败');</script>";
		}
		echo "<script>location.href='deps.php';</script>";
		mysqli_close($conn);
 		break;
 	case 'addemp':
 		if ($_FILES['img']['name']==null||$_FILES['img']['name']=="") {
 			$sql="insert into emps(emp_name, phone, email, job_id, hire_date, manager_id, dep_id, bonus) values ('{$_POST['name']}', '{$_POST['phone']}', '{$_POST['email']}', {$_POST['job_id']}, '{$_POST['date']}', {$_POST['manager']}, {$_POST['dep_id']}, {$_POST['bonus']})";
 		} else {
			$tmp_name = iconv("utf-8","gb2312//IGNORE", $_FILES['img']['tmp_name']);
			$img_name = iconv("utf-8","gb2312//IGNORE", './image/emp_img/'.$_FILES['img']['name']);
			move_uploaded_file($tmp_name, $img_name);
			$img = iconv("gb2312", "utf-8", $img_name);
			$sql="insert into emps(emp_name, phone, email, job_id, hire_date, manager_id, dep_id, bonus, img) values ('{$_POST['name']}', '{$_POST['phone']}', '{$_POST['email']}', {$_POST['job_id']}, '{$_POST['date']}', {$_POST['manager']}, {$_POST['dep_id']}, {$_POST['bonus']}, '{$img}')";
 		}
 		if(mysqli_query($conn,$sql))
			echo "<script>alert('员工添加成功');</script>";
		else
			echo "<script>alert('员工添加失败');</script>";
		mysqli_close($conn);
		echo "<script>location.href='emps.php';</script>";
 		break;
 	case 'delemp':
 		$sql="delete from emps where emp_id={$_GET['id']}";
 		if(mysqli_query($conn,$sql))
			echo "<script>alert('员工删除成功');</script>";
		else
			echo "<script>alert('员工删除失败');</script>";
		mysqli_query($conn,"update emps set manager_id=0 where manager_id={$_GET['id']}");
		mysqli_close($conn);
		echo "<script>location.href='emps.php';</script>";
 		break;
 	 case 'deldep':
 	 	$empcount=mysqli_fetch_array(mysqli_query($conn, "select count(*) from emps where dep_id={$_GET['id']}"));
 	 	if($empcount[0]>0)
 	 		echo "<script>alert('部门删除失败！该部门中还有员工');</script>";
		else{
			$sql="delete from deps where dep_id={$_GET['id']}";
	 		if(mysqli_query($conn,$sql))
				echo "<script>alert('部门删除成功');</script>";
			else
				echo "<script>alert('部门删除失败');</script>";
		}
		echo "<script>location.href='deps.php';</script>";
 		mysqli_close($conn);
 		break;
 	case 'deljob':
 	 	$empcount=mysqli_fetch_array(mysqli_query($conn, "select count(*) from emps where job_id={$_GET['id']}"));
 	 	if($empcount[0]>0)
 	 		echo "<script>alert('职位删除失败！该职位还有员工担任');</script>";
		else{
			$sql="delete from jobs where job_id={$_GET['id']}";
	 		if(mysqli_query($conn,$sql))
				echo "<script>alert('职位删除成功');</script>";
			else
				echo "<script>alert('职位删除失败');</script>";
		}
		echo "<script>location.href='jobs.php';</script>";
 		mysqli_close($conn);
 		break;
 	case 'editemp':
 		if ($_FILES['img']['name']=="")
		$sql="update emps set emp_name='{$_POST['name']}',phone='{$_POST['phone']}',email='{$_POST['email']}',job_id={$_POST['job_id']},hire_date='{$_POST['date']}',manager_id={$_POST['manager']},dep_id={$_POST['dep_id']},bonus={$_POST['bonus']} where emp_id = {$_POST['id']}";
		else {
			$tmp_name = iconv("utf-8","gb2312//IGNORE", $_FILES['img']['tmp_name']);
			$img_name = iconv("utf-8","gb2312//IGNORE", './image/emp_img/'.$_FILES['img']['name']);
			move_uploaded_file($tmp_name, $img_name);
			$img = iconv("gb2312", "utf-8", $img_name);
			$sql="select img from emps where emp_id={$_POST['id']}";
			$row=mysqli_fetch_array(mysqli_query($conn,$sql));
			if(file_exists($row[0]))
				unlink($row[0]);
			$sql="update emps set emp_name='{$_POST['name']}',phone='{$_POST['phone']}',email='{$_POST['email']}',job_id={$_POST['job_id']},hire_date='{$_POST['date']}',manager_id={$_POST['manager']},dep_id={$_POST['dep_id']},bonus={$_POST['bonus']},img='{$img}' where emp_id = {$_POST['id']}";
		}
		if(!mysqli_query($conn,$sql))
			echo "<script>alert('修改失败！)';</script>";
		else
			echo "<script>alert('修改成功！');</script>";
		echo "<script>location.href='emps.php';</script>";
		mysqli_close($conn);
 		break;
 	case 'editdep':
 		$sql="update deps set dep_name='{$_POST['name']}',manager_id={$_POST['manager']} where dep_id = {$_POST['id']}";
		if(!mysqli_query($conn,$sql))
			echo "<script>alert('修改失败！)';</script>";
		else
			echo "<script>alert('修改成功！');</script>";
		echo "<script>location.href='deps.php';</script>";
		mysqli_close($conn);
 		break;
 	case 'editjob':
 		$sql="update jobs set job_name='{$_POST['name']}',salary={$_POST['salary']} where job_id = {$_POST['id']}";
		if(!mysqli_query($conn,$sql))
			echo "<script>alert('修改失败！)';</script>";
		else
			echo "<script>alert('修改成功！');</script>";
		echo "<script>location.href='jobs.php';</script>";
		mysqli_close($conn);
 		break;
 	default:
 		mysqli_close($conn);
}
?>