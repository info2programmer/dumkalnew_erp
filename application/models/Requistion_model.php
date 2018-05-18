<?php
Class requistion_model extends CI_Model
{
function default_log(){	
$condition = "tb_library_requisition.requisition_date LIKE '".date('Y-m-d')."' order by id desc";
$this->db->select('tb_library_requisition.*,tb_library_books.title,tb_library_books.status');
$this->db->from('tb_library_requisition');
$this->db->join('tb_library_books', 'tb_library_requisition.acc_no = tb_library_books.acc_no');
$this->db->where($condition);
$query = $this->db->get();//echo  $this->db->last_query();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}		
function search_book($from,$to){	
$condition = "tb_library_requisition.requisition_date BETWEEN '".$from."' and '".$to."' order by id desc";
$this->db->select('tb_library_requisition.*,tb_library_books.title,tb_library_books.status');
$this->db->from('tb_library_requisition');
$this->db->join('tb_library_books', 'tb_library_requisition.acc_no = tb_library_books.acc_no');
$this->db->where($condition);
$query = $this->db->get();//echo  $this->db->last_query();
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