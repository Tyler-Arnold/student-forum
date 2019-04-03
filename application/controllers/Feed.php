<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load our custom model
		$this->load->library('session'); 
    }

    public function index() {
        $userid=$this->session->userdata('id');
		
		if(isset($userid)){
		$data['messages'] = $this->feed_model->get_messages();
		
        $data['title'] = "Your Feed"; // Capitalize the first letter
		
		$this->load->helper('form'); // form helper functions, used in the create view
		$this->load->library('form_validation'); // load form validation library
		
        //checks if page exists
		// if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
		// 	// Whoops, we don't have a page for that!
		// 	show_404();
		// }

		$this->form_validation->set_rules('recipient', 'Recipient', 'required'); 
		$this->form_validation->set_rules('message', 'Message', 'required'); 
		
		$this->load->view('templates/header', $data); //load header

		if ($this->form_validation->run() === FALSE) { // form failed validation
			$this->load->view('pages/message-box', $data); //load message box
		} else { // form validated successfully
			$this->load->view('pages/message-box', $data); //load message box
			$this->feed_model->send_message(); // call function in model to put validated data into database
			redirect($this->uri->uri_string());
		} 
		
        $this->load->view('pages/feed', $data); //load feed
		$this->load->view('templates/footer', $data); //load footer
		} else {
			redirect('user/login','refresh');
		}

    }

}
