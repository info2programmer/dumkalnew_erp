<?php
Class booksissue_model extends CI_Model
{
public function record_count($key) {
		$this->db->where('member_id',$key);
		$this->db->from('tb_library_issue_book');
		return $count = $this->db->count_all_results();
}	
function issue_book_id($data){
		$this->db->select('*');
		$this->db->from('tb_library_books');
		$this->db->where('id', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
}
function search_member($key,$type){
		if($type=='S'){		
		$query = $this->db->query('select * from td_student_details where student_id LIKE "'.$key.'"');}
		else{
		$query = $this->db->query('select * from td_employee_details where emp_id LIKE "'.$key.'"');}
					if ($query->num_rows() > 0) {
					foreach ($query->result() as $row) {
					$data[] = $row;
					}					
				return $data;
				}
				return false;
}
function upstatus($data,$acc){
		$this->db->where('acc_no', $acc);
		$this->db->update('tb_library_books', $data);
}
function insertdata($data,$name,$key){
		$this->db->insert('tb_library_issue_book', $data);
		return $name;
		return $key;
}
}
?>