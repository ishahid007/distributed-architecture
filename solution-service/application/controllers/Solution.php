<?php
require APPPATH . 'libraries/Rest_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class Solution extends REST_Controller
{
    // constructor for the class
    public function __construct(){
        parent::__construct();
        $this->load->model('Solution_model');
        $this->load->library('Php_func');
    }

    // default GET method
    public function index_get(){
        $id = $this->uri->segment(4);

         if ($id !== NULL) {
            $solution = $this->Solution_model->getSolution($id);
        } else{
            $solution = $this->Solution_model->getSolution();
        }

        if ($solution) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $solution
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Solution not found'
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
        $this->form_validation->set_rules('user_id', 'User ID', 'required'); 
        $this->form_validation->set_rules('assignment_id', 'Assignment ID', 'required'); 
        $this->form_validation->set_rules('description', 'Description', 'required'); 
       
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
        $user_id = $this->post('user_id');
        $assignment_id = $this->post('assignment_id');
        $description = $this->post('description');


        $data = 
        [
            'user_id' => $user_id,
            'assignment_id' => $assignment_id,
            'description' => $description,
        ];

        if ($this->Solution_model->createSolution($data) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'New Solution has been created',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to create Solution'
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

        if ($this->Solution_model->deleteSolution($id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'Solution has been deleted'
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to delete Solution'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }



// get stats
    public function count_solutions_get(){

        $solution = $this->Solution_model->countSolutions();
        return $this->response(
            [
                'success' => TRUE,
                'data' => $solution
            ],
            REST_Controller::HTTP_OK,
            TRUE
        );
    
    }


}