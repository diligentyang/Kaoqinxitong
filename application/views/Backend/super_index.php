<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet">
	<link href="BackendStyle/css/flat-ui.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="col-md-3">
          <h4 class="demo-panel-title">年级</h4>
		  <div class="form-group">
			  <select id="grade" class="form-control select select-primary" data-toggle="select">
					<option value="年级">--年级--</option>
				<?php foreach ($grade as $val) { ?>
					<option value="<?php echo $val->cGrade;?>"><?php echo $val->cGrade;?></option>
				<?php } ?>
			  </select>
		  </div>
    </div> <!-- /.col-md-3 -->
	
	<div class="col-md-3">
          <h4 class="demo-panel-title">班级</h4>
		  <div class="form-group">
			  <select class="form-control select select-primary" data-toggle="select" disabled>
				
			  </select>
		  </div>
    </div> <!-- /.col-md-3 -->
	<div class="col-md-3">
          <h4 class="demo-panel-title">课程</h4>
		  <div class="form-group">
			  <select class="form-control select select-primary" data-toggle="select" disabled>
				
			  </select>
		  </div>
    </div> <!-- /.col-md-3 -->
	<div class="col-md-2">
		<h4 class="demo-panel-title">搜索</h4>
		<div class="form-group">
			<button type="button" class="btn btn-success btn-block" disabled>确定</button>
		</div>
	</div>
	<input type="hidden" value="<?php echo site_url();?>" id="siteurl">
</div>


<script src="BackendStyle/js/jquery.min.js"></script>
<script src="BackendStyle/js/bootstrap.min.js"></script>
<script src="BackendStyle/js/flat-ui.min.js"></script>
<script src="BackendStyle/js/application.js"></script>
<script>
$("#grade").change(function (){
	var grade = $("#grade").find("option:selected").val();
	if (grade=="年级") {
		alert("请选择年级");
	} else {
		var site_url=$("#siteurl").val();
		var url = site_url+"/Backend/get_all_class";
		alert(url);
		$.ajax({
             url: url,  
             type: "POST",
             data:{grade:grade},
			 async: false,
             dataType: "json",
             error: function(){  
                 alert('请求失败');  
             },  
             success: function(data,status){//如果调用php成功 
                alert(data);
             }
        });
	}
})

</script>
</body>
<html>
