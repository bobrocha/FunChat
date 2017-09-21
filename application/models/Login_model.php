<?php
class Login_Model extends CI_Model {

	// database connection
	private $conn;

	// set up model
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->conn = $this->db->conn_id;
	}

	// gets user data
	public function getUserData($email)
	{
		$sql = 'SELECT `id`, `fname`, `lname`, `username`, `password` FROM `users` WHERE `email` = ?';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();

			if ($stmt->num_rows) {
				$stmt->bind_result($id, $fname, $lname, $username, $password);
				$stmt->fetch();
				$stmt->free_result();
	   			 $stmt->close();

				return array(
					'id'		=> $id,
					'fname'		=> $fname,
					'lname'		=> $lname,
					'uname'	=> $username,
					'pword'	=> $password,
				);
			}
			return false;
		}
	}
}