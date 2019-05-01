<?php 

class Student_model extends CI_Model {

    public function search_studentID($studentID) {

        $this->db->where('studentID', $studentID);
        $result = $this->db->get('student');

        if($result->num_rows() == 1) {

            return $result->row(0)->studentID;

        } else {
            return false;
        }

    }

    public function get_student_info() {

        $query = $this->db->get('student');

        return $query->result();

    }

}