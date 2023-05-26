<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends BASE_Controller_Admin {

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
		$assignments 		= $this->http->request("GET", $this->assignment_url.'/count_assignments');
		$assignments 		= json_decode($assignments);
		if ($assignments->success == true) 
        	// 
        	$data['count_assignments']   = $assignments->data;

		//
		$users 		= $this->http->request("GET", $this->user_url.'/count_users');
		$users 	    = json_decode($users);
		if ($users->success == true) 
        	// 
        	$data['count_users']   = $users->data;

		// 
		$solutions 	 = $this->http->request("GET", $this->solution_url.'/count_solutions');
		$solutions 	 = json_decode($solutions);
		if ($solutions->success == true) 
        	// 
        	$data['count_solutions']   = $solutions->data;
		// 
        
        // 
		$this->load->view('dashboard',$data);
	}



	// Assignments
	public function assignments(){

		$data['title']  = "Assignments";
		$response 		= $this->http->request("GET", $this->assignment_url);
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['assignments']   = $response->data;

        } else {
        	$data['assignments']   = [];
        }
        // 
        $this->load->view('assignments',$data);
	}

	// Assignments view
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
        	// 


        } else {
        	// assignment not found...
        	return show_404();
        }
        // 
        $this->load->view('assignment_view',$data);
	}

	// Assignments create
	public function assignment_create(){
		// 
		$data['title'] 	= "Create Assignment";
        // 
        $this->load->view('assignment_create',$data);
	}

	// assignment create
	public function assignment_save(){
	
		$response 	= $this->http->request("POST", $this->assignment_url, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! Assignment was created successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("assignments");
	}

	// assignment update
	public function assignment_update($id = NULL){
		// 
		if(empty($id))
			return show_404();

		// 
		$response 	= $this->http->request("POST", $this->assignment_url.'/update/'.$id, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! Assignment was submitted successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("assignments/view/".$this->input->post('id')."");
	}


	// assignment delete
	public function assignment_delete($id = NULL){
		// 
		if(empty($id))
			return show_404();

		// 
		$response 	= $this->http->request("DELETE", $this->assignment_url.'/'.$id);
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! Assignment was deleted successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("assignments");
	}



	// solutions
	public function solutions(){

		$data['title']  = "Solutions";
		$response 		= $this->http->request("GET", $this->solution_url);
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['solutions']   = $response->data;

        } else {
        	$data['solutions']   = [];
        }
        // 
        $this->load->view('solutions',$data);
	}

	// solutions view
	public function solution_view($id = NULL){
		// 
		if(empty($id))
			return show_404();

		//  solution fetch
		$response 		= $this->http->request("GET", $this->solution_url."/$id");
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['title']  	  = "Solution #: ".$id;
        	$data['solution']     = $response->data;
        	// 

        	// Fetch the assignment too
        	$assignment 		= $this->http->request("GET", $this->assignment_url.'/'.$response->data->assignment_id);
			$assignment 		= json_decode($assignment);
			// 
			if($assignment->success == true)
        		$data['assignment'] = $assignment->data;
        	// 

        	// Fetch the result too
        	$result 		= $this->http->request("GET", $this->result_url.'/solution-result/'.$id);
			$result 		= json_decode($result);
			// 
			if($result->success == true)
        		$data['result'] = $result->data;
        	// 
        } else {
        	// solution not found...
        	return show_404();
        }
        // 
        $this->load->view('solution_view',$data);
	}


	// result create
	public function result_save(){
	
		$response 	= $this->http->request("POST", $this->result_url, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! Result was saved successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", $response->message);

        }
        // 
        if($this->input->post("solution_id"))
        	return redirect("solutions/view/".$this->input->post("solution_id"));
        else
        	return redirect("solutions");

	}




	// User routes ....
	public function users(){

		$data['title']  = "Users";
		$response 		= $this->http->request("GET", $this->user_url);
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['users']   = $response->data;

        } else {
        	$data['users']   = [];
        }
        // 
        $this->load->view('users',$data);
	}

	// users view
	public function user_view($id = NULL){
		// 
		if(empty($id))
			return show_404();

		//  user fetch
		$response 		= $this->http->request("GET", $this->user_url."/$id");
		$response 		= json_decode($response);
		// 
        if ($response->success == true) {	
        	// 
        	$data['title']  	  = "User #: ".$id;
        	$data['user']   = $response->data;
        	// 


        } else {
        	// user not found...
        	return show_404();
        }
        // 
        $this->load->view('user_view',$data);
	}

	// users create
	public function user_create(){
		// 
		$data['title'] 	= "Create User";
        // 
        $this->load->view('user_create',$data);
	}

	// user create
	public function user_save(){
	
		$response 	= $this->http->request("POST", $this->user_url, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! User was created successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("users");
	}

	// user update
	public function user_update($id = NULL){
		// 
		if(empty($id))
			return show_404();

		// 
		$response 	= $this->http->request("POST", $this->user_url.'/update/'.$id, $this->input->post());
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! User was submitted successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("users/view/".$this->input->post('id')."");
	}


	// user delete
	public function user_delete($id = NULL){
		// 
		if(empty($id))
			return show_404();

		// 
		$response 	= $this->http->request("DELETE", $this->user_url.'/'.$id);
		$response 	= json_decode($response);
		// 
		
		if ($response->success == true) {	
        	// 
        	$this->session->set_flashdata("success", "Success! User was deleted successfuly.");

        } else {
        	// error
        	$this->session->set_flashdata("error", "Error! Try again later");

        }
        // 
        return redirect("users");
	}



	// End to user routes ...







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
		return redirect('/admin');
	}
	// end to function



 } 
        

    
