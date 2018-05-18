<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giveaccess extends CI_Controller{

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
			$this->form_validation->set_rules('user_id', 'Name', 'required');
			$this->form_validation->set_rules('function_id[]','Function', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$functions = $this->input->post('function_id[]');
			    
			    //print_r($functions);

			    	if(!empty($functions)){
/* To check if duplicate access is being given or not */

			    		//$chk_array = array('user_id'=>$this->input->post('user_id'),
			    							//'department_id'=>$this->input->post('department'),
			    							//'function_id'=>$value);

			    		//$query = $this->common_model->retriveby(TBL_ACCESS,$chk_array);

			    		//if($query->num_rows()>0){

			    			//$this->session->set_flashdata('erro_msg','Access allready exists!!');
			    		//}
			    		//else{
/* code Ends Here */
$uid = $this->input->post('user_id');
$delall = $this->db->query('DELETE FROM tbl_access WHERE user_id='.$uid);
							$count_function = count($functions);
							for($i=0;$i<$count_function;$i++){
							$exp_function = explode('-',$functions[$i]);
			    			$assess_array = array('user_id'=>$uid,
													'department_id'=>$exp_function[0],
													'activity_id'=> $exp_function[1],
													'function_id'=>$exp_function[2],
													'created_by'=>$this->session->userdata('user_id'),
													'created_date' => date('Y-m-d'),
													'created_time' => date('H:i:s'));

			    			$last_inser_id = $this->common_model->AddRecord(TBL_ACCESS,$assess_array);
						    $this->session->set_flashdata('access_success_msg','User access has been successfully added');

			    		
			    	}
			    	
			    } 

			}
		}

		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['users'] = $this->common_model->getUsers();
		$data['functions'] = $this->common_model->getRecord();
		//$data['access'] = $this->common_model->getAccess();


		$this->load->view('give-access',$data);
	}



	public function delete(){

		$user_id = $this->uri->segment(3);
		$this->db->where('user_id', $user_id);
        $this->db->delete(TBL_USERS); 
        $this->session->set_flashdata('user_del_success_msg','User has been successfully deleted');
        redirect('createuser');

	}

	public function modifyaccess($id){


		$data['givenaccess'] = $this->common_model->Users($id);


		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['users'] = $this->common_model->getUsers();
		$data['functions'] = $this->common_model->getRecord();
		$data['uid'] = $id;
		

		$this->load->view('give-access-modify',$data);
	}

	public function modify(){

		$id = $this->uri->segment(3);
		if($this->input->post()!=''){

			$this->form_validation->set_rules('user_id', 'Name', 'required');
			$this->form_validation->set_rules('function_id[]','Function', 'required');

			if($this->form_validation->run() == TRUE)
			{
				$this->db->where('user_id', $id);
                $this->db->delete(TBL_ACCESS); 

				$functions = $this->input->post('function_id[]');
			    
			    foreach ($functions as $key => $value) {

			    	if(!empty($functions)){

			    		$assess_array = array('user_id'=>$this->input->post('user_id'),
											'department_id'=>$this->input->post('department'),
											'function_id'=>$value,
											'created_by'=>$this->session->userdata('user_id'),
											'created_date' => date('Y-m-d'),
											'created_time' => date('H:i:s'));

		    			$last_insert_id = $this->common_model->AddRecord(TBL_ACCESS,$assess_array);
					    $this->session->set_flashdata('access_success_msg','User access has been successfully modified'); 
			    		
			    	}
			    	
			    } 

			}
		}

		$data['givenaccess'] = $this->common_model->Users($id);


		$data['deaprtments'] = $this->common_model->getDepartment();
		$data['users'] = $this->common_model->getUsers();
		$data['functions'] = $this->common_model->getRecord();
		$data['checked'] = $this->common_model->getAccess($id); 
		

		$this->load->view('modify-give-access',$data);
	}



	public function getDepartment(){

		if($this->input->post('user_id')!=''){

			$usrid = $this->input->post('user_id');
			$row = $this->common_model->getUsersDepartment($usrid);
			
			$myJSON = json_encode($row);

            echo $myJSON;
			//print_r($row);

		}

	}



}

