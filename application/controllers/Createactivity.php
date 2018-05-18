<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createactivity extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model('common_model');

        if($this->session->userdata('username')==''){

        	redirect('login');
        }
       date_default_timezone_set('Asia/Kolkata'); 
    }


	public function index()
	{
		
		if($this->input->post()!=''){
			$this->form_validation->set_rules('activity_name', 'Activity Name', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$function_arr = array('activity_name'=>$this->input->post('activity_name'),
										'departmet_id'=>$this->input->post('department'),
									   'created_by'=>$this->session->userdata('user_id'),
										'created_date' => date('Y-m-d'),
										'created_time' => date('H:i:s')
										);

				$last_inser_id = $this->common_model->form_post('tbl_activity',$function_arr);
				$this->session->set_flashdata('success_msg','Activity successfully added');

			}
		}
		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['activitys'] = $this->db->query('SELECT * FROM tbl_activity')->result_array();
		$this->load->view('create-activity',$data);
	}



	public function delete_function(){

		$function_id = $this->uri->segment(3);
		$this->db->where('activity_id', $function_id);
        $this->db->delete('tbl_activity'); 
        $this->session->set_flashdata('success_msg','Activity successfully deleted');
        redirect('createactivity');

	}

	public function modify(){

		$id = $this->uri->segment(3);


		if($this->input->post()!=''){
			$this->form_validation->set_rules('activity_name', 'Department Name', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$array = array('activity_name'=>$this->input->post('activity_name'),
										'departmet_id'=>$this->input->post('department'),
									   'modified_by'=>$this->session->userdata('user_id'),
										'updated_date' => date('Y-m-d'),
										'updated_time' => date('H:i:s')
										);

				$this->db->where('activity_id', $id);
				$this->db->update('TBL_ACTIVITY', $array);

				$this->session->set_flashdata('success_msg','Activity has been successfully modified');

			}
		}
		$data['details'] = $this->db->query('SELECT * FROM tbl_activity WHERE activity_id='.$id)->row();
		//$data['details'] = $this->common_model->retrivebyrow(tbl_activity,array('activity_id' => $id));




		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['activity'] = $this->common_model->getActivity();
		$this->load->view('modify-activity',$data);


	}



}

