<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employeeDetails extends CI_Controller{

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
	public function AddEmployee($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('employee/add_employee',$data);
	}
	
	public function add_details()
	{
		$imge = $_FILES["txt_photo"]["name"];
		$exp = explode('.',$imge);
		$image = $exp[0].time().'.'.$exp[1];
		$temp = $_FILES["txt_photo"]["tmp_name"];
		$fields = array(
			'txt_photo' => $image,	
		);
		$path='employee/img/';	
		$this->base_model->file_upload($image,$temp,$path);
		
		$emp_details = $this->db->query("select * from td_employee_details order by id desc limit 1")->row();
		$last_emp_id = explode("DCB", $emp_details->emp_id);
		$emp_id = "DCB".($last_emp_id[1]+1);		
		$depId = $this->input->post('dep_id');
		$actId = $this->input->post('act_id');
		$uId = $this->input->post('usr_id');
		$fields = array(
		'emp_id' => $emp_id,
		'name' => $this->input->post('txt_name'),
		'father_name' => $this->input->post('txt_fname'),
		'mother_name' => $this->input->post('txt_mname'),
		'email' => $this->input->post('txt_email'),
		'phone' => $this->input->post('txt_phn'),
		'photo' => $image,
		'sex' => $this->input->post('txt_sex'),
		'caste' => $this->input->post('txt_caste'),
		'religion' => $this->input->post('txt_religion'),
		'dob' => date_format(date_create($this->input->post('txt_dob')), "Y-m-d"),
		'bld_grp' => $this->input->post('txt_bld_grp'),
		'vill' => $this->input->post('txt_vill'),
		'po' => $this->input->post('txt_po'),
		'ps' => $this->input->post('txt_ps'),
		'state' => $this->input->post('txt_state'),
		'dist' => $this->input->post('txt_dist'),
		'designation' => $this->input->post('txt_desig'),
		'desig_grp' => $this->input->post('txt_desig_grp'),
		'department' => $this->input->post('txt_department'),
		'specialisation'=> $this->input->post('txt_specialisation'),
		'pan_no' => $this->input->post('txt_panno'),
		'epic_no' => $this->input->post('txt_epicno'),
		'acc_no' => $this->input->post('txt_accno'),
		'bank' => $this->input->post('txt_bank'),
		'status' => 'Yes',
		'remark' => $this->input->post('txt_remark'),
		'doapp' => date_format(date_create($this->input->post('txt_doapp')), "Y-m-d"),
		'aadhar_no' => $this->input->post('txt_aadhar_no')
		);
		
		$service = $this->base_model->form_post('td_employee_details',$fields);
		
		if($service)
		{
		$this->session->set_flashdata('smsg','Successfully Updated');	
		redirect(base_url().'index.php/employee/employeeDetails/AddEmployee/'.$depId.'/'.$actId.'/'.$uId);
		}
		else {
			$this->session->set_flashdata('smsg','Sorry ! Category was not successfully Inserted');
			redirect(base_url().'index.php/employee/employeeDetails/AddEmployee/'.$depId.'/'.$actId.'/'.$uId);
		}
		
		
	}
	
	
	public function EmpDetails($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['data'] = $this->db->query('select * from td_employee_details where status="Yes" order by desig_grp,name,designation')->result_array();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('employee/emp_details',$category);
	}
	
	public function create_msg($depId,$actId,$uId,$id){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
	    $ids = base64_decode(urldecode($id));
		$expid = explode('=',$ids);
		$exp = explode('%2C',$expid[0]);
		$imp = implode(',',$expid);
		$id = explode(',',$imp);
		foreach($id as $id)
		{
			$selph=$this->db->query('SELECT * FROM td_employee_details where id LIKE "'.$id.'"')->row();
			$phone[]=$selph->phone;
			
		}
		$phone_imp = implode(',',$phone);
		$category['phone']=$phone_imp;
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}

	$this->load->view('employee/emp_msg',$category);
		}
		
		public function send_msg(){
			$depId = $this->input->post('dep_id');
			$actId = $this->input->post('act_id');
			$uId = $this->input->post('usr_id');
			$phone = $this->input->post('phone');
			$message = $this->input->post('message');
			$message=str_replace("&","%26",$message);
			$message=str_replace("(","%28",$message);
			$message=str_replace(")","%29",$message);
			$message=str_replace("?","%3F",$message);
			$message=str_replace(";","%3B",$message);
			
			$phn=explode(',',$phone);
			
			$fields = array(
			'msg_content' => $message,
			'sent_datetime'=> date('Y-m-d H:i:s'),
			);
		    $service = $this->base_model->form_post('td_emp_message',$fields);
			$msg_id = $this->db->insert_id();
			
		
			foreach($phn as $phoneno)
			{
			if($phoneno!='')
			{
			$fetch=$this->db->query('SELECT * FROM td_employee_details WHERE phone='.$phoneno)->row();
			$emp_id=$fetch->id;
			$fields1 = array(
			'msg_id' => $msg_id,
			'emp_id' => $emp_id,
			'phone' => $phoneno,
			);	
			
			$sender = $this->base_model->form_post('td_emp_message_sender',$fields1);
				
			$base_url="http://api.infoskysolution.com/SendSMS/sendmsg.php";
			$post_fields="uname=Dumkalt&pass=e(7Mv(0Y&send=DUMCLG&dest=".$phoneno."&msg=".$message."";
			$this->send_sms($base_url,$post_fields);
			}
			}
			redirect(base_url().'index.php/employee/employeeDetails/EmpDetails/'.$depId.'/'.$actId.'/'.$uId);
	}
	public function send_sms($base_url,$post_fields) {
			$ch = curl_init();
			$sms_massage;
			curl_setopt($ch, CURLOPT_URL,$base_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			$server_output;
			curl_close ($ch);
			}
	
	public function library_card($depId,$actId,$uId,$id){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$ids = base64_decode(urldecode($id));
		$expid = explode('=',$ids);
		$exp = explode('%2C',$expid[0]);
		$imp = implode(',',$exp);
		
	$category['profile'] = $this->db->query('SELECT * FROM td_employee_details WHERE id IN ('.$imp.')')->result_array();
	$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
	$this->load->view('employee/library-card',$category);
	}
	
	public function EmpSMSDtl($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['data'] = $this->db->query('SELECT * FROM td_emp_message order by msg_id desc')->result_array();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('employee/emp_msg_details',$category);
		}
	public function msg_details($id){
	$category['msg']='YES';
		$category['data'] = $this->db->query('SELECT * FROM td_emp_message_sender es JOIN td_employee_details e ON e.id=es.emp_id where es.msg_id='.$id.'')->result();
		$this->load->view('employee/emp_msg_details_numbers',$category);
		}	
		
	public function EmpSMSSearch($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['data'] = $this->db->query('SELECT * FROM td_employee_details order by name')->result();
        $category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('employee/search_msg',$category);
	   
		}	
		
	public function search_msg_details(){
		$date=$this->input->post('txt_date');
		$name=$this->input->post('txt_name');
		$phone=$this->input->post('txt_ph');
		
		if($date!='')
		{
		$category['data'] = $this->db->query('SELECT * FROM td_emp_message where sent_datetime LIKE "%'.date('Y-m-d',strtotime($date)).'%" order by msg_id desc')->result_array();
		}
		else
		{
		   if($name!='')
		   {
			 $category['data'] = $this->db->query('SELECT * FROM td_emp_message em JOIN td_emp_message_sender es JOIN td_employee_details e ON em.msg_id=es.msg_id and e.id=es.emp_id where e.name LIKE "%'.$name.'%"')->result_array();
		   }
		   else
		   {
			 $category['data'] = $this->db->query('SELECT * FROM td_emp_message em JOIN td_emp_message_sender es JOIN td_employee_details e ON em.msg_id=es.msg_id and e.id=es.emp_id where e.phone LIKE "'.$phone.'"')->result_array();
		   }
		}
		$category['msg']='YES';
		$this->load->view('employee/emp_msg_details',$category);
		}
		
		public function EmpSearch($depId,$actId,$uId){
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		
		$this->load->view('employee/emp_search',$category);
	}
	public function search_emp(){

	$query_string = isset($_GET['emp_type'])?'emp_type='.$_GET['emp_type']:'';
	$query_string .= isset($_GET['txt_id'])?'&txt_id='.$_GET['txt_id']:'';
	$query_string .= isset($_GET['txt_name'])?'&txt_name='.$_GET['txt_name']:'';
	$query_string .= isset($_GET['txt_ph'])?'&txt_ph='.$_GET['txt_ph']:'';
	$query_string .= isset($_GET['txt_dept'])?'&txt_dept='.$_GET['txt_dept']:'';
	$query_string .= isset($_GET['txt_grp'])?'&txt_grp='.serialize($_GET['txt_grp']):'';
	$query_string .= isset($_GET['txt_desig'])?'&txt_desig='.$_GET['txt_desig']:'';
	$query_string .= isset($_GET['txt_sex'])?'&txt_sex='.$_GET['txt_sex']:'';
	$query_string .= isset($_GET['txt_caste'])?'&txt_caste='.$_GET['txt_caste']:'';
	
	if(isset($_GET['txt_grp']) && count($_GET['txt_grp'])!=0){
	$ex_grp=implode(',',$_GET['txt_grp']);
	$group=$_GET['txt_grp'];}

	$type = (isset($_GET['emp_type']) && !empty($_GET['emp_type']))? " status ='".$_GET['emp_type']."'":" status = ''";
	$id = (isset($_GET['txt_id']) && !empty($_GET['txt_id']))? ' and emp_id ="'.$_GET['txt_id'].'"':'';
	$name = (isset($_GET['txt_name']) && !empty($_GET['txt_name']))? ' and name like "%'.$_GET['txt_name'].'%"':'';
	$ph = (isset($_GET['txt_ph']) && !empty($_GET['txt_ph']))? ' and phone ='.$_GET['txt_ph']:'';
	$dept = (isset($_GET['txt_dept']) && !empty($_GET['txt_dept']))? ' and department ="'.$_GET['txt_dept'].'"':'';
	$grp = (isset($_GET['txt_grp']) && count($_GET['txt_grp'])!=0)? ' and desig_grp IN (' . implode(',',$_GET['txt_grp']) . ')':'';
	$desig = (isset($_GET['txt_desig']) && !empty($_GET['txt_desig']))? ' and designation like "%'.$_GET['txt_desig'].'%"':'';
	$sex = (isset($_GET['txt_sex']) && !empty($_GET['txt_sex']))? ' and sex ="'.$_GET['txt_sex'].'"':'';
	$caste = (isset($_GET['txt_caste']) && !empty($_GET['txt_caste']))? ' and caste ="'.$_GET['txt_caste'].'"':'';

			$query = "select * from td_employee_details where".$type.$id.$name.$ph.$dept.$grp.$desig.$sex.$caste. " order by desig_grp,name,designation";
			$countQuery = "select * from td_employee_details where".$type.$id.$name.$ph.$dept.$desig.$grp.$sex.$caste;			
			$category['data']=$this->db->query($query)->result_array();
		$category['msg']='YES';
		$category['depid']=$this->input->post('dep_id');
		$category['actid']=$this->input->post('act_id');
		$category['uid']=$this->input->post('usr_id');
        
        $this->load->view('employee/emp_search_details',$category);
	}			
	
	public function ResignedEmp($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['data'] = $this->db->query('select * from td_employee_details where status="Resign" order by desig_grp,name,designation')->result_array();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('employee/emp_details_resign',$category);
	}
	
	public function EmpPaper($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$category['profile'] = $this->db->query('SELECT * FROM td_employee_details')->result_array();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('employee/emp_paper',$category);
	}
	
	public function add_employee_paper(){
			$emp_id = $this->input->post('txt_emp_id');
			$desc = $this->input->post('txt_description');
			$imp_desc=implode(',',$desc);
			$ex_desc=explode(',',$imp_desc);
			foreach($ex_desc as $description)
			{
			$fields = array(
			'emp_id' => $emp_id,
			'paper_desc' => $description,
			);				
			$sender = $this->base_model->form_post('td_emp_paper',$fields);
			}
			redirect(base_url().'employee/employeeDetails/EmpPaper');
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
		redirect(base_url().'student/studentDetails/Profile/'.$id.'/'.$depId.'/'.$actId.'/'.$uId);
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
		redirect(base_url().'student/studentDetails/Profile/'.$id.'/'.$depId.'/'.$actId.'/'.$uId);
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
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('student/all_students_registration_list',$category);
	}	
	
	public function AllRegistration(){
	$stud_id = $this->input->post('stud_id');
	$reg_no = $this->input->post('reg_no');
	$countreg = count($reg_no);
	for($i=0;$i<$countreg;$i++){
	$updata = $this->db->query('UPDATE td_student_details SET registration_no="'.$reg_no[$i].'" WHERE student_id="'.$stud_id[$i].'"');
	}
	redirect(base_url().'student/studentDetails/Registration');
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

}

