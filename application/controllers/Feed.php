<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load our custom model
    }

    public function index() {
        $data['messages'] = $this->feed_model->get_messages();
        $data['title'] = "Your Feed"; // Capitalize the first letter
        //checks if page exists
		// if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
		// 	// Whoops, we don't have a page for that!
		// 	show_404();
		// }

        $this->load->helper('form'); // load form helper
		$this->load->view('templates/header', $data); //load header
		$this->load->view('pages/message-box', $data); //load message box
        $this->load->view('pages/feed', $data); //load message box
		$this->load->view('templates/footer', $data); //load footer

    }

}
