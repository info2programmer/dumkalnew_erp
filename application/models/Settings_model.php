<?php
Class settings_model extends CI_Model
{
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
return $query->result_array();
}
return false;	
}
function update_settings($data){
$this->db->where('id', 1);
$this->db->update('tb_library_setting', $data);
}
}
?>