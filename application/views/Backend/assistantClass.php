<!--content start-->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="col-sm-16 col-sm-offset-1">
            <div>

                <?php
               /* echo "<pre>";
                print_r($class_list);
                echo "</pre>";
                echo "<pre>";
                print_r($all_class);
                echo "</pre>";*/
                ?>
                <ul class="nav nav-tabs" role="tablist">
                    <?php foreach($class_list as $value){ ?>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $value->cClass;?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php $count=0; foreach ($all_class as $value1) {
                                if($value1->cClass==$value->cClass){
                                ?>
                                <li><a <?php if($count==0){ echo "id='first'";} ?> href="#<?php echo $value1->id;?>" class="active ysy1" ysy1="<?php echo $value1->id;?>" aria-controls="settings" role="tab" data-toggle="tab"><?php echo $value1->cName; ?></a></li>
                            <?php $count++; }}?>
                        </ul>
                    </li>
                    <?php } ?>
                   <!-- <li role="presentation" class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的班级<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#14-1" aria-controls="settings" role="tab" data-toggle="tab">14-1</a></li>

                            <li><a href="#14-2" aria-controls="settings" role="tab" data-toggle="tab">14-2</a></li>

                            <li><a href="#14-3" aria-controls="settings" role="tab" data-toggle="tab">14-3</a></li>
                        </ul>

                    </li>
                    <li role="presentation" class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的班级<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#14-1" aria-controls="settings" role="tab" data-toggle="tab">14-1</a></li>

                            <li><a href="#14-2" aria-controls="settings" role="tab" data-toggle="tab">14-2</a></li>

                            <li><a href="#14-3" aria-controls="settings" role="tab" data-toggle="tab">14-3</a></li>
                        </ul>

                    </li>-->
                </ul>

                <div class="tab-content">
                    <?php foreach($all_class as $value2){ ?>
                    <div role="tabpanel" class="tab-pane fade in active" id="<?php echo $value2->id;?>">
                        <br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row" >
                                    <div class="col-md-1">
                                        学号
                                    </div>
                                    <div class="col-md-1" >
                                        姓名
                                    </div>
                                    <div class="col-md-10">
                                        考勤(<span style="color:red;">红色标签表示没到人名单</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-1">1427152073</div>
                                            <div class="col-md-1" style="margin-left:50px;">李贤</div>
                                            <input type="hidden" value="李贤" id="name" />
                                            <input type="hidden" value="1427152073" id="number" />
                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>
                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>
                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>
                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>
                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>

                                            <div class="col-md-1"><span class="label label-danger">2016-6-30</span></div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <input type="hidden" class="ysyin1" value="<?php echo site_url("Backend/show_oneClass_detail");?>">
                </div>

            </div>

        </div>
    </div>
</div>

</div>

<!--content end-->