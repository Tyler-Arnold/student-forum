<?php
	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('search_model');
		}
		
		public function index(){
			$data['title'] = "Search";
			
			$this->load->view('templates/header',$data);
			$this->load->view('search/index');
			$this->load->view('templates/footer');
		}
	
		public function search(){
			$data['title'] = "Search";
			$this->load->helper('form'); 
			$this->load->library('form_validation');
			$data['searchmsgs'] = $this->search_model->getsearchmsgs();
			$data['searchusers'] = $this->search_model->getsearchusers();
			$this->load->view('templates/header',$data);
			$this->load->view('search/index',$data);
			$this->load->view('templates/footer');
			
			$this->form_validation->set_rules('Search', 'Search', 'required');  
			
			
			if ($this->form_validation->run() === FALSE) { 
			// Search failed, missing field
				$this->load->view('templates/header',$data); 
				$this->load->view('search/index',$data); 
				$this->load->view('templates/footer'); 
			} else { 
				
				}
			} 
		}
		
	
		
	
	
	}
	
	
	
	
?>