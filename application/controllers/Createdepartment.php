<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createdepartment extends CI_Controller{


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
			$this->form_validation->set_rules('departmet_name', 'Department Name', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$function_arr = array('department_name'=>$this->input->post('departmet_name'),
									   'created_by'=>$this->session->userdata('user_id'),
										'created_date' => date('Y-m-d'),
										'created_time' => date('H:i:s')
										);

				$last_inser_id = $this->common_model->AddRecord(TBL_DEPARTMENT,$function_arr);
				$this->session->set_flashdata('success_msg','Department successfully added');

			}
		}

		$data['deaprtments'] = $this->common_model->getDepartment();
		$this->load->view('create-department',$data);
	}



	public function delete_function(){

		$function_id = $this->uri->segment(3);
		$this->db->where('departmet_id', $function_id);
        $this->db->delete('tbl_department'); 
        $this->session->set_flashdata('success_msg','Deaprtment successfully deleted');
        redirect('createdepartment');

	}

	public function modify(){

		$id = $this->uri->segment(3);


		if($this->input->post()!=''){
			$this->form_validation->set_rules('departmet_name', 'Department Name', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$array = array('department_name'=>$this->input->post('departmet_name'),
									   'modified_by'=>$this->session->userdata('user_id'),
										'updated_date' => date('Y-m-d'),
										'updated_time' => date('H:i:s')
										);

				$this->db->where('departmet_id', $id);
				$this->db->update(TBL_DEPARTMENT, $array);

				$this->session->set_flashdata('success_msg','Department has been successfully modified');

			}
		}

		$data['details'] = $this->common_model->retrivebyrow(TBL_DEPARTMENT,array('departmet_id' => $id));





		$data['deaprtments'] = $this->common_model->getDepartment();
		$this->load->view('modify-department',$data);


	}



}

