<?php session_start(); ?>
<html>
<head>
<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
<style type="text/css">
	body{
		margin: 0;
	}
    h3,h4{font-family: 黑体;}
    a{color: #00F; text-decoration: none;}
    a:hover{color:#FF0000;}
    li {list-style-type:none;}
</style>
</head>
<body>
    <!-- <div align="center">
        <p style="font:24px 黑体">人事管理系统</p>
        <p style="font:16px 黑体">用户：<?php echo $_SESSION['name']; ?>&nbsp;&nbsp;&nbsp;<a href="login.php" target="_top">退出</a></p>
    </div> -->
    <div id="menu" align="center">
        <h3>员工管理</h3>
        <ul>
            <li><a href="emps.php" target="right"><h4>所有员工</h4></a></li>
            <li><a href="findemp.php" target="right"><h4>查找员工</h4></a></li>
            <li><a href="addemp.php" target="right"><h4>新增员工</h4></a></li>
        </ul>
        <h3>部门管理</h3>
        <ul>
            <li><a href="deps.php" target="right"><h4>所有部门</h4></a></li>
            <li><a href="adddep.php" target="right"><h4>新增部门</h4></a></li>
        </ul>
        <h3>职位管理</h3>
        <ul>
            <li><a href="jobs.php" target="right"><h4>所有职位</h4></a></li>
            <li><a href="addjob.php" target="right"><h4>新增职位</h4></a></li>
        </ul>
    </div>
    <script type="text/javascript">
        $("#menu h3").click(function () {
            $(this).next("ul").slideToggle("fast").siblings("ul").slideUp("fast");
        });
        $("#menu h3").next("ul").slideUp(1);
    </script>
</body>
</html>