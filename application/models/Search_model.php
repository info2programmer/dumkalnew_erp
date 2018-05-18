<?php
Class search_model extends CI_Model
{
	var $table;
	function __construct()
	{
		parent::__construct();
		$this->table = 'tb_library_books';
	}
	
	function check_user_availablity()
	{
		$id_no = trim($this->input->post('id_no'));	
		
		$query = $this->db->query('SELECT * FROM td_student where id_no="'.$id_no.'"');
		
		if($query->num_rows() > 0)
		return false;
		else
		return true;
	}

function find_data($select='*',$conditions='',$conditions_like='',$conditions_where='',$return_type='array',$start,$limit)
	{
		$result = array();
		//echo $limit;
		//echo $offset;die;
		
		$this->db->select($select);
		
		if($conditions != '')
		{
			$this->db->like($conditions);
		}
		
		if($conditions_like != '')
		{
			$this->db->or_like($conditions_like);
		}
		
		if($conditions_where != '')
		{
			$this->db->where($conditions_where);
		}
		
		if($limit != 0)
		{
			$this->db->limit($limit,$start);
		}
		
		/*if($order_by != 0)
		{
			$this->db->order_by('id', 'ASC');
		}*/
		
		$query = $this->db->get($this->table);
		
		switch($return_type)
		{
			case 'array':
			case '':
				if($query->num_rows()> 0) {$result = $query->result();} 
				break;
			case 'row':
				if($query->num_rows()> 0) {$result = $query->row();} 
				break;
			case 'list':
				$list_arr[''] = 'Select';
				if($query->num_rows() > 0){
					foreach ($query->result() as $row)
					{
						$list_arr[$row->id] = $row->city_name;
					}
					
				}$result = $list_arr;
				break;
			case 'count':
				$result = $query->num_rows();
				break;
		}
		//echo $this->db->last_query();die;
		
		return $result;
	}
function count_data($select='*',$conditions='',$conditions_like='',$conditions_where='',$return_type='array')
	{
		$result = array();
		//echo $limit;
		//echo $offset;die;
		
		$this->db->select($select);
		
		if($conditions != '')
		{
			$this->db->like($conditions);
		}
		if($conditions_like != '')
		{
			$this->db->or_like($conditions_like);
		}
		
		if($conditions_where != '')
		{
			$this->db->where($conditions_where);
		}
		
		$query = $this->db->get($this->table);
		
		switch($return_type)
		{
			case 'array':
			case '':
				if($query->num_rows()> 0) {$result = $query->result();} 
				break;
			case 'row':
				if($query->num_rows()> 0) {$result = $query->row();} 
				break;
			case 'list':
				$list_arr[''] = 'Select';
				if($query->num_rows() > 0){
					foreach ($query->result() as $row)
					{
						$list_arr[$row->id] = $row->city_name;
					}
					
				}$result = $list_arr;
				break;
			case 'count':
				$result = $query->num_rows();
				break;
		}
		//echo $this->db->last_query();//die;
		return $result;
	}
}
?>