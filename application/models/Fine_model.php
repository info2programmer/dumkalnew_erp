<?php
Class fine_model extends CI_Model
{
function default_log(){	
$condition = "tb_library_fine.payment_date LIKE '".date('Y-m-d')."' order by id desc";
$this->db->select('tb_library_fine.*');
$this->db->from('tb_library_fine');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}	

function search_fine($from,$to){	
$condition = "tb_library_fine.payment_date BETWEEN '".$from."' and '".$to."' order by id desc";
$this->db->select('tb_library_fine.*');
$this->db->from('tb_library_fine');
$this->db->where($condition);
$query = $this->db->get();
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