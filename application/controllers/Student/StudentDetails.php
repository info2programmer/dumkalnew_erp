<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class studentDetails extends CI_Controller{

	function __construct() {
        parent::__construct();
        $this->load->model('common_model');
		$this->load->model('base_model');

        if($this->session->userdata('username')==''){

        	redirect('login');
        }
        
    }
public function checklist($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		subjectGrp($depId,$actId,$uId);
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('subject-group',$data);
	}
	public function subjectGrp($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();

		$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/subject-group',$data);
	}
	public function session($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['session'] = $this->base_model->show_data('td_student_session','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/session',$data);
	}
	public function intake($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/intake',$data);
	}
	public function stuDtl($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
			$p=isset($_GET['page'])?$_GET['page']:0;	

	$category['data'] = $this->base_model->show_data('td_student_stream','*','')->result_array();

	$query_string = isset($_GET['looking'])?'looking='.$_GET['looking']:'';

	$query_string .= isset($_GET['location'])?'&location='.$_GET['location']:'';

	$limit = 40; 	//how many items to show per page

			$page = $p;

			if($page) 

				$start = ($page - 1) * $limit; 	//first item to display on this page

			else

				$start = 0;

				$query = "select * from td_student_details where transfer_true = 'NA' and student_status='Present' LIMIT $start, $limit ";

				$countQuery = "select * from td_student_details where transfer_true = 'NA' and student_status='Present'";

			$category['students']=$this->db->query($query)->result_array();

			$total_pages = $this->db->query($countQuery)->num_rows();

			require_once APPPATH."libraries/pagination_search.php";

			$category['res']=create_pagination('td_student_details',base_url().'student/studentDetails/stuDtl/'.$depId.'/'.$actId.'/'.$uId.'?'.$query_string,$limit,$page,$total_pages);

			//$this->load->view('table',$result);

			$category['total_item'] = $total_pages;
			$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/student-details',$category);
	}
	public function srchStudent($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['data'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		$category['msg']='YES';
		$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/search-student',$category);
	}
	public function stuBarcode($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/search-student-barcode',$category);
	}
	
	public function student_profile_barcode(){

	$depId = $this->input->post('dep_id');
	$actId = $this->input->post('act_id');
	$uId = $this->input->post('usr_id');

			if($this->input->post('txt_id'))

				{

				$id=$this->input->post('txt_id');

				}

				else{

				$id=$this->input->post('txt_appid');

				}

			$query=$this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$id.'" and student_status="Present"');	

			$count=$query->num_rows();

			if($count>0)

			{
$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
			$category['profile'] = $query->result_array();
			$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
}
		else {
			$category['msg']='NO';
		}
			$this->load->view('student/student-profile',$category);

			}

			else

			{

			$category['msg'] = 'Sorry No Data Found';	

			$this->load->view('student/search_student_barcode',$category);

			}
			

	}
	
	
	
	public function Profile($txt_id,$depId,$actId,$uId)
	{
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$id=$txt_id;
		$query=$this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$id.'" and student_status="Present"');
			$category['profile'] = $query->result_array();
			$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/student-profile',$category);
	}
	public function formarStudent($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$p=isset($_GET['page'])?$_GET['page']:0;	

	$category['data'] = $this->base_model->show_data('td_student_stream','*','')->result_array();

	$query_string = isset($_GET['looking'])?'looking='.$_GET['looking']:'';

	$query_string .= isset($_GET['location'])?'&location='.$_GET['location']:'';

	$limit = 20; 	//how many items to show per page

			$page = $p;

			if($page) 

				$start = ($page - 1) * $limit; 	//first item to display on this page

			else

				$start = 0;

				$query = "select * from td_student_details where transfer_true = 'yes' LIMIT $start, $limit ";

				$countQuery = "select * from td_student_details where transfer_true = 'yes'";

			$category['students']=$this->db->query($query)->result_array();

			$total_pages = $this->db->query($countQuery)->num_rows();



			require_once APPPATH."libraries/pagination_search.php";

			$category['res']=create_pagination('td_student_details',base_url().'index.php/student/student_details/former_student_data?'.$query_string,$limit,$page,$total_pages);

			//$this->load->view('table',$result);

			$category['total_item'] = $total_pages;
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/former-student-details',$category);
	}
	public function univReg($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();

		$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('subject-group',$data);
	}
	public function export($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/student-export',$data);
	}
	public function gen()

	{
		$regYear = $this->input->post('reg_year');	
		$sub_grp = $this->input->post('sub_grp');
		$this->load->library('excel');
		$result = $this->db->query('select student_id as StdID,roll as ROLL,name as Name,subject1 as Subject1,subject2 as Subject2,subject3 as Subject3 from td_student_details where subject_group='.$sub_grp.' and reg_year="'.$regYear.'" and student_status="Present" order by name asc');
		$this->excel->to_excel($result, 'fetch_data'.$sub_grp);
	}
	public function smsDtl($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();

		$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('subject-group',$data);
	}
	public function smsSrch($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();

		$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('subject-group',$data);
	}
	
	
	
	public function search_student()

	{
	$depId = $this->input->get('dep_id', TRUE);
	$actId = $this->input->get('act_id', TRUE);
	$uId = $this->input->get('usr_id', TRUE);
$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		
	$p=isset($_GET['page'])?$_GET['page']:0;

	//$service_id = $_GET['looking'];

	$query_string = isset($_GET['student_type'])?'student_type='.$_GET['student_type']:'';

	$query_string .= isset($_GET['txt_id'])?'&txt_id='.$_GET['txt_id']:'';

	$query_string .= isset($_GET['txt_name'])?'&txt_name='.$_GET['txt_name']:'';

	$query_string .= isset($_GET['txt_mobile'])?'&txt_mobile='.$_GET['txt_mobile']:'';

	$query_string .= isset($_GET['txt_stream'])?'&txt_stream='.$_GET['txt_stream']:'';

	$query_string .= isset($_GET['txt_roll'])?'&txt_roll='.$_GET['txt_roll']:'';

	$query_string .= isset($_GET['txt_reg'])?'&txt_reg='.$_GET['txt_reg']:'';

	$query_string .= isset($_GET['txt_reg_yr'])?'&txt_reg_yr='.$_GET['txt_reg_yr']:'';

	$query_string .= isset($_GET['txt_year'])?'&txt_year='.$_GET['txt_year']:'';

	$query_string .= isset($_GET['txt_sub1'])?'&txt_sub1='.$_GET['txt_sub1']:'';

	$query_string .= isset($_GET['txt_sub2'])?'&txt_sub2='.$_GET['txt_sub2']:'';

	$query_string .= isset($_GET['txt_sub3'])?'&txt_sub3='.$_GET['txt_sub3']:'';

	$query_string .= isset($_GET['txt_sex'])?'&txt_sex='.$_GET['txt_sex']:'';

	$query_string .= isset($_GET['txt_caste'])?'&txt_caste='.$_GET['txt_caste']:'';

	

	//$type = (isset($_GET['student_type']) && !empty($_GET['student_type']))? " transfer_true ='".$_GET['student_type']."'":" transfer_true = ''";

	$id = (isset($_GET['txt_id']) && !empty($_GET['txt_id']))? ' student_id ="'.$_GET['txt_id'].'" and ':'';

	$name = (isset($_GET['txt_name']) && !empty($_GET['txt_name']))? ' name like "%'.$_GET['txt_name'].'%" and':'';

	$mobile = (isset($_GET['txt_mobile']) && !empty($_GET['txt_mobile']))? ' candidate_phone like "%'.$_GET['txt_mobile'].'%" and':'';

	$stream = (isset($_GET['txt_stream']) && !empty($_GET['txt_stream']))? ' stream ='.$_GET['txt_stream'].' and':'';

	$roll = (isset($_GET['txt_roll']) && !empty($_GET['txt_roll']))? ' roll ='.$_GET['txt_roll'].' and':'';

	

	$registration = (isset($_GET['txt_reg']) && !empty($_GET['txt_reg']))? ' registration_no ="'.$_GET['txt_reg'].'" and':'';

	$registrationyr = (isset($_GET['txt_reg_yr']) && !empty($_GET['txt_reg_yr']))? ' reg_year ="'.$_GET['txt_reg_yr'].'" and':'';

	$sesonyr = (isset($_GET['txt_sesyear']) && !empty($_GET['txt_sesyear']))? ' session_year ="'.$_GET['txt_sesyear'].'" and':'';

	$year = (isset($_GET['txt_year']) && !empty($_GET['txt_year']))? ' year ='.$_GET['txt_year'].' and':'';

	$sub1 = (isset($_GET['txt_sub1']) && !empty($_GET['txt_sub1']))? ' subject1 like "%'.$_GET['txt_sub1'].'%" and':'';

	$sub2 = (isset($_GET['txt_sub2']) && !empty($_GET['txt_sub2']))? ' subject2 like "%'.$_GET['txt_sub2'].'%" and':'';

	$sub3 = (isset($_GET['txt_sub3']) && !empty($_GET['txt_sub3']))? ' subject3 like "%'.$_GET['txt_sub3'].'%" and':'';

	$sex = (isset($_GET['txt_sex']) && !empty($_GET['txt_sex']))? ' sex ="'.$_GET['txt_sex'].'" and':'';

	$caste = (isset($_GET['txt_caste']) && !empty($_GET['txt_caste']))? ' caste ="'.$_GET['txt_caste'].'" and':'';

	$depIds = 'dep_id='.$depId;
	$actIds = 'act_id='.$actId;
	$uIds = 'usr_id='.$uId;

	$status=' student_status="Present"';

	    

		if(isset($_GET['txt_year'])&& !empty($_GET['txt_year'])){

			if($_GET['txt_year']==1)

			{

			$verify='';

			//$date=(isset($_GET['from_date']) && !empty($_GET['from_date']))? ' and (registration_date BETWEEN "'.date('Y-m-d',strtotime($_GET['from_date'])).'" AND "'.date('Y-m-d',strtotime($_GET['to_date'])).'")':'';

			}

			else

			{

			$verify=' and is_result_verify = "1"';

			//$date=(isset($_GET['from_date']) && !empty($_GET['from_date']))? ' and (verify_date BETWEEN "'.date('Y-m-d',strtotime($_GET['from_date'])).'" AND "'.date('Y-m-d',strtotime($_GET['to_date'])).'")':'';

			}

		}

		else

		{

		$verify='';

		//$date='';

		}

	

	

	$limit = 30; 	//how many items to show per page

			$page = $p;

			if($page) 

			{

				$start = ($page - 1) * $limit; 	//first item to display on this page

			}

			else

			{

				$start = 0;

			}

		$query = "select * from td_student_details where".$id.$name.$mobile.$stream.$roll.$registration.$registrationyr.$sesonyr.$year.$sub1.$sub2.$sub3.$sex.$caste.$status.$verify." LIMIT $start, $limit ";

			//$query = "select * from td_student_details where".$type.$id.$name.$fname.$mobile.$stream.$roll.$registration.$registrationyr.$sesonyr.$year.$sub1.$sub2.$sub3.$sex.$caste.$ph.$status.$verify.$date." LIMIT $start, $limit ";



			$countQuery = "select * from td_student_details where ".$id.$name.$mobile.$stream.$roll.$registration.$registrationyr.$sesonyr.$year.$sub1.$sub2.$sub3.$sex.$caste.$status.$verify;

			//echo $query;

			$category['students']=$this->db->query($query)->result_array();

			$total_pages = $this->db->query($countQuery)->num_rows();

			require_once APPPATH."libraries/pagination_search.php";

			$category['res']=create_pagination('td_student_details',base_url().'student/studentDetails/search_student/?'.$depIds.'&'.$actIds.'&'.$uIds.'&'.$query_string,$limit,$page,$total_pages);

			//$this->load->view('table',$result);

			$category['total_item'] = $total_pages;

	//$service['service_data'] = $this->base_model->show_data('td_subcategory','*','service_cat_id='.$service_id)->result_array();
	$category['msg']='YES';
	}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/search-details',$category);
		
		
	}
