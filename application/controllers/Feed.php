<?php
class Feed extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('feed_model'); // load our custom model
        $this->load->model('calendar_model'); // load our custom model
        $this->load->library('session');
    }

    /*
        The main feed page. 
    */
    public function index() {
		$userid=$this->session->userdata('id');

        if(isset($userid)){
            $data['user'] = $userid; // The current logged in user (They're the same on the feed)
            $data['current_user'] = $userid; // The owner of the current page (They're the same on the feed)
            $data['title'] = "Your Feed"; // Capitalize the first letter
            $data['messages'] = $this->feed_model->get_messages();
            $date = date("Y-m"); //get current month and year, needed for calendar
            $data['date'] = $date; // Just a year and a month
            $data['calendar'] = $this->calendar_model->get_calendar($date, $userid);

            $this->load->helper('form'); // form helper functions, used in the create view
            $this->load->library('form_validation'); // load form validation library
            $this->form_validation->set_rules('recipient', 'Recipient', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');

            // PAGE LOADING
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
        } else {
            redirect('user/login','refresh');
        }


      }
	  
	  public function thread($messageid){
		$userid=$this->session->userdata('id');
		 if(isset($userid)){
		
		$data['messageid']=$messageid;
		
		$data['user'] = $userid;
		$data['title']='Thread';
		$data['mainmsg']= $this->feed_model->get_thread($messageid);
		$data['replies']= $this->feed_model->get_thread_replies($messageid);
		
		$this->load->helper('form'); // form helper functions, used in the create view
		$this->load->library('form_validation'); // load form validation library
		$this->form_validation->set_rules('reply', 'Message', 'required');
		
		$this->load->view('templates/header',$data); 
	
		
		
		

		if ($this->form_validation->run() === FALSE) { // form failed validation
			$this->load->view('pages/thread',$data);
			
		} else { // form validated successfully
			$this->load->view('pages/thread', $data); //load message box
			$this->feed_model->reply($messageid);// call function in model to put validated data into database
			redirect("feed/thread/$messageid",'refresh');
		}
		$this->load->view('templates/footer');
		 } else{
			redirect('user/login','refresh');
		 }
		
		
	  }

}
