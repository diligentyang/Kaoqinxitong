			<!--content start-->
			<div class="row">
				<div class="col-sm-16 col-sm-offset-1">
					<div class="col-md-6 col-md-offset-3">
						<div class="media">
						  <div class="media-left media-top">
							<a href="btn btn-lg">
							  <h1><span class="glyphicon glyphicon-user person_size" aria-hidden="true"></span></h1>
							</a>
						  </div>
						  <div class="media-body">
							<h4 class="media-heading">我的信息</h4>
							  <?php foreach($tUser as $value){ ?>
							<form class="form-horizontal">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">姓名：</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="name" name="name" value="<?php echo $value->tName;?>" disabled/>
									</div>
								</div><li role="separator" class="divider"></li>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">工号：</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="name" name="name" name="workNumber" value="<?php echo $value->tID;?>" disabled/>
									</div>
								</div>
								<li role="separator" class="divider"></li>
								<div class="form-group">
									<label for="name" class="col-sm-2 col-xs-3 control-label">密码</label>
									<div class="col-sm-5 col-xs-6">
										<input type="password" class="form-control" id="name" name="psw" value="123456" disabled/>
									</div>
									<div class="col-sm-3 col-xs-2">
										<button id="hidden_button2" class="btn btn-danger btn-sm" type="button">修改</button>
									</div>
								</div>
								<li role="separator" class="divider"></li>
								<!--<button type="submit" class="btn btn-primary btn-sm save_button">保存</button>-->
								
							</form>
							  <?php } ?>
							<button id="hidden_button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#updatePsw">修改</button>
						  </div>
						</div>
												
					</div>
				</div>
			</div>
			
		</div>
		<div class="modal fade" id="updatePsw" tabindex="-1" role="dialog" aria-labelledby="updatePsw">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">更改密码</h4>
			  </div>
			  <div class="modal-body">
				<form class="form-horizontal" id="form_li" action="<?php echo site_url("Backend/update_user_pwd");?>" method="post">
				  <div class="form-group">
					<label for="message-text" class="col-sm-3 control-label">原始密码：</label>
					<div class="col-sm-6">
					<input type="password" id="pwd_old"  class="form-control input-sm" id="message-text" name="oldPsw" placeholder="123456" />
					</div>
				  </div>
				  <div class="form-group">
					<label for="message-text"  class="col-sm-3 control-label">新密码：</label>
					<div class="col-sm-6">
					<input type="password" id="pwd_new1" class="form-control input-sm" id="message-text" name="newPsw" placeholder="123456" />
					</div>
				  </div>
				  <div class="form-group">
					<label for="message-text"  class="col-sm-3 control-label">确认密码：</label>
					<div class="col-sm-6">
					<input type="password" id="pwd_new2" class="form-control input-sm" id="message-text" name="confinePsw" placeholder="123456" />
					</div>
				  </div>
					<input type="submit" style="display: none;" class="update_pwd"/>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
				<button type="button" id="tPwd_sub" class="btn btn-primary btn-sm" name="submit">确认</button>
				  <!--onclick="document.getElementById('form_li').submit();"-->
				  <input type="hidden" id="url_upde" value="<?php echo site_url("Backend/check_old_pwd")?>">
			  </div>
			</div>
		  </div>
		</div>