<?php 

class Student_model extends CI_Model {

    public function search_student($studentID) {

        $this->db->where('studentID', $studentID);
        $result = $this->db->get('student');

        if($result->num_rows() == 1) {

            return $result;

        } else {
            return false;
        }

    }

}