public function Delete($txt_id,$depId,$actId,$uId)
	{
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$id=$txt_id;
		$query=$this->db->query('DELETE FROM td_student_details WHERE student_id="'.$id.'" and student_status="Present"');
			
			$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
}
		else {
			$category['msg']='NO';
		}
		redirect(base_url().'student/studentDetails/stuDtl/'.$depId.'/'.$actId.'/'.$uId);
	}

public function Register($txt_id,$depId,$actId,$uId)
	{
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$id=$txt_id;
		$studdtls = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$id.'"')->result_array();
		$reg_date = date('m/d/Y');
		$reg_year = $studdtls[0]['session_year'];
		$reg_no = 'NA';
		$query=$this->db->query('UPDATE td_student_details SET registration=1,registration_date="'.$reg_date.'",reg_year="'.$reg_year.'",registration_no="'.$reg_no.'"  WHERE student_id="'.$id.'" and student_status="Present"');
			
			$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
}
		else {
			$category['msg']='NO';
		}
		redirect(base_url().'student/studentDetails/stuDtl/'.$depId.'/'.$actId.'/'.$uId);
	}
	
public function Unregister($txt_id,$depId,$actId,$uId)
	{
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$id=$txt_id;
		$reg_date = $this->input->post('reg_date');
		$reg_year = $this->input->post('reg_year');
		$reg_no = $this->input->post('reg_no');
		$query=$this->db->query('UPDATE td_student_details SET registration=0,registration_date="NA",reg_year="NA",registration_no="NA"  WHERE student_id="'.$id.'" and student_status="Present"');
			
			$category['depId']=$depId;
		$category['actId']=$actId;
		$category['uId']=$uId;
}
		else {
			$category['msg']='NO';
		}
		redirect(base_url().'student/studentDetails/stuDtl/'.$depId.'/'.$actId.'/'.$uId);
	}	
	
	public function IDCard($txt_id,$depId,$actId,$uId){
$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$imp = $txt_id;

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$imp.'"')->result_array();
}
		else {
			$category['msg']='NO';
		}
	$this->load->view('student/id_card',$category);

	}
	
