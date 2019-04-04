<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load our custom model
        $this->load->model('calendar_model'); // load our custom model
        $this->load->library('session');
    }

    public function index() {
        $data['user'] = $this->session->userdata('id');
        $data['messages'] = $this->feed_model->get_messages();
        $data['title'] = "Your Feed"; // Capitalize the first letter

        $this->load->helper('form'); // load form helper
		$this->load->view('templates/header', $data); //load header
		$this->load->view('pages/message-box', $data); //load message box
        $this->load->view('pages/feed', $data); //load message box
		$this->load->view('templates/footer', $data); //load footer

    }

}
