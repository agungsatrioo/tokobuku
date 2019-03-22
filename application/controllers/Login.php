<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		$username = $this->session->userdata('username');
       
        if(empty($username)) {
            $this->load->view('admin/v_admin_login');
        } else {
            redirect("admin");
        }
	}

	function do_login() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");
        
		$where = array(
			"username" => $username,
			"password" => md5($password)
		);
		
        $result = $this->db_model->read("*","kasir",$where);
        
		header('Content-Type: application/json');
		if (count($result) != 0) {
			$this->session->set_userdata("username", $username);
			$level = $result[0]->akses;
			$this->session->set_userdata("level", $level); 
			echo json_encode("true");			
		} else {
            echo json_encode("false");
        }
	}

	function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
        redirect('admin');
	}
}