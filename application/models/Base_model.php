<?php
 class base_model extends CI_Model {
   function __construct() {
        parent::__construct();
        
    }
    
    function form_post($table,$fields)
    {
        if($this->db->insert($table,$fields)){
		return true;
		}
		
    }
	 function form_update($table,$fields,$category)
    {
	
	$this->db->where('category', $category);
	if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
		return true;
		}
		
    }
	function db_update($table,$fields,$field,$category)
    {
	
	$this->db->where($field, $category);
	if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
		return true;
		}
		
    }
    function file_upload($img,$tmp,$path)
    {
        $image_path = $path;
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
    function excel_file_upload($img,$tmp)
    {
        $image_path = 'student/excel/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
	function excel_file_upload_emp($img,$tmp)
    {
        $image_path = 'employee/excel/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
    function logo_file_upload($img,$tmp)
    {
        $image_path = 'institute/logo/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
    function princi_file_upload($img,$tmp)
    {
        $image_path = 'institute/princi_sig/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
	 function library_file_upload($img,$tmp)
    {
        $image_path = 'institute/library_sig/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
	 function notice_file_upload($img,$tmp)
    {
        $image_path = 'notice/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
     function gnews_file_upload($img,$tmp)
    {
        $image_path = 'news/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
    function sponsor_file_upload($img,$tmp)
    {
        $image_path = 'sponsor/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
    function album_file_upload($img,$tmp)
    {
        $image_path = 'album/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
    function album_image_upload($img,$tmp)
    {
        $image_path = 'album/images/';
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
    function slider_file_upload($img,$tmp)
    {
        $image_path = 'slider/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
	function subcategory_file_upload($img,$tmp)
    {
        $image_path = 'subcategory/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
    }
    function student_file_upload($img,$tmp,$path)
    {
        $image_path = $path;
        if(move_uploaded_file($tmp,$image_path.$img))
        return true;
    }
	 function show_data($table,$fields,$condition)
    {
       if(!empty($condition))
	   {
			$this->db->where($condition);
	   }
	   $this->db->select($fields);
	   $var = $this->db->get($table);
	   return $var;
		
    }
    function category_update($table,$fields,$category)
    {
	
	$this->db->where('id', $category);
	if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
		return true;
		}
		
    }
    function student_update($table,$fields,$category)
    {
    
    $this->db->where('student_id', $category);
    if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
        return true;
        }
        
    }
    function institute_update($table,$fields,$category)
    {
    
    $this->db->where('insti_id', $category);
    if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
        return true;
        }
        
    }
    function notice_update($table,$fields,$category)
    {
    
    $this->db->where('nid', $category);
    if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
        return true;
        }
        
    }
    function group_update($table,$fields,$category)
    {
    
    $this->db->where('grp_id', $category);
    if($this->db->update($table,$fields)){
        //if($this->db->insert($table,$fields)){
        return true;
        }
        
    }

    // This Function Get All student Studeam
    public function studentStream()
    {
        $query=$this->db->get('td_student_stream');
        return $query->result();
    }

    // This Function For Get Subjects By Stream Id
    public function subject_by_stream($stream_id)
    {
        $this->db->where('stream_id', $stream_id);
        $query=$this->db->get('td_subject_group');
        return $query->result();
    }

    // Get Fee Head Here
    public function get_fee_head()
    {
        $query=$this->db->get('tb_fin_head');
        return $query->result();
    }

    // This function For Get All Stream Details
    // public function stream_Details()
    // {
    //     $this->db->select("DISTINCT(stream_id)")
    // }

    // This Function For Fee Base Data
    public function fee_data()
    {
    //    $this->db->distinct();   
      $query= $this->db->query("SELECT * FROM td_subject_group JOIN td_student_stream ON td_subject_group.stream_id=td_student_stream.stream_id");     
      return $query->result();
    }


    // This Function To Get To Amount List Here 
    public function get_amount($subject_group_id,$year)
    {
       $query=$this->db->query("SELECT SUM(amount) as amt,fee_type FROM tb_fin_fee WHERE subj_grp_id='".$subject_group_id."' AND year='".$year."' GROUP BY fee_type");
       return $query->result();
    }

     // This Function To Get To Amount List Here 
    public function get_amount_details($fee_type,$year)
    {
    //    $query=$this->db->query("SELECT amount as amt,fee_type FROM tb_fin_fee WHERE fee_type='".$subject_group_id."' AND year='".$year."' ");
    //    return $query->result();
        $this->db->where('fee_type', $fee_type);
        $this->db->where('year', $year);
        $this->db->select('fee_type, amount, name');
        $this->db->from('tb_fin_fee');
        $this->db->join('tb_fin_head', 'tb_fin_head.id = tb_fin_fee.fin_head_id', 'INNER');
        $query=$this->db->get();
        return $query->result();        
    }


    // This Function For Insert Log Data
    public function erp_log($user_id,$log_data)
    {
        date_default_timezone_set("Asia/Kolkata");
        $object=array(
            'log_date' => date('Y-m-d'),
            'log_time' => date('h:i:sa'),
            'log_by' => $user_id,
            'log_data' => $log_data
        );
        $this->db->insert('tbl_erp_log', $object);
    }

    
}

?>