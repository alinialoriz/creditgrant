<?php


class Credits extends CI_Controller {

    //load student_model
    function __construct(){
        parent::__construct();
        $this->load->model('student_model');
    }

    //set index view
    public function index() {
        $this->load->view('credits_view');

         // get student information from student_model

         $database_data['students'] = $this->student_model->get_student_info(); 

         $this->load->view('student_view', $database_data);

        
    }

    //search studentID function
    public function search() {
        
        //validate studentID search field input
        $this->form_validation->set_rules('studentID','"Search Student ID"', 'trim|required|min_length[8]');

        //show error message on credits_view page if search input is not valid
        if($this->form_validation->run() == FALSE) {
            
            $data = array (

                'errors' => validation_errors()

            );

            $this->session->set_flashdata($data);
            redirect('credits');
    
        } else {

        //else if search input is valid, check if database contains the studentID input   
            $studentID = $this->input->post('studentID');

            $result = $this->student_model->search_studentID($studentID);
            
            //if studentID match found
            if($result) {
                // update session and notify on credits_view successful search
                $student_data = array (

                    'studentID' => $studentID,
                    'result_found' => true

                );

                $this->session->set_userdata($student_data);

                $this->session->set_flashdata('search_success', 'Student ID found');

                redirect('credits');

            } else {
            //if studentID match NOT found, notify on credits_view unsuccessful search
                $this->session->set_flashdata('search_failed', 'Student ID not found'); 

                redirect('credits');


            }

        }

    }

}


?>