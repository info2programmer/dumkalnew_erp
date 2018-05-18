<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller{


	function __construct() {
        parent::__construct();
        $this->load->model(array('common_model','student_model'));
        
        if($this->session->userdata('username')==''){
        	redirect('login');
        }
    }

	public function index($offset=0)
	{

		$limit = 5;
        $result = $this->student_model->getStudents($limit, $offset);
        $data['blog_list'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("students");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 5;
        //various pagination configuration
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_tag_open'] = '<span class="first">';
        $config['first_tag_close'] = '</span>';
        $config['first_link'] = '';
        $config['last_tag_open'] = '<span class="last">';
        $config['last_tag_close'] = '</span>';
        $config['last_link'] = '';
        $config['prev_tag_open'] = '<span class="prev">';
        $config['prev_tag_close'] = '</span>';
        $config['prev_link'] = '';
        $config['next_tag_open'] = '<span class="next">';
        $config['next_tag_close'] = '</span>';
        $config['next_link'] = '';
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        



        //print_r($data['blog_list']); die;


		$this->load->view('students/student-details',$data);
	}

}

