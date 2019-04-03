<?php
class Feed_model extends CI_Model {
	public function __construct() {
        $this->load->database();
		$this->load->library('session'); 
	}

	// DO NOT LEAVE THE DEFAULT USER IN THE FINAL SUBMISSION OR I'LL GIVE YOU A ZERO
	public function get_messages() {  // gets news out of database
        //$query = $this->db->get_where('forum_messages', array('recipient' => $user));

		// this query might break when there's more than one recipient per message
		$query = $this->db->select("me.id, me.sender, me.message_body, link.message_id, link.user_id, us.id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_user_messages_link as link", "me.id=link.message_id")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("link.user_id", $this->session->userdata('id'))
				  ->order_by('timestamp', 'DESC')
				  ->get();
        return $query->result_array();
	}

	//TODO rewrite this whole section
	public function send_message() { // puts data into database
		$this->load->helper('url');
	
		$data = array(
			'sender' => $this->session->userdata('id'),
			'recipient' => '69',
			'message_body' => $this->input->post('message')
		);
	
		$recipients = $this->input->post('recipient');
		$recipients = explode(",", $recipients);
	
		$this->db->insert('forum_messages', $data);
		$message_id = $this->db->insert_id();
		
		return $this->add_message_recipients($message_id, $recipients);
	}
	
	private function add_message_recipients($message_id, $recipients) {
		foreach($recipients as $recipient) {
			$data = array (
				'user_id' => $recipient,
				'message_id' => $message_id
			);
			
			$this->db->insert('forum_user_messages_link', $data);
		}
		
		return true;
	}
}
