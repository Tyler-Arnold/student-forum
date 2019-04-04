<?php
class Calendar_model extends CI_Model {
	public function __construct() {
        $this->load->database();
	}
    // PLEASE DO NOT LEAVE THE DEFAULT USER IN THIS FUNCTION
	public function get_calendar($date, $user = 1) {  // by default, month is current month
		$month = date("m",strtotime($date));
		$year = date("Y",strtotime($date));
        $days_in_month =  cal_days_in_month( CAL_GREGORIAN , $month , date('Y') );
        $days_in_prev_month = $this->get_days_in_previous_month($month);

        // There's a weird bug with the strtotime function.
        // When asked to retrieve the first monday of April 2019, it returns 8 instead of 1.
        $timestamp = strtotime("first monday 2019-$month"); // this is weirdly broken
        $first_monday = date('j', $timestamp); // determine the date of the first monday of the month

        // weird bug with strtotime function means that the first monday is ignored if the month starts on a monday.
        if($first_monday==8) { // as such, this statement checks if the first monday is on the 8th, not the 1st.
            $days_of_prev_month = 0;
        } else {
            $days_of_prev_month = 8 - $first_monday; // determine how many days of the previous month to show
        }

        $calendar = array();

        // add days from previous month
        for($i=0; $i<$days_of_prev_month;$i++){
            $day = $i + ($days_in_prev_month - ($days_of_prev_month-1)); // determine "current day" of previous month
            array_push($calendar, array("day" => $day, "status" => "out-of-month"));
        }

        // loop through all days for this month
        for($i=1; $i<=$days_in_month; $i++) {
            $day = $i;
			$date = date("Y-m-d", strtotime("2019-$month-$day"));
            $status = $this->get_status($date, $user);
            array_push($calendar, array("day" => $day, "status" => $status));
        }

        //determine how many more days need to be added to the calendar to reach the right length
        $days_left = 42 - sizeof($calendar);

        // add trailing days
        for($i=1; $i<=$days_left; $i++) {
            $day = $i;
            array_push($calendar, array("day" => $day, "status" => "out-of-month"));
        }
        return $calendar;
	}

    private function get_days_in_previous_month($cur_month) {
        if($cur_month==1) {
            $month = 12;
        } else {
            $month = $cur_month - 1;
        }
        return cal_days_in_month( CAL_GREGORIAN , $month , date('Y') );
    }

    private function get_status($date, $user) {
        $date = date("Y-m-d", strtotime($date));
        $query = $this->db->select("sender, recipient, date_time, status")
                    ->from("forum_appointments")
                    ->where("DATE(date_time)", $date)
                    ->where("recipient", $user)
                    ->where("status", "accepted")
                    ->get();
        $count = count($query->result());

        if($count>3) {
            return "fully-booked";
        } elseif($count>=1) {
            return "part-booked";
        } else {
            return "available";
        }
    }

	public function get_appointments($date, $user = 1) {
		$date = date("Y-m-d", strtotime($date));
        $query = $this->db->select("sender, recipient, date_time, location, status")
                    ->from("forum_appointments")
                    ->where("DATE(date_time)", $date)
                    ->where("recipient", $user)
                    ->where("status", "accepted")
                    ->get();

		return $query->result_array();
	}

	public function set_appointment() {
		$this->load->helper('url');

		$data = array(
			'sender' => $this->session->userdata('id'),
			'recipient' => $this->input->post('recipient'),
			'date_time' => $this->input->post('date')." ".$this->input->post('time'),
			'location' => $this->input->post('location'),
			'status' => "pending"
		);

		$this->db->insert('forum_appointments', $data);
	}
}
