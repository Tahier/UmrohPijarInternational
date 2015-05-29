<?php
	
	/**
	* 
	*/
	class admin_controller extends CI_Controller
	{

		private $limit = 10;
		function __construct()
		{
			parent::__construct();
			$this->load->model('agen_model');

			if($this->session->userdata('level')!= 'admin' && empty($this->session->userdata('level'))){
				redirect(base_url('c_index/admin_umrah'), 'refresh');
			}
		} 

		function index()
		{
			$this->load->view('admin/admin_home');
		}


		public function get_primary($id){     
			$primary = $this->agen_model->nomor_to_primary($id)->row();    
			return $primary_id = $primary->agen_id;

		}

		function show_data_agen($offset = 0, $order_column = "agen_id", $order_type = "asc"){
			

			//inisialisasi property
			if(empty($offset)){$offset = 0;}
			if(empty($order_column)){$order_column = 'agen_id';}
			if(empty($order_type)){$order_type = 'asc';}

			//panggil dari model
			$agent = $this->agen_model->agen_get_paged_list($this->limit, $offset, $order_column, $order_type)->result();

			//pagination begin
			$this->load->library('pagination');
			
			$config['base_url'] = site_url('admin_controller/show_data_agen');
			$config['total_rows'] = $this->agen_model->agen_count_all();
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = 3;
			
			
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();

			//end of pagination


			//table data
			$this->load->library('table');
			$this->table->set_empty("&nbsp");
			$new_order =($order_type=='asc'?'desc':'asc' );
			$this->table->set_heading('No',
									   anchor('admin_controller/show_data_agen/'.$offset.'/agen_nomor/'.$new_order, 'Agen ID'),
									   anchor('admin_controller/show_data_agen/'.$offset.'/agen_nama/'.$new_order, 'Nama Agen'),
									   anchor('admin_controller/show_data_agen/'.$offset.'/agen_username/'.$new_order, 'Username'),
									   'Action');
			$i = 0+$offset;

			foreach ($agent as $agen) 
			{
				$this->table->add_row(++$i,
									   $agen->agen_nomor,
									   $agen->agen_nama,
									   $agen->agen_username,
									   anchor('admin_controller/detail_agen/'.$agen->agen_nomor, 'View Detail', array('class'=>'detail_agen')).'   '.
									   anchor('admin_controller/update_agen/'.$agen->agen_nomor, 'Update', array('class'=> 'update_agen')).'   '.
									   anchor('admin_controller/delete_agen/'.$agen->agen_nomor, 'Delete', array('class'=>'delete_agen', 'onclick' => "return confirm('apakah anda yakin ingin menghapus data agen ".$agen->agen_nama ."?')"))
									   );
				
			}

			$data['table'] = $this->table->generate();

			if ($this->uri->segment(3)=='delete_success')
			{
				$data['message'] = 'Agen berhasil dihapus';
			}
			else if ($this->uri->segment(3)=='add_success') 
			{
				$data['message'] = 'Agen berhasil ditambah';
			}
			else 
			{
				$data['message'] = '';
			}

			$this->load->view('admin/admin_data_agen', $data);
		}
		


		
		function add_agen(){


			$data['title'] = "Tambah data agen";

			//load helper dan library
			$this->load->helper('form');
			$this->load->library('form_validation');

			//rule form
			$this->_set_rule();


			

			//jika input belum benar
			if($this->form_validation->run() === FALSE)
				{

					$random = rand(00,99);
					$data['nomor'] = date('himsy').$random;
					$this->load->view('admin/admin_add_agen', $data);
				}
			else 
				{
					$this->agen_model->add_agen();
					redirect('admin_controller/show_data_agen', 'refresh');
				}
		}

		function valid_date($str){
			if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $str)){
				$this->form_validation->set_message('valid_date', 'date format invalid yyyy-mm-dd');
				return false;
			}
			else{
				return true;
			}
		}

		function update_agen($id){
			$data['title'] = "Edit data agen";

			//load helper dan library
			$this->load->helper('form');
			$this->load->library('form_validation');

			//rule form
			$this->_set_rule();

			//jika input belum benar
			if($this->form_validation->run() === FALSE)
				{
					//panggil data berdasarkan ID
					$data['agen'] = $this->agen_model->agen_get_by_id($this->get_primary($id))->row_array();
					$data['agen']['agen_contact_ttl'] = date('Y-m-d', strtotime($data['agen']['agen_contact_ttl']));
					$data['agen']['agen_contact_tgl_pembuatan'] = date('Y-m-d', strtotime($data['agen']['agen_contact_tgl_pembuatan']));
			
					$this->load->view('admin/admin_edit_agen', $data);
				}
			else 
				{
					$this->agen_model->update_agen($id);
					redirect('admin_controller/show_data_agen', 'refresh');
				}
		}

		function delete_agen($id){
			$this->agen_model->delete_agen($this->get_primary($id));
			redirect('admin_controller/show_data_agen', 'refresh');
		}


		function _set_rule(){
			$this->form_validation->set_rules('agen_nama', 'Nama Agen', 'required');
			$this->form_validation->set_rules('agen_alamat', 'Alamat Agen', 'required');
			$this->form_validation->set_rules('agen_tlp', 'Telepon Agen', 'required|numeric|is_natural');
			$this->form_validation->set_rules('agen_nomor', 'Nomor Agen', 'required');
			$this->form_validation->set_rules('agen_contact_name', 'Nama Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_contact_ttl', 'Tanggal Lahir Kontak Agen', 'required|callback_valid_date');
			$this->form_validation->set_rules('agen_contact_phone', 'Telepon Kontak Agen', 'required|numeric|is_natural');
			$this->form_validation->set_rules('agen_contact_email', 'Email Kontak Agen', 'required|valid_email');
			$this->form_validation->set_rules('agen_contact_ktp', 'Nomor KTP Kontak Agen', 'required|numeric');
			$this->form_validation->set_rules('agen_contact_tempat_lahir', 'Tempat Lahir Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_contact_nama_ayah', 'Nama Ayah Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_contact_tlp', 'Nomor Telepon Kontak Agen', 'numeric|required');
			$this->form_validation->set_rules('agen_contact_tlp_kantor', 'Nomor Telepon Kantor Kontak Agen', 'numeric|required');
			$this->form_validation->set_rules('agen_contact_no_paspor', 'No Paspor Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_contact_tgl_pembuatan', 'Tanggal Pembuatan Paspor Kontak Agen', 'required|callback_valid_date');
			$this->form_validation->set_rules('agen_contact_bank', 'Bank Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_contact_no_rek', 'No Rekening Bank Kontak Agen', 'required|numeric');
			$this->form_validation->set_rules('agen_contact_bank_cabang', 'Kantor Cabang Bank Kontak Agen', 'required');
			$this->form_validation->set_rules('agen_username', 'Username Agen', 'required');
			$this->form_validation->set_rules('agen_password', 'Password Agen', 'required');
			$this->form_validation->set_rules('agen_kode', 'Kode Agen', 'required');
		}

		function detail_agen($id){
			$data['agen'] = $this->agen_model->agen_get_by_id($this->get_primary($id))->row_array();
			$data['agen']['agen_contact_ttl'] = date('d M Y', strtotime($data['agen']['agen_contact_ttl']));
			$data['agen']['agen_contact_tgl_pembuatan'] = date('d M Y', strtotime($data['agen']['agen_contact_tgl_pembuatan']));

			$this->load->view('admin/admin_detail_agen', $data);
			}
	}

	

