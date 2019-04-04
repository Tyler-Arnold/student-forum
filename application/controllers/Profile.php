<?php 
	class Profile extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('user_model');
			$this->load->library('session'); // loads session library
            
            $this->load->model('profile_model'); // load our custom model
		}
		
		public function index($user) {
			$data['title'] = $this->profile_model->get_username($user);
			$data['profile_pic'] = $this->profile_model->get_profile_pic($user); // gets current profile pic
            $data['bio'] = $this->profile_model->get_bio($user); // gets current bio
            $data['user'] = $this->session->userdata('id');
            $data['current_user'] = $user;
            
                $this->load->helper('form'); // load form helper
				$this->load->view('templates/header', $data); //load header
				$this->load->view('pages/profile', $data); //profile content
				$this->load->view('templates/footer', $data); //load footer

		}
        public function profile_config() {
            $user = $this->session->userdata('id');
			$data['user'] = $user;
            $data['title'] = $this->profile_model->get_username($user);
			$data['profile_pic'] = $this->profile_model->get_profile_pic($user); // gets current profile pic
            //$data['profile_pic'] = $this->profile_model->set_profile_pic($user); // allows for setting new profile picture
            $data['bio'] = $this->profile_model->set_bio($user); // allows for setting new bio
            
            $this->load->helper('form'); // load form helper
				$this->load->view('templates/header', $data); //load header
				$this->load->view('pages/profile-config', $data); //profile content
				$this->load->view('templates/footer', $data); //load footer
		}        
	}
?>