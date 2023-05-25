<?php
require APPPATH . 'libraries/Rest_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class Result extends REST_Controller
{
    // constructor for the class
    public function __construct(){
        parent::__construct();
        $this->load->model('Result_model');
        $this->load->library('Php_func');
    }

    // default GET method
    public function index_get(){
        $id = $this->uri->segment(4);

         if ($id !== NULL) {
            $result = $this->Result_model->getResult($id);
        } else{
            $result = $this->Result_model->getResult();
        }

        if ($result) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $result
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Result not found'
            ],
            REST_Controller::HTTP_NOT_FOUND,
            TRUE
        );
    }

    // default POST method
    public function index_post(){
        // Codeigniter Form validation

        /* Load form validation library */ 
        $this->load->library('form_validation');
            
         /* Set validation rule for fields in the form */ 
        $this->form_validation->set_rules('solution_id', 'Solution ID', 'required'); 
        $this->form_validation->set_rules('percentage', 'Percentage', 'required'); 
       
        // failed
        if ($this->form_validation->run() == FALSE) { 
             return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'Validation error, All Fields are required',
                    'errors'  => $this->form_validation->error_array(),
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }
        $solution_id = $this->post('solution_id');
        $percentage = $this->post('percentage');
        $remarks = $this->post('remarks');


        $data = 
        [
            'solution_id' => $solution_id,
            'percentage' => $percentage,
            'remarks' => $remarks,
        ];

        if ($this->Result_model->createResult($data) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'New Result has been created',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to create Result'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }

    // default DELETE method
    public function index_delete(){
        $id = $this->uri->segment(4);

        if($id === NULL){
            return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'provide an id'
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }

        if ($this->Result_model->deleteResult($id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'Result has been deleted'
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to delete Result'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }

    // Provide the specific user result base on the assignment id
    public function user_assignment_solution_get($user_id = NULL, $assignment_id = NULL){

        //
        if(empty($user_id) || empty($assignment_id)){
            return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'Validation error, All Fields are required',
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }
       

        #
        $result   = $result = $this->Result_model->getSolutionWithResult($user_id, $assignment_id);
        if ($result) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $result
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Result not found'
            ],
            REST_Controller::HTTP_NOT_FOUND,
            TRUE
        );
        
    }

}