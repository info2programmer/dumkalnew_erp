<?php
Class booksearch_model extends CI_Model
{
public function record_count() {
return $this->db->count_all("tb_library_books");
}	
public function fetch_data($limit,$id,$start) {
$this->db->limit($limit,$start);
$this->db->select('tb_library_books.*');
$this->db->from('tb_library_books');
$query = $this->db->get();	
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
function single_book_id($data){
$this->db->select('*');
$this->db->from('tb_library_books');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function updatebook($id,$data){
$this->db->where('id', $id);
$this->db->update('tb_library_books', $data);
}
function search_book($key){	
$condition = "acc_no LIKE '".$key."'";
$this->db->select('*');
$this->db->from('tb_library_books');
$this->db->where($condition);
$query = $this->db->get();//echo $this->db->last_query();exit();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}
}
?>