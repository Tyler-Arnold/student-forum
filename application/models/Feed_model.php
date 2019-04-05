<?php
class Feed_model extends CI_Model {
	public function __construct() {
        $this->load->database();
		$this->load->library('session');
	}

	/*
		This function gets all the messages for the current user.
	*/
	public function get_messages() {  // gets messages out of database
		// this query might break when there's more than one recipient per message
		$query = $this->db->select("me.id, me.sender, me.message_body, link.message_id, link.user_id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_user_messages_link as link", "me.id=link.message_id")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("link.user_id", $this->session->userdata('id'))
				  ->order_by('timestamp', 'DESC')
				  ->get();

        return $query->result_array();
	}

	/*
		This function is used to send a message.
	*/
	public function send_message() { // puts data into database
		$this->load->helper('url');

		$data = array(
			'sender' => $this->session->userdata('id'), // current session user id
			'message_body' => $this->input->post('message') // message from the form
		);

		$recipients = $this->input->post('recipient'); // recipients for the message
		$recipients = explode(",", $recipients); // split the comma-delimited string into individual recipients

		$this->db->insert('forum_messages', $data); // add the message to the message array
		$message_id = $this->db->insert_id(); // get the message id

		return $this->add_message_recipients($message_id, $recipients);
	}
	
	private function translate($username){
		$query=$this->db->select('id')
				 ->from('forum_users')
				 ->where('username',$username)
				 ->get();
				 
				 return $query->row_array();
	
	}

	/*
		This function adds the records to the link table,
		linking recipients to a message.
	*/
	private function add_message_recipients($message_id, $recipients) {
		foreach($recipients as $recipient) {
			$recipient=$this->translate($recipient);
			var_dump($recipient);
			$data = array (
				'user_id' => $recipient['id'],
				'message_id' => $message_id
			);

			$this->db->insert('forum_user_messages_link', $data);
		}

		return true;
	}

	public function reply($messageid){
		$data = array(
			'sender' => $this->session->userdata('id'),
			'message_id' => $messageid,
			'message_body' => $this->input->post('reply')
		);

		$this->db->insert('forum_replies',$data);


	}

	public function get_thread($messageid){
		$query = $this->db->select("me.id, me.sender, me.message_body, link.message_id, link.user_id, us.id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_user_messages_link as link", "me.id=link.message_id")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("me.id", $messageid)
				  ->get();

        return $query->row_array();

	}

	public function get_thread_replies($messageid){

		$query = $this->db->select("us.username,message_body,sender")
		          ->from("forum_replies")
				  ->join("forum_users as us","sender=us.id")
				  ->where("message_id", $messageid)
				  ->order_by('forum_replies.id', 'DESC')
				  ->get();

        return $query->result_array();

	}


}
