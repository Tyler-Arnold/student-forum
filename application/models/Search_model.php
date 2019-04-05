<?php
	class Search_model extends CI_model{
	
		public function __construct(){
			$this->load->database();
			$this->load->library('session'); 
		}
		
		public function getsearchmsgs(){
			$searchinput = $this->input->post('entersearch');
			$userid=$this->session->userdata('id');
			
			$query = $this->db->select("me.id, me.sender, me.message_body, link.message_id, link.user_id, us.id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_user_messages_link as link", "me.id=link.message_id")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("link.user_id", $this->session->userdata('id'))
				  ->like('message_body',$searchinput)
				  ->order_by('timestamp', 'DESC')
				  ->get();
				  
			return $query->result_array();
			
		}
		
		public function getsearchsent(){
			$searchinput = $this->input->post('entersearch');
			$userid=$this->session->userdata('id');
			
			$query = $this->db->select("me.id, me.sender, me.message_body, link.message_id, link.user_id, us.id, us.username")
		          ->from("forum_messages as me")
				  ->join("forum_user_messages_link as link", "me.id=link.message_id")
				  ->join("forum_users as us", "me.sender=us.id")
				  ->where("me.sender", $this->session->userdata('id'))
				  ->like('message_body',$searchinput)
				  ->order_by('timestamp', 'DESC')
				  ->get();
				  
			return $query->result_array();
		}
		
		
		public function getsearchusers(){
			$searchinput = $this->input->post('entersearch');
			$this->db->select('*');
			$this->db->from('forum_users');
			$this->db->like('username',$searchinput);
			$query=$this->db->get();
			return $query->result_array();
		}
	
	
	
	
	}
	
	
	
	
	
?>