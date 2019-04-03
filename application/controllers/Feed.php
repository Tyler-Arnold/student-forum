<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load our custom model
    }

    public function index() {
        $data['messages'] = $this->feed_model->get_messages();
        $data['title'] = "Your Feed"; // page title
        $data['today'] = date('d');
        $data['cal_start'] = 1; // date of the first monday rendered on the calendar (usually end of last month)
        $data['month_end'] = 30; // date of the end of current month
        $data['prev_month_end'] = 31; // date of end of last month (not used if current month starts on Monday)

        //checks if page exists
		// if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
		// 	// Whoops, we don't have a page for that!
		// 	show_404();
		// }

        $this->load->helper('form'); // load form helper
		$this->load->view('templates/header', $data); //load header
        $this->load->view('pages/calendar', $data); //load calendar
		$this->load->view('pages/message-box', $data); //load message box
        $this->load->view('pages/feed', $data); //load feed
		$this->load->view('templates/footer', $data); //load footer

    }

}
