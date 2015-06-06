<?php
	
		/**
		* 
		*/
		class jamaah_model extends CI_Model
		{
			
			private $tablename = 'jemaah';
			private $primarykey = 'jemaah_id';

			function __construct()
			{
				parent::__construct();
			}


			function jamaah_get_paged_list($limit = 10, $offset = 0, $order_column='',$order_type='asc'){
				if(empty($order_column) || empty($order_type)){
					$this->db->order_by($this->primarykey, 'asc');
				}
				else
				{
					$this->db->order_by($order_column, $order_type);
				}

				return $this->db->get($this->tablename, $limit, $offset);
			}


			function token_to_primary($id){
				$this->db->select('jemaah_id');
				$this->db->where('jemaah_token', $id);
				return $this->db->get($this->tablename);
			}

			function jamaah_count_all(){
				$this->db->where('agen_id', $this->session->userdata('agen_id'));
				return $this->db->count_all($this->tablename);
			}

			function jamaah_get_by_id($id){
				$this->db->select('*');
				$this->db->where('jemaah_token', $id);
				return $this->db->get($this->tablename);
			}

			public function maximum(){
				$this->db->select_max($this->primarykey, 'jamaah');
				return $this->db->get($this->tablename);
			}

			public function get_photo($id){
							$this->db->select('jemaah_foto');
							$this->db->where($this->primarykey, $id);
							return $this->db->get($this->tablename)->row();
			}

			function add_jamaah(){
				$sess_data = $this->session->userdata('agen_logged_in');
				$idss = "J00".date("ymdHis");

				//upload

				$config['upload_path'] = './asset/image_jamaah';
				$config['allowed_types'] = 'gif|jpg|png';
				$new_name = date('ymdhis').rand(0000, 9999).".jpg";
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);		
				if ($this->upload->do_upload('jemaah_foto')){

				$upload = array('upload_data' => $this->upload->data());
				

				//end of upload
				
				$data = array('jemaah_id' => $idss,
							  'jemaah_token' => $this->input->post('jemaah_token'),
							  'jemaah_nama' => $this->input->post('jemaah_nama'),
							  'jemaah_tempat_lahir' => $this->input->post('jemaah_tempat_lahir'),
							  'jemaah_ttl' => $this->input->post('jemaah_ttl'),
							  'jemaah_nama_ayah'=> $this->input->post('jemaah_nama_ayah'),
							  'jemaah_no_ktp' => $this->input->post('jemaah_no_ktp'),
							  'jemaah_alamat' => $this->input->post('jemaah_alamat'),
							  'jemaah_kelurahan' => $this->input->post('jemaah_kelurahan'),
							  'jemaah_kecamatan' => $this->input->post('jemaah_kecamatan'),
							  'jemaah_kota_kab' => $this->input->post('jemaah_kota_kab'),
							  'jemaah_kodepos' => $this->input->post('jemaah_kodepos'),
							  'jemaah_tlp_rmh' => $this->input->post('jemaah_tlp_rumah'),
							  'jemaah_kantor' => $this->input->post('jemaah_kantor'),
							  'jemaah_phone' => $this->input->post('jemaah_phone'),
							  'jemaah_email' => $this->input->post('jemaah_email'),
							  'jemah_no_passport' => $this->input->post('jemaah_no_pasport'),
							  'jemaah_tgl_buat' => $this->input->post('jemaah_tgl_buat'),
							  'jemah_tgl_berakhir' => $this->input->post('jemaah_tgl_berakhir'),
							  'jemaah_tmp_pembuatan' => $this->input->post('jemaah_tmp_pembuatan'),
							  'jemaah_foto' => $new_name,
							  'username' => $this->input->post('jemaah_username'),
							  'password' => $this->input->post('jemaah_password'),
							  'agen_id' => $this->session->userdata('agen_id'));

				$this->db->insert($this->tablename, $data);
			}
			
			else echo $this->upload->display_errors();
		}
			
		function update_jamaah($id){
				$config['upload_path'] = 'asset/image_jamaah';
				$config['allowed_types'] = 'gif|jpg|png';
				$new_name = date('ymdhis').rand(0000, 9999).".jpg";
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$data = array('upload_data' => $this->upload->data());

				
				if ( !$this->upload->do_upload('jemaah_foto') and empty($data['upload_data']['file_type'])){
				$data = array(
							  'jemaah_nama' => $this->input->post('jemaah_nama'),
							  'jemaah_tempat_lahir' => $this->input->post('jemaah_tempat_lahir'),
							  'jemaah_ttl' => $this->input->post('jemaah_ttl'),
							  'jemaah_nama_ayah'=> $this->input->post('jemaah_nama_ayah'),
							  'jemaah_no_ktp' => $this->input->post('jemaah_no_ktp'),
							  'jemaah_alamat' => $this->input->post('jemaah_alamat'),
							  'jemaah_kelurahan' => $this->input->post('jemaah_kelurahan'),
							  'jemaah_kecamatan' => $this->input->post('jemaah_kecamatan'),
							  'jemaah_kota_kab' => $this->input->post('jemaah_kota_kab'),
							  'jemaah_kodepos' => $this->input->post('jemaah_kodepos'),
							  'jemaah_tlp_rmh' => $this->input->post('jemaah_tlp_rumah'),
							  'jemaah_kantor' => $this->input->post('jemaah_kantor'),
							  'jemaah_phone' => $this->input->post('jemaah_phone'),
							  'jemaah_email' => $this->input->post('jemaah_email'),
							  'jemah_no_passport' => $this->input->post('jemaah_no_pasport'),
							  'jemaah_tgl_buat' => $this->input->post('jemaah_tgl_buat'),
							  'jemah_tgl_berakhir' => $this->input->post('jemaah_tgl_berakhir'),
							  'jemaah_tmp_pembuatan' => $this->input->post('jemaah_tmp_pembuatan'),
							  'username' => $this->input->post('jemaah_username'),
							  'password' => $this->input->post('jemaah_password'));
				
				$this->db->where($this->primarykey, $id);
				$this->db->update($this->tablename, $data);
	
					
				}	
						else{
							$this->upload->do_upload();
						
							$data = array('jemaah_nama' => $this->input->post('jemaah_nama'),
							  'jemaah_tempat_lahir' => $this->input->post('jemaah_tempat_lahir'),
							  'jemaah_ttl' => $this->input->post('jemaah_ttl'),
							  'jemaah_nama_ayah'=> $this->input->post('jemaah_nama_ayah'),
							  'jemaah_no_ktp' => $this->input->post('jemaah_no_ktp'),
							  'jemaah_alamat' => $this->input->post('jemaah_alamat'),
							  'jemaah_kelurahan' => $this->input->post('jemaah_kelurahan'),
							  'jemaah_kecamatan' => $this->input->post('jemaah_kecamatan'),
							  'jemaah_kota_kab' => $this->input->post('jemaah_kota_kab'),
							  'jemaah_kodepos' => $this->input->post('jemaah_kodepos'),
							  'jemaah_tlp_rmh' => $this->input->post('jemaah_tlp_rumah'),
							  'jemaah_kantor' => $this->input->post('jemaah_kantor'),
							  'jemaah_phone' => $this->input->post('jemaah_phone'),
							  'jemaah_email' => $this->input->post('jemaah_email'),
							  'jemah_no_passport' => $this->input->post('jemaah_no_pasport'),
							  'jemaah_tgl_buat' => $this->input->post('jemaah_tgl_buat'),
							  'jemah_tgl_berakhir' => $this->input->post('jemaah_tgl_berakhir'),
							  'jemaah_tmp_pembuatan' => $this->input->post('jemaah_tmp_pembuatan'),
							  'jemaah_foto' => $new_name,
							  'username' => $this->input->post('jemaah_username'),
							  'password' => $this->input->post('jemaah_password'));

							$this->db->where($this->primarykey, $id);
							$this->db->update($this->tablename, $data);
					}
						}		
	


			function delete_jamaah($id){
				$this->db->where($this->primarykey, $id);
				return $this->db->delete($this->tablename);
			}
		}