<?php
	class Profile extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('user_model');
			$this->load->library('session'); // loads session library
            $this->load->library('form_validation'); // load form validation library

            $this->load->model('profile_model'); // load our custom model
			$this->load->model('calendar_model'); // load our custom model
		}

		public function index($user) {
			$date = date("Y-m"); //get current month and year, needed for calendar
			$data['date'] = $date; // Just a year and a month
			$data['calendar'] = $this->calendar_model->get_calendar($date, $user);
			$data['title'] = $this->profile_model->get_username($user);
			$data['profile_pic'] = $this->profile_model->get_profile_pic($user); // gets current profile pic
            $data['bio'] = $this->profile_model->get_bio($user); // gets current bio
            $data['user'] = $this->session->userdata('id');
            $data['current_user'] = $user;
            $data['status'] = $this->profile_model->get_status($user);

            $this->load->helper('form'); // load form helper
            $this->load->view('templates/header', $data); //load header
            $this->load->view('pages/profile', $data); //profile content
			$this->load->view('pages/calendar', $data); //load calendar
            $this->load->view('templates/footer', $data); //load footer
		}

        public function profile_config() {
            $user = $this->session->userdata('id');
			$data['user'] = $user;
            $data['title'] = $this->profile_model->get_username($user);
			$data['profile_pic'] = $this->profile_model->get_profile_pic($user); // gets current profile pic
            $data['bio'] = $this->profile_model->get_bio($user); // allows for setting new bio
            $data['status'] = $this->profile_model->get_status($user);

            $this->load->helper('form'); // load form helper
            $this->load->view('templates/header', $data); //load header
            $this->load->view('pages/profile-config', $data); //profile content
            $this->load->view('templates/footer', $data); //load footer
		}

        public function submit_form(){
            $user = $this->session->userdata('id'); // gets session user details
            $this->profile_model->set_bio($user); // sets bio upon submit
            $data['profile_picture'] = $this->input->post('profile_picture');

            $config['upload_path']          = './images/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profile_picture')){
				$this->upload->display_errors();
			} else{

				//file is uploaded successfully
				//now get the file uploaded data
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$fileName = $upload_data['file_name'];

				//store pic data to the db
				$this->profile_model->set_profile_pic($user, $fileName);
			}

            redirect("profile/index/$user",'refresh'); // redirect-refresh to changes made (updated profile view)
        }

	}
?>
