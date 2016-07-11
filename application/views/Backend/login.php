<!DOCTYPE html>
<head>
    <title>Login Two</title>
    <base href="<?php echo base_url();?>">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="BackendStyle/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="BackendStyle/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="BackendStyle/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="BackendStyle/css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-image-1">
<div class="container">
    <div class="col-md-12">
        <form class="form-horizontal templatemo-login-form-2" role="form" action="<?php echo site_url("login/check_login");?>" method="post">
            <div class="row">
                <div class="col-md-12">
                    <h1>河大考勤系统</h1>
                </div>
            </div>
            <div class="row">
                <div class="templatemo-one-signin col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="username" class="control-label">Username</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-user"></i>
                                <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="password" class="control-label">Password</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-lock"></i>
                                <input type="password" class="form-control" id="password" name="password" placeholder="**************">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" value="LOG IN" class="btn btn-warning">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="margin-bottom-15">
                        登录流程：<br><br>
                    </label>
                    <li class="margin-bottom-15">
                        username为教师姓名
                    </li>
                    <li class="margin-bottom-15">
                        初始密码为123456，登录后请尽快修改
                    </li>
                    <li class="margin-bottom-15">
                        如果登录不成功，请联系网站管理员。
                    </li>
                </div>
            </div>
        </form>
    </div>
    <?php if(!empty($error)){?>
        <script type="text/javascript">
            alert("<?php echo $error;?>");
        </script>
    <?php } ?>
</div>
</body>
</html>