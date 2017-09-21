<?php
class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('signup_model');
	}

	public function index()
	{
		$data['title'] = 'Sign Up';
		$data['custom_css'] = '';
		$data['script'] = "<script src='".base_url().'assets/'."js/signup.js'></script>";

		$this->load->view('templates/header', $data);
		$this->load->view('signup');
		$this->load->view('templates/footer', $data);
	}

	// validates data and creates account
	public function createAccount()
	{
		// array of required post data
		$required_fields = array('fname', 'lname', 'username', 'email', 'pword');
		
		// check if required post data is present
		if ($this->isPostSet($required_fields, $_POST)) {

			// assign values to variables
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$uname = $_POST['username'];
			$email = $_POST['email'];
			$pword = $_POST['pword'];
			
			// validate data
			if (!$this->validLength($uname, 15, 5)) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Username must be 5 or 15 characters long'));
				return;
			} elseif ($this->validUsername($uname) === 0) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid username, only user letters, numbers and _'));
				return;
			} elseif (strlen($pword) < 6) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Password must be at least 6 characters'));
				return;
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid email'));
				return;
			}

			// data has passed validation
			// make sure email and username don't already exist
			if ($this->signup_model->emailExists($email)) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Email already in use, please use another'));
				return;
			} elseif ($this->signup_model->usernameExists($uname)) {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Username already taken'));
				return;
			}

			// everything is good, creat account!
			// hash password
			$pword = password_hash($pword, PASSWORD_DEFAULT);

			// insert data into database
			if($this->signup_model->createAccount($fname, $lname, $uname, $email, $pword)) {
				$this->jsonResponse(array('status' => 'success', 'message' => 'Signup Complete!'));
			} else {
				$this->jsonResponse(array('status' => 'error', 'message' => 'Unable to register user'));
			}

		} else {
			$this->jsonResponse(array('status' => 'error', 'message' => 'Invalid Data Sent'));
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

	// checks length of string agains high and low limit values
	private function validLength($param, $high, $low)
	{
		if (strlen($param) < $low || strlen($param) > $high) {
			return false;
		}
		return true;
	}

	// checks for valid username
	private function validUsername($username)
	{
		return preg_match('/^[a-zA-Z0-9_]{5,15}$/', $username);
	}

	// json repsonse
	private function jsonResponse($response)
	{
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response));
	}
}