<?php
class Find_Users_model extends CI_Model {

	private $conn;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->conn = $this->db->conn_id;
	}

	public function searchByUsername($username)
	{
		$username = '%'.$username.'%';
		$usernames = array();
		$sql = 'SELECT `username` FROM `users` WHERE `username` LIKE ? LIMIT 8';

		if ($stmt = $this->conn->prepare($sql)) {
			// bind variable to prepared statement
			$stmt->bind_param('s', $username);

			// execute prepared statement
			$stmt->execute();

			// get result
			$result = $stmt->get_result();

			while ($row = $result->fetch_assoc()) {
				$usernames[] = $row['username'];
			}

			// free the result
			$stmt->free_result();

			// close statement
			$stmt->close();

			if (!empty($usernames)) {
				return $usernames;
			}
			return false;
		}
	}
}