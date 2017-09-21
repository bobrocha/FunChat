<?php
class New_Chat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('new_chat_model');
		session_start();

		// make sure user is logged in
		if (!$_SESSION['isloggedin']) {
			header('Location:' . site_url());
			exit;
		}
		
	}

	public function index()
	{
		// prepare custom data
		$data['title'] = 'New Chat';
		$data['custom_css'] = "<link href='".base_url()."assets/css/new_chat.css' rel='stylesheet'>";
		$data['script'] = "<script src='".base_url().'assets/'."js/sticky.js'></script>
							<script src='".base_url().'assets/'."js/new_chat.js'></script>
							<script>$('.sticky').Stickyfill();</script>\n";

		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('new_chat');
		$this->load->view('templates/footer');
	}

	// autocomplete function
	private function autocomplete()
	{
		echo 'hello';
	}

	// shows users
	public function getUsers()
	{
		echo 'getting users...';

		// check $_GET variable
		if (!empty($_GET['username'])) {
			echo 'getting by username';
			// send data to model
			$this->new_chat_model->getByUsername($_GET['username']);
		}
		// echo '<pre>';
		// print_r($GLOBALS);
	}

}