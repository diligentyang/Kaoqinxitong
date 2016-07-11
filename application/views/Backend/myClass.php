		<!--content start-->
			<div class="row">
				<div class="col-sm-16 col-sm-offset-1">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>我的班级<span style="color:red;"><?php echo $ClassName;?></span>（图标表示没来次数）</h4>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr><td>学号</td><td>姓名</td><td>考勤记录</td></tr>
									</thead>
									<tbody>

									<?php
									$count=0;
									foreach($myClass as $value){
										$count++; ?>
										<tr><td><?php echo $value->sID;?></td><td><?php echo $value->sName;?></td><td><span class="badge"><?php echo $value->num;?></span></td></tr>
									<?php }
									if($count==0){ ?>
										<tr><td>****</td><td>**********</td><td><span class="badge">0</span></td></tr>
									<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>