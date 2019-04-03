<?php
	class User_model extends CI_model{
		
		public function __construct(){
			$this->load->library('session'); 
			$this->load->database();
		}
	
		public function register_user(){
			
			
			$user = array(
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'status'=>$this->input->post('status') 
				);
			
			$this->db->insert('forum_users',$user);
		}
		
		public function login_user(){
			$name=$this->input->post('logname');
			$pass=md5($this->input->post('logpass'));
				
			$this->db->select('*');
			$this->db->from('forum_users');
			$this->db->where('username',$name);
			$this->db->where('password',$pass);
			$query=$this->db->get();
			$row=$query->row();
			
			if($query->num_rows()<=0){
				return false;
			} else {
				$this->session->set_userdata('id',$row->id);
				$this->session->set_userdata('username',$row->username);
				return $query->result_array();
			}
			
		}
		
	
	}
?>