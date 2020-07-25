<?php session_start(); ?>
<html>
	<head>
		<style type="text/css">
			body{
				margin: 0;
			}
			.head{
				width: 100%;
				height: 120px;
				background-color: #17cbe6;
				position: relative;
				font-family: "agency fb";
			}
			.head .left,.head .right{
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
			}
			.head .left img{
				height: 50px;
			}
			
			.head .left{
				left: 30px;
				color: white;
				font-size: 40px;
				
			}
			.head .left span{
				transform: translateY(-10px);
				display: inline-block;
			}
			
			.right img{
				height: 20px;
			}
			.head .right{
				right: 30px;
				color: #c4311e;
				font-size: 20px;
				top: 100px;
			}
			.head .right span{
				transform: translateY(-2px);
				display: inline-block;
			}
			
			.center{
				width: 100%;
				height: 50px;
				background-color: #5ae3f8;
				position: relative;
			}
			.center .user{
				position: absolute;
				top: 50%;
				left: 50px;
				transform: translateY(-50%);
				font-weight: bold;
			}
			.center .close{
				position: absolute;
				top: 50%;
				left: 300px;
				transform: translateY(-50%);
				display: block;
				color: #d62107;
				text-decoration: none;
				
			}
			.center .close img{
				height: 30px;
			}
			.center .close span{
				font-size: 26px;
				transform: translateY(-6px);
				font-weight: bolder;
				display: inline-block;
			}
		</style>
	</head>
	
	<body>
		<div class="head">
			<div class="left">
				<img src="image/人事管理.png" /><span>&nbsp;&nbsp;人事管理系统</span>
			</div>
			<div class="right">
				<img src="./image/时间.png" /><span><?php echo getdate()['year']."-".getdate()['mon']."-".getdate()['mday']."&nbsp&nbsp".getdate()['hours'].":".getdate()['minutes'] ?></span>
			</div>
		</div>
		<div class="center">
			<div class="user">
				<span>用户：</span>
				<span><?php echo $_SESSION['name']; ?></span>
			</div>
			<a href="login.php" target="_top" class="close">
				<img src="image/退出.png" />
				<span>注销</span>
			</a>
		</div>
	</body>
</html>