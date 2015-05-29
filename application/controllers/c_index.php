<?php
	
	/**
	* 
	*/
	class c_index extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('login_model');
		}

		function index()
		{	
			$this->load->view('view_index');	
		}

		function admin_umrah()
		{
			// $this->session->sess_destroy();
			// var_dump($this->session->all_userdata());

			if(empty($this->session->userdata('level')) && $this->session->userdata('level')!= 'admin')
				{
					$this->load->view('admin/admin_login');
				}
			else
				{
					redirect(base_url('admin_controller/', 'refresh'));
				}	
		}

		function agen_umrah()
		{
			if(empty($this->session->userdata('level')) && $this->session->userdata('level')!= 'agen')
				{
					$this->load->view('agen/agen_login');
				}
			else
				{
					redirect(base_url('agen_controller/', 'refresh'));
				}

		}

		function admin_login(){

			if($this->login_model->admin_login()){
				redirect('admin_controller/');
			}
			
			else
			{
				redirect('login/admin_login','refresh');
			}
		}

		function agen_login(){

			if($this->login_model->agen_login()){
				redirect('agen_controller/');
			}
			
			else
			{
				redirect('login/agen_login','refresh');
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}