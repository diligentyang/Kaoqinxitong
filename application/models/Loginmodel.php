<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loginmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper('url');
        $this->load->database();
    }

    function get_user_info(){
        $this->get_pdo();
        $username=$this->input->post("username");
        $password=md5($this->input->post("password"));
        $sql="select * from tuser where tName=? and tPassword=?";
        $res="";
        $array=array("$username","$password");
        $stmt=$this->pdo->prepare($sql);
        $exeres = $stmt->execute($array);
        if($exeres){
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $res;
    }

    function get_pdo(){
        $host=$this->db->hostname;
        $database=$this->db->database;
        $dsn="mysql:dbname=$database;host=$host";
        $db_user=$this->db->username;
        $db_pass=$this->db->password;
        try{
            $pdo=new PDO($dsn,$db_user,$db_pass);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);    //禁用模拟预处理语句,保证sql语句不被php解析
            $pdo->exec("set names utf8");
        }catch(PDOException $e){
            echo '数据库连接失败'.$e->getMessage();
        }
        $this->pdo=$pdo;
    }

    function check_class($tID){
        $query=$this->db->query("select count(*) as num from course where tID='$tID'");
        return $query->row();
    }

}
