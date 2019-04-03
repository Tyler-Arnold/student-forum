<?php
class Calendar_model extends CI_Model {
	public function __construct() {
        $this->load->database();
	}
    // PLEASE DO NOT LEAVE THE DEFAULT USER IN THIS FUNCTION
	public function get_calendar($month, $user = 1) {  // by default, month is current month
        $days_in_month =  cal_days_in_month( CAL_GREGORIAN , $month , date('Y') );
        $days_in_prev_month = $this->get_days_in_previous_month($month);

        $timestamp = strtotime("first monday 2019-$month");
        $first_monday = date('D', $timestamp); // determine which day the month started on

        if($first_monday==1) {
            $days_of_prev_month = 0;
        } else {
            $days_of_prev_month = 8 - $first_monday; // determine how many days of the previous month to show
        }

        $calendar = array();

        for($i=0; $i<$days_of_prev_month;$i++){ // add days from previous month
            $day = $i + ($days_in_prev_month - ($days_of_prev_month-1)); // determine "current day" of previous month
            array_push($calendar, array("day" => $day, "status" => "out-of-month"));
        }

        for($i=1; $i<=$days_in_month; $i++) {
            $day = $i;
            array_push($calendar, array("day" => $day, "status" => "none"));
        }

        //determine how many more days need to be added to the calendar to reach the right length
        $days_left = 42 - sizeof($calendar);

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
}
