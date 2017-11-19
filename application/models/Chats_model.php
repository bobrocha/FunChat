<?php
class Chats_Model extends CI_Model {

	private $conn;

	// set up model
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->conn = $this->db->conn_id;
	}

	// get all chats
	private function getChats()
	{
		$sql = '';
	}

	public function hasChats($userid)
	{
		$sql = 'SELECT COUNT(*) `message_count`
				FROM `message_recipient`
				WHERE `recipient_id` = ?';

		if ($stmt = $this->conn->prepare($sql)) {
			// bind variable to prepared statement
			$stmt->bind_param('i', $userid);

			// execute prepared statement
			$stmt->execute();

			// store whole result to get properties, downloads all rows
			$stmt->store_result();

			// bind result to specified variable
			$stmt->bind_result($result);

			// fetch result from statement and place into bound variable(s)
			$stmt->fetch();

			// free the result
			$stmt->free_result();

			// close statement
			$stmt->close();

			if ($result) {
				return true;
			}
			return false;
		}
	}
}