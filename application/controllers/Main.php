<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$data['view'] = 'v_home';
		$this->load->view('index',$data);
	}

}
