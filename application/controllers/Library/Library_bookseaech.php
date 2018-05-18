<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library_bookseaech extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('search_model');
   		$this->load->library('form_validation');
   		$this->load->library('pagination');
   		date_default_timezone_set('Asia/Calcutta');
	}

	public function index()
	{
		
	}

	function search_book_id() {	

 

 //if($this->input->get('submit'))

 //{

	 $all = $this->input->get('a_all');

	 $acc_no = $this->input->get('acc_no');

	 $title = $this->input->get('title');

	 $author = $this->input->get('author'); 

	 $isbn = $this->input->get('isbn'); 

	 $subject = $this->input->get('subject');	 

	 $pub_year = $this->input->get('pub_year');

	 $ed_comp_tran = $this->input->get('ed_comp_tran');

	 

	 $key_all = $this->input->get('key_all');

	 $key_acc_no = $this->input->get('key_acc_no');

	 $key_title = $this->input->get('key_title');

	 $key_author = $this->input->get('key_author');

	 $key_isbn = $this->input->get('key_isbn');

	 $key_subject = $this->input->get('key_subject');

	 $key_pub_year = $this->input->get('key_pub_year');

	 $key_ed_comp_tran = $this->input->get('key_ed_comp_tran');

	 

	 /*if($key == '') {

	 $this->session->set_flashdata('message', 'Error : Please type related keyword');

	 }*/

	 if($all)

	 {

		 $conditions_like['acc_no'] = $key_all;

		 $conditions_like['title'] = $key_all;

		 $conditions_like['author1'] = $key_all;

		 $conditions_like['author2'] = $key_all;

		 $conditions_like['author3'] = $key_all;

		 $conditions_like['isbn_no'] = $key_all;

		 $conditions_like['subject1'] = $key_all;

		 $conditions_like['subject2'] = $key_all;

		 $conditions_like['subject3'] = $key_all;

		 $conditions_like['subject4'] = $key_all;

		 $conditions_like['date_of_publish'] = $key_all;

		 $conditions_like['editor_by'] = $key_all;

		 $category['search'] = $all.' , '.$key_all;

	 }

	 else if($acc_no) {

	 $conditions_where['acc_no'] = $key_acc_no;

	 $category['search'] = $acc_no.' , '.$key_acc_no; 					

	 }

	 

	 else if($isbn) {

	 $conditions_where['isbn_no'] = $key_isbn;

	 $category['search'] = $isbn.' , '.$key_isbn;  					

	 }

	 

	 if($title) {

	 $conditions_like['title'] = $key_title;

	 $category['search'] = $title.' , '.$key_title;  					

	 }

	 

	 if($author) {

	 $conditions_like['author1'] = $key_author;

	 $conditions_like['author2'] = $key_author;

	 $conditions_like['author3'] = $key_author;

	 $category['search'] = $author.' , '.$key_author;  					

	 }	 

	 else if($subject) {

	 $conditions_like['subject1'] = $key_subject;

	 $conditions_like['subject2'] = $key_subject;

	 $conditions_like['subject3'] = $key_subject;

	 $conditions_like['subject4'] = $key_subject;

	 $category['search'] = $subject.' , '.$key_subject;  					

	 }

	 else if($pub_year) {

	 $conditions_like['date_of_publish'] = $key_pub_year;

	 $category['search'] = $pub_year.' , '.$key_pub_year;  					

	 }

	 else if($ed_comp_tran) {

	 $conditions_like['editor_by'] = $key_ed_comp_tran;

	 $category['search'] = $ed_comp_tran.' , '.$key_ed_comp_tran; 					

	 }

	

	 

	 $query_string = isset($all)?'a_all='.$all:'';

	 $query_string .= isset($acc_no)?'acc_no='.$acc_no:'';

	 $query_string .= isset($title)?'title='.$title:'';

	 $query_string .= isset($author)?'author='.$author:'';

	 $query_string .= isset($isbn)?'isbn='.$isbn:'';

	 $query_string .= isset($subject)?'subject='.$subject:'';

	 $query_string .= isset($pub_year)?'pub_year='.$pub_year:'';

	 $query_string .= isset($ed_comp_tran)?'ed_comp_tran='.$ed_comp_tran:'';

	 

	 $query_string .= isset($key_all)?'&key_all='.$key_all:'';

	 $query_string .= isset($key_acc_no)?'&key_acc_no='.$key_acc_no:'';

	 $query_string .= isset($key_isbn)?'&key_isbn='.$key_isbn:'';

	 $query_string .= isset($key_title)?'&key_title='.$key_title:'';

	 $query_string .= isset($key_author)?'&key_author='.$key_author:'';

	 $query_string .= isset($key_subject)?'&key_subject='.$key_subject:'';

	 $query_string .= isset($key_pub_year)?'&key_pub_year='.$key_pub_year:'';

	 $query_string .= isset($key_ed_comp_tran)?'&key_ed_comp_tran='.$key_ed_comp_tran:'';

	 

	

	 //$category['total_pages'] = $this->search_model->find_data('',$conditions,'count'); 

	

	 		$limit = 20; 	//how many items to show per page

			$p=isset($_GET['page'])?$_GET['page']:0;

			$page = $p;

			//echo $page;

			if($page) 

				$start = ($page - 1) * $limit; 	//first item to display on this page

			else

				$start = 0;

				

			//$query = "select * from tb_library_books where 1=1".$type." LIMIT $start, $limit ";

			

			//echo '<pre>';print_r($category['search_book']);die;

			//$countQuery = "select * from tb_library_books where 1=1".$type;

			

			

			if($all) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit);

			//echo '<pre>';print_r($category['search_book']);die;

			}

			else if($acc_no) {

			$category['total_pages'] = $this->search_model->count_data('','','',$conditions_where,'count');

			$category['search_book'] = $this->search_model->find_data('','','',$conditions_where,'array',$start,$limit); 

			}

			else if($isbn) {

			$category['total_pages'] = $this->search_model->count_data('','','',$conditions_where,'count');

			$category['search_book'] = $this->search_model->find_data('','','',$conditions_where,'array',$start,$limit); 

			}

			else if($title) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit); 

			}	

			else if($author) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit); 

			}

			else if($subject) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit); 

			}

			else if($pub_year) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit); 

			}

			else if($ed_comp_tran) {

			$category['total_pages'] = $this->search_model->count_data('','',$conditions_like,'','count');

			$category['search_book'] = $this->search_model->find_data('','',$conditions_like,'','array',$start,$limit); 

			}

			

			if(isset($title) && isset($author)) {

				

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $title.' , '.$key_title.' , '.$author.' , '.$key_author; 

			}

			if(isset($title) && isset($subject)) {

				

			$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $title.' , '.$key_title.' , '.$subject.' , '.$key_subject; 

			}

			

			if(isset($author) && isset($subject)) {

				

			$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' ) AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $author.' , '.$key_author.' , '.$subject.' , '.$key_subject; 

			}

			

			if(isset($author) && isset($subject) && isset($title)) {

			//echo "hhh";die;	

			$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' ) AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $title.' , '.$key_title.' , '.$author.' , '.$key_author.' , '.$subject.' , '.$key_subject; 

			}

			

			if(isset($ed_comp_tran) && isset($title))

			{

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!')");

				//echo $this->db->last_query();die;

				$category['total_pages'] = $query->num_rows();

				$category['search_book'] = $query->result();

				$category['search'] = $title.' , '.$key_title.' , '.$ed_comp_tran.' , '.$key_ed_comp_tran;

			}

			if(isset($ed_comp_tran) && isset($author)) {

				

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$author.' , '.$key_author; 

			}

			if(isset($ed_comp_tran) && isset($subject)) {

				

			$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

			$category['total_pages'] = $query->num_rows();

			$category['search_book'] = $query->result();

			$category['search'] = $ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$subject.' , '.$key_subject; 

			}

			if(isset($ed_comp_tran) && isset($title) && isset($author))

			{

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

				$category['total_pages'] = $query->num_rows();

				$category['search_book'] = $query->result();

				$category['search'] = $title.' , '.$key_title.' , '.$ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$author.' , '.$key_author;

			}

			if(isset($ed_comp_tran) && isset($title) && isset($subject))

			{

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

				$category['total_pages'] = $query->num_rows();

				$category['search_book'] = $query->result();

				$category['search'] = $title.' , '.$key_title.' , '.$ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$subject.' , '.$key_subject;

			}

			if(isset($ed_comp_tran) && isset($author) && isset($subject))

			{

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' ) AND (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

				$category['total_pages'] = $query->num_rows();

				$category['search_book'] = $query->result();

				$category['search'] = $author.' , '.$key_author.' , '.$ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$subject.' , '.$key_subject;

			}

			if(isset($ed_comp_tran) && isset($author) && isset($subject) && isset($title))

			{

				$query = $this->db->query("SELECT * FROM `tb_library_books` WHERE (`title` LIKE '%".$key_title."%' ESCAPE '!') AND (author1 LIKE '%".$key_author."%' ESCAPE '!' OR author2 LIKE '%".$key_author."%' ESCAPE '!' OR author3 LIKE '%".$key_author."%' ESCAPE '!' ) AND (`editor_by` LIKE '%".$key_ed_comp_tran."%' ESCAPE '!') AND (subject1 LIKE '%".$key_subject."%' ESCAPE '!' OR subject2 LIKE '%".$key_subject."%' ESCAPE '!' OR subject3 LIKE '%".$key_subject."%' ESCAPE '!' OR subject4 LIKE '%".$key_subject."%' ESCAPE '!' )");

				//echo $this->db->last_query();die;

				$category['total_pages'] = $query->num_rows();

				$category['search_book'] = $query->result();

				$category['search'] = $author.' , '.$key_author.' , '.$ed_comp_tran.' , '.$key_ed_comp_tran.' , '.$subject.' , '.$key_subject;

			}

			//$category['search_book']=$this->db->query($query)->result();

			//$total_pages = $this->db->query($countQuery)->num_rows();

			// require_once APPPATH."libraries/pagination_search.php";

			

			// $total_item = $category['total_pages'];

			

			// $category['res']=create_pagination('tb_library_books',base_url().'library_bookseaech/search_book_id?'.$query_string,$limit,$page,$total_item);

			

			//$this->load->view('table',$result);

			

			//$category['search'] = $_GET['searchby'].' , '.$_GET['key'];

			//$category['searchby'] = $_GET['searchby'];

			

