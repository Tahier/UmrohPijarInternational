<?php

	/**
	* 
	*/
	class login_model extends CI_Model
	{
		
		function __construct()
		{
			# code...
		}

		function admin_login(){

			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$this->db->where('admin_username', $username);
			$this->db->where('admin_password', $password);
			$result = $this->db->get('admin');


			if($result->num_rows() > 0){
				foreach ($result->result() as $row) {
					$data = array(
								'admin_id' => $row->admin_id,
								'admin_username' => $row->admin_username,
								'level' => 'admin');
					
					$this->session->set_userdata($data);
				}
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		function agen_login(){

			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$this->db->where('agen_username', $username);
			$this->db->where('agen_password', $password);
			$result = $this->db->get('agen');


			if($result->num_rows() > 0){
				foreach ($result->result() as $row) {
					$data = array(
								'agen_nomor' => $row->agen_nomor,
								'agen_id' => $row->agen_id,	
								'agen_username' => $row->agen_username,
								'level' => 'agen');
					
					$this->session->set_userdata($data);
				}
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
	}