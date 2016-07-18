<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mystyle.css" rel="stylesheet">
		
	</head>
	<body>
	
		<div class="container">
		<!--head start-->
			<div class="row">
				<div class="col-sm-16 col-sm-offset-1">
					<nav class="navbar navbar-default head">
					  <div class="container-fluid">
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="#">河大考勤</a>
						</div>
						<div class="collapse navbar-collapse" id="mynav">
						  <ul class="nav navbar-nav">
							<li class="active"><a href="#">添加学生<span class="sr-only">(current)</span></a></li>
							<li><a href="#">学生考勤</a></li>
							<li><a href="#">我的信息</a></li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的班级<span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="#">14-1</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">14-2</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">14-3</a></li>
							  </ul>
							</li>
						  </ul>
						  <form class="navbar-form navbar-left" role="search">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="考勤查询请输入班级名称">
							</div>
							<button type="submit" class="btn btn-default">查询</button>
						  </form>
						  <ul class="nav navbar-nav navbar-right">
							<li class="navbar-right"><a href="#">个人中心</a></li>
							<li style="margin-right:-30px;"><a href="#"><img class="media-object" src="images/07.png"></a></li>
						  </ul>
						</div>
					  </div>
					</nav>
				</div>
			</div>
			<!--head end-->
			
			
			<!--content start-->
			<div class="row">
				<div class="col-sm-16 col-sm-offset-1">
					<br><br><br>
					<div class="jumbotron">
						<h3><span class="glyphicon glyphicon-question-sign" style="color:red;"></span>&nbsp&nbsp<span style="color:#ccc">帮助</span></h3>
						<p>
							欢迎光临，河南大学计算机与信息工程学院学生考勤系统！<br>
							1.单击以下按钮获取帮助！<span style="color:#407396;"class="glyphicon glyphicon-hand-down"></span><br>
							2.右下角下载Excel模板！&nbsp&nbsp<span class="glyphicon glyphicon-save"></span>
						</p>
						<p>
							<div class="col-md-11 col-md-offset-1">
						<a tabindex="0" class="btn btn-sm btn-danger" role="button" data-toggle="popover" data-trigger="focus" style="width:140px;"
						title="Dismissible popover" 
						data-content=
						"
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						
						"
						>创建班级注意事项</a>
					</div>
					<br><br><br><br>
					<div class="col-md-10 col-md-offset-1">
						<a tabindex="0" class="btn btn-sm btn-danger" role="button" data-toggle="popover" data-trigger="focus" style="width:140px;"
						title="Dismissible popover" 
						data-content=
						"
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						
						"
						>导入学生名册注意事项</a>
					</div>
					<br><br><br><br>
					<div class="col-md-9 col-md-offset-1">
						<a tabindex="0" class="btn btn-sm btn-danger" role="button" data-toggle="popover" data-trigger="focus" style="width:140px;"
						title="Dismissible popover" 
						data-content=
						"
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						And here's some amazing content. It's very engaging. Right?
						
						"
						>搜索注意事项</a>
					</div>
					<div class="col-md-2"><span class="glyphicon glyphicon-save"></span><a href="">下载excel模板</a></div>
						</p>
					</div>
							
			   </div>
		   </div>
		</div>
		<!--content end-->
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script src="js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
		<script src="js/my.js"></script>
		<script>
			$(function () {
				$('[data-toggle="popover"]').popover();
				})
		</script>
	</bodY>
<html>