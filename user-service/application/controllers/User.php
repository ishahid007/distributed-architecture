<?php
require APPPATH . 'libraries/Rest_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends REST_Controller
{
    // constructor for the class
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('Php_func');
    }

    // default GET method
    public function index_get(){
        $id = $this->uri->segment(4);

         if ($id !== NULL) {
            $user = $this->User_model->getUser($id);
        } else{
            $user = $this->User_model->getUser();
        }

        if ($user) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $user
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'User not found'
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
            
         /* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('name', 'Name', 'required'); 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
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
        $email = $this->post('email');
        $password = md5($this->post('password'));
        $name = $this->post('name');
        $role = $this->post('role') && $this->post('role') == 'admin' ? 'admin' : 'student';


        $data = 
        [
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'role' => $role
        ];

        if ($this->User_model->createUser($data) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'New User has been created',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to create User'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }

    // default POST method
    public function update_post(){
        

        if($this->input->post("id") === NULL){
            return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'provide a user id'
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }

        $id       = $this->post("id");
        // 
        $name     = $this->post('name') ?? NULL;
        $email    = $this->post('email') ?? NULL;
        $password = $this->post('password') ?? NULL;
        
        $data = ['id' => $id ];

        if (!empty($email)) {
            $data += ['email' => $email];
        
        }

        if (!empty($password)) {
            $data += ['password' => $password];
        
        }

        if (!empty($name)) {
            $data += ['name' => $name];
        
        }

        if ($this->User_model->updateUser($data, $id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'User has been updated',
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to update User'
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
                    'message' => 'Provide a USER ID'
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }

        if ($this->User_model->deleteUser($id) > 0) {
            return $this->response(
                [
                    'success' => TRUE,
                    'message' => 'User has been deleted'
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        }

        return $this->response(
            [
                'success' => FALSE,
                'message' => 'Failed to delete User'
            ],
            REST_Controller::HTTP_BAD_REQUEST,
            TRUE
        );

    }


    // user search by by e-mail, password and role
    public function login_post(){

        
        /* Load form validation library */ 
        $this->load->library('form_validation');
            
         /* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('email', 'Email', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_rules('role', 'role', 'required'); 
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
        $email = $this->post('email');
        $password = md5($this->post('password'));
        $role = $this->post('role') && $this->post('role') == 'admin' ? 'admin' : 'student';

        // search
        $data = $this->User_model->searchUser($email, $password, $role);
        if (!empty($data)) {
            return $this->response(
                [
                    'success' => TRUE,
                    'data' => $data
                ],
                REST_Controller::HTTP_OK,
                TRUE
            );
        } else {

             return $this->response(
                [
                    'success' => FALSE,
                    'message' => 'Invalid Username or Password',
                ],
                REST_Controller::HTTP_BAD_REQUEST,
                TRUE
            );
        }


    
    }


    // get stats
    public function count_users_get(){

        $user = $this->User_model->countUsers();
        return $this->response(
            [
                'success' => TRUE,
                'data' => $user
            ],
            REST_Controller::HTTP_OK,
            TRUE
        );
    
    }



}