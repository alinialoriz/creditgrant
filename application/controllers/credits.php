<?php


class Credits extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('student_model');
    }

    public function index() {
        $this->load->view('credits_view');
    }

    public function search() {
        
        $this->form_validation->set_rules('studentID','"Search Student ID"', 'trim|required|min_length[8]');

        if($this->form_validation->run() == FALSE) {
            
            $data = array (

                'errors' => validation_errors()

            );

            $this->session->set_flashdata($data);
            redirect('credits');
        
        } else {

            $studentID = $this->input->post('studentID');

            $result = $this->student_model->search_student($studentID);

            if($result) {
                
                $student_data = array (

                    'studentID' => $studentID,
                    'result_found' => true

                );

                $this->session->set_userdata($student_data);

                $this->session->set_flashdata('search_success', 'Student ID found');

                redirect('credits');

            } else {

                $this->session->set_flashdata('search_failed', 'Student ID not found'); 

                redirect('credits');


            }

        }

    }

}


?>