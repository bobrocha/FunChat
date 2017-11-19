<?php
class Search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('find_users_model');
		session_start();

		if (!$_SESSION['isloggedin']) {
			header('Location:' . site_url());
			exit;
		}
		
	}

	public function index()
	{
		// prepare custom data
		$data['title'] = 'Search';
		$data['custom_css'] = "<link href='".base_url()."assets/css/new_chat.css' rel='stylesheet'>";
		$data['script'] = "<script src='".base_url().'assets/'."js/sticky.js'></script>
							<script src='".base_url().'assets/'."js/search_by_username.js'></script>
							<script>$('.sticky').Stickyfill();</script>\n";

		$this->load->view('templates/header', $data);
		$this->load->view('search');
		$this->load->view('templates/footer');
	}

	public function searchByUsername()
	{
		if ($username = $this->input->get('username', true)) {
			$usernames = $this->find_users_model->searchByUsername($username);

			if (!empty($usernames)) {
				$this->jsonResponse(array('status' => 'success', 'usernames' => $usernames));
				return;
			}

			$this->jsonResponse(array('status' => 'error'));
		}
	}

	private function jsonResponse($response)
	{
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response));
	}

}