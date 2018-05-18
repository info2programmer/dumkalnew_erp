<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceDetails extends CI_Controller {
function __construct(){
parent::__construct();
if($this->session->userdata('username')==''){

        	redirect('login');
        }
$this->load->model('base_model');
}
	//////////////////////////////////Fee Structure//////////////////////////////////////
	public function index(){
		$category['data'] = $this->base_model->show_data('td_subject_group','*','')->result_array();
		$category['stream'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id')->result_array();
		$category['fee'] = $this->db->query('select * from tb_fin_head')->result_array();
		$this->load->view('templates/header');
		$this->load->view('finance/fee_details',$category);
		$this->load->view('templates/footer');	
	}
	public function head_details($yr,$id)
	{
		$category['data'] = $this->base_model->show_data('tb_fin_fee','*','year="'.$yr.'" and subj_grp_id="'.$id.'"')->result_array();
		$category['stream'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$id.'"')->result_array();
		$this->load->view('finance/fee_head_details',$category);	
	}
	public function add_fee()
	{	
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
   $this->form_validation->set_rules('subj_grp_id', 'Subject Group', 'required');
   $this->form_validation->set_rules('fin_head_id', 'Finance Head', 'required');
   $this->form_validation->set_rules('year', 'Year', 'required');
   $this->form_validation->set_rules('amount', 'Amount', 'required');
  
   if ($this->form_validation->run() == FALSE) {
	    $category['data'] = $this->base_model->show_data('td_subject_group','*','')->result_array();
		$category['stream'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id')->result_array();
		$category['fee'] = $this->db->query('select * from tb_fin_head')->result_array();
		$this->load->view('templates/header');
		$this->load->view('finance/fee_details',$category);
		$this->load->view('templates/footer');
	   } 
   else {
		$fields = array(
			'subj_grp_id' => $this->input->post('subj_grp_id'),
			'year' => $this->input->post('year'),
			'fin_head_id' => $this->input->post('fin_head_id'),
			'amount' => $this->input->post('amount'),	
		);
		$service = $this->base_model->form_post('tb_fin_fee',$fields);
		$total_amt=$this->db->query('select sum(amount) as total from tb_fin_fee where subj_grp_id="'.$this->input->post('subj_grp_id').'" and year="'.$this->input->post('year').'"')->result_array();
	    	if($this->input->post('year')=='1'){
			$fields_tot = array(
			'fee_year1' => $total_amt[0]['total'],	
			);}
			if($this->input->post('year')=='2'){
			$fields_tot = array(
			'fee_year2' => $total_amt[0]['total'],	
			);}
			if($this->input->post('year')=='3'){
			$fields_tot = array(
			'fee_year3' => $total_amt[0]['total'],	
			);}
		$up_total_fee = $this->base_model->db_update('td_subject_group',$fields_tot,'grp_id',$this->input->post('subj_grp_id'));
		if($service)
		{
		$category['data'] = $this->base_model->show_data('tb_fin_fee','*','')->result_array();
		redirect(base_url().'index.php/finance/fee_details');
		}
		else {
			$category['msg'] = 'Sorry ! Category was not successfully Inserted';
			$this->load->view('finance/fee_details',$category);
		}
   }
	}
	public function del_fee($id)
	{
		$fee['delete_data']=$this->db->query("delete from tb_fin_fee where id = '".$id."'");
		redirect(base_url().'index.php/finance/fee_details');	
	}
	
	public function edit_fee($id)
	{
		$category['editdata'] = $this->base_model->show_data('tb_fin_head','*','id="'.$id.'"')->result_array();
		$this->load->view('finance/edit_head',$category);	
	}
	public function up_fee()
	{
  $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
   $this->form_validation->set_rules('amount', 'Amount', 'required');
  
   if ($this->form_validation->run() == FALSE) {
	    $category['editdata'] = $this->base_model->show_data('tb_fin_fee','*','id="'.$this->input->post('id').'"')->result_array();
		$this->load->view('finance/fee_head_details',$category);
	   } 
   else {
		$fields = array(
			'amount' => $this->input->post('amount'),	
		);
		$service = $this->base_model->db_update('tb_fin_fee',$fields,'id',$this->input->post('id'));
		$total_amt=$this->db->query('select sum(amount) as total from tb_fin_fee where subj_grp_id="'.$this->input->post('subj_grp_id').'" and year="'.$this->input->post('year').'"')->result_array();
	    	if($this->input->post('year')=='1'){
			$fields_tot = array(
			'fee_year1' => $total_amt[0]['total'],	
			);}
			if($this->input->post('year')=='2'){
			$fields_tot = array(
			'fee_year2' => $total_amt[0]['total'],	
			);}
			if($this->input->post('year')=='3'){
			$fields_tot = array(
			'fee_year3' => $total_amt[0]['total'],	
			);}
		$up_total_fee = $this->base_model->db_update('td_subject_group',$fields_tot,'grp_id',$this->input->post('subj_grp_id'));
		if($service)
		{
		$category['data'] = $this->base_model->show_data('tb_fin_fee','*','year="'.$this->input->post('year').'" and subj_grp_id="'.$this->input->post('subj_grp_id').'"')->result_array();
		$category['stream'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$this->input->post('subj_grp_id').'"')->result_array();
		$this->load->view('finance/fee_head_details',$category);
		}
		else {
			$category['msg'] = 'Sorry ! Category was not successfully Inserted';
			$category['data'] = $this->base_model->show_data('tb_fin_fee','*','year="'.$yr.'" and subj_grp_id="'.$id.'"')->result_array();
		$category['stream'] = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$id.'"')->result_array();
		$this->load->view('finance/fee_head_details',$category);
		}	
	}
	}
	//////////////////////////////////Fee Structure//////////////////////////////////////
	
	//////////////////////////////////Fee Head//////////////////////////////////////
	public function fee_head($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['heads'] = $this->db->query('select * from tb_fin_head')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/fee_head',$data);
	}
	public function add_head(){
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$fields = array(
			'type' => $this->input->post('type'),
			'term' => $this->input->post('term'),
			'name' => $this->input->post('name'),
			'note' => $this->input->post('note'),	
			'favour' => $this->input->post('favour'),
		);
		$service = $this->base_model->form_post('tb_fin_head',$fields);
		$this->session->set_flashdata('msg','Added Successfully');
		redirect(base_url().'index.php/finance/financeDetails/fee_head/'.$depid.'/'.$actid.'/'.$uid);
	}
	public function EditHead($id,$fid,$depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid)->num_rows();
		if($checkExist > 0 ){
		$data['editdata'] = $this->base_model->show_data('tb_fin_head','*','id="'.$id.'"')->result_array();
		$data['heads'] = $this->db->query('select * from tb_fin_head')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/edit_head',$data);
	}
	public function DeleteHead($id,$fid,$depId,$actId,$uId){
		$depid = $depId;
		$actid = $actId;
		$uid = $uId;
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid)->num_rows();
		if($checkExist > 0 ){
		$data['heads'] = $this->db->query('DELETE FROM tb_fin_head WHERE id='.$id);
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		redirect(base_url().'index.php/finance/financeDetails/fee_head/'.$depid.'/'.$actid.'/'.$uid);
	}
	public function update_head(){
		$id=$this->input->post('hid');
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$fields = array(
			'type' => $this->input->post('type'),
			'term' => $this->input->post('term'),
			'name' => $this->input->post('name'),
			'note' => $this->input->post('note'),	
			'favour' => $this->input->post('favour'),	
		);
		//print_r($fields);die;exit;
		$service = $this->base_model->db_update('tb_fin_head',$fields,'id',$id);
		$this->session->set_flashdata('msg','Updated Successfully');
		redirect(base_url().'Finance/FinanceDetails/Fee_head/'.$depid.'/'.$actid.'/'.$uid);
	}
	//////////////////////////////////Fee Head//////////////////////////////////////
	
	//////////////////////////////////Cashbook//////////////////////////////////////
	public function CashBook($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/cash_book_search_view',$data);
		// $this->load->view('templates/header');
		// $this->load->view('finance/cashbook');
		// $this->load->view('templates/footer');	
	}
	public function SearchCashbook()
	{
	 $d1 = strtotime($this->input->post('txtFromDate'));
	 $d2 = strtotime($this->input->post('txtToDate'));
	 $d11 = date('Y-m-d',$d1);
	 $d22 = date('Y-m-d',$d2);
	 $fee['fdate'] = $d11;
	 $fee['tdate'] = $d22;
		//echo $s = "SELECT * FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Credit'";die;
		$fee['cashbook_Cdata']=$this->db->query("SELECT * FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Credit' AND contra=0 ORDER BY fee_id ASC")->result_array();
		$fee['tot_cCash']=$this->db->query("SELECT SUM(cash) AS sccash FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Credit' AND contra=0")->result_array();
		$fee['tot_cBank']=$this->db->query("SELECT SUM(bank) AS sbcash FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Credit' AND contra=0")->result_array();
		$fee['cashbook_Ddata']=$this->db->query("SELECT * FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Debit' AND contra=0 ORDER BY fee_id ASC")->result_array();
		$fee['tot_dCash']=$this->db->query("SELECT SUM(cash) AS scdcash FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Debit' AND contra=0")->result_array();
		$fee['tot_dBank']=$this->db->query("SELECT SUM(bank) AS sbdcash FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Debit' AND contra=0")->result_array();
		$fee['cashbook_Condata']=$this->db->query("SELECT * FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND contra=1 ORDER BY fee_id ASC")->result_array();
		$fee['tot_ConCash']=$this->db->query("SELECT SUM(amount) AS concash FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND contra=1")->result_array();
		
		$this->load->view('finance/cash_book_report',$fee);	
	}
   //////////////////////////////////Cashbook//////////////////////////////////////

   //////////////////////////////////Ledger//////////////////////////////////////
	public function Ledger($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['ledger'] = $this->db->query("SELECT * FROM tb_fin_head ORDER BY id ASC")->result();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/ledger_report_searc_view',$data);
	}
	public function LedgerDetails()
	{
	 $d1 = strtotime($this->input->post('txtFromDate'));
	 $d2 = strtotime($this->input->post('txtToDate'));
	 $d11 = date('Y-m-d',$d1);
	 $d22 = date('Y-m-d',$d2);
	 $fee['d11'] = $d11;
	 $fee['d22'] = $d22;
	 $fee_id = $this->input->post('ddlFunds');
	$fee['fee_id'] = $fee_id;

	 	$fee['fee_name']=$this->db->query("select * from `tb_fin_head` WHERE `id`='".$fee_id."'")->result_array();
	
		$fee['ledgerdata']=$this->db->query("SELECT SUM(amount) as amount,sub_date,fee_head_id,fee_id FROM `td_fee_subfunds` WHERE  `sub_date` BETWEEN '".$d11."' AND '".$d22."' AND `fee_head_id`='".$fee_id."' and `type`='Credit' GROUP BY sub_date")->result_array();

		$fee['ledgerdata_tot']=$this->db->query("SELECT SUM(amount) as tamount FROM `td_fee_subfunds` WHERE  `sub_date` BETWEEN '".$d11."' AND '".$d22."' AND `fee_head_id`='".$fee_id."' AND `type`='Credit' GROUP BY sub_date")->result_array();
	
		$fee['ledgerdatad']=$this->db->query("SELECT SUM(amount) as amount,sub_date,fee_head_id,fee_id FROM `td_fee_subfunds` WHERE  `sub_date` BETWEEN '".$d11."' AND '".$d22."' AND `fee_head_id`='".$fee_id."' AND `type`='Debit' AND verify=1 GROUP BY sub_date")->result_array();

		$fee['ledgerdata_totd']=$this->db->query("SELECT SUM(amount) as tamount FROM `td_fee_subfunds` WHERE  `sub_date` BETWEEN '".$d11."' AND '".$d22."' AND `fee_head_id`='".$fee_id."' AND `type`='Debit' AND verify=1 GROUP BY sub_date")->result_array();
		
		$this->load->view('finance/ledger_report',$fee);
	}
	//////////////////////////////////Ledger//////////////////////////////////////
	
	//////////////////////////////////Subfund//////////////////////////////////////
	public function Subfunds($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['ledger'] = $this->db->query('SELECT * FROM tb_fin_head ORDER BY id ASC')->result();	
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/subfunds_search_view',$data);
		// $led['ledger']=$this->db->query("SELECT * FROM tb_fin_head ORDER BY id ASC")->result_array();
		// $this->load->view('templates/header');
		// $this->load->view('finance/subfunds',$led);
		// $this->load->view('templates/footer');	
	}
	public function SubfundsDetails()
	{
	 $d1 = strtotime($this->input->post('txtFormdate'));
	 $d2 = strtotime($this->input->post('txtToDate'));
	 $d11 = date('Y-m-d',$d1);
	 $d22 = date('Y-m-d',$d2);
	 $fee_id = $this->input->post('ddlFunds');
		//echo $s = "SELECT * FROM td_fee_collection WHERE col_date BETWEEN '".$d11."' AND '".$d22."' AND type='Credit'";die;
		$fee['sub_data']=$this->db->query("SELECT * FROM td_fee_subfunds WHERE sub_date BETWEEN '".$d11."' AND '".$d22."' and `fee_head_id`='".$fee_id."' ORDER BY subf_id ASC")->result_array();
		$fee['sumval']=$this->db->query("select sum(amount) as amount from `td_fee_subfunds` WHERE  `sub_date` between '".$d11."' and '".$d22."' and `fee_head_id`='".$fee_id."'")->result_array();
		$fee['date1'] = $d11;
		$fee['date2'] = $d22;
		$this->load->view('finance/sub_fund_report',$fee);	
	}
	
	//////////////////////////////////Subfund//////////////////////////////////////
	
	//////////////////////////////////Manage Bank//////////////////////////////////////
	public function bank(){
		$this->load->view('finance/bank');	
	}
	public function add_bank_dtl(){
		
		$bank=$this->input->post('bank');
		$note=$this->input->post('note');
		$opng_bal=$this->input->post('op_bal');

		$fields = array(
			'bank_name' => $bank,
			'note' => $note,
			'open_bal' => $opng_bal,
			'closing_bal' => $opng_bal,
		);
		$add = $this->base_model->form_post('td_fin_bank',$fields);

	   echo "<script>window.close();</script>";
	}
	public function Add_bank($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['students'] = $this->db->query('select * from td_fin_bank_accounts')->result_array();	
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/manage_bank',$data);
	}
		public function add_bank_account(){
		$depid = $this->input->post('dep_id');
		$actid = $this->input->post('act_id');
		$uid = $this->input->post('usr_id');
		$bank=$this->input->post('bank');
		$name=$this->input->post('name');
		$ifsc=$this->input->post('ifsc');
		$branch=$this->input->post('branch');
		$address=$this->input->post('address');
		$note=$this->input->post('note');
		$dep_amount=$this->input->post('amount');
		$dep_type=$this->input->post('dep_type');
		$chkcnt = $this->db->query('select * from td_fin_bank_accounts WHERE bank_id="'.$bank.'"')->num_rows();
		if($chkcnt == 0){
		$fields = array(
			'bank_id' => $bank,
			'acc_no' => $name,
			'bank_branch' => $branch,
			'bank_address' => $address,
			'bank_ifsc' => $ifsc
		);
		//print_r($fields);
		$add_fee2 = $this->base_model->form_post('td_fin_bank_accounts',$fields);
		}
		$bdata = $this->db->query('select * from td_fin_bank_deposits WHERE bank_id="'.$bank.'"')->result_array();
		if($dep_type == 'Credit'){
		$open_bal = $bdata[0]['closing_bal']+$dep_amount;
		} else {
		$open_bal = $bdata[0]['closing_bal']-$dep_amount;
		}
		$fields2 = array(
			'bank_id' => $bank,
			'note' => $note,
			'dep_amount' => $dep_amount,
			'dep_type' => $dep_type,
			'dep_date' => date('Y-m-d'),
			'closing_bal' => $open_bal
		);
		$add_fee22 = $this->base_model->form_post('td_fin_bank_deposits',$fields2);

		$this->session->set_flashdata('msg','Added Successfully');
		redirect(base_url().'index.php/finance/FinanceDetails/Add_bank/'.$depid .'/'.$actid.'/'.$uid);
	}
	public function EditBank($id,$depId,$actId,$uId,$fid){
	//echo 'SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid;die;
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid)->num_rows();
			if($checkExist > 0 ){
			$data['editdata'] = $this->base_model->show_data('td_fin_bank_accounts','*','acc_id="'.$id.'"')->result_array();
			$data['msg']='YES';
			}
			else {
				$data['msg']='NO';
			}
		    $this->load->view('finance/edit_bank',$data);
	}
	public function delete_bank_account($id){
		$category['editdata'] = $this->db->query('delete from td_fin_bank_accounts where acc_id="'.$id.'"');
		redirect(base_url().'index.php/finance/fee_details/manage_bank');;
	}
	public function up_bank_account(){
		
		$id=$this->input->post('id');
		$bank=$this->input->post('bank');
		$name=$this->input->post('name');
		$ifsc=$this->input->post('ifsc');
		$address=$this->input->post('address');
		$branch=$this->input->post('branch');
		$note=$this->input->post('note');
		
		$fields = array(
			'bank_id' => $bank,
			'acc_no' => $name,
			'bank_branch' => $branch,
			'bank_address' => $address,
			'bank_ifsc' => $ifsc,
			'note' => $note,
		);
		$service = $this->base_model->db_update('td_fin_bank_accounts',$fields,'acc_id',$id);
		$this->session->set_flashdata('msg','Updated Successfully');
		redirect(base_url().'index.php/finance/fee_details/manage_bank');
	}
	//////////////////////////////////Manage Bank//////////////////////////////////////
	
	//////////////////////////////////Manage Income / Expense//////////////////////////////////////
	public function manage_income22(){
		$category['data'] = $this->db->query('select * from tb_fin_head where type="Income"')->result();
		$this->load->view('templates/header');
		$this->load->view('finance/manage_income',$category);
		$this->load->view('templates/footer');	
	}
	public function manage_expense($depId,$actId,$uId){
	//echo 'SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid;die;
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			$data['data'] = $this->db->query('select * from tb_fin_head where type="Expense" order by name asc')->result();
			$data['data_bank'] = $this->db->query('select * from td_fin_bank_accounts order by bank_id')->result();
			$data['data_bank2'] = $this->db->query('select * from td_fin_bank_accounts order by bank_id')->result();
			$data['data_fin'] = $this->db->query('select * from td_fee_collection JOIN td_fee_subfunds ON td_fee_collection.fee_id=td_fee_subfunds.fee_id JOIN tb_fin_head ON tb_fin_head.id=td_fee_subfunds.fee_head_id WHERE td_fee_collection.type="Debit" order by td_fee_collection.fee_id desc')->result_array();

			$data['msg']='YES';
			}
			else {
			$data['msg']='NO';
			}				
		$this->load->view('finance/manage_expenses',$data);	
	}
	public function print_voucher($id){
		$category['data_fin'] = $this->db->query('select * from td_fee_collection JOIN td_fee_subfunds ON td_fee_collection.fee_id=td_fee_subfunds.fee_id JOIN tb_fin_head ON tb_fin_head.id=td_fee_subfunds.fee_head_id where td_fee_collection.fee_id='.$id.' order by col_date desc')->row();
		if($category['data_fin']->from_bank!=0)
				{
		$category['data_bank']=$this->db->query('select * from td_fin_bank_accounts JOIN td_fin_bank ON td_fin_bank_accounts.bank_id=td_fin_bank.bank_id Where td_fin_bank_accounts.bank_id="'.$category['data_fin']->from_bank.'"')->row();
				}
				else{$category['data_bank']='';}
				//echo 'SELECT * FROM td_fee_collection WHERE fee_id='.$id;die;exit;
		$bank_id = $this->db->query('SELECT * FROM td_fee_collection WHERE fee_id='.$id)->result_array();
		$category['sel_bank']=$this->db->query('select * from td_fin_bank_accounts JOIN td_fin_bank ON td_fin_bank_accounts.bank_id=td_fin_bank.bank_id Where td_fin_bank_accounts.acc_id="'.$bank_id[0]['bank_dtl'].'"')->result_array();
		//echo 'select * from td_fin_bank_accounts JOIN td_fin_bank ON td_fin_bank_accounts.bank_id=td_fin_bank.bank_id Where td_fin_bank_accounts.acc_id="'.$bank_id[0]['bank_dtl'].'"';die;exit;		
		$this->load->view('finance/debit_voucher',$category);	
	}
	public function HeadAjax()
	{
		if(isset($_POST['type']))
		{
			$this->output
				->set_content_type("application/json")
				->set_output(json_encode($this->db->query('select * from tb_fin_head where type="'.$_POST['type'].'"')->result_array()));
		}

	}
	public function add_income(){
		
		$fee_type='Credit';
		$amount=$this->input->post('amount');
		$to_head=$this->input->post('head');
		$note=$this->input->post('note');
		$date=$this->input->post('date');
		
		$fetch=$this->db->query('select * from tb_fin_head where id="'.$to_head.'"')->row();
		$particular=$fetch->name." ".$this->input->post('particular');
		
		$exp = explode('-', $date);
		$fields1 = array(
			'adm_date' => 'N/A',
			'col_date' => $date,
			'1st_year' => 'N',
			'2nd_year' => 'N',
			'3rd_year' => 'N',
			'amount' => $amount,
			'particular' => $particular,
			'type' => $fee_type,
			'bank' => $amount,
			'cash' => 0,
			'note' => $note,
		);

		$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
		
		$last_fee_id = $this->db->insert_id();
		
		$cb_no='CB'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$lf_no='LF'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$this->db->query('Update td_fee_collection set cb_no="'.$cb_no.'",lf_no="'.$lf_no.'" where fee_id='.$last_fee_id);
		

		$fields2 = array(
			'fee_id' => $last_fee_id,
			'fee_head_id' => $to_head,
			'amount' => $amount,
			'sub_date' => $date,
			'type' => $fee_type,
		);
		$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);

		$this->session->set_flashdata('msg','Added Successfully');
		redirect(base_url().'index.php/finance/fee_details/manage_income');
	}
		public function add_expense($depId,$actId,$uId){
	//echo 'SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId.' AND function_id='.$fid;die;
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			$type=$this->input->post('type');
		$exp_type=$this->input->post('exp_typ');
	
		$fee_type='Debit';
		$amount=$this->input->post('amount');
		$contra=$this->input->post('cntra_val');
		$to_head=$this->input->post('head');
		$pay_to=$this->input->post('pyto');
		
		$note=$this->input->post('note');
		$date1=$this->input->post('date');
		$date=date('Y-m-d',strtotime($date1));
		if($type == 'Cash'){
		$from_bank='0';
		$to_bank='0';
		$cheque_no='NA';
		$cheque_date='NA';
		$fetch=$this->db->query('select * from tb_fin_head where id="'.$to_head.'"')->row();
		$particular=$fetch->name." ".$this->input->post('particular');
		$particular2=$fetch->name." ".$this->input->post('particular');
		} else {
		$from_bank=$this->input->post('bank');
		$to_bank=$this->input->post('bank2');
		$cheque_no=$this->input->post('cheque');
		$cheque_date=$this->input->post('c_date');
		$fetch=$this->db->query('select * from tb_fin_head where id="'.$to_head.'"')->row();
		$data_bank=$this->db->query('select * from td_fin_bank_accounts Where acc_id="'.$from_bank.'"')->row();
		if($exp_type != 'normal'){
		$data_bank2=$this->db->query('select * from td_fin_bank_accounts Where acc_id="'.$to_bank.'"')->row();
		$particular2=$fetch->name." ".$this->input->post('particular')." Cheque No-".$cheque_no." transfered to ".$data_bank2->bank_id."(".$data_bank2->acc_no.")";
		}
		else {
		$particular2 = 'NA';
		}
		
		$particular=$fetch->name." ".$this->input->post('particular')." ".$data_bank->bank_id."(".$data_bank->acc_no.")" ." Cheque No-".$cheque_no;
		
		}
		
		
		if($type=='Cash'){$cash=$amount;$bank=0;}else{$bank=$amount;$cash=0;}
		
		$exp = explode('-', $date);
		if($exp_type == 'normal' || $exp_type == 'contaentry'){
		$fields1 = array(
			'adm_date' => 'N/A',
			'col_date' => $date,
			'1st_year' => 'N',
			'2nd_year' => 'N',
			'3rd_year' => 'N',
			'amount' => $amount,
			'particular' => $particular,
			'type' => $fee_type,
			'bank' => $bank,
			'cash' => $cash,
			'cheque_no' => $cheque_no,
			'cheque_date' => $cheque_date,
			'note' => $note,
			'contra' => $contra,
			'voucher_type' => $type,
			'pay_to' => $pay_to,
			'bank_dtl' => $from_bank,
			'to_bank' => $exp_type,
		);
		$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
		$last_fee_id = $this->db->insert_id();
		$cb_no='CB'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$lf_no='LF'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$this->db->query('Update td_fee_collection set cb_no="'.$cb_no.'",lf_no="'.$lf_no.'" where fee_id='.$last_fee_id);

		$fields2 = array(
			'fee_id' => $last_fee_id,
			'fee_head_id' => $to_head,
			'amount' => $amount,
			'sub_date' => $date,
			'type' => 'Debit',
			'from_bank' => $from_bank,
		);
		$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);
		} else {
		$fields1 = array(
			'adm_date' => 'N/A',
			'col_date' => $date,
			'1st_year' => 'N',
			'2nd_year' => 'N',
			'3rd_year' => 'N',
			'amount' => $amount,
			'particular' => $particular,
			'type' => 'Debit',
			'bank' => $bank,
			'cash' => $cash,
			'cheque_no' => $cheque_no,
			'cheque_date' => $cheque_date,
			'note' => $note,
			'contra' => $contra,
			'voucher_type' => $type,
			'pay_to' => $pay_to,
			'bank_dtl' => $from_bank,
			'to_bank' => $exp_type,
		);
		$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
		$last_fee_id = $this->db->insert_id();
		$cb_no='CB'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$lf_no='LF'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$this->db->query('Update td_fee_collection set cb_no="'.$cb_no.'",lf_no="'.$lf_no.'" where fee_id='.$last_fee_id);

		$fields2 = array(
			'fee_id' => $last_fee_id,
			'fee_head_id' => $to_head,
			'amount' => $amount,
			'sub_date' => $date,
			'type' => 'Debit',
			'from_bank' => $from_bank,
		);
		$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);
		$fields1 = array(
			'adm_date' => 'N/A',
			'col_date' => $date,
			'1st_year' => 'N',
			'2nd_year' => 'N',
			'3rd_year' => 'N',
			'amount' => $amount,
			'particular' => $particular2,
			'type' => 'Credit',
			'bank' => $bank,
			'cash' => $cash,
			'cheque_no' => $cheque_no,
			'cheque_date' => $cheque_date,
			'note' => $note,
			'contra' => $contra,
			'voucher_type' => $type,
			'pay_to' => $pay_to,
			'bank_dtl' => $to_bank,
			'to_bank' => $exp_type,
		);
		$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
		$last_fee_id = $this->db->insert_id();
		$cb_no='CB'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$lf_no='LF'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$this->db->query('Update td_fee_collection set cb_no="'.$cb_no.'",lf_no="'.$lf_no.'" where fee_id='.$last_fee_id);

		$fields2 = array(
			'fee_id' => $last_fee_id,
			'fee_head_id' => $to_head,
			'amount' => $amount,
			'sub_date' => $date,
			'type' => 'Credit',
			'from_bank' => $to_bank,
		);
		$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);
		}
		
			$data['msg']='YES';
			}
			else {
				$data['msg']='NO';
			}
		redirect(base_url().'finance/FinanceDetails/print_voucher/'.$last_fee_id);
	}
	
	public function search_expense_barcode($depId,$actId,$uId){
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){	
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		// $this->load->view('templates/header');
		$this->load->view('finance/search_expense_barcode',$data);
		// $this->load->view('templates/footer');
	}
	public function expense_details(){
			if($this->input->post('txt_id'))
				{
				$id=$this->input->post('txt_id');
				}
				else{
				$id=$this->input->post('txt_vid');
				}
			$query = $this->db->query('select * from td_fee_collection JOIN td_fee_subfunds ON td_fee_collection.fee_id=td_fee_subfunds.fee_id JOIN tb_fin_head ON tb_fin_head.id=td_fee_subfunds.fee_head_id JOIN td_fin_bank_accounts where td_fee_collection.fee_id='.$id.' order by col_date desc');	
	
			$count=$query->num_rows();
			if($count>0)
			{
			$category['data_fin'] = $query->row();
						if($category['data_fin']->from_bank!=0)
							{
					$category['data_bank']=$this->db->query('select * from td_fin_bank_accounts JOIN td_fin_bank ON td_fin_bank_accounts.bank_id=td_fin_bank.bank_id Where td_fin_bank_accounts.acc_id="'.$category['data_fin']->from_bank.'"')->row();
							}
							else{
								$category['data_bank']='';
							}
			$category['idforbarcode']=$id;
			
			// $this->load->view('templates/header');
			$this->load->view('finance/expense_details',$category);
			// $this->load->view('templates/footer');
			}
			else
			{
			$category['msg'] = 'Sorry No Data Found';	
			$this->load->view('templates/header');
			$this->load->view(base_url().'finance/search_expense_barcode',$category);	
			$this->load->view('templates/footer');
			}
	}
	public function verify_expense($id)
	{
		$fee_id = $id;
		$fields = array(
			'verify' => 1,

		);
		$service = $this->base_model->db_update('td_fee_collection',$fields,'fee_id',$fee_id);
		$service_sub = $this->base_model->db_update('td_fee_subfunds',$fields,'fee_id',$fee_id);
		if($service)
		{
		$category['msg'] = 'Successfully Verified';
		$this->load->view('templates/header');
		$this->load->view('finance/search_expense_barcode',$category);
		$this->load->view('templates/footer');
		}
		else {
			$category['msg'] = 'Sorry ! Not successfully Verified';
			$this->load->view('templates/header');
			$this->load->view('finance/search_expense_barcode',$category);
			$this->load->view('templates/footer');
					}	
	}
	//////////////////////////////////Manage Income / Expense//////////////////////////////////////
	
	//////////////////////////////////Library Fine//////////////////////////////////////
	public function library_fine()
	{
	$res['setting']=$this->db->query('select * from tb_library_setting')->row();
	
	$res['default_log']=$this->db->query('select tb_library_issue_book.*,tb_library_books.title from tb_library_issue_book JOIN tb_library_books ON tb_library_issue_book.acc_no = tb_library_books.acc_no where due_date<"'.date('Y-m-d').'"')->result();
			$this->load->view('templates/header');
			$this->load->view('finance/fine',$res);
			$this->load->view('templates/footer');
	}
	
	function search_fine_id() {	

				$from = $this->input->post('from');				
				$to = $this->input->post('to');
				$res['setting']=$this->db->query('select * from tb_library_setting')->row();
	
	$res['search_fine']=$this->db->query('select tb_library_issue_book.*,tb_library_books.title from tb_library_issue_book JOIN tb_library_books ON tb_library_issue_book.acc_no = tb_library_books.acc_no where due_date<"'.date('Y-m-d').'" and due_date BETWEEN "'.$from.'" and "'.$to.'"')->result();
				//echo '<pre>';print_r($data['search_book']);die;
				
				$this->load->view('templates/header',$res);
				$this->load->view('finance/fine', $res);
				$this->load->view('templates/footer');

			}
	//////////////////////////////////Library Fine//////////////////////////////////////
