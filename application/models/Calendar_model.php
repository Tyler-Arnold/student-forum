<?php
class Calendar_model extends CI_Model {
	public function __construct() {
        $this->load->database();
	}

    // PLEASE DO NOT LEAVE THE DEFAULT USER IN THIS FUNCTION
	public function get_calendar($month = date('n'), $user = 1) {  // by default, month is current month
        
        return $query->result_array();
	}
}
