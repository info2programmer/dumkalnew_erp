<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class libraryDetails extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username')==''){

			redirect('login');
		}
	}


	// public function subjectGrp($depId,$actId,$uId)
	// {
	// 	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
	// 	if($checkExist > 0 ){
	// 	$data['subject'] = $this->base_model->show_data('td_subject_group','*','')->result_array();

	// 	$data['stream'] = $this->base_model->show_data('td_student_stream','*','')->result_array();
	// 	$data['msg']='YES';
	// 	}
	// 	else {
	// 		$data['msg']='NO';
	// 	}
	// 	$this->load->view('subject-group',$data);
	// }

	// This Function for Add New Library Books
	public function addBooks($depId,$actId,$uId)
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('acc_no', 'Accession No', 'required');
			$this->form_validation->set_rules('title', 'Title', 'required');
			if ($this->form_validation->run() == FALSE) {} 
				else {
					$sl_no=$this->db->query('SELECT MAX(sl_no) as sl FROM tb_library_books')->result_array();

					$acc_no=$this->input->post('acc_no'); 
					$copy=$this->input->post('copy'); 
					for($i=1;$i<=$copy;$i++)
					{
						$data = array(
							'sl_no' => $sl_no[0]['sl']+1,
							'acc_no' => $acc_no,
							'classification_no' => $this->input->post('classification_no'),
							'subject1' => $this->input->post('subject1'),
							'subject2' => $this->input->post('subject2'),
							'subject3' => $this->input->post('subject3'),
							'subject4' => $this->input->post('subject4'),
							'title' => $this->input->post('title'),
							'edition' => $this->input->post('edition'),
							'editor' => $this->input->post('editor'),
							'editor_by' => $this->input->post('editor_by'),
							'author1' => $this->input->post('author1'),
							'author2' => $this->input->post('author2'),
							'author3' => $this->input->post('author3'),
							'auth_conf' => $this->input->post('auth_conf'),
							'auth_assc' => $this->input->post('auth_assc'),
							'place_of_publication' => $this->input->post('place_of_publication'),
							'author_mark' => $this->input->post('author_mark'),
							'series' => $this->input->post('series'),
							'bibliographic_note' => $this->input->post('bibliographic_note'),
							'note' => $this->input->post('note'),
							'publisher' => $this->input->post('publisher'),
							'date_of_publish' => $this->input->post('date_of_publish'),
							'price' => $this->input->post('price'),
							'suppliers' => $this->input->post('suppliers'),
							'call_no' => $this->input->post('classification_no')." ".$this->input->post('author_mark')." ".$acc_no,
							'cover_img' => '',
							'is_reserved' => 0,
							'fine_amount' => '',
							'date' => date("Y/m/d H:i:s"),
							'isbn_no' => $this->input->post('isbn_no'),
							'volume' => $this->input->post('volume'),
							'page_no' => $this->input->post('page_no'),
							'bound' => $this->input->post('bound'),
							'fund_type' => $this->input->post('fund_type'),
							'type' => $this->input->post('type'),
							'book_condition' => $this->input->post('book_condition'),
							'description' => $this->input->post('description'),
							'additional' => $this->input->post('additional'),
							'location' => $this->input->post('location')
						);
						$this->base_model->form_post('tb_library_books',$data);
					}
					$this->session->set_flashdata('message', 'Data Inserted Successfully.'); 
					$url=$this->input->post('action');
				// echo $this->db->last_query();
				// die;
					redirect($url,'refresh');
				}
			}

		// Check User Accsessibility
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES',
					'new_acc_no' => $res[0]['acc_no']+1
				);
			}
			else{
				$data['msg']='No';
			}
			$this->load->view('library/add_book_view',$data);
		}

	// This Function For Show Bercode
		function show_barcode() {
			$new_barcode = $this->uri->segment(4);
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

	// This Function Save Library Books
	// public function save_librery_books($value='')
	// {
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
 //   		$this->form_validation->set_rules('acc_no', 'Accession No', 'required');
 //   		$this->form_validation->set_rules('title', 'Title', 'required');
 //   		if ($this->form_validation->run() == FALSE) {
 //   			redirect('','refresh')
 //   		} 
	// }


	// This function for auto-complete textbox
		public function title()
		{
			$q = strtolower($_REQUEST["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT title from tb_library_books where title LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$title = $rs->title;
				echo "$title\",\"";
			}
			echo '"]';
		}

		public function author1()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT author1 from tb_library_books where author1 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$author1 = $rs->author1;
				echo "$author1\",\"";
			}
			echo '"]';
		}
		public function author2()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT author2 from tb_library_books where author2 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$author2 = $rs->author2;
				echo "$author2\",\"";
			}
			echo '"]';			
		}
		public function author3()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT author3 from tb_library_books where author3 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$author3 = $rs->author3;
				echo "$author3\",\"";
			}
			echo '"]';
		}
		public function auth_conf()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT auth_conf from tb_library_books where auth_conf LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$auth_conf = $rs->auth_conf;
				echo "$auth_conf\",\"";
			}
			echo '"]';
		}
		public function auth_assc()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT auth_assc from tb_library_books where auth_assc LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$auth_assc = $rs->auth_assc;
				echo "$auth_assc\",\"";
			}
			echo '"]';
		}
		public function publisher()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT publisher from tb_library_books where publisher LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$publisher = $rs->publisher;
				echo "$publisher\",\"";
			}
			echo '"]';
		}
		public function place_of_publication()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT place_of_publication from tb_library_books where place_of_publication LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$place_of_publication = $rs->place_of_publication;
				echo "$place_of_publication\",\"";
			}
			echo '"]';
		}
		public function subject1()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT subject1 from tb_library_books where subject1 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$subject1 = $rs->subject1;
				echo "$subject1\",\"";
			}
			echo '"]';
		}
		public function subject2()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT subject2 from tb_library_books where subject2 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$subject2 = $rs->subject2;
				echo "$subject2\",\"";
			}
			echo '"]';
		}
		public function subject3()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT subject3 from tb_library_books where subject3 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$subject3 = $rs->subject3;
				echo "$subject3\",\"";
			}
			echo '"]';
		}
		public function subject4()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT subject4 from tb_library_books where subject4 LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$subject4 = $rs->subject4;
				echo "$subject4\",\"";
			}
			echo '"]';
		}
		public function suppliers()
		{
			$q = strtolower($_GET["term"]);
			if (!$q) return;	
			$sql = "select DISTINCT suppliers from tb_library_books where suppliers LIKE '%$q%'";
			$query = $this->db->query($sql);
			echo '["';
			foreach($query->result() as $rs) {
				$suppliers = $rs->suppliers;
				echo "$suppliers\",\"";
			}
			echo '"]';
		}


	// This Function For Book Listing view
		public function viewBooks($depId,$actId,$uId)
		{
			$data=array(
				'msg' => 'YES' 
			);
		$this->load->view('library/book_listing_view', $data);
		}

	// This Function For Library Book Edit
		function edit_book($id,$depId,$actId,$uId) {
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
				$data=array(
					'msg' => 'YES',
					'single_book' => $this->common_model->library_book_by_id($id),
					'edit_id' => $id
				);
			}
			else{
				$data['msg']='No';
			}			

			$this->load->view('library/book_view',$data);
		}


	// This Function To Update Book By Book ID
		public function update_book_id()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('acc_no', 'Accession No', 'required');
			$this->form_validation->set_rules('title', 'Title', 'required');
			if ($this->form_validation->run() == FALSE) {} 
				$id= $this->input->post('id');  
			$data = array(
				'classification_no' => $this->input->post('classification_no'),
				'subject1' => $this->input->post('subject1'),
				'subject2' => $this->input->post('subject2'),
				'subject3' => $this->input->post('subject3'),
				'subject4' => $this->input->post('subject4'),
				'title' => $this->input->post('title'),
				'edition' => $this->input->post('edition'),
				'editor' => $this->input->post('editor'),
				'editor_by' => $this->input->post('editor_by'),
				'author1' => $this->input->post('author1'),
				'author2' => $this->input->post('author2'),
				'author3' => $this->input->post('author3'),
				'auth_conf' => $this->input->post('auth_conf'),
				'auth_assc' => $this->input->post('auth_assc'),
				'place_of_publication' => $this->input->post('place_of_publication'),
				'author_mark' => $this->input->post('author_mark'),
				'series' => $this->input->post('series'),
				'bibliographic_note' => $this->input->post('bibliographic_note'),
				'note' => $this->input->post('note'),
				'publisher' => $this->input->post('publisher'),
				'date_of_publish' => $this->input->post('date_of_publish'),
				'price' => $this->input->post('price'),
				'suppliers' => $this->input->post('suppliers'),
				'call_no' => $this->input->post('classification_no')." ".$this->input->post('author_mark')." ".$this->input->post('acc_no'),
				'isbn_no' => $this->input->post('isbn_no'),
				'volume' => $this->input->post('volume'),
				'page_no' => $this->input->post('page_no'),
				'bound' => $this->input->post('bound'),
				'fund_type' => $this->input->post('fund_type'),
				'type' => $this->input->post('type'),
				'book_condition' => $this->input->post('book_condition'),
				'description' => $this->input->post('description'),
				'additional' => $this->input->post('additional')
			);
			$this->common_model->update_book_by_id($id,$data);
			$this->session->set_flashdata('message', 'Data Updated Successfully.'); 
			$url="Library/LibraryDetails/edit_book/".$id;
			redirect($url, 'refresh');
		}

	// This Function For Copy Book By Book Id
		public function copy_book_id($book_id)
		{
			// Clean XSS here
			$id=$this->security->xss_clean($book_id);
			$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
			$data=array(
				'msg' => 'YES',
				'single_book' => $this->common_model->library_book_by_id($id),
				'new_acc_no' => $res[0]['acc_no']+1,
				'copy_id' => $id
			);

			$this->load->view('library/book_view',$data);
						
		}
	
		// This Function For Book Bercode Search And Print
		public function srchPrint($depId,$actId,$uId)
		{
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES',
					'new_acc_no' => $res[0]['acc_no']+1
				);
			}
			else{
				$data['msg']='No';
			}
			$this->load->view('library/book_barcode_generate_listing_view',$data);
		}

		// This Function For Print Barcode
		public function barcode()
		{
			// echo "Hye I Finally Here";
			$txtFrom=$this->input->post('txtFrom');
			$txtTo=$this->input->post('txtTo');

			$data=array(
				'barcode' => $this->common_model->search_by_book_sl($txtFrom,$txtTo)
			);
				// echo $this->db->last_query();
				// die;
			

			$this->load->view('library/barcode_list', $data);
		}

		// This Function For spine
		public function spine()
		{
			$txtFrom=$this->input->post('txtFrom');
			$txtTo=$this->input->post('txtTo');
			$data=array(
				'spine' => $this->common_model->search_by_book_sl($txtFrom,$txtTo)
			);
			$this->load->view('library/spine_list', $data);	
		}

		// this Function For Search Stock
		public function searchstock($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=="submit")
			{
				$txtFrom=$this->input->post('txtFrom');
				$txtTo=$this->input->post('txtTo');

				$data['search_book'] = $this->db->query('SELECT * FROM tb_library_books WHERE entry_datetime BETWEEN "'.$txtFrom.'" AND "'.$txtTo.'"')->result();
				$data['msg'] = 'YES';

				// echo $this->db->last_query();
				// die;
				$this->load->view('library/search_stock_listing_view',$data);
				
			}
			else{
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES',
					'new_acc_no' => $res[0]['acc_no']+1
				);
			}
			else{
				$data['msg']='No';
			}
			$this->load->view('library/search_stock_listing_view',$data);
			}
			
		}


		// This Function For Book Issue
		public function issue_book_id($type,$id)
		{
			$user_name=$this->session->userdata('username');
			if($type==1){$type='Normal Issue';}else{$type='Book Bank Issue';}
			$data['issue_book'] = $this->common_model->library_book_by_id($id);
			$data['type']=$type;
			$data['msg'] = "YES";
			$this->load->view('library/issue_book_view', $data);
		}

		// this Function For Library Books
		public function search_member_id()
		{		
			$id = $this->input->post('book_id');
			$key=$this->input->post('member_id');
			$data['msg']='YES';
		//Fetch Book data
		$data['issue_book'] = $this->common_model->library_book_by_id($id);
		if(strlen($key)>'6')
		{		
		   $type='S';
		}
		else
		{
		   $type='E';
		}
				//Fetch Member data
				$data['search_member'] = $this->booksissue_model->search_member($key,$type);
				if(!empty($data['search_member']))
				{
						//Fetch Settings data
						$data['result'] = $this->settings_model->std_result();
						//Count Issued Book 
						$data['record_count'] = $this->booksissue_model->record_count($key);
						//Issue Book 
							foreach($this->booksissue_model->search_member($key,$type) as $mem) {
								$name=$mem->name;
							}
							foreach($this->settings_model->std_result() as $result) {
								if($type=='S'){$limit=$result->to_student;}else{$limit=$result->to_teacher;}
								}
										
									  $chk_return = $this->db->query('select * from tb_library_issue_book where member_id="'.$key.'" and due_date<"'.date('Y-m-d').'" and type="S"')->num_rows();

									  if(($data['record_count']!=$limit)&&($chk_return==0)){
											 foreach($this->booksissue_model->issue_book_id($id) as $books) { 
											 
													$data = array(
													'acc_no' => $books->acc_no,
													'member_id' => $key,
													'member_name' => $name,
													'issue_date' => date('Y-m-d'),
													'due_date' => date('Y-m-d',strtotime("+".$result->no_days_student." day", strtotime(date('Y-m-d')))),
													'type' => $type,
													'issue_type' => $this->input->post('issue_type')
													);
													$dataup = array(
													'status' => 'Borrowed'
													);
									
														//Transfering data to Model
										$count_data=$this->db->query('select * from tb_library_issue_book where acc_no="'.$this->input->post('acc_no').'"')->num_rows();
														if($count_data==0)
														{ 
														$this->booksissue_model->upstatus($dataup,$books->acc_no);
														$this->booksissue_model->insertdata($data,$name,$key);
														}
														$this->session->set_flashdata('message', 'Book Issued to '.$name.' (ID No- '.$key.')'); 
														redirect('Library/LibraryDetails/booksearch', 'refresh');
											   }
										 } 
										else
										 {
										 
											 if($chk_return!=0){
											 $data['err'] = 'Sorry! '.$name.' (ID No- '.$key.') have not returned book. Collect fine first';
											 }
											 else
											 {
											 $data['err'] = 'Sorry! Maximum No Of Books Already Issued to'.$name.' (ID No- '.$key.')';
											 }
										
									//$this->session->set_flashdata('messageerr', 'Sorry! Maximum No Of Books Already Issued to'.$name.' (ID No- '.$key.')'); 
										$$data['issue_book'] = $this->common_model->library_book_by_id($id);
										$data['type'] = $this->input->post('issue_type');
										
										// $this->load->view('templates/header',$data);
										$this->load->view('library/issue_book_view', $data);
										// $this->load->view('templates/footer');		 
										 }
				}
				else
				{
					$data['issue_book'] = $this->common_model->library_book_by_id($id);
					$data['type'] = $this->input->post('issue_type');
					$data['err'] = 'Sorry! ID not found';
					// $this->load->view('templates/header',$data);
					$this->load->view('library/issue_book_view', $data);
					// $this->load->view('templates/footer');
				}
		}


		// This Function For Book Search
		public function booksearch($depId,$actId,$uId)
		{
			$user_name=$this->session->userdata('username');
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			$data['msg']='YES';
			$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
			$data=array(
				'msg' => 'YES',
				'username'=> $user_name
			);
			}
			else{
				$data['msg']='No';
			}
			$this->load->view('library/search_and_issu_book_view', $data);
			
		}


		// this function for search by book id
		function search_book_id() {	
			$key = $this->input->post('barcode');
			$data['search_book'] = $this->booksearch_model->search_book($key);
			// echo $this->db->last_query();
			// die;
			$data['msg'] = 'YES';
			// $this->load->view('templates/header',$data);
			$this->load->view('library/search_and_issu_book_view', $data);
			// $this->load->view('templates/footer');
		}


		// This Function For Search Book
		public function search_student($depId,$actId,$uId)
		{
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES'
				);
			}
			else{
				$data['msg']='No';
			}

			$this->load->view('library/student_search_listing_view', $data);
		}

		// This Function For Get Student By Student 
		public function student_profile_barcode()
		{
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
			$this->load->view('library/student-profile',$category);

			}

			else

			{

			$category['msg'] = 'Sorry No Data Found';	

			$this->load->view('library/student_search_listing_view',$category);

			}
		}


		// This Function For Renew Book
		public function bookrenew($depId,$actId,$uId)
		{
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES'
				);
			}
			else{
				$data['msg']='No';
			}

			$this->load->view('library/renew_book_view', $data);
		}

		// This Function For bookrenew
		public function bookrenew_submit()
		{
			$key = $this->input->post('barcode');
			$data['search_book'] = $this->booksrenew_model->search_book($key);
			$data['result'] = $this->settings_model->std_result();
			$data['msg'] = 'YES';
			$data['depid']= $this->input->post('dep_id');
			$data['actid']= $this->input->post('act_id');
			$data['uid']= $this->input->post('usr_id');
			// $this->load->view('templates/header',$data);
			$this->load->view('library/renew_book_view', $data);
			// $this->load->view('templates/footer');
		}

		function renew_book() {
		$acc_no = $this->input->post('acc_no');
		$name=$this->input->post('member_name');
		$key=$this->input->post('member_id');
		if(strlen($key)>'6')
		{		
		   $type='S';
		}
		else
		{
		   $type='E';
		}	
		//////////////renew book///////////////////
		foreach($this->settings_model->std_result() as $result) {
		if($type=='S'){$limit=$result->to_student;}else{$limit=$result->to_teacher;}
		}

		$dataup = array(
		'acc_no' => $this->input->post('acc_no'),
		'issue_date' => date('Y-m-d'),
		'due_date' => date('Y-m-d',strtotime("+".$result->no_days_student." day", strtotime(date('Y-m-d')))),
		'is_reissue' => 'Y'
		); 
		$this->booksrenew_model->renewbook($dataup,$acc_no,$name,$key);
		$this->session->set_flashdata('message', 'Book of Acc.No  '.$acc_no.' to '.$name.' (ID No- '.$key.') Renewed!'); 
		redirect('Library/LibraryDetails/bookrenew/'.$this->input->post('dep_id').'/'.$this->input->post('act_id').'/'.$this->input->post('usr_id'), 'refresh');
		}	


		// This Function For Return Book Search Book
		public function bookreturn($depId,$actId,$uId)
		{
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES'
				);
			}
			else{
				$data['msg']='No';
			}

			$this->load->view('library/return_library_book_listing_view', $data);
		}

		// This Function For Save Return Book Submit
		public function bookreturn_submit()
		{
			$key = $this->input->post('barcode');
			$data['search_book'] = $this->booksreturn_model->search_book($key);
			$data['result'] = $this->db->query('SELECT * FROM tb_library_setting')->result_array();
			$data['msg'] = 'YES';
			$data['depid']= $this->input->post('dep_id');
			$data['actid']= $this->input->post('act_id');
			$data['uid']= $this->input->post('usr_id');
			// $this->load->view('templates/header',$data);
			$this->load->view('library/return_library_book_listing_view', $data);
			// $this->load->view('templates/footer');
		}


		// This Function For Return Book submit using ajax request
		public function return_book()
		{
		$acc_no = $this->input->post('acc_no');
		$name=$this->input->post('member_name');
		$key=$this->input->post('member_id');
		$fine=$this->input->post('fine');
		$discount=$this->input->post('discount');
		$amount=$fine-$discount;
		$payment_type=$this->input->post('pay_type');
		//////////////collect fine///////////////////
		if(!empty($fine)){
				$data = array(
				'acc_no' => $acc_no,
				'member_name' => $this->input->post('member_name'),
				'member_id' => $this->input->post('member_id'),
				'fine' => $fine,
				'discount' => $discount,
				'amount' => $amount,
				'payment_date' => date('Y-m-d'),
				'payment_type' => $payment_type
				);
				$this->booksreturn_model->insertfine($data);
				$member_id=$this->input->post('member_id');
				$student_id=$this->db->query("SELECT * FROM td_student_details WHERE student_id='$member_id'")->result_array();
				
				$particular='Library Fine Collection '.$name.' (ID No- '.$key.') For '.$acc_no;
				
				$sel_max_id=$this->db->query('select max(fee_id) as max_id from td_fee_collection')->row();
				$max_id=($sel_max_id->max_id)+1;
				$exp = explode('-', date('Y-m-d'));
				if($payment_type=='bank'){$bank=$amount;$cash=0;}else{$cash=$amount;$bank=0;}
				$fields1 = array(
					'stud_id' => $student_id[0]['stud_id'],
					'adm_date' => 'N/A',
					'col_date' => date('Y-m-d'),
					'1st_year' => 'N',
					'2nd_year' => 'N',
					'3rd_year' => 'N',
					'amount' => $amount,
					'particular' => $particular,
					'cb_no' => 'CB'.$max_id.$exp[0].$exp[1].$exp[2],
					'lf_no' => 'LF'.$max_id.$exp[0].$exp[1].$exp[2],
					'type' => 'Credit',
					'bank' => $bank,
					'cash' => $cash,
					'note' => '',
				);
				$add_fee1 = $this->base_model->form_post('td_fee_collection',$fields1);
				
				$last_fee_id = $this->db->insert_id();
		
				$fields2 = array(
					'fee_id' => $last_fee_id,
					'fee_head_id' => 28,
					'amount' => $amount,
					'sub_date' => date('Y-m-d'),
					'type' => 'Credit',
				);
				$add_fee2 = $this->base_model->form_post('td_fee_subfunds',$fields2);
		}
		//////////////update book status///////////////////
		$dataup = array(
		'status' => 'Available'
		); 
		$this->booksreturn_model->delissuebook($acc_no);
		$this->booksreturn_model->upstatus($dataup,$acc_no,$name,$key);
		
		$this->session->set_flashdata('message', 'Book of Acc.No  '.$acc_no.' to '.$name.' (ID No- '.$key.') Returned!'); 
		// redirect('library/bookreturn', 'refresh');
		echo "done";
		}


		// This Function For Library Settings
		public function settings($depId,$actId,$uId)
		{
			$session_data = $this->session->userdata('logged_in');
			$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
			if($checkExist > 0 ){
			// $data['msg']='YES';
				$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
				$data=array(
					'msg' => 'YES',
					'username' => $this->session->userdata('username'),
					'result' => $this->settings_model->std_result()
				);
			}
			else{
				$data['msg']='No';
			}

			$this->load->view('library/library_settings_view', $data);
		}


		// This Function For Update Settings
		public function settings_update()
		{
			// Validation Code Goes Here
			$this->form_validation->set_rules('to_student', 'Book To Student', 'trim|required');
			$this->form_validation->set_rules('to_teacher', 'Book to Staff', 'trim|required');
			$this->form_validation->set_rules('no_days_student', 'Days(Student)', 'trim|required');
			$this->form_validation->set_rules('no_days_staff', 'Days(Staff)', 'trim|required');
			$this->form_validation->set_rules('fine_student', 'fine_student', 'trim|required');
			$dep_id= $this->input->post('dep_id');
			$act_id= $this->input->post('act_id');
			$usr_id= $this->input->post('usr_id');

			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('validation_errors', validation_errors());
				redirect('Library/LibraryDetails/settings/'.$dep_id.'/'.$act_id.'/'.$usr_id);
			} else {
				$data = array(
				'to_student' => $this->input->post('to_student'),
				'to_teacher' => $this->input->post('to_teacher'),
				'no_days_student' => $this->input->post('no_days_student'),
				'no_days_staff' => $this->input->post('no_days_staff'),
				'fine_student' => $this->input->post('fine_student'),
				);	
				$this->settings_model->update_settings($data);
				$this->session->set_flashdata('message', 'Data Updated Successfully.'); 
				redirect('Library/LibraryDetails/settings/'.$dep_id.'/'.$act_id.'/'.$usr_id);
			}
			
			
		}


		// This Function For Issu Book Log
		public function issuelog($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=='Submit'){
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$member = $this->input->post('member');
				$data=array(
					'search_book' => $this->issuelog_model->search_book($from,$to,$member),
					'msg' => 'YES',
					'username' => $this->session->userdata('username')
				);
				// $data['search_book'] = ;
				// echo $this->db->last_query();
				// die;
			}
			else{
				// $session_data = $this->session->userdata('logged_in');
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
				if($checkExist > 0 ){
				// $data['msg']='YES';
					$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
					$data=array(
						'msg' => 'YES',
						'username' => $this->session->userdata('username'),
						'default_log' => $this->issuelog_model->default_log()
					);
				}
				else{
					$data['msg']='No';
				}
			}
			
			$this->load->view('library/issue_log_view', $data);
		}

		// public function issuelogemp($depId,$actId,$uId)
		// { 
		// 	$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
		// 	if($checkExist > 0 ){
		// 		$data=array(
		// 			'msg' => 'YES',
		// 			'username' => $this->session->userdata('username'),
		// 			'default_log' => $this->issuelog_model->default_log_emp()
		// 		);
		// 	}
		// 	else{
		// 		$data['msg']='No';
		// 	}
		// 	$this->load->view('library/issue_log_view_emp', $data);
		// 	// $this->load->view('templates/header',$data);
		//  	// $this->load->view('library/issuelog-emp', $data);
		//  	// //echo '<pre>';print_r($data);die;
		// 	//  $this->load->view('templates/footer');
		// }


		// This Function For Return Book Log Report
		public function returnSearch($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=="Submit")
			{
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data=array(
					'search_book' =>$this->db->query('SELECT * FROM tb_library_fine JOIN tb_library_books ON tb_library_fine.acc_no=tb_library_books.acc_no WHERE tb_library_fine.payment_date BETWEEN "'.$from.'" AND "'.$to.'" ORDER BY tb_library_fine.payment_date DESC')->result(),
					'msg' => 'YES',
					'username' => $this->session->userdata('username')
				);
			}
			else{
				//Check Access For User
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
				if($checkExist > 0 ){
					$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
					$data=array(
						'msg' => 'YES',
						'username' => $this->session->userdata('username'),
						'default_log' => $this->issuelog_model->default_log()
					);
				}
				else{
					$data['msg']='No';
				}

			}
		
			$this->load->view('library/return_searh_result_view', $data);
			
		}


		// This Function For Search Fine Data
		public function searchFine($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=="Submit")
			{
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data=array(
					'search_book' =>$this->fine_model->search_fine($from,$to),
					'msg' => 'YES',
					'username' => $this->session->userdata('username')
				);
			}
			else{
				//Check Access For User
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
				if($checkExist > 0 ){
					$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
					$data=array(
						'msg' => 'YES',
						'username' => $this->session->userdata('username'),
						'default_log' => $this->issuelog_model->default_log()
					);
				}
				else{
					$data['msg']='No';
				}

			}
		
			$this->load->view('library/fine_searh_result_view', $data);
		}


		// This Function For Search And View Requistion & Issue Book
		public function searchRequistion($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=="Submit")
			{
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data=array(
					'search_book' =>$this->requistion_model->search_book($from,$to),
					'msg' => 'YES',
					'username' => $this->session->userdata('username')
				);
				// echo $this->db->last_query();
				// die;
			}
			else{
				//Check Access For User
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
				if($checkExist > 0 ){
					$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
					$data=array(
						'msg' => 'YES',
						'username' => $this->session->userdata('username'),
						'default_log' => $this->issuelog_model->default_log()
					);
				}
				else{
					$data['msg']='No';
				}

			}
		
			$this->load->view('library/requistion_searh_result_view', $data);
		}

		// This Function For Search And View Wishlist & Issue Book
		public function searchWishlist($depId,$actId,$uId)
		{
			if($this->input->post('btnSubmit')=="Submit")
			{
				$from = $this->input->post('from');
				$to = $this->input->post('to');
				$data=array(
					'search_book' =>$this->wishlist_model->search_book($from,$to),
					'msg' => 'YES',
					'username' => $this->session->userdata('username')
				);
				// echo $this->db->last_query();
				// die;
			}
			else{
				//Check Access For User
				$checkExist = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->num_rows();
				if($checkExist > 0 ){
					$res = $this->db->query("select MAX(acc_no) as acc_no from tb_library_books")->result_array();
					$data=array(
						'msg' => 'YES',
						'username' => $this->session->userdata('username'),
						'default_log' => $this->issuelog_model->default_log()
					);
				}
				else{
					$data['msg']='No';
				}

			}
		
			$this->load->view('library/wishlist_searh_result_view', $data);
		}


	}

	/* End of file Library.php */
/* Location: ./application/controllers/Library.php */