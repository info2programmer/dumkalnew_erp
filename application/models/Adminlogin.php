<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            
    }


    public function checkAuth($username,$password){

    	$this->db->select('*');
    	$this->db->from(TBL_USERS);
    	$this->db->where(array('username'=>$username,'password'=>md5($password)));
    	$query = $this->db->get();
        $admin = $query->row();
		$admincnt = $query->num_rows();
		if($admincnt > 0){
        $admin_id = $admin->user_id;
		} else {
		$admin_id = '';
		}
    	return $admin_id;
    }

}

