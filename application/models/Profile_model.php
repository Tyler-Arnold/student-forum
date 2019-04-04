<?php
class Profile_model extends CI_Model {
	public function __construct() {
        $this->load->database();
        $this->load->library('session');
	}

    
    public function get_username($user){
        $query = $this->db->select("username")
            ->from("forum_users")
            ->where("id", $user)
            ->get();
        $row = $query->row_array();
        return $row['username'];
    }
    
    
    public function set_bio() {
        $this->db->select("bio")
			->from("forum_users")
			->where("bio", $bio)
			>get();
        $row=$query->row();
			if($query->num_rows()==1){
				return false;
			} else {
				$this->db->insert('forum_users',$bio);
				return true;
			}
	}
    
    
    public function get_bio($user) {
        $query = $this->db->select("bio")
            ->from("forum_users")
            ->where("id", $user)
            ->get();
        $row = $query->row_array();
        return $row['bio'];
	}
    
    
    public function set_profile_pic() {
        
	}
    
    
    public function get_profile_pic($user) {
        $query = $this->db->select("profile_picture")
            ->from("forum_users")
            ->where("id", $user)
            ->get();
        $row = $query->row_array();
        return $row['profile_picture'];
	}
}