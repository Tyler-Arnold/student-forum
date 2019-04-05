<?php
	class User extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('user_model');
			$this->load->library('session');
		}

		public function index() {
			$data['title'] = "Login";
            $data['user'] = 0;

			$this->load->view('templates/header',$data);
			$this->load->view('user/login');
			$this->load->view('templates/footer');
		}

		public function register() {
			$data['title'] = "Register";
            $data['user'] = 0;
			$data['errormsg']='';
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');



			if ($this->form_validation->run() === FALSE) {
			// Registration failed, missing field
				$this->load->view('templates/header',$data);
				$this->load->view('user/register',$data);
				$this->load->view('templates/footer');
			} else {
				if($this->user_model->register_user()) {
					//Successful, added to database
					$this->load->view('templates/header',$data);
					$this->load->view('user/success');
					$this->load->view('templates/footer');
				} else {
					//Username taken, try again
					$data['errormsg']='Username already taken';
					$this->load->view('templates/header',$data);
					$this->load->view('user/register',$data);
					$this->load->view('templates/footer');
				}
			}
		}

		public function loginview() {
			$data['title'] = "Login";
            $data['user'] = 0;
			$data['errormsg']='';
			$this->load->view('templates/header',$data);
			$this->load->view('user/login');
			$this->load->view('templates/footer');
		}

		public function login() {
			$data['title'] = "Login";
			$data['errormsg']='';
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('logname', 'Username', 'required');
			$this->form_validation->set_rules('logpass', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {
				// Login failed, missing field
				$this->load->view('templates/header',$data);
				$this->load->view('user/login');
				$this->load->view('templates/footer');
				$this->session->set_flashdata('error_msg','Login Failed');
			} else {
				//check if username is valid and password, if so then logs in
				//and redirects to feed
				if($this->user_model->login_user()==false){
					$data['errormsg']='Username/password incorrect';
					$this->load->view('templates/header',$data);
					$this->load->view('user/login');
					$this->load->view('templates/footer');
				} else {
					//success
					redirect('feed/index','refresh');
				}
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('user/login','refresh');
		}

	}
?>
