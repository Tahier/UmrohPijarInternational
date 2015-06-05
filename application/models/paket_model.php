<?php
	
		/**
		* 
		*/
		class paket_model extends CI_Model
		{
			
			private $tablename = 'paket';
			private $primarykey = 'paket_id';

			function __construct()
			{
				parent::__construct();
			}

			function paket_get_paged_list($limit = 10, $offset = 0, $order_column = '', $order_type='asc'){
				if (empty($order_column) || empty($order_type)){
					$this->db->order_by($this->primarykey, 'asc');
				}
				else {
					$this->db->order_by($order_column, $order_type);
				}
				
				return $this->db->get($this->tablename, $limit, $offset);
			}

			function nomor_to_primary($id){
				$this->db->select('paket_id');
				$this->db->where('paket_nomor', $id);
				return $this->db->get($this->tablename);
			}

			function paket_get_by_id($id){
			
				$this->db->select('*');
				$this->db->from($this->tablename);
				$this->db->join('agen', 'agen.agen_id = paket.agen_id', 'left');
				$this->db->where($this->primarykey, $id);
				return $this->db->get();
			}


			function paket_count_all(){
				$this->db->where('agen_id', $this->session->userdata('agen_id'));
				return $this->db->count_all($this->tablename);
			}


			public function maximum(){
				$this->db->select_max($this->primarykey, 'paket');
				return $this->db->get($this->tablename);
			}


			function add_paket(){

				$max = $this->maximum()->result_array();
				
				foreach ($max as $k) {
					$m = $k['paket'];
				}

				$split = str_split($m);
				
				for($i=1; $i<=count($split)-1; $i++){
					$id = $split[$i];
				}
				$ids = $id+1;
				$idss = "P00".$ids;




				$paket_nama = html_escape($this->input->post('paket_nama'));
				$paket_deskripsi = html_escape($this->input->post('paket_deskripsi'));
				$paket_mekah = html_escape($this->input->post('paket_mekah'));
				$paket_madinah = html_escape($this->input->post('paket_madinah'));
				
				$data = array('paket_id' => $idss,
							  'paket_nomor' => $this->input->post('paket_nomor'),
							  'paket_nama' => $paket_nama,
							  'paket_harga' => $this->input->post('paket_harga'),
							  'paket_deskripsi' => $paket_deskripsi,
							  'paket_mekah' => $paket_mekah,
							  'paket_madinah' => $paket_madinah,
							  'paket_tipe' => $this->input->post('paket_tipe'),
							  'paket_bulan_berangkat' => $this->input->post('paket_bulan_berangkat'),
							  'paket_tgl_berangkat' => $this->input->post('paket_tgl_berangkat'),
							  'paket_tgl_pulang'=>$this->input->post('paket_tgl_pulang'),
							  'paket_level'=>$this->input->post('paket_level'),
							  'agen_id' => $this->session->userdata('agen_id'),
							  'paket_created' => date('Y-m-d H:i:s'));

				$this->db->insert($this->tablename, $data);
			}

			function update_paket($id){


				$paket_nama = html_escape($this->input->post('paket_nama'));
				$paket_deskripsi = html_escape($this->input->post('paket_deskripsi'));
				$paket_mekah = html_escape($this->input->post('paket_mekah'));
				$paket_madinah = html_escape($this->input->post('paket_madinah'));


				$data = array('paket_nama' => $paket_nama,
							  'paket_harga' => $this->input->post('paket_harga'),
							  'paket_deskripsi' => $paket_deskripsi,
							  'paket_mekah' => $paket_mekah,
							  'paket_madinah' => $paket_madinah,
							  'paket_tipe' => $this->input->post('paket_tipe'),
							  'paket_bulan_berangkat' => $this->input->post('paket_bulan_berangkat'),
							  'paket_tgl_berangkat' => $this->input->post('paket_tgl_berangkat'),
							  'paket_tgl_pulang'=>$this->input->post('paket_tgl_pulang'),
							  'paket_level'=>$this->input->post('paket_level'));
				

				//print_r($data);
				$this->db->where($this->primarykey, $id);
				$this->db->update($this->tablename, $data);
			}

			function delete_paket($id){
				$this->db->where($this->primarykey, $id);
				return $this->db->delete($this->tablename);
			}
		}