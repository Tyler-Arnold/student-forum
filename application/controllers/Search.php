<?php
	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->model('search_model');
			$this->load->library('session');
		}

		public function index(){
			$data['title'] = "Search";
			$data['user'] =$userid=$this->session->userdata('id');

			$this->load->view('templates/header',$data);
			$this->load->view('search/input');
			$this->load->view('templates/footer');
		}

		public function input(){
			$data['user'] =$userid=$this->session->userdata('id');
			$userid=$this->session->userdata('id');
			if(isset($userid)){
				$data['user'] =$userid=$this->session->userdata('id');
				$data['title'] = "Search";
				$data['errormsgs']='';
				$data['errorsent']='';
				$data['errorusers']='';
				$this->load->helper('form');
				$this->load->library('form_validation');


				$this->form_validation->set_rules('entersearch', 'Search', 'required');


				if ($this->form_validation->run() === FALSE) {
				// Search failed, missing field
					$this->load->view('templates/header',$data);
					$this->load->view('search/input');

					$this->load->view('templates/footer'); 
				} else { 
				$data['user'] =$userid=$this->session->userdata('id');
				$userid=$this->session->userdata('id');

					$data['resultmsgs'] = $this->search_model->getsearchmsgs();
					$data['resultusers'] = $this->search_model->getsearchusers();
					$data['resultsent'] = $this->search_model->getsearchsent();
					if(empty($data['resultmsgs'])){
						$data['errormsgs']='No results' ;
					}
					if(empty($data['resultsent'])){
						$data['errorsent']='No results' ;
					}
					if(empty($data['resultusers'])){
						$data['errorusers']='No results' ;
					}

					$this->load->view('templates/header',$data);
					$this->load->view('search/results',$data);
					$this->load->view('templates/footer');
				}

			} else{
				redirect('user/login','refresh');
			}
		}
	}


?>
