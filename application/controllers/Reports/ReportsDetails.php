<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reportsDetails extends CI_Controller{

	function __construct() {
        parent::__construct();
        $this->load->model('common_model');
		$this->load->model('base_model');
		date_default_timezone_set("Asia/Calcutta");
		

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
	public function RegSheet($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		 $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();
        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id group by g.grp_id')->result();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
		$this->load->view('reports/search_reg',$category);
	}
	 public function StudList($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){

        $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();
        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id group by g.grp_id')->result();

		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_year',$category);

    }



    public function StudListId($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){


        $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();



        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id group by g.grp_id')->result();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_stdid',$category);
    }



    public function TotalStudent($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){


        $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();



        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id')->result();

		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_total',$category);



    }



    public function Attendance($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){


        $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();



        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id group by g.grp_id')->result();

		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_attendance',$category);
    }



    public function AdmStatus($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){

        $category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_admission',$category);
    }



    public function ElecList($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){

        $category['msg']='YES';


        $category['subject'] = $this->db->query('select * from td_student_stream')->result();

		}
		else {
			$category['msg']='NO';
		}
        $this->load->view('reports/search_election',$category);
    }



    public function report8(){



        $category['subject'] = $this->db->query('select * from td_student_stream')->result();



        $this->load->view('templates/header');



        $this->load->view('report/search_election_winner',$category);



        $this->load->view('templates/footer');



    }

	
	
	public function SearchReg(){



        $yr=$this->input->post('txt_yr');

		if($yr == '2017-2018' || $yr == '2016-2017'){

		$regflg = 1;

		} else {

		$regflg = 1;

		}



        $sort=$this->input->post('txt_sort');



        $sub=$this->input->post('txt_sub');



        $d1 = strtotime($this->input->post('txt_date1'));



        $d2 = strtotime($this->input->post('txt_date2'));



        $d11 = date('Y-m-d',$d1);



        $d22 = date('Y-m-d',$d2);



        $category['session']=$yr;

		

		$category['sub']=$sub;

		$category['from_date']=$d11;

		$category['to_date']=$d22;



        if($sub)



        {



          $query='select * from td_student_details where reg_year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present"  and registration='.$regflg.' order by '.$sort.' asc';



            $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



            $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



            $category['data'] = $this->db->query($query)->result();



        }



        else



        {



            $query='select * from td_student_details where reg_year="'.$yr.'" and student_status="Present"  and registration='.$regflg.' and registration_date>="'.$d11.'" and registration_date<="'.$d22.'"  order by subject_group,'.$sort.' asc';

			//echo 'select * from td_student_details where reg_year="'.$yr.'" and student_status="Present"  and registration='.$regflg.' and registration_date>="'.$d11.'" and registration_date<="'.$d22.'"  group by subject_group order by subject_group';

            $category['data'] = $this->db->query('select * from td_student_details where reg_year="'.$yr.'" and student_status="Present"  and registration='.$regflg.' and registration_date>="'.$d11.'" and registration_date<="'.$d22.'"  order by subject_group,'.$sort.' asc')->result();



            $category['sort']=$sort;



            $category['d11']=$d11;



            $category['d22']=$d22;



            $category['yr']=$yr;

			//echo $this->db->last_query();

            //echo '<pre>';print_r($category['data']);die;



        }

		//echo $query;

        $category['num'] = $this->db->query($query)->num_rows();



        $this->load->view('reports/dumkalreglist',$category);



    }



    public function SearchReg_excel(){



        $yr=$this->input->post('txt_yr');

		if($yr == '2017-2018' || $yr == '2016-2017'){

		$regflg = 0;

		} else {

		$regflg = 1;

		}



        $sort=$this->input->post('txt_sort');



        $sub=$this->input->post('txt_sub');



        $d1 = strtotime($this->input->post('txt_date1'));



        $d2 = strtotime($this->input->post('txt_date2'));



        $d11 = date('Y-m-d',$d1);



        $d22 = date('Y-m-d',$d2);



        $category['session']=$yr;



        if($sub)



        {



            $query='select * from td_student_details where reg_year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present"  and registration='.$regflg.' order by '.$sort.' asc';



            $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



            $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



            $category['data'] = $this->db->query($query)->result();



        }



        else



        {



            $query='select * from td_student_details where reg_year="'.$yr.'" and student_status="Present"  and registration=1 and registration_date BETWEEN "'.$d11.'" AND "'.$d22.'"  order by subject_group,'.$sort.' asc';



            $category['sub_div'] = $this->db->query('select * from td_student_details where reg_year="'.$yr.'" and student_status="Present"  and registration='.$regflg.' and registration_date BETWEEN "'.$d11.'" AND "'.$d22.'"  group by subject_group order by subject_group')->result();



            $category['sort']=$sort;



            $category['d11']=$d11;



            $category['d22']=$d22;



            $category['yr']=$yr;



            //print_r($category['sub_div']);die;



        }



        $category['num'] = $this->db->query($query)->num_rows();



        $this->load->view('reports/dumkalreglist_excel',$category);



    }

	
	 public function StudAddress($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){


        $category['regyr'] = $this->db->query('select distinct reg_year from td_student_details')->result();



        $category['subject'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id group by g.grp_id')->result();
		$category['msg']='YES';
		}
		else {
			$category['msg']='NO';
		}

        $this->load->view('reports/search_address',$category);

    }
	
	public function SearchAddress(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        $category['data'] = $this->db->query('select * from td_student_details where reg_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by name asc')->result();



        $this->load->view('reports/StudentAddress',$category);



    }



    public function SearchAddress_excel(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        $category['data'] = $this->db->query('select * from td_student_details where reg_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by name asc')->result();



        $this->load->view('reports/StudentAddress_excel',$category);



    }



    public function SearchStdList(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        if($yr==1){



            $category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->result();



            $category['num'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->num_rows();



        }else



        {



            $category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and is_result_verify=1  order by '.$sort.' asc')->result();



            $category['num'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and is_result_verify=1  order by '.$sort.' asc')->num_rows();



        }



        $this->load->view('reports/StudentList',$category);



    }



    public function SearchStdList_excel(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        if($yr==1){



            $category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->result();



            $category['num'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->num_rows();



        }else



        {



            $category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and is_result_verify=1  order by '.$sort.' asc')->result();



            $category['num'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and is_result_verify=1  order by '.$sort.' asc')->num_rows();



        }



        $this->load->view('reports/StudentList_excel',$category);



    }



    public function SearchStdListID(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        $category['data'] = $this->db->query('select * from td_student_details where reg_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->result();



        $this->load->view('reports/StudentListID',$category);



    }



    public function SearchStdListID_excel(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['session']=$ses;



        $category['year']=$yr;



        $category['data'] = $this->db->query('select * from td_student_details where reg_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration=1  order by '.$sort.' asc')->result();



        $this->load->view('reports/StudentListID_excel',$category);



    }



    public function SearchAtteandance(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



		$txt_filter=$this->input->post('txt_filter');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['subject_code']=$fetch_subject->subject_1_code;



        $category['session']=$ses;



        $category['year']=$yr;



		



		if($txt_filter==0) {		



        	$category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration='.$txt_filter.' order by '.$sort.' asc')->result();



		} else {



			$category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration='.$txt_filter.' and is_final='.$txt_filter.' order by '.$sort.' asc')->result();



		}



		



        $this->load->view('reports/Attendance',$category);



    }



    public function SearchAtteandance_excel(){



        $yr=$this->input->post('txt_yr');



        $ses=$this->input->post('txt_session');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');

		$txt_filter=$this->input->post('txt_filter');



        $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;



        $category['subject_code']=$fetch_subject->subject_1_code;



        $category['session']=$ses;



        $category['year']=$yr;



        $category['data'] = $this->db->query('select * from td_student_details where session_year="'.$ses.'" and year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present" and registration='.$txt_filter.'  order by '.$sort.' asc')->result();



        $this->load->view('reports/Attendance_excel',$category);



    }



    public function SearchTotal(){



        $ses=$this->input->post('txt_session');



        $category['session']=$ses;



        $this->load->view('reports/TotalStudent',$category);



    }



    public function SearchTotal_excel(){



        $ses=$this->input->post('txt_session');



        $category['session']=$ses;



        $this->load->view('reports/TotalStudent_excel',$category);



    }



    public function SearchAdmission(){



        //if($this->input->post('txt_app')&&$this->input->post('txt_adm')&&$this->input->post('txt_vac')){$count=3;}



        $category['app']=$this->input->post('txt_app');



        $category['adm']=$this->input->post('txt_adm');



        $category['vac']=$this->input->post('txt_vac');



        $fetch_session = $this->db->query('select * from td_student_session  where active="1"')->row();



        $category['session']=$fetch_session->session;



        $this->load->view('reports/AdmissionStatus',$category);



    }



    public function SearchAdmission_excel(){



        //if($this->input->post('txt_app')&&$this->input->post('txt_adm')&&$this->input->post('txt_vac')){$count=3;}



        $category['app']=$this->input->post('txt_app');



        $category['adm']=$this->input->post('txt_adm');



        $category['vac']=$this->input->post('txt_vac');



        $fetch_session = $this->db->query('select * from td_student_session  where active="1"')->row();



        $category['session']=$fetch_session->session;



        $this->load->view('reports/AdmissionStatus_excel',$category);



    }



    public function SearchElectList(){



        $yr=$this->input->post('txt_yr');



        $sub=$this->input->post('txt_sub');



        $sort=$this->input->post('txt_sort');



        $fetch_subject = $this->db->query('select * from td_student_stream where stream_id="'.$sub.'"')->row();



        $category['subject']=$fetch_subject->stream_name;



		$category['U']=$fetch_subject->U;



		$category['R']=$fetch_subject->R;



        $category['year']=$yr;



		$fetch_session = $this->db->query('select * from td_student_session  where active="1"')->row();



        $category['session']=$fetch_session->session;



		$query='select * from td_election_nomination JOIN td_student_details ON td_student_details.student_id=td_election_nomination.nomination_id where td_student_details.year="'.$yr.'" and td_student_details.stream="'.$sub.'" and td_election_nomination.is_withdraw="0" and td_election_nomination.type="U" order by '.$sort.' asc';



        $category['data'] = $this->db->query($query)->result();



		$category['num'] = $this->db->query($query)->num_rows();



		$query_res='select * from td_election_nomination JOIN td_student_details ON td_student_details.student_id=td_election_nomination.nomination_id where td_student_details.year="'.$yr.'" and td_student_details.stream="'.$sub.'" and td_election_nomination.is_withdraw="0"  and td_election_nomination.type="R" order by '.$sort.' asc';



        $category['data_res'] = $this->db->query($query_res)->result();



		$category['num_res'] = $this->db->query($query_res)->num_rows();



        $this->load->view('reports/ElectionList',$category);



    }



	public function SearchElectWinnerList(){



        $fetch_session = $this->db->query('select * from td_student_session  where active="1"')->row();



        $category['session']=$fetch_session->session;



		$query='select * from td_election_nomination JOIN td_student_details JOIN td_student_stream ON td_student_details.student_id=td_election_nomination.nomination_id and td_student_stream.stream_id=td_student_details.stream where td_election_nomination.is_winner="1" order by td_student_details.name asc';



        $category['data'] = $this->db->query($query)->result();



		$category['num'] = $this->db->query($query)->num_rows();



        $this->load->view('reports/ElectionWinnerList',$category);



    }



	public function SearchWithdrawList(){



		$fetch_session = $this->db->query('select * from td_student_session  where active="1"')->row();



        $category['session']=$fetch_session->session;



		$query='select * from td_election_nomination JOIN td_student_details JOIN td_student_stream ON td_student_details.student_id=td_election_nomination.nomination_id and td_student_stream.stream_id=td_student_details.stream where td_election_nomination.is_withdraw="1" order by td_student_details.name asc';



        $category['data'] = $this->db->query($query)->result();



		$category['num'] = $this->db->query($query)->num_rows();



        $this->load->view('reports/ElectionWithdrawList',$category);



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
	
	
}

