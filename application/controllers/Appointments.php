<?php
class Appointments extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('calendar_model'); // load our custom model
        $this->load->library('session');
    }

    public function book($user=1, $date='2019-04-05') {
        $data['title'] = "Your Feed"; // page title
        $userid=$this->session->userdata('id');

        if(isset($userid)){
			$date = date("Y-m-d", strtotime($date));
			$data['user'] = $user;
			$data['date'] = $date;
			$data['appointments'] = $this->calendar_model->get_appointments($date, $user);
            $data['title'] = "Book Appointment"; // Capitalize the first letter
            $this->load->helper('form'); // form helper functions, used in the create view
            $this->load->library('form_validation'); // load form validation library

            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('recipient', 'Recipient', 'required');
			$this->form_validation->set_rules('time', 'Time', 'required');

            $this->load->view('templates/header', $data); //load header
			$this->load->view('pages/appointments', $data); //load appointments

            if ($this->form_validation->run() === FALSE) { // form failed validation
              $this->load->view('pages/book', $data); //load message box
            } else { // form validated successfully
              $this->load->view('pages/book', $data); //load message box
              $this->calendar_model->set_appointment(); // call function in model to put validated data into database
              redirect($this->uri->uri_string());
            }

            $this->load->view('templates/footer', $data); //load footer

        } else {
              redirect('user/login','refresh');
        }

    }

}
