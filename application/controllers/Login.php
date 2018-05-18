<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model(array('Adminlogin','common_model'));
	date_default_timezone_set('Asia/Kolkata');	
    }

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		if($this->form_validation->run() == TRUE)
		{

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$usernamecnt = $this->db->query('SELECT * FROM tbl_users WHERE username="'.$username.'"')->result_array();
			if($usernamecnt[0]['username'] == $username){
			$admin_id = $this->Adminlogin->checkAuth($username,$password);

			if($admin_id!=''){

				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('user_id',$admin_id);

				$log_array = array('admin_id'=>$admin_id,
									'login_date'=>date('Y-m-d'),
									'login_time'=>date('h:i:s')
									);
				$last_inser_id = $this->common_model->AddRecord(TBL_LOGIN,$log_array);
				$userdtl = $this->db->query('SELECT * FROM tbl_users WHERE user_id='.$admin_id)->result_array();
				$otpgen = rand(1,99999);
				$utpupd = $this->db->query('UPDATE tbl_users SET login_pass_otp='.$otpgen.' WHERE user_id='.$admin_id);
				$base_url="http://api.infoskysolution.com/SendSMS/sendmsg.php";
				//$post_fields = "uname=FARHINT&pass=far6541&send=REDBSK&dest=".$userdtl[0]['mobile']."&msg=Dear Admin. Your OTP for verification is ".$otpgen;
				$post_fields='uname=Dumkalt&pass=@Dcb230770&send=DUMCLG&dest='.$userdtl[0]['mobile'].'&msg=OTP for login '.$otpgen.'. Dumkal College';
				$this->send_sms($base_url,$post_fields);
				echo 'OK/'.$admin_id.'/'.$otpgen;
			}
			else{
				echo 'NO/Invalid login!!';
			}
			} else {
			echo 'NO/Invalid Username!!';
			}
				
		}
		else {
		$this->load->view('login');
		}
	}
	
public function verifyotp()
	{
	$user_id = $this->input->post('user_id');
	$otp = $this->input->post('user_otp');
	$userotp = $this->input->post('inputotp');
	if($otp == $userotp){
	echo 'OK';
	} else {
	echo 'NO';
	}
	}	
	
public function checkpassmatch($uid)
	{
	$oldpass = $this->input->post('old_pass');
	$newpass = $this->input->post('new_pass');
	//echo 'SELECT * FROM tbl_users WHERE original_password="'.$oldpass.'" AND user_id='.$uid;die;exit;
	$chkexist = $this->db->query('SELECT * FROM tbl_users WHERE original_password="'.$oldpass.'" AND user_id='.$uid)->num_rows();
	if($chkexist > 0){
	$randotp = rand(0,9999);
	$userdtl = $this->db->query('SELECT * FROM tbl_users WHERE original_password="'.$oldpass.'" AND user_id='.$uid)->result_array();
	$upotp = $this->db->query('UPDATE tbl_users SET change_pass_otp ="'.$randotp.'" WHERE user_id='.$uid.' AND original_password="'.$oldpass.'"');
	$base_url="http://api.infoskysolution.com/SendSMS/sendmsg.php";
	$post_fields="uname=Dumkalt&pass=@Dcb230770&send=DUMCLG&dest=".$userdtl[0]['mobile']."&msg=OTP for password change ".$randotp.".Dumkal College";
	//$post_fields="uname=Dumkalt&pass=e(7Mv(0Y&send=DUMCLG&dest=".$userdtl[0]['mobile']."&msg=Your Application Form of ".$randotp." has been submitted successfully. Please note your Application ID ".$randotp.".  Dumkal College";
	//$post_fields = "uname=FARHINT&pass=far6541&send=REDBSK&dest=".$userdtl[0]['mobile']."&msg=Dear Admin. Your OTP for verification is ".$randotp;
	$this->send_sms($base_url,$post_fields);
	echo $chkmsg = 'OK-'.$randotp.'-'.$newpass;
	}
	else {
	echo $chkmsg = 'NO';
	}
	}	

public function updatepass($uid)
	{
	$newpass = $this->input->post('newpass');
	$otp = $this->input->post('otp_chpass');
	$userotp = $this->input->post('otp');
	if($otp == $userotp){
	$updatepass = $this->db->query('UPDATE tbl_users SET password="'.md5($newpass).'",original_password="'.$newpass.'" WHERE user_id='.$uid);
	redirect(base_url().'logout');
	}
	}	
	
	public function send_sms($base_url,$post_fields) {
			$ch = curl_init();
			//echo $sms_massage;
			curl_setopt($ch, CURLOPT_URL,$base_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			$server_output;
			curl_close ($ch);
			
			}
}