public function DuplicateIDCard($txt_id,$depId,$actId,$uId){
$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$imp = $txt_id;

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$imp.'"')->result_array();
}
		else {
			$category['msg']='NO';
		}

	$this->load->view('student/id_card_dup',$category);

	}

public function student_id_card_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$expid);

		

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE stud_id IN ('.$imp.')')->result_array();

	$this->load->view('student/id_card',$category);

	}
	public function student_id_card_A_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$expid);

		

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE stud_id IN ('.$imp.')')->result_array();

	$this->load->view('student/id_card_A',$category);

	}
	public function student_lid_card_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$exp);

		

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE stud_id IN ('.$imp.')')->result_array();

	$this->load->view('student/library-card',$category);

	}
	public function student_lid_card_A_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$exp);

		

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE stud_id IN ('.$imp.')')->result_array();

	$this->load->view('student/library-card_A',$category);

	}

	public function LibraryCard($txt_id,$depId,$actId,$uId){

		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$imp = $txt_id;

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$imp.'"')->result_array();
}
		else {
			$category['msg']='NO';
		}

	$this->load->view('student/library-card',$category);

	}

	public function DuplicateLibraryCard($txt_id,$depId,$actId,$uId){

		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		$imp = $txt_id;

	$category['profile'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$imp.'"')->result_array();
}
		else {
			$category['msg']='NO';
		}

	$this->load->view('student/library-card_dup',$category);

	}		

