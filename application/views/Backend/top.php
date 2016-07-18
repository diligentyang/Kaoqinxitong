<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet">
    <link href="BackendStyle/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="BackendStyle/css/mystyle.css" rel="stylesheet">
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
                        <a class="navbar-brand" href="<?php echo site_url("Backend/index");?>">河大考勤</a>
                    </div>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo site_url("backend/a_class");?>">创建班级<span class="sr-only">(current)</span></a></li>
                            <li><a href="<?php echo site_url("backend/attendance");?>">学生考勤</a></li>
                            <li><a href="<?php echo site_url("backend/myInformation");?>">我的信息</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的班级<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php foreach($arr_class as $value){ ?>
                                    <li><a href="<?php echo site_url("Backend/show_myClass_detail").'/'.$value['id'];?>"><?php echo $value['cClass']; ?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <!--<form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="考勤查询请输入班级名称">
                            </div>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form>-->
                        <iframe id="tianqi" style="margin-top: 10px;margin-left: 10px;" name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=1" width="330" height="35" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-right"><a href="#">退出登录</a></li>
                            <li style="margin-right:-30px;"><a href="#"><img class="media-object" src="BackendStyle/images/07.png"></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--head end-->