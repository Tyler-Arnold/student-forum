<?php
	class Search_model extends CI_model{
	
		public function __construct(){
			$this->load->database();
		}
		
		public function getsearchmsgs(){
			$searchinput = $this->input->post('search')
			$this->db->select('*');
			$this->db->from('forum_messages');
			$this->db->like('message_body',$searchinput);
			$query=$this->db->get();
			return $query->result();
		}
		
		
		public function getsearchusers(){
			$searchinput = $this->input->post('search')
			$this->db->select('*');
			$this->db->from('forum_users');
			$this->db->like('username',$searchinput);
			$query=$this->db->get();
			return $query->result();
		}
	
	
	
	
	}
	
	
	
	
	
?>