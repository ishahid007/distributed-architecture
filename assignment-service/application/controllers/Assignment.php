<?php
require APPPATH . 'libraries/Rest_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class Assignment extends REST_Controller
{
    // constructor for the class
    public function __construct(){
        parent::__construct();
        $this->load->model('Assignment_model');
        $this->load->library('Php_func');
    }

    // default GET method
    public function index_get(){
        $id      = $this->uri->segment(4);
        


         if ($id !== NULL) {
            $assignment = $this->Assignment_model->getAssignment($id);
        } else{
            $assignment = $this->Assignment_model->getAssignment();
        }

        if ($assignment) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $assignment
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Assignment not found'
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
        $this->form_validation->set_rules('title', 'Title', 'required'); 
        $this->form_validation->set_rules('description', 'Description', 'required'); 
        $this->form_validation->set_rules('deadline', 'Deadline', 'required'); 
       
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
        $title = $this->post('title');
        $description = $this->post('description');
        $deadline = $this->post('deadline');


        $data = 
        [
            'title' => $title,
            'description' => $description,
            'deadline' => $deadline
        ];

        if ($this->Assignment_model->createAssignment($data) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'New Assignment has been created',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to create Assignment'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }

    // default PUT method
    public function update_post(){


        if($this->input->post("id") === NULL){
            return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'Provide an id'
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }
        $id    = $this->input->post("id");
        $title = $this->post('title') ?? NULL;
        $description = $this->post('description') ?? NULL;
        $deadline = $this->post('deadline') ?? NULL;
        
        $data = ['id' => $id ];

        if (!empty($title)) {
            $data += ['title' => $title];
        
        }

        if (!empty($description)) {
            $data += ['description' => $description];
        
        }

        if (!empty($deadline)) {
            $data += ['deadline' => $deadline];
        
        }


        if ($this->Assignment_model->updateAssignment($data, $id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'Assignment has been updated',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to update Assignment'
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

        if ($this->Assignment_model->deleteAssignment($id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'Assignment has been deleted'
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to delete Assignment'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }

    // get stats
    public function count_assignments_get(){

        $assignment = $this->Assignment_model->countAssignments();
        return $this->response(
            [
                'success' => TRUE,
                'data' => $assignment
            ],
            REST_Controller::HTTP_OK,
            TRUE
        );
    
    }

}