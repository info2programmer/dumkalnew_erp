<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {


    private $students = 'td_student_details';   // blog table

    public function __construct()
    {
            parent::__construct();
            
    }


    public function getStudents($limit, $offset){


        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $result['rows'] = $this->db->get($this->students, $limit, $offset);
        $result['num_rows'] = $this->db->count_all_results($this->students);

        return $result;

    	
    }


    public function get_students(){


        $this->db->select('*');
        $this->db->from(TBL_STUDENTS);
        $query = $this->db->get();
        
        return $query;

        
    }

}

