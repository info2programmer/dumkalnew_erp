<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model('Adminlogin');
		
    }


	public function index()
	{
		
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('success_msg','You are successfully logged out');
		redirect('');
	}
}

