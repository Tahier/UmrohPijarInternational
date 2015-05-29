<?php
	
		/**
		* 
		*/
		class agen_model extends CI_Model
		{
			private $tablename  = 'agen';
			private $primarykey = 'agen_id';
			
			function agen_get_paged_list($limit = 10, $offset = 0, $order_column = '', $order_type = 'asc')
			{
					if (empty($order_column) || empty($order_type))
					$this->db->order_by($this->primarykey, 'asc');
					
					else
					$this->db->order_by($order_column, $order_type);
					
					return $this->db->get($this->tablename, $limit, $offset);
			}

			function agen_count_all()
			{
				return $this->db->count_all($this->tablename);
			}

			function nomor_to_primary($id){
				
				$this->db->select('agen_id');
				$this->db->where('agen_nomor', $id);
				return $this->db->get($this->tablename);
			}

			function agen_get_by_id($id){
				$this->db->where($this->primarykey, $id);
				return $this->db->get($this->tablename);
			}


			public function maximum(){
				$this->db->select_max($this->primarykey,'agen');
				return $this->db->get($this->tablename);
			}

			function add_agen()
			{
				//load helper
				$this->load->helper('url');


				//tentukan ID agen dari number maximal di database tambah 1
				$max = $this->maximum()->result_array();
				
				foreach ($max as $k) {
					$m = $k['agen'];
				}

				$split = str_split($m);
				
				for($i=1; $i<=count($split)-1; $i++){
					$id = $split[$i];
				}
				$ids = $id+1;
				$idss = "A00".$ids;


				$data = array('agen_id' => $idss,
							   'agen_nama' => $this->input->post('agen_nama'),
							   'agen_alamat' => $this->input->post('agen_alamat'),
							   'agen_tlp' => $this->input->post('agen_tlp'),
							   'agen_nomor' => $this->input->post('agen_nomor'),
							   'agen_contact_name' => $this->input->post('agen_contact_name'),
							   'agen_contact_phone' => $this->input->post('agen_contact_phone'),
							   'agen_contact_email' => $this->input->post('agen_contact_email'),
							   'agen_contact_ttl' => date('Y-m-d', strtotime($this->input->post('agen_contact_ttl'))),
							   'agen_contact_ktp' => $this->input->post('agen_contact_ktp'),
							   'agen_contact_tempat_lahir' => $this->input->post('agen_contact_tempat_lahir'),
							   'agen_contact_nama_ayah' => $this->input->post('agen_contact_nama_ayah'),
							   'agen_contact_tlp' => $this->input->post('agen_contact_tlp'),
							   'agen_contact_tlp_kantor' => $this->input->post('agen_contact_tlp_kantor'),
							   'agen_contact_no_paspor' => $this->input->post('agen_contact_no_paspor'),
							   'agen_contact_tgl_pembuatan' => date('Y-m-d', strtotime($this->input->post('agen_contact_tgl_pembuatan'))),
							   'agen_contact_bank' => $this->input->post('agen_contact_bank'),
							   'agen_contact_no_rek' => $this->input->post('agen_contact_no_rek'),
							   'agen_contact_bank_cabang' => $this->input->post('agen_contact_bank_cabang'),
							   'agen_username' => $this->input->post('agen_username'),
							   'agen_password' => $this->input->post('agen_password'),
							   'agen_kode' => $this->input->post('agen_kode'));  
				
				$this->db->insert($this->tablename, $data);
			}

			function update_agen($id){
				

				$data = array(
							   'agen_nama' => $this->input->post('agen_nama'),
							   'agen_alamat' => $this->input->post('agen_alamat'),
							   'agen_tlp' => $this->input->post('agen_tlp'),
							   'agen_nomor' => $this->input->post('agen_nomor'),
							   'agen_contact_name' => $this->input->post('agen_contact_name'),
							   'agen_contact_phone' => $this->input->post('agen_contact_phone'),
							   'agen_contact_email' => $this->input->post('agen_contact_email'),
							   'agen_contact_ttl' => date('Y-m-d', strtotime($this->input->post('agen_contact_ttl'))),
							   'agen_contact_ktp' => $this->input->post('agen_contact_ktp'),
							   'agen_contact_tempat_lahir' => $this->input->post('agen_contact_tempat_lahir'),
							   'agen_contact_nama_ayah' => $this->input->post('agen_contact_nama_ayah'),
							   'agen_contact_tlp' => $this->input->post('agen_contact_tlp'),
							   'agen_contact_tlp_kantor' => $this->input->post('agen_contact_tlp_kantor'),
							   'agen_contact_no_paspor' => $this->input->post('agen_contact_no_paspor'),
							   'agen_contact_tgl_pembuatan' => date('Y-m-d', strtotime($this->input->post('agen_contact_tgl_pembuatan'))),
							   'agen_contact_bank' => $this->input->post('agen_contact_bank'),
							   'agen_contact_no_rek' => $this->input->post('agen_contact_no_rek'),
							   'agen_contact_bank_cabang' => $this->input->post('agen_contact_bank_cabang'),
							   'agen_username' => $this->input->post('agen_username'),
							   'agen_password' => $this->input->post('agen_password'),
							   'agen_kode' => $this->input->post('agen_kode'));
			
			$this->db->where($this->primarykey, $id);
			$this->db->update($this->tablename, $data);
	

			}

			function delete_agen($id){
				$this->db->where($this->primarykey, $id);
				return $this->db->delete($this->tablename);
			}
			
		}