public function StudIDCard($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['Session'] = $this->db->query('SELECT * FROM td_student_session ORDER BY sid DESC')->result_array();
		$data['stream'] = $this->db->query('SELECT * FROM td_student_stream ORDER BY stream_id DESC')->result_array();		
		$data['subject'] = $this->db->query('SELECT DISTINCT subject1 FROM td_student_details ORDER BY subject1 DESC')->result_array();
		$data['year'] = $this->db->query('SELECT DISTINCT year FROM td_student_details ORDER BY year ASC')->result_array();
		
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/all_id_card',$data);
	}
	
public function search_student_idCards()
	{	
		$depId = $this->input->post('dep_id');
		$actId = $this->input->post('act_id');
		$uId = $this->input->post('usr_id');
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){	
		$stream = (isset($_POST['txt_stream']) && !empty($_POST['txt_stream']))? ' stream ='.$_POST['txt_stream'].' and':'';

	$roll = (isset($_POST['txt_roll']) && !empty($_POST['txt_roll']))? ' roll ='.$_POST['txt_roll'].' and':'';

	$sesonyr = (isset($_POST['txt_sesyear']) && !empty($_POST['txt_sesyear']))? ' session_year ="'.$_POST['txt_sesyear'].'" and':'';

	$year = (isset($_POST['txt_year']) && !empty($_POST['txt_year']))? ' year ='.$_POST['txt_year'].' and':'';

	$sub1 = (isset($_POST['txt_sub1']) && !empty($_POST['txt_sub1']))? ' subject1 like "%'.$_POST['txt_sub1'].'%" and':'';
	
	$sex = (isset($_POST['txt_sex']) && !empty($_POST['txt_sex']))? ' sex like "%'.$_POST['txt_sex'].'%" and':'';
	
	$status=' student_status="Present"';
	
	$query = "select * from td_student_details where".$stream.$roll.$sesonyr.$year.$sub1.$sex.$status;
$category['students']=$this->db->query($query)->result_array();
		
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/all_id_card_students',$category);
	}	
	/*public function delete(){

		$user_id = $this->uri->segment(3);
		$this->db->where('user_id', $user_id);
        $this->db->delete(TBL_USERS); 
        $this->session->set_flashdata('user_del_success_msg','User has been successfully deleted');
        redirect('createuser');

	}*/

