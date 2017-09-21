<?php
class Signup_Model extends CI_Model {

	// database connection
	private $conn;

	// codeigniter does not use prepared statements
	// get connection id to use mysqli prepared statements
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->conn = $this->db->conn_id;
	}

	// checks to see if email exitst
	public function emailExists($email)
	{
		$sql = 'SELECT `email` FROM `users` WHERE `email` = ?';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();

			if ($stmt->num_rows) {
				$stmt->free_result();
				$stmt->close();
				return true;
			}
			return false;
		}
	}

	// checks to see if unsername exists
	public function usernameExists($username)
	{
		$sql = 'SELECT `username` FROM `users` WHERE `username` = ?';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();

			if ($stmt->num_rows) {
				$stmt->free_result();
				$stmt->close();
				return true;
			}
			return false;
		}		
	}

	// inserts user data to database
	public function createAccount($fname, $lname, $uname, $email, $pword)
	{
		$sql = 'INSERT INTO `users` (fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?)';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('sssss', $fname, $lname, $uname, $email, $pword);
			$stmt->execute();
			
			if ($stmt->affected_rows) {
				$stmt->free_result();
				$stmt->close();
				return true;
			}
			return false;
		}		
	}	
}