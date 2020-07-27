<?php session_start(); ?>
<html>
<head>
<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
<style type="text/css">
	body{
		margin: 0;
		background-color: #17cbe6;
		width: 425px;
		overflow-x: hidden;
	}
	ul{
		margin: 0;
		padding: 0;
		list-style: none;
	}
	
	.root .top{
		width: 425px;
		height: 55px;
		line-height: 55px;
		color: #fff;
		font-family: "微软雅黑";
		font-size: 30px;
		margin-left: 50px;
	}
	
	.menu{
		background-color: #fff;
		font-size: 27px;
		font-weight: 400;
		text-indent: 45px;
	}
	.menu .title{
		background-image: url(image/右三角.png);
		background-repeat: no-repeat;
		background-size: 40px;
		background-position-x: 5px;
		background-position-y: -1px;
	}
	.menu .title img{
		width: 30px;
		transform: translateY(5px);
	}
	.menu .title ul{
		text-indent: 110px;
		font-size: 20px;
		color: #5c5c5c;
	}
	.menu .title ul li{
		background-image: url(PS&file/目录.png);
		background-size: 20px;
		background-repeat: no-repeat;
		background-position-x: 85px;
		background-position-y: 4px;
	}
	.menu .title ul li a{	
		text-decoration: none;
	}
	.menu .title ul li a:hover{
		color: #C4311E;
	}
</style>
</head>
<body>
	<div class="root">
		<div class="top">
			系统菜单
		</div>
		<ul class="menu">
			<li class="title"><img src="PS&file/员工.png" />&nbsp;<span>员工管理</span>
				<ul class="s_title">
					<li><a href="emps.php" target="right">所有员工</a></li>
					<li><a href="findemp.php" target="right">查找员工</a></li>
					<li><a href="addemp.php" target="right">新增员工</a></li>
				</ul>
			</li>
			<li class="title"><img src="PS&file/部门.png" />&nbsp;<span>部门管理</span>
				<ul class="s_title">
					<li><a href="deps.php" target="right">所有部门</a></li>
					<li><a href="adddep.php" target="right">新增部门</a></li>
				</ul>
			</li>
			<li class="title"><img src="PS&file/职位管理.png" />&nbsp;<span>职位管理</span>
				<ul class="s_title">
					<li><a href="jobs.php" target="right">所有职位</a></li>
					<li><a href="addjob.php" target="right">新增职位</a></li>
				</ul>			    
			</li>
		</ul>
	</div>
    <!-- <div align="center">
        <p style="font:24px 黑体">人事管理系统</p>
        // <p style="font:16px 黑体">用户：<?php echo $_SESSION['name']; ?>&nbsp;&nbsp;&nbsp;<a href="login.php" target="_top">退出</a></p>
    </div> -->
    <script type="text/javascript">
		$(".menu .title").children("ul").slideUp();
        $(".menu .title span").click(function () {
            $(this).next("ul").slideToggle("fast").parent().siblings().children("ul").slideUp();
			// $(this).parent(".title").css({"background-image":"url(image/下三角.png)","background-size":"25px 25px","background-position-x":"12px","background-position-y":"8px"})
			// .siblings().css({"background-image":"url(image/右三角.png)","background-size":"20px,20px","background-position-x":"85px","background-position-y":"4px"});
        });
    </script>
</body>
</html>