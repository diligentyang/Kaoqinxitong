<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper(array('url', 'form', 'date'));
        $this->load->database();
        /*$ok = $this->session->userdata('admin');
        if (!isset($ok) || $ok != 'ok') {
            redirect("backlogin/index");
        }*/
    }

    function index()
    {
        $this->load->view("Backend/login");
    }

    function check_login(){
        $this->load->model("Loginmodel");
		$super=$this->input->post("super");
		if($super){
			$superinfo = $this->Loginmodel->get_super_info();
			if (empty($superinfo)) {
				$data['error']="用户名密码不正确";
				$this->load->view("Backend/login",$data);
			}else {
				foreach ($superinfo as $value) {
					$tID=$value['tID'];
				}
				$this->session->set_userdata("tID",$tID);
				$this->session->set_userdata("admin","ok");
				redirect("Backend/super_index");
			}
		}else{
			$userinfo=$this->Loginmodel->get_user_info();
			if (empty($userinfo)) {
				$data['error']="用户名密码不正确";
				$this->load->view("Backend/login",$data);
			} else {
				foreach ($userinfo as $value) {
					$tID=$value['tID'];
					$tIsAssistant=$value['tIsAssistant'];
				}
				$hasClass=1;
				$res=$this->Loginmodel->check_class($tID);
				//echo $res->num;
				if($res->num==0){
					$hasClass=0;
				}
				$this->session->set_userdata("tID",$tID);
				$this->session->set_userdata("isAssistant",$tIsAssistant);
				$this->session->set_userdata("hasClass",$hasClass);
				$this->session->set_userdata("admin","ok");
				//$this->session->set_userdata("hasStudents","0");
				redirect("Backend/index");
			}
		}
	}




}