public function Registration($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['Session'] = $this->db->query('SELECT * FROM td_student_session ORDER BY sid DESC')->result_array();
		$data['stream'] = $this->db->query('SELECT * FROM td_student_stream ORDER BY stream_id DESC')->result_array();		
		$data['subject'] = $this->db->query('SELECT DISTINCT subject1 FROM td_student_details ORDER BY subject1 DESC')->result_array();
		$data['year'] = $this->db->query('SELECT DISTINCT year FROM td_student_details ORDER BY year ASC')->result_array();
		$data['depid'] = $depId;
		$data['actid'] = $actId;
		$data['uid'] = $uId;
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/all_stud_registration',$data);
	}
	
public function search_student_list()
	{	
		$depId = $this->input->post('dep_id');
		$actId = $this->input->post('act_id');
		$uId = $this->input->post('usr_id');
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){	
		$stream = (isset($_POST['txt_stream']) && !empty($_POST['txt_stream']))? ' stream ='.$_POST['txt_stream'].' and':'';

	$roll = (isset($_POST['txt_roll']) && !empty($_POST['txt_roll']))? ' roll ='.$_POST['txt_roll'].' and':'';

	$sesonyr = (isset($_POST['txt_sesyear']) && !empty($_POST['txt_sesyear']))? ' session_year ="'.$_POST['txt_sesyear'].'" and':'';

	$year = (isset($_POST['txt_year']) && !empty($_POST['txt_year']))? ' year ='.$_POST['txt_year'].' and':'';

	$sub1 = (isset($_POST['txt_sub1']) && !empty($_POST['txt_sub1']))? ' subject1 like "%'.$_POST['txt_sub1'].'%" and':'';
	
	$sex = (isset($_POST['txt_sex']) && !empty($_POST['txt_sex']))? ' sex like "%'.$_POST['txt_sex'].'%" and':'';
	
	$status=' student_status="Present" AND registration=1';
	
	$query = "select * from td_student_details where".$stream.$roll.$sesonyr.$year.$sub1.$sex.$status;
$category['students']=$this->db->query($query)->result_array();
		
		$category['msg']='YES';
		$category['depid'] = $depId;
		$category['actid'] = $actId;
		$category['uid'] = $uId;
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/all_students_registration_list',$category);
	}	
	
	public function AllRegistration(){
	$depid= $this->input->post('depid');
	$actid= $this->input->post('actid');
	$uid= $this->input->post('uid');
	$stud_id = $this->input->post('stud_id');
	$reg_no = $this->input->post('reg_no');
	$countreg = count($reg_no);
	for($i=0;$i<$countreg;$i++){
	$updata = $this->db->query('UPDATE td_student_details SET registration_no="'.$reg_no[$i].'" WHERE student_id="'.$stud_id[$i].'"');
	}
	redirect(base_url().'student/studentDetails/Registration/'.$depid.'/'.$actid.'/'.$uid);
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

public function ApplicationForm($id)
	{
		// $dob = $this->input->post('select5').'-'.$this->input->post('select6').'-'.$this->input->post('select7');
		// $aid = $this->input->post('input11');
		//echo 'SELECT * FROM td_student_application WHERE dob="'.$dob.'" AND apply_form_number="'.$aid.'"';die;
		$gid = $this->db->query('SELECT * FROM td_student_application WHERE apply_form_number="'.$id.'" AND application_pay_atat>0')->result_array();
		$grp_id = $gid[0]['group_id'];
		$applyc['aply_data'] = $this->db->query('SELECT * FROM td_student_application as a JOIN td_student_general_details as g ON a.stud_gen_id=g.stud_gen_id WHERE a.apply_form_number="'.$id.'" AND a.application_pay_atat>0')->result_array();
		$applyc['sub_data'] = $this->db->query('SELECT * FROM td_subject_group WHERE grp_id="'.$grp_id.'"')->result_array();
		$this->load->view('student/dcb_online_application_form',$applyc);
	}
	public function AdmissionFormq1($id)
	{
		// $dob = $this->input->post('select5').'-'.$this->input->post('select6').'-'.$this->input->post('select7');
		// $aid = $this->input->post('input11');
		//echo 'SELECT * FROM td_student_application WHERE dob="'.$dob.'" AND apply_form_number="'.$aid.'"';die;
		$gid = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$id.'" and student_status="Present"')->result_array();
		$grp_id = $gid[0]['subject_group'];
		$applyc['aply_data'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$id.'" AND student_status="Present"')->result_array();
		$applyc['sub_data'] = $this->db->query('SELECT * FROM td_subject_group WHERE grp_id="'.$grp_id.'"')->result_array();
		$this->load->view('student/dcb_online_admission_form',$applyc);
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

public function StudentAccess($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['Session'] = $this->db->query('SELECT * FROM td_student_session ORDER BY sid DESC')->result_array();
		$data['stream'] = $this->db->query('SELECT * FROM td_student_stream ORDER BY stream_id DESC')->result_array();		
		$data['subject'] = $this->db->query('SELECT DISTINCT subject1 FROM td_student_details ORDER BY subject1 DESC')->result_array();
		$data['year'] = $this->db->query('SELECT DISTINCT year FROM td_student_details ORDER BY year ASC')->result_array();
		
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('student/access_search',$data);
	}
	
public function student_access_list()
	{	
		$depId = $this->input->post('dep_id');
		$actId = $this->input->post('act_id');
		$uId = $this->input->post('usr_id');
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){	
		$stream = (isset($_POST['txt_stream']) && !empty($_POST['txt_stream']))? ' stream ='.$_POST['txt_stream'].' and':'';

	$roll = (isset($_POST['txt_roll']) && !empty($_POST['txt_roll']))? ' roll ='.$_POST['txt_roll'].' and':'';

	$sesonyr = (isset($_POST['txt_sesyear']) && !empty($_POST['txt_sesyear']))? ' session_year ="'.$_POST['txt_sesyear'].'" and':'';

	$year = (isset($_POST['txt_year']) && !empty($_POST['txt_year']))? ' year ='.$_POST['txt_year'].' and':'';

	$sub1 = (isset($_POST['txt_sub1']) && !empty($_POST['txt_sub1']))? ' subject1 like "%'.$_POST['txt_sub1'].'%" and':'';
	
	$sex = (isset($_POST['txt_sex']) && !empty($_POST['txt_sex']))? ' sex like "%'.$_POST['txt_sex'].'%" and':'';
	
	$status=' student_status="Present"';
	
	$query = "select * from td_student_details where".$stream.$roll.$sesonyr.$year.$sub1.$sex.$status;
$category['students']=$this->db->query($query)->result_array();
		
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/all_access_students',$category);
	}
	
	public function student_access_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$expid);

		

	$upquery = $this->db->query('UPDATE td_student_details SET allow=1 WHERE stud_id IN ('.$imp.')');
	
	if($upquery) {
		echo 'OK';
	} 
	else {
		echo 'NO';
	}

	//redirect(base_url().'student/StudentAccess');

	}	
	
	public function student_disallow_bulk($id){

		$ids = base64_decode(urldecode($id));

		$expid = explode('=',$ids);

		$exp = explode('%2C',$expid[0]);

		$imp = implode(',',$expid);

		

	$upquery = $this->db->query('UPDATE td_student_details SET allow=0 WHERE stud_id IN ('.$imp.')');
	
	if($upquery) {
		echo 'OK';
	} 
	else {
		echo 'NO';
	}

	//redirect(base_url().'student/StudentAccess');

	}	
	
	public function Edit($studId,$depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['edit'] = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$studId.'"')->result_array();
		$category['stream'] = $this->db->query('SELECT * FROM td_student_stream')->result_array();
		$category['subjectGrp'] = $this->db->query('SELECT * FROM td_subject_group')->result_array();
		$category['session'] = $this->db->query('SELECT * FROM td_subject_group')->result_array();
		
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/edit_student_details',$category);
	}
	
	public function update_student_image()
	{
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$sid = $this->input->post('category');
		$imge = $_FILES["student_image"]["name"];
		$exp = explode('.',$imge);
		$image = $exp[0].time().'.'.$exp[1];
		$temp = $_FILES["student_image"]["tmp_name"];
		$fields = array(
			'student_image' => $image,	
		);
		$data = $this->base_model->student_update('td_student_details',$fields,$sid);
		if($data)
		{
		$path='../ONLINE_APPLICATION/candidate/photo/';	
		$this->base_model->student_file_upload($image,$temp,$path);
		
		redirect(base_url().'student/studentDetails/Edit/'.$sid.'/'.$depid.'/'.$actid.'/'.$uid);
		}
		else {
			$category['msg'] = 'Sorry ! Category was not successfully Inserted';
			redirect(base_url().'student/studentDetails/Edit/'.$sid.'/'.$depid.'/'.$actid.'/'.$uid);
		}	
	}

	public function update_student_signature()
	{
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$sid = $this->input->post('category');
		$imge = $_FILES["student_signature"]["name"];
		$exp = explode('.',$imge);
		$image = $exp[0].time().'.'.$exp[1];
		$temp = $_FILES["student_signature"]["tmp_name"];
		$fields = array(
			'student_signature' => $image,	
		);
		$data = $this->base_model->student_update('td_student_details',$fields,$sid);
		if($data)
		{
		$path='../ONLINE_APPLICATION/candidate/sign/';	
		$this->base_model->student_file_upload($image,$temp,$path);
		
		redirect(base_url().'student/studentDetails/Edit/'.$sid.'/'.$depid.'/'.$actid.'/'.$uid);
		}
		else {
			$category['msg'] = 'Sorry ! Category was not successfully Inserted';
			redirect(base_url().'student/studentDetails/Edit/'.$sid.'/'.$depid.'/'.$actid.'/'.$uid);
		}	
	}

	public function update_student_details()
	{
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$category = $this->input->post('category');
		$S_id = $this->input->post('txt_id');
		$name = $this->input->post('txt_name');
		$father_name = $this->input->post('txt_fname');
		$candidate_phone = $this->input->post('txt_contact');
		$g_phn = $this->input->post('txt_contact');
		$stream = $this->input->post('txt_stream');
		$roll = $this->input->post('txt_roll');
		$reg = $this->input->post('txt_reg');
		$reg_year = $this->input->post('reg_year');
		$year = $this->input->post('txt_year');
		$session = $this->input->post('ses_year');
		$roll1 = $this->input->post('txt_roll1');
		$roll2 = $this->input->post('txt_roll2');
		$roll3 = $this->input->post('txt_roll3');
		$sub1 = $this->input->post('txt_sub1');
		$sub2 = $this->input->post('txt_sub2');
		$sub3 = $this->input->post('txt_sub3');
		$sex = $this->input->post('txt_sex');
		$caste = $this->input->post('txt_caste');
		$rgn = $this->input->post('txt_rlgn');
		$ph = $this->input->post('txt_ph');
		$db = $this->input->post('txt_dob');//date('j-m-Y',strtotime($this->input->post('txt_dob'));
		$vill = $this->input->post('txt_vill');
		$po = $this->input->post('txt_post');
		$ps = $this->input->post('txt_ps');
		$dist = $this->input->post('txt_dist');
		$state = $this->input->post('txt_state');
		$is_fee_discount=$this->input->post('is_fee_discount');
		
		$fields = array(
			'student_id' => $S_id,
			'name' => $name,
			'father_name' => $father_name,
			'candidate_phone' => $candidate_phone,
			'g_phn' => $g_phn,
			'stream' => $stream,
			'roll' => $roll,
			'roll1' => $roll1,
			'roll2' => $roll2,
			'roll3' => $roll3,
			'registration_no' => $reg,
			'reg_year' => $reg_year,
			'year' => $year,
			'session_year' => $session,
			'subject1' => $sub1,
			'subject2' => $sub2,
			'subject3' => $sub3,
			'sex' => $sex,
			'caste' => $caste,
			'religion' => $rgn,
			'ph' => $ph,
			'dob' => date('j-m-Y',strtotime($db)),
			'vill' => $vill,
			'po' => $po,
			'ps' => $ps,
			'dist' => $dist,
			'state' => $state,
			'is_fee_discount' => $is_fee_discount
		);
		$service = $this->base_model->student_update('td_student_details',$fields,$category);
		
		if($service)
		{
		
		redirect(base_url().'student/studentDetails/Edit/'.$S_id.'/'.$depid.'/'.$actid.'/'.$uid);
		}
		else {
			$category['msg'] = 'Sorry ! Category was not successfully Inserted';
			redirect(base_url().'student/studentDetails/Edit/'.$S_id.'/'.$depid.'/'.$actid.'/'.$uid);
		}
		
		
	}

}

