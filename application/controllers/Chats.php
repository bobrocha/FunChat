<?php
class Chats extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('chats_model');
		session_start();

		if (!$_SESSION['isloggedin']) {
			header('Location:' . site_url());
			exit;
		}
		
	}

	public function index()
	{
		// prepare custom data
		$data['title'] = 'Chats';
		$data['custom_css'] = "<link href='".base_url()."assets/css/chats.css' rel='stylesheet'>";
		$data['script'] = "<script src='".base_url().'assets/'."js/sticky.js'></script>
							<script src='".base_url().'assets/'."js/chats.js'></script>
							<script>$('.sticky').Stickyfill();</script>\n";

		$this->load->view('templates/header', $data);
		
		if (!$this->chats_model->hasChats($_SESSION['userid'])) {
			$this->load->view('no_chats');
		}

		// load this view if chats present
		//$this->load->view('chats');
		$this->load->view('templates/footer');
	}

	// get all chats
	private function getChats()
	{
		$sql = '';
	}

}
