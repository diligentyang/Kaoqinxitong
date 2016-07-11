<?php
class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session','pagination'));
        $this->load->helper(array('url','form','date'));
        $this->load->database();
        $ok = $this->session->userdata('admin');
        if (!isset($ok) || $ok != 'ok') {
            redirect("Login/index");
        }
        $className = $this->session->userdata("className");
        if(!isset($className)){
            $this->session->set_userdata("className",0);
        }
        /*$this->session->set_userdata("tID","1");
        $this->session->set_userdata("isAssistant","0");
        $this->session->set_userdata("hasClass","1");
        $this->session->set_userdata("hasStudents","0");*/
    }

    //公告数据
    function commonData(){
        $data["tID"] = $this->session->userdata("tID");
        $data["isAssistant"] = $this->session->userdata("isAssistant");
       // var_dump($data);
    }

    //添加学生界面
    function index()
    {
        $this->commonData();
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $this->load->view("Backend/index");
        $this->load->view("Backend/foot");
    }

    function top(){
        $tID=$this->session->userdata("tID");
        $this->load->model("Backmodel");
        $data=$this->Backmodel->get_class($tID);
        return $data;
    }

    //创建班级
    function add_class()
    {
        $this->load->model("Backmodel");
        $this->Backmodel->add_class_model();
        $this->session->set_userdata("hasClass",'1');
        redirect("Backend/attendance");
    }

    //根据辅导员的名字查找导员的id
    function get_assistant()
    {
        $tName = $this->input->post("assistant");
        $this->load->model("Backmodel");

        $tID = $this->Backmodel->get_assistant_model($tName);
        $tID=$tID['tID'];
        if($tID){
            echo $tID;
        }else{
            echo "false";
        }
    }

    //学生考勤界面
    function attendance()
    {
        $top_data = $this->top();
        $this->load->view("Backend/top", $top_data);
        $isAssistant=$this->session->userdata("isAssistant");
        if($isAssistant==1){
            $aID=$this->session->userdata("tID");
            $this->load->model("Backmodel");
            $data['class_list']=$this->Backmodel->get_ass_class($aID);
            $data['all_class']=$this->Backmodel->get_ass_all_class($aID);
           // print_r($class_list);
            $this->load->view("Backend/assistantClass",$data);
        }else {
            $data["className"] = $this->session->userdata("className");
            //您还没有创建班级
            //$this->load->view("Backend/attendance1");
            //请上传学生列表
            $tID = $this->session->userdata("tID");
            $isAssistant = $this->session->userdata("isAssistant");
            $data["hasClass"] = $this->session->userdata("hasClass");
            $data["hasStudents"] = $this->session->userdata("hasStudents");
            if ($data["hasClass"] == 1) {
                $this->load->model("Backmodel");
                $data["uploadStudents_classList"] = $this->Backmodel->get_class($tID);
                //$data["uploadStudents_studentList"] = $this->Backmodel->get_student($tID);
            }
            $this->load->view("Backend/attendance2", $data);
            //完整显示
            //$this->load->view("Backend/attendance3");
        }
            $this->load->view("Backend/foot");

    }


    //我的信息
    function myInformation()
    {
        $this->load->model("Backmodel");
        $data['tUser']=$this->Backmodel->get_tuser_info();
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $this->load->view("Backend/myInformation",$data);
        $this->load->view("Backend/foot");
    }

    //上传学生表格
    /*function uploadExcel(){
        $submit = $this->input->post("submit");
        $class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("assistantID");
        @include_once("/BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        if($submit){
           // var_dump($_FILES['file']);
            $tmp = $_FILES['file']['tmp_name'];
            //var_dump($tmp);
            if (empty ($tmp)) {
                echo '请选择要导入的Excel文件！';
                exit;
            }
            $save_path = "upload/";
            $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
            $data_values="";
            if (copy($tmp, $file_name)) {
                $xls = new Spreadsheet_Excel_Reader();
                $xls->setOutputEncoding('utf-8');  //设置编码
                $xls->read($file_name);  //解析文件
                $arr = $xls->sheets[0]["cells"];
               // var_dump($xls->sheets[0]);
                for($i=1;$i<=$xls->sheets[0]["numRows"];$i++){
                    $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                    $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";
                    $this->db->query($sql);

                }
            }
        }

        }*/
    function uploadExcel(){
        @include_once("BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $submit = $this->input->post("submit");
        $class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("assistantID");
        if($submit){
            // var_dump($_FILES['file']);
            $tmp = $_FILES['file']['tmp_name'];
            //var_dump($tmp);
            if (empty ($tmp)) {
                echo '请选择要导入的Excel文件！';
                exit;
            }
            $save_path = "upload/";
            $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
            $data_values="";
            if (copy($tmp, $file_name)) {
                $xls = new Spreadsheet_Excel_Reader();
                $xls->setOutputEncoding('utf-8');  //设置编码
                $xls->read($file_name);  //解析文件
                $arr = $xls->sheets[0]["cells"];
                // var_dump($xls->sheets[0]);
                for($i=1;$i<=$xls->sheets[0]["numRows"];$i++){
                    $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                    $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";
                    $this->db->query($sql);
                }
                redirect("Backend/attendance");
            }
        }

    }
    function updateStudentsExcel(){
        //echo "lixian";exit();
        @include_once("BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        //$submit = $this->input->post("submit");
        //$class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("aID");
        $className = $this->input->post("className");
        $activeClassNameForLi = "class".$className;
        $this->session->set_userdata("className",$activeClassNameForLi);
        // var_dump($_FILES['file']);
        $tmp = $_FILES['file']['tmp_name'];
        //var_dump($tmp);
        if (empty ($tmp)) {
            echo '请选择要导入的Excel文件！';
            exit;
        }
        //删除原有记录
        $sql = "delete from present where sCourse='$courseID'";
        $sql2 = "delete from student where sCourse='$courseID'";
       // $sql3 = "delete from course where id = '$courseID'";
        $this->db->query($sql);$this->db->query($sql2);//$this->db->query($sql3);
        //重新插入
        $save_path = "upload/";
        $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
        $data_values="";
        if (copy($tmp, $file_name)) {
            $xls = new Spreadsheet_Excel_Reader();
            $xls->setOutputEncoding('utf-8');  //设置编码
            $xls->read($file_name);  //解析文件
            $arr = $xls->sheets[0]["cells"];
            // var_dump($xls->sheets[0]);
            for($i=1;$i<=$xls->sheets[0]["numRows"];$i++){
                $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";
                $this->db->query($sql);
            }
            redirect("Backend/attendance");
        }

    }

    function ajaxForStudent(){

        $class = $this->input->post("class");
        $tID = $this->session->userdata("tID");
        $this->load->model("Backmodel");
        $output="";
        $data = $this->Backmodel->get_student($tID,$class);
        $flag = 0;
        foreach ($data["arr_student"] as $item) {
            $flag = 1;break;
        }
        if($flag==0){
            echo "empty";
        }else {
            $output .='<br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row" >
                                    <div class="col-md-2 col-xs-3">
            &nbsp;&nbsp;&nbsp;&nbsp;学号
                                    </div>
                                    <div class="col-md-1 col-xs-3" >
            姓名
                                    </div>
                                    <div class="col-md-9 col-xs-6">
            考勤(<span style="color:red;">红色标签表示没到人名单</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                   ';
            foreach ($data["arr_student"] as $item) {
                $output .=
                    '
                        <li class="list-group-item" class="'.$item["sID"].'">
                                        <div class="row" style="width:100%;">
                    <div class="col-md-3 col-sm-3 col-xs-10">'.$item["sID"] ."　　　".$item["sName"].'</div>

                                            <input type="hidden" value="'.$item["sID"].'"  class="sID"/>
                                            <input type="hidden" value="'.$item["sCourse"].'"  class="sCourse"/>
                                            <input type="hidden" value="'.$item["sName"].'"  class="sName"/>
                                            <input type="hidden" value="'.$item["sAssistant"].'"  class="sAssistant"/>

                                            <input type="hidden" value="'.site_url("Backend/getRemoveTags").'"  class="removeUrl"/>
                    ';
                $arr = $this->Backmodel->get_absence($item["sID"],$item["sCourse"]);
                $output.="<div style='word-wrap:break-word;word-break:break-all;' class=\"col-md-6 col-sm-6 col-xs-12\">";
                foreach($arr["arr_absence"] as $item2){
                    $output .="<span style='margin-right: 5px;' class='label label-danger'>".substr($item2["sDelDate"],2)."</span>";
                }
                $output .='</div> <div class="col-md-3 col-sm-3 col-xs-8">
                                                <button class="add_tag btn btn-primary btn-xs" data-toggle="modal" data-target="#myalert" data-whatever="添加" data-dismiss="李贤" style="width:40px;">添加</button>


                                            <button id="" class="btn btn-info btn-xs remove_tag" data-toggle="modal" data-target="#myalert_remove" data-whatever="取消" data-dismiss="李贤" style="width:40px;">取消</button></div>
                                        </div>
                                    </li>';
            }
            $output .='<br><button type="button" id="update"class="btn btn-warning btn-sm update"data-toggle="modal" data-target="#myalert_update">重新导入</button>

                    </div>';
            echo $output;
        }
    }

    function getRemoveTags(){
        $sID = $this->input->post("sID");
        $sCourse = $this->input->post("sCourse");
        $this->load->model("Backmodel");
        $output="";
        $data = $this->Backmodel->get_tags($sID,$sCourse);
        foreach($data["arr_tags"] as $items){
            $output .= '<label class="col-md-3 control-label">
                                    <input type="checkbox" name="del_date[]" value="'.$items["sDelDate"].'"/><span class="label label-danger">'.$items["sDelDate"].'</span>
                                </label>';
        }
        $output .="<input type=\"hidden\" value=\"$sID\" class=\"sID1\" name=\"sID1\" />
                                <input type=\"hidden\" value=\"$sCourse\" class=\"courseID1\" name=\"courseID1\" />";
        echo $output;
    }

    //添加缺席学生
    function add_absence(){
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $this->load->model("Backmodel");
        $res=$this->Backmodel->add_one_absence();
        if($res){
            redirect("Backend/attendance");
        }else{
            echo "添加失败";
        }
    }

    //移出缺席学生
    function del_absence()
    {
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $this->load->model("Backmodel");
        $res=$this->Backmodel->del_one_absence();
        if($res){
            redirect("Backend/attendance");
        }else{
            echo "移出失败";
        }
    }

    //检测旧密码
    function check_old_pwd(){
        $get_pwd = md5($this->input->post("password"));
        $this->load->model("Backmodel");
        $old_pwd = $this->Backmodel->get_old_pwd();
       if($get_pwd == $old_pwd){
           echo "true";
       }else{
           echo "false";
       }
    }

    //更改密码
    function update_user_pwd(){
        $this->load->model("Backmodel");
        $res=$this->Backmodel->update_tuser_pwd();
        if($res){
            redirect("Backend/myInformation");
        }else{
            echo "修改失败";
        }
    }

    function show_myClass_detail(){
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $sCourse = $this->uri->segment(3);
        $this->load->model("Backmodel");
        $data['myClass']=$this->Backmodel->get_myClass_detail($sCourse);
        $data['ClassName'] = $this->Backmodel->get_class_name($sCourse);
        $this->load->view("Backend/myClass",$data);
        $this->load->view("Backend/foot");
    }



    function show_oneClass_detail(){
        $couse_id=$this->input->post("course_id");
        $this->load->model("Backmodel");
        $stuid=$this->Backmodel->get_stuid_list($couse_id);
        $output="<br><br> <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <div class=\"row\" >
                                    <div class=\"col-md-2 col-xs-3\">
                学号
                                    </div>
                                    <div class=\"col-md-2 col-xs-3\" >
                姓名
                                    </div>
                                    <div class=\"col-md-8 col-xs-6\">
                考勤(<span style=\"color:red;\">红色标签表示没到人名单</span>)
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel-body\">
                                <ul class=\"list-group\">";
        foreach($stuid as $value){
            $output.="<li class=\"list-group-item\">
                                        <div class=\"row\">";
            $stu_id=$value->sID;
            $stuinfo=$this->Backmodel->get_stuid_info($stu_id,$couse_id);
            $count=0;
            foreach($stuinfo as $value1){
                if($count==0){
                    $output.="<div class=\"col-md-3 col-sm-3 col-xs-10\">".$value1->sID."　　　　".$value1->sName."</div>
                                            <!--<div class=\"col-md-2\" style=\"margin-left:50px;\">$value1->sName</div>-->
                                            <input type=\"hidden\" value=\"李贤\" id=\"name\" />
                                            <input type=\"hidden\" value=\"1427152073\" id=\"number\" />
                                            <div style='word-wrap:break-word;word-break:break-all;' class=\"col-md-9 col-sm-9 col-xs-12\">";
                }
                $output.="<span style='margin-right: 5px;' class=\"label label-danger\">".substr($value1->sDelDate,2)."</span>";
                $count++;
            }
            $output.="</div></div></li>";
        }
        $output.="</ul></div> </div>";
        echo $output;
    }

}