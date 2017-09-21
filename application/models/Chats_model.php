<?php
class Chats_Model extends CI_Model {

	// database connection
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

	// determine if user has sent or received any messages
	public function hasChats($userid)
	{
		$sql = 'SELECT COUNT(*) `message_count`
				FROM `message_recipient`
				WHERE `recipient_id` = ?';

		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('i', $userid);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($result);
			$stmt->fetch();
			$stmt->free_result();
			$stmt->close();

			if ($result) {
				return true;
			}
			return false;
		}
	}
}