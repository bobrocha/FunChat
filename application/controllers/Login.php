<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('login_model');
		session_start();
	}

	public function index()
	{
		// prepare custom data
		$data['title'] = 'Log In';
		$data['custom_css'] = "<link href='".base_url()."assets/css/index.css' rel='stylesheet'>";
		$data['script'] = "<script src='".base_url().'assets/'."js/login.js'></script>";
		
		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('login');
		$this->load->view('templates/footer');
	}

	// log user in
	public function login()
	{
		/*
			note: never give away too much
			information when invalid credentials
			are provided.
		*/

		// array of required post data
		$required_fields = array('email', 'pword');

		// check if required post data is present
		if ($this->isPostSet($required_fields, $_POST)) {

			// assign values to variables
			$email = $_POST['email'];
			$pword = $_POST['pword'];

			// validate data
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid email'));
				return;
			} elseif (strlen($pword) < 6) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Password must be at least 6 characters'));
				return;
			}

			// data has passed validation
			// get user data using provided data
			if ($userData = $this->login_model->getUserData($email)) {
				
				// check passwords for match
				if (!password_verify($pword, $userData['pword'])) {
					$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid Email or Password'));
					return;
				}

				// password matches, populate session variables
				$_SESSION['isloggedin'] = true;
				$_SESSION['userid'] = $userData['id'];
				$_SESSION['fname'] = $userData['fname'];
				$_SESSION['lname'] = $userData['lname'];
				$_SESSION['uname'] = $userData['uname'];
				
				$this->jsonResponse(array('status' => 'success', 'message' => 'Logging you in...'));
				return;
			}
			
			// no such user was found with provided data
			$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid Email or Password'));
			return;

		} else {
			$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid Data Sent', $_POST, $_SESSION));
		}
	}

	// makes sure all required fields are present and not empty
	private function isPostSet($required_fields, $post_arr)
	{
		$isSet = true;

	    foreach ($required_fields as $val) {
	    	// makes sure required key exists and value is not empty
	        if (array_key_exists($val, $post_arr) && !empty(trim($post_arr[$val]))) {
	            continue;
	        } else {
	            $isSet = false;
	            break;
	        }
	    }
    	return $isSet;
	}

	// json reponse
	private function jsonResponse($response)
	{
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response));
	}
}