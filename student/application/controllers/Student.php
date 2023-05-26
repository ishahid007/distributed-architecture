<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends BASE_Controller_Student {

	private $user_url 		= "http://php_user/index.php/api/v1/user";
	private $assignment_url = "http://php_assignment/index.php/api/v1/assignment";
	private $solution_url   = "http://php_solution/index.php/api/v1/solution";
	private $result_url     = "http://php_result/index.php/api/v1/result";
	// 
	private $user_id;



	public function __construct(){
		parent::__construct();

		// 
		$this->user_id = $this->session->userdata('id');
	}


	
	public function index()
	{

		$data['title']   = 'Dashboard';
		//
		$response 		= $this->http->request("GET", $this->assignment_url.'/count_assignments');
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['count']   = $response->data;

        }
        // 
		$this->load->view('dashboard',$data);
	}



	// Assignments
	public function assignments(){

		$data['title']  = "Assignments";
		$response 		= $this->http->request("GET", $this->assignment_url);
		$response 		= json_decode($response);
		// 
		$data['assignments'] 	   = [];
        if ($response->success == true) {	
        	// 
        	$data['assignments']   = $response->data;

        }
        // 
        $this->load->view('assignments',$data);
	}

	// Assignments
	public function assignment_view($id = NULL){
		// 
		if(empty($id))
			return show_404();

		//  Assignment fetch
		$response 		= $this->http->request("GET", $this->assignment_url."/$id");
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['title']  	  = "Assignment #: ".$id;
        	$data['assignment']   = $response->data;


        	// Fetch the solution too	
        	$solution 		= $this->http->request("GET", $this->solution_url.'/user-assignment-solution/'.$this->user_id.'/'.$id);
			$solution 		= json_decode($solution);
			// 
			if($solution->success == true){
        		$data['solution'] = $solution->data;

	        	// Fetch the result too
	        	$result 		= $this->http->request("GET", $this->result_url.'/solution-result/'.$solution->data->id);
				$result 		= json_decode($result);
				// 
				if($result->success == true)
	        		$data['result'] = $result->data;
			}

        	// 


        } else {
        	// assignment not found...
        	return show_404();
        }
        // 
        $this->load->view('assignment_view',$data);
	}

	// Assignments
	public function assignment_submit($id = NULL){
		// 
		if(empty($id))
			return show_404();

		// 
		$response 		= $this->http->request("GET", $this->assignment_url."/$id");
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['title']  	  = "Assignment #: ".$response->data->id;
        	$data['assignment']   = $response->data;

        } else {
        	// assignment not found...
        	return show_404();
        }
        // 
        $this->load->view('assignment_submit',$data);
	}



	// Solution
	public function solution_save(){

		// Custom SET
		$_POST['user_id']  = $this->session->userdata("id");
		// 
		$response 	= $this->http->request("POST", $this->solution_url, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! Solution was submitted successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("assignments/view/".$this->input->post('assignment_id')."");
	}



	// login view function
	public function login(){
        //
        $this->load->view('login');
	}


	 // LOGIN FUNCTION
    public function auth()
    {
		//
		$response = $this->http->request("POST", $this->user_url.'/login', $this->input->post());
		$response = json_decode($response);
        if ($response->success == true) {

            $this->session->set_userdata('id', $response->data->id);
            $this->session->set_userdata('name', $response->data->name);
            $this->session->set_userdata('role', $response->data->role);
            $this->session->set_userdata('created_at', $response->data->created_at);


           // redirect 
            return redirect("dashboard");

        } else {
            $this->session->set_flashdata('msg', $response->message);
            return redirect($_SERVER['HTTP_REFERER']);
        }
    }



	// function to do user Logout

	public function logout()
	{

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('type');
		$this->session->unset_userdata('picture');
		$this->session->unset_userdata('created_at');
		$this->session->sess_destroy();
		return redirect('/student');
	}
	// end to function



 } 
        

    
