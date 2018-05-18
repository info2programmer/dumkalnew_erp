<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	
	#######################################################################
	
	public function daily_collection_report()
	{	
		
		
		//$this->load->view('templates/header');
		$this->load->view('finance/daily-collection-list-view');
		//$this->load->view('templates/footer');
	}
	public function daily_collection_report1()
	{
		//echo 1;die;
		echo $data['txtDate11'] = date_format(date_create($this->input->post('txtDate11')), "Y-m-d");
		echo $data['txtDate22'] = date_format(date_create($this->input->post('txtDate22')), "Y-m-d");
		
		$this->load->view('finance/daily_collection-report',$data);
		
	}
	########################################################################	
}
