<?php
Class booksreturn_model extends CI_Model
{


function search_book($key){	
		$condition = "tb_library_issue_book.acc_no LIKE '%".$key."%'";
		$this->db->select('tb_library_issue_book.*,tb_library_books.title');
		$this->db->from('tb_library_issue_book');
		$this->db->join('tb_library_books', 'tb_library_issue_book.acc_no = tb_library_books.acc_no');
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
function upstatus($data,$acc,$name,$key){
		$this->db->where('acc_no', $acc);
		$this->db->update('tb_library_books', $data);
		return $acc;
		return $name;
		return $key;
}
function delissuebook($acc){
		$this->db->where('acc_no', $acc);
		$this->db->delete('tb_library_issue_book');
}
function insertfine($data){
		$this->db->insert('tb_library_fine', $data);
}
}
?>