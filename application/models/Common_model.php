<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            
    }
	
	public function form_post($table,$fields)
    {
        if($this->db->insert($table,$fields)){
		return true;
		}
		
    }

    public function AddRecord($tbl,$array){

    	$this->db->insert($tbl,$array);
        $last_insert_id = $this->db->insert_id();
        return $last_insert_id;
    }


    public function getRecord(){

    	$this->db->select('ta.username,tf.functionn_name,tf.functionn_id');
        $this->db->from('tbl_functionn tf');
        $this->db->join('tbl_users ta', 'tf.created_by = ta.user_id');
        if(!empty($where_array)){
        	$this->db->where($where_array);
        }
        $this->db->order_by('tf.functionn_id','DESC');
       $query = $this->db->get();
       return $query->result();


    }


    public function getDepartment(){

    	$this->db->select('ta.username,td.department_name,td.departmet_id');
        $this->db->from('tbl_department td');
        $this->db->join('tbl_users ta', 'td.created_by = ta.user_id');
        if(!empty($where_array)){
        	$this->db->where($where_array);
        }
        $this->db->order_by('td.departmet_id','DESC');
       $query = $this->db->get();
       return $query->result();


    }
	public function getActivity(){

    	$this->db->select('ta.username,td.activity_name,td.departmet_id,td.activity_id');
        $this->db->from('tbl_activity td');
        $this->db->join('tbl_users ta', 'td.created_by = ta.user_id');
        if(!empty($where_array)){
        	$this->db->where($where_array);
        }
        $this->db->order_by('td.activity_id','DESC');
       $query = $this->db->get();
       return $query->result();


    }



    public function retrivebyrow($table,$where_array){

    	$this->db->select('*');
    	$this->db->from($table);
    	$this->db->where($where_array);
    	$query = $this->db->get();
    	return $query->row();

    }


    public function getUsers(){

    	$this->db->select('tu.user_id, tu.name, tu.username, tu.user_id_auto, tu.original_password');
    	$this->db->from('tbl_users tu');
    	$this->db->order_by('user_id','DESC');
    	$query = $this->db->get();
    	return $query->result();


    }


    public function getUsersDepartment($user_id){

        $this->db->select('tu.user_id, tu.name, tu.username, tu.user_id_auto, tu.department_id, td.department_name as department, td.departmet_id');
        $this->db->from('tbl_users tu');
        $this->db->join('tbl_department td', 'tu.department_id = td.departmet_id');
        $this->db->where('tu.user_id',$user_id);
        $query = $this->db->get();
        return $query->row();


    }


    public function getAccess($user_id,$dep_id){



      $this->db->select('tf.functionn_name,tf.functionn_id,ta.activity_id,ta.department_id');
      $this->db->from('tbl_access ta');
      $this->db->join('tbl_users tu', 'ta.user_id=tu.user_id','inner');
      $this->db->join('tbl_functionn tf', 'ta.function_id = tf.functionn_id','inner');
      $this->db->where('tu.user_id',$user_id);
	  $this->db->where('ta.department_id',$dep_id);
      $query = $this->db->get();
      return $query->result();
    }



    public function retriveby($table,$where_array){

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where_array);
        $query = $this->db->get();
        return $query;

    }



    public function Users($id){

        $this->db->select('tu.user_id, tu.name, tu.username, tu.user_id_auto, tu.department_id, td.department_name as department');
        $this->db->from('tbl_users tu');
        $this->db->join('tbl_department td', 'tu.department_id = td.departmet_id');
        $this->db->where('tu.user_id',$id);
        $query = $this->db->get();
        return $query->row();


    }


    // This Function For Show Individual Books
    public function library_book_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_library_books');
        $result = $query->result_array();
        return $result;
    }


    // This Function To Update Book By Book Id
    public function update_book_by_id($id,$object)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_library_books', $object);
    }


    // This For Search Library Book By SL Number
    public function search_by_book_sl($from,$to)
    {
        $this->db->where('sl_no >=', (int)$from);
        $this->db->where('sl_no <=', (int)$to);
        $query=$this->db->get('tb_library_books');
        return $query->result();
    }


    // This Function For Search Member
    function search_member($key,$type){
		if($type=='S'){		
		$query = $this->db->query('select * from td_student_details where student_id LIKE "'.$key.'"');}
		else{
		$query = $this->db->query('select * from td_employee_details where emp_id LIKE "'.$key.'"');}
        // //     if ($query->num_rows() > 0) {
        // //     foreach ($query->result() as $row) {
        // //     $data[] = $row;
        // //     }					
        // // return $data;
        // }
        // // return false;
        return $query->result();
    }   

    // this function for --- I dont know.. I just copy it
    function std_result()
    {
    $this->db->select('*');
    $this->db->from('tb_library_setting');
    $query = $this->db->get();
    $this->db->last_query();
    if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
    $data[] = $row;
    }
    return $data;
    }
    return false;	
    }



}

