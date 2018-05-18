<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createfunction extends CI_Controller{


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
			$this->form_validation->set_rules('functionn_name', 'Function Name', 'required|is_unique[tbl_functionn.functionn_name]');

			if($this->form_validation->run() == TRUE)
			{
				

				$function_arr = array('functionn_name'=>$this->input->post('functionn_name'),
									   'created_by'=>$this->session->userdata('user_id'),
										'created_date' => date('Y-m-d'),
										'created_time' => date('H:i:s')
										);

				$last_inser_id = $this->common_model->AddRecord(TBL_FUNCTION,$function_arr);
				$this->session->set_flashdata('success_msg','Function has been successfully added');

			}
		}

		$data['functions'] = $this->common_model->getRecord();

		$this->load->view('create-function',$data);
	}



	public function delete_function(){

		$function_id = $this->uri->segment(3);
		$this->db->where('functionn_id', $function_id);
        $this->db->delete(TBL_FUNCTION); 
        $this->session->set_flashdata('success_msg','Function has been successfully deleted');
        redirect('createfunction');

	}



	public function modify(){

		$id = $this->uri->segment(3);


		if($this->input->post()!=''){
			$this->form_validation->set_rules('functionn_name', 'Function Name', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$query = $this->common_model->retriveby(TBL_FUNCTION,array('functionn_name'=>$this->input->post('functionn_name')));

				if($query->num_rows()>0){

					$this->session->set_flashdata('function_error_msg','Function access already exists!!');
				}else{
					$array = array('functionn_name'=>$this->input->post('functionn_name'),
								   'modified_by'=>$this->session->userdata('user_id'),
									'updated_date' => date('Y-m-d'),
									'updated_time' => date('H:i:s')
									);

					$this->db->where('functionn_id', $id);
					$this->db->update(TBL_FUNCTION, $array);

					$this->session->set_flashdata('success_msg','Function has been successfully modified');
				}
			}
		}

		$data['details'] = $this->common_model->retrivebyrow(TBL_FUNCTION,array('functionn_id' => $id));


		$data['functions'] = $this->common_model->getRecord();
		$this->load->view('modify-function',$data);


	}
}

