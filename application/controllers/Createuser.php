<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createuser extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        if($this->session->userdata('username')==''){
        	redirect('login');
        }
    }

	public function index()
	{
		
		if($this->input->post()!=''){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('mobile', 'mobile', 'required|is_unique[tbl_users.mobile]');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_users.username]');
			$this->form_validation->set_rules('user_id_auto', 'User Id', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
			//$this->form_validation->set_rules('department', 'Department', 'required');


			if($this->form_validation->run() == TRUE)
			{
			$org_pass = $this->input->post('password');
				$user_arr = array('name'=>$this->input->post('name'),
								  'mobile'=>$this->input->post('mobile'),
								  'email'=>$this->input->post('email'),
								  'username'=>$this->input->post('username'),
								  'user_id_auto'=>$this->input->post('user_id_auto'),
								  'original_password' => $org_pass,
								  'password'=>md5($org_pass),
								  'department_id'=>0,
								  'created_by'=>$this->session->userdata('user_id'),
								  'created_date' => date('Y-m-d'),
								  'created_time' => date('H:i:s')
								 );

				$last_inser_id = $this->common_model->AddRecord(TBL_USERS,$user_arr);
				$this->session->set_flashdata('users_success_msg','User has been successfully added');
				redirect('createuser');

			}
		}

		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['users'] = $this->common_model->getUsers();

		$this->load->view('create-user',$data);
	}

	public function modify(){

		$id = $this->uri->segment(3);
		if($this->input->post()!=''){

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('mobile', 'mobile', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('user_id_auto', 'User Id', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
			//$this->form_validation->set_rules('department', 'Department', 'required');

			if($this->form_validation->run() == TRUE)
			{
			$org_pass = $this->input->post('password');
				$user_arr = array('name'=>$this->input->post('name'),
								  'mobile'=>$this->input->post('mobile'),
								  'email'=>$this->input->post('email'),
								  'username'=>$this->input->post('username'),
								  'user_id_auto'=>$this->input->post('user_id_auto'),
								   'original_password' => $org_pass,
								  'password'=>md5($org_pass),
								  'department_id'=>0,
								  'updated_by'=>$this->session->userdata('user_id'),
								  'created_date' => date('Y-m-d'),
								  'created_time' => date('H:i:s')
									 );

				$this->db->where('user_id', $id);
				$this->db->update(TBL_USERS, $user_arr);

				$this->session->set_flashdata('user_modify_success_msg','User record has been successfully modified');

			}
		}

		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['user_details'] = $this->common_model->retrivebyrow(TBL_USERS,array('user_id'=>$id));

		$data['users'] = $this->common_model->getUsers();

		$this->load->view('modify-users',$data);
	}


	public function delete(){

		$user_id = $this->uri->segment(3);
		$this->db->where('user_id', $user_id);
        $this->db->delete(TBL_USERS); 
        $this->session->set_flashdata('user_del_success_msg','User has been successfully deleted');
        redirect('createuser');

	}
}

