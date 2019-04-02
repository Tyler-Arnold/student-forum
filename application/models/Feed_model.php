<?php
class Feed_model extends CI_Model {
	public function __construct() {
        $this->load->database();
	}

	// DO NOT LEAVE THE DEFAULT USER IN THE FINAL SUBMISSION OR I'LL GIVE YOU A ZERO
	public function get_messages($user = '1') {  // gets news out of database
        //$query = $this->db->get_where('forum_messages', array('recipient' => $user));

		$query = $this->db->select("me.id, me.sender, me.recipient, me.message_body, us.id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("me.recipient", $user)
				  ->get();
        return $query->result_array();
	}

	// TODO rewrite this whole section
	// public function set_message() { // puts data into database
	// 	$this->load->helper('url');
	// 	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	//
	// 	$data = array(
	// 		'title' => $this->input->post('title'),
	// 		'slug' => $slug,
	// 		'text' => $this->input->post('text')
	// 	);
	//
	// 	return $this->db->insert('news', $data);
	// }
}
