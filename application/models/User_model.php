<?php
	class User_model extends CI_model{
		
		public function __construct(){
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
				
			$this->db->select(*);
			$this->db->from('forum_users'$name);
			$this->db->where('username',$pass);
			$query=$this->db->get()
			
			if($query->num_rows()>0){
				return false
			} else {
				return true;
			}
			
		}
		
	
	}
?>