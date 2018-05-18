<?php
Class issuelog_model extends CI_Model
{
function default_log(){	
		$condition = "tb_library_issue_book.issue_date LIKE '".date('Y-m-d')."' order by id desc";
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
function search_book($from,$to,$member){	
        if($member!='')
		{
		$condition = "tb_library_issue_book.member_id = '".$member."' order by id desc";
		}
		else
		{
		$condition = "tb_library_issue_book.issue_date BETWEEN '".$from."' and '".$to."' order by id desc";
		}
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

function default_log_emp(){	
		$condition = "tb_library_issue_book.issue_date LIKE '".date('Y-m-d')."' and tb_library_issue_book.type = 'E' order by id desc";
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
function search_book_emp($from,$to){	
		$condition = "tb_library_issue_book.type = 'E' and  tb_library_issue_book.issue_date BETWEEN '".$from."' and '".$to."' order by id desc";
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
}
?>