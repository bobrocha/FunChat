<?php
class New_Chat_Model extends CI_Model {

	// database connection
	private $conn;

	// set up model
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->conn = $this->db->conn_id;
	}

	// get user by username
	public function getByUsername($username)
	{
		// set up variables
		$username = "%$username%";
		$result = array();

		$sql = 'SELECT `username` FROM `users` WHERE `username` LIKE ? LIMIT 8';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();
		}
	}
}