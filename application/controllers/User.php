<?php 
	class User extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('user_model');
		}
		
		public function index(){
			$data['title'] = "Register";
			
			$this->load->view('templates/header',$data);
			$this->load->view('user/register',$data);
			$this->load->view('templates/footer');
		}
		
		public function register(){
			$data['title'] = "Register";
			$this->load->helper('form'); 
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'required'); 
			$this->form_validation->set_rules('password', 'Password', 'required'); 
			

				
				if ($this->form_validation->run() === FALSE) { 
					$this->load->view('templates/header',$data); 
					$this->load->view('user/register'); 
					$this->load->view('templates/footer'); 
				} else { 
					$this->user_model->register_user(); 
					$this->load->view('templates/header',$data); 
					$this->load->view('user/success');
					$this->load->view('templates/footer'); 
				} 
		}
		
		public function loginview(){
			$data['title'] = "login";
			$this->load->view('templates/header',$data); 
			$this->load->view('user/login'); 
			$this->load->view('templates/footer'); 
		}
		
		public function login(){
			
			
		}
		
	}
?>