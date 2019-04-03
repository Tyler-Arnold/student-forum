<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load feed model
        $this->load->model('calendar_model'); // load our custom model
    }

    public function index() {
        $data['messages'] = $this->feed_model->get_messages();
        $data['calendar'] = $this->calendar_model->get_calendar(date('n'));

        $data['title'] = "Your Feed"; // page title
        $data['today'] = date('d');
        $data['cal_start'] = 1; // date of the first monday rendered on the calendar (usually end of last month)
        $data['month_end'] = 30; // date of the end of current month
        $data['prev_month_end'] = 31; // date of end of last month (not used if current month starts on Monday)
        $data['title'] = "Your Feed"; // Title

		$this->load->helper('form'); // form helper functions, used in the create view
		$this->load->library('form_validation'); // load form validation library

		$this->form_validation->set_rules('recipient', 'Recipient', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		$this->load->view('templates/header', $data); //load header
        $this->load->view('pages/calendar', $data); //load calendar

		if ($this->form_validation->run() === FALSE) { // form failed validation
			$this->load->view('pages/message-box', $data); //load message box
		} else { // form validated successfully
			$this->load->view('pages/message-box', $data); //load message box
			$this->feed_model->send_message(); // call function in model to put validated data into database
			redirect($this->uri->uri_string());
		}

        $this->load->view('pages/feed', $data); //load feed
		$this->load->view('templates/footer', $data); //load footer

    }

}
