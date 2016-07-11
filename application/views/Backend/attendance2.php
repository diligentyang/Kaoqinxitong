<!--学生名册导入-->
<!--content start-->

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-sm-16 col-sm-offset-1">
            <?php if($hasClass==0){?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><span style="color:;"class="glyphicon glyphicon-exclamation-sign"></span></h1>
                    </div>
                    <div class="panel-body">

                        你还没有创建班级，前去创建班级！&nbsp<a href="<?php echo site_url("backend/index");?>"><span style="color:red;font-size:18px;"class="glyphicon glyphicon-hand-right">&nbsp前往</span></a>
                    </div>
                </div>
            <?php }else{?>
            <div>

                <ul class="nav nav-tabs" role="tablist" id="studentsExcel">

                    <?php foreach($uploadStudents_classList["arr_class"] as $item){?>
                        <li id="class<?php echo $item['cClass'];?>" role="presentation" dataClass="<?php echo $item['cClass'];?>" dataCourse="<?php echo $item['id'];?>" assistantID="<?php echo $item['aID'];?>" lixianID="<?php echo $item['id']; ?>" data_Url="<?php echo site_url('Backend/ajaxForStudent');?>">
                            <a href="#<?php echo $item['cClass'];?>" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $item['cClass'];?></a>
                        </li>
                    <?php }?>
                </ul>

                <div class="tab-content" id="uploadModal">
                    <?php foreach($uploadStudents_classList["arr_class"] as $item){?>
                    <div role="tabpanel" class="tab-pane fade" id="<?php echo $item['cClass'];?>">
                        <br><br>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><span id="title<?php echo $item['id'];?>">学生名册导入</span></h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="form_li" action="<?php echo site_url('Backend/uploadExcel');?>" method="post" enctype="multipart/form-data"  >
                                    <div class="form-group has-warning">
                                        <label for="upfile" class="col-sm-4 control-label">学生表格上传：</label>
                                        <div class="col-sm-7">
                                            <input type="file" id="file" name="file" style="width:100%;"/>
                                            <input type="hidden" id="class<?php echo $item['id']; ?>" name="class" value="" /><br/>
                                            <input type="hidden" id="course<?php echo $item['id']; ?>" name="courseID" value="" /><br/>
                                            <input type="hidden" id="assistantID<?php echo $item['id']; ?>" name="assistantID" value="" /><br/>
                                           <input type="hidden" class="sClass" name="sClass" value="<?php echo $item['cClass'];?>"/>
                                            <p class="help-block">请上传.xls格式的学生名单</p>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit"class="btn btn-primary" value="上传"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>

            </div>



            <?php }?>

        </div>
    </div>
</div>

</div>


<div class="modal fade" id="myalert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_li" action="<?php echo site_url("Backend/add_absence")?>" method="post">
                    <div class="form-group">
                        <label for="dtp_input2" class="col-md-3 control-label">请选择日期</label>
                        <div class="input-group date form_date col-md-5" data-date="" data-date-format="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="16" id="date_add" name="date" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <!--<input type="hidden" value="" class="sID" name="sID" />
                            <input type="hidden" value="" class="courseID" name="courseID" />-->
                        </div>
                        <input type="hidden" value="" class="sID" name="sID" />
                        <input type="hidden" value="" class="courseID" name="courseID" />
                        <input type="hidden" value="" class="sName1" name="sName1">
                        <input type="hidden" id="class" name="sClass" value="" class="sClass"/><br/>
                        <input type="submit" id="sub_add_l" style="display: none;" value="提交">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                <button type="button" id="sub_add" class="btn btn-primary btn-sm" name="submit" >确认</button>
                <!--onclick="document.getElementById('form_li').submit();"-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myalert_remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="remove">message</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>请选择取消项目：</h5>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form_li2" action="<?php echo site_url("Backend/del_absence")?>" method="post">
                            <div class="checkbox" id="removeTagsForCheckBox">
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3  control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <label class="col-md-3 control-label">
                                    <input type="checkbox" value=""/><span class="label label-danger">2016-6-30</span>
                                </label>
                                <input type="hidden" value="" class="sID" name="sID" />
                                <input type="hidden" value="" class="courseID" name="courseID" />
                                <input type="hidden" value="" class="removeUrl" />
                            </div>
                            <input type="hidden" value="" class="sClass" name="sClass" />
                        </form>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary btn-sm" name="submit" onclick="document.getElementById('form_li2').submit();">确认</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="myalert_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="update_title">New message</h4>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" id="form_li3" action="<?php echo site_url('Backend/updateStudentsExcel')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group has-warning">
                        <label for="upfile" class="col-sm-4 control-label">学生表格上传：</label>
                        <div class="col-sm-7">
                            <input type="file" id="file" name="file" style="width:100%;"/>
                            <input type="hidden" value="" class="courseID" name="courseID" />
                            <input type="hidden" value="" class="aID" name="aID" />
                            <input type="hidden" value="" class="className" name="className" />
                            <p class="help-block">请上传.xls格式的学生名单</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary btn-sm" name="submit" onclick="document.getElementById('form_li3').submit();">确认</button>
            </div>
        </div>
    </div>
</div>
<?php if($className=="0"){?>

<?php } else{?>
    <input type="hidden" id="checkClickLiForActive" value="<?php echo $className;?>" />
<?php }?>
<!--content end-->