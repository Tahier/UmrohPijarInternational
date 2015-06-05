<?php
	
	/**
	* 
	*/
	class agen_controller extends CI_Controller
	{

		private $limit = 10;

		function __construct()
		{
			parent::__construct();
			$this->load->model(array('paket_model', 'agen_model', 'jamaah_model'));
			
			if($this->session->userdata('level') != 'agen' && empty($this->session->userdata('level'))){
				redirect(base_url('c_index/agen_umrah'), 'refresh');
			}
		}
		
		

		function index(){     
		$data['username'] = $this->session->userdata('agen_username');
		$this->load->view('agen/agen_home', $data);

		 }


//--------------------------------------BEGIN OF PAKET-------------------------------------------------------------------------------------


		public function get_primary($id){     
			$primary = $this->paket_model->nomor_to_primary($id)->row();    
			return $primary->paket_id;

		}

		function view_all_paket($offset = 0, $order_column = "paket_id", $order_type = "asc"){
			if(empty($order_column)){ $order_column = 'paket_id';}
			if(empty($order_type)){$order_type = 'asc';}
			if(empty($offset)){ $offset = 0; }


		

			$this->db->where('agen_id',$this->session->userdata('agen_id'));
			$pakets = $this->paket_model->paket_get_paged_list($this->limit, $offset, $order_column, $order_type)->result();

			//pagination
			$this->load->library('pagination');
			
			$config['base_url'] = site_url('agen_controller/view_all_paket');
			$config['total_rows'] = $this->paket_model->paket_count_all();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();

			//table

			$this->load->library('table');
			$this->table->set_empty("&nbsp");
			$new_order = ($order_type=='asc'?'desc':'asc');
			
			$this->table->set_heading('No',
									   anchor('agen_controller/view_all_paket/'.$offset.'/paket_nomor/'.$new_order, 'Nomor Paket'),
									   anchor('agen_controller/view_all_paket/'.$offset.'/paket_nama/'.$new_order, 'Nama Paket'),
									   anchor('agen_controller/view_all_paket/'.$offset.'/paket_harga/'.$new_order, 'Harga Paket'),
									   'Aksi');

			$i = 0+$offset;

			foreach ($pakets as $paket) {
				$this->table->add_row(++$i,
									   $paket->paket_nomor,
									   $paket->paket_nama,
									   $paket->paket_harga,
									   anchor('agen_controller/detail_paket/'.$paket->paket_nomor, 'Detail')."  ".
									   anchor('agen_controller/edit_paket/'.$paket->paket_nomor, 'Edit')."   ".
									   anchor('agen_controller/delete_paket/'.$paket->paket_nomor, 'delete', array('onclick' => "return confirm('apakah anda yakin ingin menghapus data agen ".$paket->paket_nama ."?')"))
									   );
			}
			
			$data['table']=$this->table->generate();

			$this->load->view('agen/agen_data_paket', $data);
		}


		function add_paket(){

			$this->_set_rules();

			if($this->form_validation->run() == FALSE){

				$random = rand(00,99);
				$data['nomor'] = date('himsy').$random;
				$this->load->view('agen/agen_add_paket', $data);
			}
			else {
				$this->paket_model->add_paket();
				redirect('agen_controller/view_all_paket', 'refresh');
			}
		}



		function detail_paket($id){
			
			$data['paket'] = $this->paket_model->paket_get_by_id($this->get_primary($id))->row_array();
			$data['paket']['paket_tgl_berangkat'] = date("d M Y, H:i:s", strtotime($data['paket']['paket_tgl_berangkat']));
			$data['paket']['paket_tgl_pulang'] = date("d M Y, H:i:s", strtotime($data['paket']['paket_tgl_pulang']));
			$data['paket']['paket_created'] = date("d M Y, H:i:s", strtotime($data['paket']['paket_created']));

			$this->load->view('agen/agen_detail_paket', $data, FALSE);

		}


		function edit_paket($id){

			$this->_set_rules();

			if($this->form_validation->run() == FALSE){

			$data['paket'] = $this->paket_model->paket_get_by_id($this->get_primary($id))->row_array();

			$this->load->view('agen/agen_edit_paket', $data);
			}
			else
			{
				$this->paket_model->update_paket($this->get_primary($id));
				redirect('agen_controller/view_all_paket');
			}
		}

		function delete_paket($id){
			$this->paket_model->delete_paket($this->get_primary($id));
			redirect('agen_controller/view_all_paket', 'refresh');
		}

		function _set_rules(){
			$this->form_validation->set_rules('paket_nama', 'Nama Agen', 'required');
			$this->form_validation->set_rules('paket_deskripsi', 'Deskripsi Paket','required');
			$this->form_validation->set_rules('paket_harga', 'Harga Paket', 'required');
		}


//--------------------------------------END OF PAKET-------------------------------------------------------------------------------------


//--------------------------------------BEGIN OF JAMAAH-------------------------------------------------------------------------------------
		
		public function token_to_primary($id){     
			$primary = $this->jamaah_model->token_to_primary($id)->row();
			return $primary->jemaah_id;
		}


		function view_all_jemaah($offset=0, $order_column='jemaah_token', $order_type='asc'){
			//inisialisasi
			if(empty($offset)){$offset = 0;}
			if(empty($order_column)){$order_column='jemaah_token';}
			if(empty($order_type)){$order_type = 'asc';}

			
			//panggil dari db
			$this->db->where('agen_id', $this->session->userdata('agen_id'));
			$jemaah = $this->jamaah_model->jamaah_get_paged_list($this->limit, $offset, $order_column, $order_type)->result();

			//pagination
			$this->load->library('pagination');
			
			$config['base_url'] = site_url('agen_controller/view_all_jemaah');
			$config['total_rows'] = $this->jamaah_model->jamaah_count_all();
			$config['per_page'] = $offset;
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();


			//table
			$this->load->library('table');
			$this->table->set_empty("&nbsp");
			$new_order = ($order_type == 'asc'?'desc':'asc');

			$this->table->set_heading('No',
									   anchor('agen_controller/view_all_jemaah'.$offset.'/jemaah_token/'.$new_order, 'Kode Jemaah'),
									   anchor('agen_controller/view_all_jemaah'.$offset.'/jemaah_nama/'.$new_order, 'Nama Jemaah'),
									   anchor('agen_controller/view_all_jemaah'.$offset.'/jemaah_username/'.$new_order, 'Username Jemaah'),
									   'Aksi');
			$i = 0+$offset;
			foreach ($jemaah as $row) {
				$this->table->add_row(++$i,
									  $row->jemaah_token,
									  $row->jemaah_nama,
									  $row->username,
									  anchor('agen_controller/detail_jemaah/'.$row->jemaah_token, 'Detail Jemaah').'   '.
									  anchor('agen_controller/update_jemaah/'.$row->jemaah_token, 'Edit').'   '.
									  anchor('agen_controller/delete_jemaah/'.$row->jemaah_token, 'Delete', array("onClick"=>"return confirm('Apakah anda ingin menghapus jemaah ". $row->jemaah_nama." ?')")));
			}			
			
			$data['table'] = $this->table->generate();

			$this->load->view('agen/agen_data_jemaah', $data);
		}

		function add_jemaah(){


				$random = rand(00,99);
				$data['nomor'] = date('himsy').$random;
				$data['username'] = date("ydmHis");
				$data['password'] = '12345678';
				if($this->uri->segment(3)!='insert'){
					if($this->input->post('trigger') !=1 ){
				$this->load->view('agen/agen_add_jemaah', $data);
					}
				}
				else {
						$this->jamaah_model->add_jamaah();
						redirect('agen_controller/view_all_jemaah', 'refresh');
					}	
			}


		function update_jemaah($id){
		if($this->uri->segment(4)!='insert'){
				if($this->input->post('trigger') !=1 ){
				$data['jemaah'] = $this->jamaah_model->jamaah_get_by_id($id)->row_array();
				$this->load->view('agen/agen_edit_jamaah', $data); 
					}
				}
				else {
						
						$this->jamaah_model->update_jamaah($this->token_to_primary($id));
						//redirect('agen_controller/view_all_jemaah');
					}	
		
	}

		function delete_jemaah($id){
			$this->jamaah_model->delete_jamaah($this->token_to_primary($id));
			redirect('agen_controller/view_all_jemaah', 'refresh');

		}



//--------------------------------------END OF JAMAAH-------------------------------------------------------------------------------------
	}