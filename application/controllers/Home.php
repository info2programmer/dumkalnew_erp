<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model('Adminlogin');

        if($this->session->userdata('username')==''){
        	redirect('login');
        }
		
    }


	public function index()
	{
	$admin_id = $this->session->userdata('user_id');
	$data['loginDetails'] = $this->db->query('SELECT * FROM tbl_login_log WHERE admin_id='.$admin_id.' ORDER BY log_id DESC LIMIT 5')->result_array();
	$data['userDetails'] = $this->db->query('SELECT * FROM tbl_users WHERE user_id='.$admin_id)->result_array();
		$this->load->view('home',$data);
	}
}
