<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper('url');
        $this->load->database();
    }

    //添加班级
    function add_class_model()
    {
        $grade=$this->input->post("grade");
        $class=$this->input->post("class");
        $course=$this->input->post("course");
        $aID=$this->input->post("aID");
        $data = array(
            'cGrade' => $grade,
            'cName' => $course,
            'cClass' => $class,
            'tID' => "1",
            'aID' => $aID
        );
        $this->db->insert('course', $data);
    }

    //根据辅导员的名字查找辅导员的id
    function get_assistant_model($tName)
    {
        $query = $this->db->query("SELECT tID FROM tuser where tName='$tName' and tIsAssistant='1'");
        return $query->row_array();
    }

    function get_class($tID){
        $sql = "select * from course where tID=$tID";
        $res = $this->db->query($sql);
        $data["arr_class"] = $res->result_array();
        return $data;
    }
    function get_student($tID,$class){
        $sql = "select * from student,course where student.sCourse=course.id and course.tID=$tID and course.cClass='$class' order by sID";
        $res = $this->db->query($sql);
        $data["arr_student"] = $res->result_array();
        return $data;
    }
    function get_absence($sID,$sCourse){
        $sql = "select * from present where sID='$sID' and sCourse='$sCourse'";
        $res = $this->db->query($sql);
        $data["arr_absence"] = $res->result_array();
        return $data;
    }

    function get_tags($sID,$sCourse){
        $sql = "select * from present where sID = '$sID' and sCourse='$sCourse'";
        $res = $this->db->query($sql);
        $data["arr_tags"] = $res->result_array();
        return $data;
    }

    //添加缺课
    function add_one_absence(){
        $sID=$this->input->post("sID");
        //echo $sID."<br>";
        $courseID=$this->input->post("courseID");
        //echo $courseID."<br>";
        $sTeacher = $this->session->userdata("tID");
        //echo $sTeacher."<br>";
        $date_time = $this->input->post("date");
        $sName = $this->input->post("sName1");
        //echo $sName ; exit();
        //echo $date_time."<br>";
        //echo $sID."--".$courseID."--".$sTeacher."--".$date_time;exit();
        $data = array(
            'sID' => $sID,
            'sName' => $sName,
            'sCourse' => $courseID,
            'sTeacher' =>$sTeacher,
            'sDeldate' => $date_time
        );
        $res=$this->db->insert('present', $data);
        return $res;
    }

    function del_one_absence(){
        $sID=$this->input->post("sID1");
        $courseID=$this->input->post("courseID1");
        $del_date=$this->input->post("del_date");
        print_r($del_date);
        echo "<br>";
        $del_date = "'".implode("','",$del_date)."'";
        echo $del_date;
        echo $sID."--".$courseID;
        $query = $this->db->query("delete from present where sID='$sID' and sCourse='$courseID' and sDelDate in ($del_date)");
        return $query;
    }

    function get_tuser_info(){
        $tID = $this->session->userdata("tID");
        $query = $this->db->query("select * from tuser where tID='$tID'");
        return $query->result();
    }

    function get_old_pwd(){
        $tID = $this->session->userdata("tID");
        $query = $this->db->query("select * from tuser where tID='$tID'");
        $row = $query->row();
        return $row->tPassword;
    }

    function update_tuser_pwd(){
        $tID = $this->session->userdata("tID");
        $pwd = md5($this->input->post("newPsw"));
        $query = $this->db->query("update tuser set tPassword='$pwd' where tID ='$tID'");
        return $query;
    }

    function get_myClass_detail($sCourse){
        $query = $this->db->query("select count(*)num,sID,sName from present where sCourse = '$sCourse' GROUP BY sID;");
        return $query->result();
    }

    function get_class_name($sCourse){
        $query = $this->db->query("select * from course where id='$sCourse';");
        $row = $query->row();
        return $row->cClass;
    }


    function get_ass_class($aID){
        $query = $this->db->query("select DISTINCT cClass from course where aID='$aID'");
        return $query->result();
    }

    function get_ass_all_class($aID){
        $query = $this->db->query("select * from course where aID='$aID'");
        return $query->result();
    }

    function get_stuid_list($sCourse){
        $query = $this->db->query("select DISTINCT sID from present  where sCourse='$sCourse'");
        return $query->result();
    }

    function get_stuid_info($stu_id,$sCourse){
        $query = $this->db->query("select * from present where sID='$stu_id' and sCourse='$sCourse'");
        return $query->result();
    }

}
