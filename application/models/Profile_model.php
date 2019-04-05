<?php
class Profile_model extends CI_Model {
	public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation'); // load form validation library
	}


    public function get_username($user){
        $query = $this->db->select("username")
		            ->from("forum_users")
		            ->where("id", $user)
		            ->get();
        $row = $query->row_array();
        return $row['username'];
    }

    
    public function get_status($user){
        $query = $this->db->select("status")
		            ->from("forum_users")
		            ->where("id", $user)
		            ->get();
        $row = $query->row_array();
        return $row['status'];
    }
    
    
    public function get_bio($user) {
        $query = $this->db->select("bio")
		            ->from("forum_users")
		            ->where("id", $user)
		            ->get();
        $row = $query->row_array();
        return $row['bio'];
	}

    
    public function set_bio($id) {
        $data = array(
            'bio' => $this->input->post('bio')
        );
        
        $this->db->where('id', $id);
        $this->db->update('forum_users', $data);
	}
    
    
    public function get_profile_pic($user) {
        $query = $this->db->select("profile_picture")
		            ->from("forum_users")
		            ->where("id", $user)
		            ->get();
        $row = $query->row_array();
        return $row['profile_picture'];
	}
    
    
    public function get_all_pics(){
        $all_pics = $this->db->get('forum_users');
        return $all_pics->result();
    }
    
    
    public function set_profile_pic($id, $fileName) {
        $data = array(
            'profile_picture' => $fileName
        );
        
        $this->db->where('id', $id);
        $this->db->update('forum_users', $data);
	}
  
}