public function IncomeAccess($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['fee'] = $this->db->query('select * from tb_fin_head WHERE type="Income"')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/fee_income_access',$data);	
	}
public function allow_access($id,$tpy,$depId,$actId,$uId){
		//echo $id.'/'.$tpy.'/'.$depId.'/'.$actId.'/'.$uId;die;exit;
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$ids = base64_decode(urldecode($id));
		$expid = explode('=',$ids);
		$exp = explode('%2C',$expid[0]);
		$imp = implode(',',$expid);
	if($tpy == 'acc'){	
	$data['profile'] = $this->db->query('UPDATE tb_fin_head SET access=1 WHERE id IN ('.$imp.')');
	} else {
	$data['profile'] = $this->db->query('UPDATE tb_fin_head SET access=0 WHERE id IN ('.$imp.')');
	}

		$data['fee'] = $this->db->query('select * from tb_fin_head WHERE type="Income"')->result_array();
		$data['msg']='YES';
		}
		else {
			echo '<script>alert("You are Not Allowed To Directly Operate This Function")</script>';
			$data['msg']='NO';
		}
		redirect(base_url().'Finance/FinanceDetails/IncomeAccess/'.$depId.'/'.$actId.'/'.$uId);
	//$this->load->view('finance/fee_income_access',$data);
		}
	
	public function Manage_income($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$data['fee'] = $this->db->query('select * from tb_fin_head where access=1')->result_array();
		$data['stream'] = $this->db->query('select * from td_student_stream order by stream_id asc')->result_array();
		$data['sub_grp'] = $this->db->query('select * from td_subject_group order by grp_id asc')->result_array();
		$data['session'] = $this->db->query('select * from td_student_session order by sid asc')->result_array();
		$data['msg']='YES';
		}
		else {
			$data['msg']='NO';
		}
		$this->load->view('finance/add_income_student',$data);
	}
	public function add_student_income($depId,$actId,$uId){
	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
		$fee_type='Credit';
	
	$date = $this->input->post('coldate');
	$typ = $this->input->post('itype');
	$purpose = $this->input->post('bank');
	if($typ == 'stud_type'){
	$stud_id=$this->input->post('student_id');
	$sdata = $this->db->query('SELECT * FROM td_student_details WHERE student_id="'.$stud_id.'"')->result_array();
	$stdnt_id = $sdata[0]['stud_id'];
	$stream=$this->input->post('txt_stream');
	$sub_grp=$this->input->post('txt_sub_grp');
	$session=$this->input->post('txt_session');
	$year=$this->input->post('txt_year');
	$part = $purpose.'-'.$sdata[0]['student_id'].'-'.$sdata[0]['name'];
	if($year == 1){
	$fst = 'Y';
	$snd = 'N';
	$trd = 'N';
	} elseif($year == 2){
	$fst = 'N';
	$snd = 'Y';
	$trd = 'N';
	}else{
	$fst = 'N';
	$snd = 'N';
	$trd = 'Y';
	}
	} else {
	$stdnt_id=0;
	$stream=0;
	$sub_grp=0;
	$session=0;
	$year=0;
	$fst = 'N';
	$snd = 'N';
	$trd = 'N';
	$part = $purpose;
	}
		$fee_id=$this->input->post('heads');
		$amount=$this->input->post('typorval');
		$totamt = array_sum($amount);
		$cntIds = count($fee_id)-1;
		$exp = explode('-', $date);
		
		$particular=$part;
		
		$exp = explode('-', $date);
		$fields1 = array(
		'stud_id' => $stdnt_id,
			'sub_grp_id' => $sub_grp,
			'stream' => $stream,
			'year' => $year,
			'session' => $session,
			'adm_date' => 'N/A',
			'col_date' => $date,
			'1st_year' => $fst,
			'2nd_year' => $snd,
			'3rd_year' => $trd,
			'amount' => $totamt,
			'particular' => $particular,
			'type' => $fee_type,
			'bank' => $totamt,
			'cash' => $totamt,
			'note' => $particular,
		);

		$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
		
		$last_fee_id = $this->db->insert_id();
		
		$cb_no='CB'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$lf_no='LF'.$last_fee_id.$exp[0].$exp[1].$exp[2];
		$this->db->query('Update td_fee_collection set cb_no="'.$cb_no.'",lf_no="'.$lf_no.'" where fee_id='.$last_fee_id);
		for($i=0;$i<=$cntIds;$i++){
		$fetch=$this->db->query('select * from tb_fin_head where id="'.$fee_id[$i].'"')->result_array();
		$cash = $amount[$i];
		$bank = $amount[$i];
		$fields2 = array(
			'fee_id' => $last_fee_id,
			'fee_head_id' => $fee_id[$i],
			'amount' => $amount[$i],
			'sub_date' => $date,
			'type' => $fee_type,
		);
		$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);
}
		if($add_fee2){
		redirect(base_url().'finance/FinanceDetails/Manage_income/'.$depId.'/'.$actId.'/'.$uId);
		}
		$this->session->set_flashdata('msg','Added Successfully');
		$data['msg']='YES';
		}
		else {
			echo '<script>alert("You are not Allowed To Operate This Function")</script>';
			$data['msg']='NO';
			redirect(base_url().'finance/FinanceDetails/Manage_income/'.$depId.'/'.$actId.'/'.$uId);
		}
	
		
	}
	
	public function DepositDetails($id){
		$category['feeBank'] = $this->db->query('select * from td_fin_bank where bank_id='.$id)->result_array();
		$category['fee'] = $this->db->query('select * from td_fin_bank_deposits where bank_id='.$id)->result_array();
		$this->load->view('templates/header');
		$this->load->view('finance/deposit_details',$category);
		$this->load->view('templates/footer');	
	}
	public function get_bank_detail(){
	$bid = $this->input->post('b_id');
	$bankdatacount = $this->base_model->show_data('td_fin_bank_accounts','*','bank_id="'.$bid.'"')->num_rows();
	if($bankdatacount > 0){
		$bankdata = $this->base_model->show_data('td_fin_bank_accounts','*','bank_id="'.$bid.'"')->result_array();
		echo $bankdata[0]['acc_no'].'-'.$bankdata[0]['bank_branch'].'-'.$bankdata[0]['bank_address'].'-'.$bankdata[0]['bank_ifsc'];
		} else {
		echo '0-0-0-0';
		}
	}

	// This Functuion For Get Bank Details By Bank Name
	public function getBankDetails()
	{
		$txtBankName=$this->input->post('bank_name');
		$this->db->where('bank_id', $txtBankName);		
		$query=$this->db->get('td_fin_bank_accounts');
		if($query->num_rows()>0)
		{
			$data=$query->result_array();
		echo $data[0]['acc_no']."-".$data[0]['bank_branch']."-".$data[0]['bank_address']."-".$data[0]['bank_ifsc'];
		}
		else{
			echo "NA-NA-NA-NA";
		}	
	}

	// This function for Fee Details 
	public function Fee_details($depId,$actId,$uId)
	{
		// This For Check Access For User
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
			$data=array(
				'msg' => 'YES',
				'stream' => $this->base_model->studentStream(),
				'fee_heads' => $this->base_model->get_fee_head()
			);
		}
		else{
			$data['msg']='No';
		}
		$this->load->view('finance/fee_details_add_view', $data, FALSE);
		
	}

	// This Function for get_subject_by_stream
	public function get_subject_by_stream()
	{
		$ddlStream=$this->input->post('stream_id');
		echo "<option value='' selected hidden>---Select Subject---</option>";
		foreach ($this->base_model->subject_by_stream($ddlStream) as $list) {
			echo "<option value='".$list->grp_id."'>".$list->subject_1_code."</option>";
		}

	}

	// This Function For Add Finance Details
	public function add_finance_details()
	{
		// Get All Post Value Here
		$ddlStream=$this->input->post('ddlStream');
		$ddlSubject=$this->input->post('ddlSubject');
		$ddlFeeType=$this->input->post('ddlFeeType');
		$ddlYear=$this->input->post('ddlYear');
		$heads=$this->input->post('heads');
		$txtAmt=$this->input->post('txtAmt');
		$dep_id=$this->input->post('dep_id');
		$act_id=$this->input->post('act_id');
		$usr_id=$this->input->post('usr_id');

		// If this code is work then it was write by saikat , if not then don't know who was write
		
		for($i=0;$i<count($heads);$i++){
			$object=array(
				'subj_grp_id' => $ddlSubject,
				'stream_id' => $ddlStream,
				'year' => $ddlYear,
				'fin_head_id' => $heads[$i],
				'amount' => $txtAmt[$i],
				'fee_type' => $ddlFeeType
			);

			$this->base_model->form_post('tb_fin_fee',$object);
		}

		// set flash data here
		$this->session->set_flashdata('msg', 'Data inserted successfully');

		$url="Finance/FinanceDetails/Fee_details/".$dep_id."/".$act_id."/".$usr_id;
		redirect($url,'refresh');
	}

	// This Fuction For View Fee Details Amount 
	public function ViewFeeDetails($depId,$actId,$uId)
	{
		$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		if($checkExist > 0 ){
			$data=array(
				'msg' => 'YES',
				'fee_data' => $this->base_model->fee_data()
			);
			// echo $this->db->last_query();
			// die;
		}
		else{
			$data['msg']='No';
		}
		$this->load->view('finance/feedetails_listing_view', $data);
	}

	// this function for get fees list with amount
	public function fin_fee_details()
	{
		$fee_type=$this->input->post('fee_type');
		$year=$this->input->post('year');
		$result=$this->base_model->get_amount_details($fee_type,$year);
		// sleep(5);
		echo "<div class='col-md-6'><strong>Fee Name<br/></strong></div>
		<div class='col-md-6'><strong>Amount<br/></strong></div><hr/>";
		// sleep(5)		
		foreach($result as $list){
			echo "
				<div class='col-md-6'>".$list->name."</div>
				<div class='col-md-6'>".number_format($list->amount,2)."</div>
			";
		}
	}

	// This Function For Barcode
	public function show_barcode($id) {
		$new_barcode = $id;
		$this->set_barcode($new_barcode);
	}
	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		//Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
		$barcodeOptions = array(
    		'text' => $code, 
    		'barHeight'=> 20, 
    		'factor'=>1,
		);
		$rendererOptions = array();
		$renderer = Zend_Barcode::factory(
			'code128', 'image', $barcodeOptions, $rendererOptions
		)->render();
	}
}