// }

/*$p=isset($_GET['page'])?$_GET['page']:0;

$query_string = isset($_GET['searchby'])?'searchby='.$_GET['searchby']:'';

$query_string .= isset($_GET['key'])?'&key='.$_GET['key']:'';

//$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and title ='.$_GET['searchby']:'';

//$type = (isset($_GET['key']) && !empty($_GET['key']))? ' and title LIKE "%'.$_GET['key'].'%"':'';

if($_GET['searchby'] == 'Title'){

$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and title LIKE "%'.$_GET['key'].'%"':'';

$type = (isset($_GET['key']) && !empty($_GET['key']))? '  and title LIKE "%'.$_GET['key'].'%"':'';

}

elseif($_GET['searchby'] == 'Author Name'){

$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and author1 LIKE "%'.$_GET['key'].'%" or author2 LIKE "%'.$_GET['key'].'%" or author3 LIKE "%'.$_GET['key'].'%"':'';

$type = (isset($_GET['key']) && !empty($_GET['key']))? ' and author1 LIKE "%'.$_GET['key'].'%" or author2 LIKE "%'.$_GET['key'].'%" or author3 LIKE "%'.$_GET['key'].'%"':'';	

}

elseif($_GET['searchby'] == 'Subject Name'){

$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and subject1 LIKE "%'.$_GET['key'].'%" or subject2 LIKE "%'.$_GET['key'] .'%" or subject3 LIKE "%'.$_GET['searchby'] .'%" or subject4 LIKE "%'.$_GET['searchby'].'%"':'';

$type = (isset($_GET['key']) && !empty($_GET['key']))? ' and subject1 LIKE "%'.$_GET['key'].'%" or subject2 LIKE "%'.$_GET['key'] .'%" or subject3 LIKE "%'.$_GET['key'] .'%" or subject4 LIKE "%'.$_GET['key'].'%"':'';	

}

elseif($_GET['searchby'] == 'Publisher Name'){

$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and publisher LIKE "%'.$_GET['key'].'%"':'';

$type = (isset($_GET['key']) && !empty($_GET['key']))? '  and publisher LIKE "%'.$_GET['key'].'%"':'';	

}

elseif($_GET['searchby'] == 'Ed./Comp./Tran. Name'){

$search = (isset($_GET['searchby']) && !empty($_GET['searchby']))? ' and editor_by LIKE "%'.$_GET['key'].'%"':'';

$type = (isset($_GET['key']) && !empty($_GET['key']))? '  and editor_by LIKE "%'.$_GET['key'].'%"':'';	

}*/



			

			

            $this->load->view('library/home',$category);

			



   //}

}

}

/* End of file Library_Bookseaech.php */
/* Location: ./application/controllers/Library_Bookseaech.php */