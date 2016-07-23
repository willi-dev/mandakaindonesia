<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	define( "MANDAKA", "Mandaka" );
	define( "MANDAKA_ADMIN", "Mandaka Indonesia - Administrator Page" );

	class Administrator extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->_is_logged_in();
			$this->load->model( 'modeladmin' );
		}
		
		/**
		 * index()
		 * @params -
		 * @return html layout
		 */
		public function index(){
			// redirect('administrator/main');
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'Dashboard',
				'menu_mainactive' => 'active'
			);
			$this->load->view( 'admin/admin-main', $data );
		}

		/**
		 * all_products()
		 * @params -
		 * @return html layout
		 */
		public function all_products(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'All Products',
				'menu_produkactive' => 'active',
				'loadProduct' => $this->modeladmin->loadProduct(),
			);
			$this->load->view( 'admin/admin-all-products', $data );
		}

		/**
		 * categories()
		 * @params -
		 * @return html layout categories
		 */
		public function categories(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => "Categories",
				'menu_kategoriactive' => 'active',
				'loadCategory' => $this->modeladmin->loadCategory()
			);
			$this->load->view( 'admin/admin-categories', $data );
		}

		/**
		 * user_password()
		 * @params - 
		 * @return html layout user password
		 */
		public function user_password(){
			$data = array(
				'user_id' => $this->tank_auth->get_user_id(),
				'username' => $this->tank_auth->get_username(),
				'password' => $this->tank_auth->get_password(),
				'web_title' => MANDAKA,
				'title' => "User Password",
				'parent_title' => 'User',
				'menu_configactive' => 'active'
			);
			$this->load->view( 'admin/admin-user_password', $data );
		}
		
		/**
		 * update_password()
		 * @params - 
		 * @return -
		 */
		function update_password(){
			$oldpass = $this->input->post( 'oldpassword' );
			$retypeoldpass = $this->input->post( 'retypeoldpassword' );
			$newpass = $this->input->post( 'newpassword' );
			$lengthnp = strlen($this->input->post('newpassword') );
			$password = $this->tank_auth->get_password();
			
			if($oldpass != $retypeoldpass){
				$this->session->set_flashdata( 'messageerror', 'Old Password Not Match!' );
				redirect( 'administrator/user_password' );
			}else{
				if($lengthnp < 8){
					$this->session->set_flashdata( 'messageerror', 'Password Min. 7 Characters..' );
					redirect( 'administrator/user_password' );
				}else{
					$this->tank_auth->change_password($oldpass, $newpass);
					$this->session->set_flashdata( 'messagesuccess', 'Change Password Succesfull!' );
					redirect( 'administrator/user_password' );
				}
			}
		}

		/**
		 * page_about()
		 * @params - 
		 * @return html layout page_about
		 */
		function page_about(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'Page About'
			);
			$this->load->view( 'admin/admin-page_about', $data );
		}

		/**
		 * page_contact()
		 * @params - 
		 * @return html layout page_contact
		 */
		function page_contact(){
			$data = array( 
				'web_title' => MANDAKA,
				'title' => 'Page Contact'
			);
			$this->load->view( 'admin/admin-page_contact', $data );
		}

		/**
		 * page_store_locator()
		 * @params - 
		 * @return html layout page_store_locator
		 */
		function page_store_locator(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'Page Store Locator'
			);
			$this->load->view( 'admin/admin-page_store_locator', $data );
		}

		/**
		 * main()
		 */
		public function main(){
			$data = array(
				'title' => 'Main Page',
				'menu_mainactive' => 'active'
			);
			$this->load->view('admin/admin-main', $data);
		}

		



		
		public function ketentuan(){
			$data = array(
				'title' => 'Ketentuan',
				'menu_produkactive' => 'active',
				'loadKetentuan' => $this->modeladmin->loadKetentuan()
			);
			$this->load->view('admin/admin-ketentuan', $data);
		}
		
		public function ketentuan_proses(){
			$this->modeladmin->updateKetentuan();
			$this->session->set_flashdata('messagesuccess', "Perubahan produk berhasil!");
			redirect('administrator/ketentuan');
		}
		
		public function produk(){
			$data = array(
				'title' => 'Daftar Produk',
				'menu_produkactive' => 'active',
				'loadProduct' => $this->modeladmin->loadProduct(),
			);
			$this->load->view('admin/admin-produk_list', $data);
		}
		
		public function produk_detail(){
			$id = $this->uri->segment(3);
			$check = $this->modeladmin->loadProductSpecific($id);
			if(!empty($check)){
				$data = array(
					'title' => 'Produk Detail',
					'menu_produkactive' => 'active',
					'loadProductSpecific' => $this->modeladmin->loadProductSpecific($id),
					'loadPhotoDetail' => $this->modeladmin->loadPhotoDetail($id)
				);
				$this->load->view('admin/admin-produk_detail', $data);
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'produk'
				);
				$this->load->view('admin/admin-404', $data);
			}
		}
		
		public function produk_ubah(){
			$id = $this->uri->segment(3);
			$check = $this->modeladmin->loadProductSpecific($id);
			if(!empty($check)){
				$data = array(
					'title' => 'Tambah Produk',
					'menu_produkactive' => 'active',
					'loadProductSpecific' => $this->modeladmin->loadProductSpecific($id),
					'loadCategory' => $this->modeladmin->loadCategory(),
					'loadStatus' => $this->modeladmin->loadStatus()
				);
				$this->load->view('admin/admin-produk_ubah', $data);
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'produk'
				);
				$this->load->view('admin/admin-404', $data);
			}
			
		}
		
		public function produk_ubah_proses(){
			$this->form_validation->set_rules('produk_nama', 'produk_nama', 'required|xss_clean|max_length[255]');
			$this->form_validation->set_rules('harga', 'harga', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('messageerror', 'nama produk atau harga tidak boleh kosong');
				redirect('administrator/produk_tambah');
			}else{	
				$idproduk = $this->input->post('idproduk');
				$this->modeladmin->updateProduct($idproduk);
				$this->session->set_flashdata('messagesuccess', "Perubahan produk berhasil!");
				redirect('administrator/produk');
			}
		}
		
		public function produk_tambah(){
			$data = array(
				'title' => 'Tambah Produk',
				'menu_produkactive' => 'active',
				'loadCategory' => $this->modeladmin->loadCategory(),
				'loadStatus' => $this->modeladmin->loadStatus()
			);
			$this->load->view('admin/admin-produk_tambah', $data);
		}
		
		public function produk_tambah_proses(){
			$this->form_validation->set_rules('produk_nama', 'produk_nama', 'required|xss_clean|max_length[255]');
			$this->form_validation->set_rules('harga', 'harga', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('messageerror', 'nama produk atau harga tidak boleh kosong');
				redirect('administrator/produk_tambah');
			}else{	
				$this->modeladmin->insertProduct();
				$this->session->set_flashdata('messagesuccess', "Penambaran produk baru berhasil!");
				$last = $this->modeladmin->loadLastProduct();
				redirect('administrator/produk_tambah_foto/'. $last->id);
			}
		}
		
		public function produk_tambah_foto(){
			$last = $this->uri->segment(3);
			if(!empty($last)){
				$data = array(
					'title' => 'Unggah Foto Produk',
					'menu_produkactive' => 'active',
					'last' => $last
				);
				$this->load->view('admin/admin-produk_upload', $data);
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'produk_tambah'
				);
				$this->load->view('admin/admin-404', $data);
			}
		}
		
		public function produk_tambah_foto_proses(){
			$config = array(
				'upload_path' => './uploads/produk/',
				'allowed_types' => 'gif|jpeg|png|jpg',
				'encrypt_name'=> TRUE,
				'file_name'=> 'photo.jpg',
				'max_size' => '1000',
				'remove_spaces'=> TRUE
			);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$idproduk = $this->input->post('id_produk');
				$dok = $this->upload->data();
				$this->_create_thumb_produk($dok['file_name']);
				$this->modeladmin->insertPhotoProduct($idproduk, $dok['file_name']);
			}
		}
		
		public function _create_thumb_produk($filename) {
			$config['source_image'] = './uploads/produk/' . $filename;
			$config['new_image'] = './uploads/produk/thumb/' . $filename;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;
			$this->image_lib->initialize($config);
			if (!$this->image_lib->resize()) {
				echo "thumb" . $this->image_lib->display_errors();
			} 
		}	
		
		public function produk_hapus(){
			$id = $this->uri->segment(3);
			$check = $this->modeladmin->loadProductSpecific($id);
			if(!empty($check)){
				$detailproduct = $this->modeladmin->loadPhotoDetail($id);
				foreach($detailproduct as $dp){
					if($dp->produk_foto != "" || $dp->produk_foto != NULL){
						if(file_exists('./uploads/produk/' . $dp->produk_foto) || file_exists('./uploads/produk/thumb/' . $dp->produk_foto)){
							$do = unlink('./uploads/produk/' . $dp->produk_foto);
							$do = unlink('./uploads/produk/thumb/' . $dp->produk_foto);
						}
					}
				}
				$this->modeladmin->deleteProductDetail($id);
				$this->modeladmin->deleteProduct($id);
				$this->session->set_flashdata('messagesuccess',"Produk berhasil dihapus!");
				redirect('administrator/produk');
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'produk'
				);
				$this->load->view('admin/admin-404', $data);
			}
		}

		public function produk_foto_hapus(){
			$id = $this->uri->segment(3);
			$idproduk = $this->uri->segment(4); 
			if(!empty($id)){
				$photoSpecific = $this->modeladmin->loadPhotoSpecific($id);
				if($photoSpecific->produk_foto != "" || $photoSpecific->produk_foto != NULL){
					if(file_exists('./uploads/produk/' . $photoSpecific->produk_foto) || file_exists('./uploads/produk/thumb/' . $photoSpecific->produk_foto)){
							$do = unlink('./uploads/produk/' . $photoSpecific->produk_foto);
							$do = unlink('./uploads/produk/thumb/' . $photoSpecific->produk_foto);
					}
				}
				$this->modeladmin->deletePhoto($id);
				$this->session->set_flashdata('messagesuccess',"Foto berhasil dihapus!");
				redirect('administrator/produk_detail/'.$idproduk);
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'kategori'
				);
				$this->load->view('admin/admin-404', $data);
			}
		}
	
		public function kategori(){
			$data = array(
				'title' => 'Kategori',
				'menu_kategoriactive' => 'active',
				'loadCategory' => $this->modeladmin->loadCategory()
			);
			$this->load->view('admin/admin-kategori', $data);
		}
		
		public function kategori_tambah(){
			$this->form_validation->set_rules('produk_kategori', 'produk_kategori', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('messageerror', 'Nama kategori dibutuhkan, tidak boleh kosong');
				redirect('administrator/kategori');
			}else{	
				$this->modeladmin->insertCategory();
				$this->session->set_flashdata('messagesuccess', "Penambaran kategori baru berhasil!");
				redirect('administrator/kategori');
			}
		}
		
		/* 
		public function kategori_ubah(){
			$id = $this->uri->segment(3);
			$check = $this->modeladmin->loadCategorySpecific($id);
			if(!empty($check)){
				$data = array(
					'title' => 'Ubah Kategori',
					'menu_kategoriactive' => 'active',
					'loadCategorySpecific' => $this->modeladmin->loadCategorySpecific($id)
				);
				$this->load->view('admin/admin-kategori_ubah', $data);
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'kategori'
				);
				$this->load->view('admin/admin-404', $data);
			}
		} 
		*/
		
		public function kategori_ubah_proses(){
			$this->form_validation->set_rules('produk_kategori', 'produk_kategori', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('messageerror', 'Nama kategori dibutuhkan, tidak boleh kosong');
					redirect('administrator/kategori_ubah/'.$this->input->post('id_kategori'));
			}else{	
					$id = $this->input->post('id_kategori');
					$this->modeladmin->updateCategory($id);
					$this->session->set_flashdata('messagesuccess', "Perubahan kategori berhasil!");
					redirect('administrator/kategori');
			}
		}
		
		public function kategori_hapus(){
			$id = $this->uri->segment(3);
			if(!empty($id)){
				$this->modeladmin->deleteCategory($id);
				$this->session->set_flashdata('messagesuccess',"Kategori berhasil dihapus!");
				redirect('administrator/kategori');
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'kategori'
				);
				$this->load->view('admin/admin-404', $data);
			}
		}
		
		/* 
		 * SETTING
		 */
		public function katasandi(){
			$data = array(
				'user_id' => $this->tank_auth->get_user_id(),
				'username' => $this->tank_auth->get_username(),
				'password' => $this->tank_auth->get_password(),
				'title' => "Configuration",
				'menu_configactive' => 'active'
			);
			$this->load->view('admin/admin-katasandi', $data);
		}
		
		// function updatepassword(){
		// 	$oldpass = $this->input->post('oldpassword');
		// 	$retypeoldpass = $this->input->post('retypeoldpassword');
		// 	$newpass = $this->input->post('newpassword');
		// 	$lengthnp = strlen($this->input->post('newpassword'));
		// 	$password = $this->tank_auth->get_password();
			
		// 	if($oldpass != $retypeoldpass){
		// 		$this->session->set_flashdata('messageerror', 'Old Password Not Match!');
		// 		redirect('administrator/config');
		// 	}else{
		// 		if($lengthnp < 8){
		// 			$this->session->set_flashdata('messageerror', 'Password Min. 7 Characters..');
		// 			redirect('administrator/config');
		// 		}else{
		// 			$this->tank_auth->change_password($oldpass, $newpass);
		// 			$this->session->set_flashdata('messagesuccess', 'Change Password Succesfull!');
		// 			redirect('administrator/config');
		// 		}
		// 	}
		// }
		
		//SHOW MESSAGE TANK AUTH
		// function _show_message($message){
			// $this->session->set_flashdata('info', "Password admin berhasil diganti.");
			// redirect('administrator/config');
		// }
		 
		public function _is_logged_in(){
			if(!$this->tank_auth->is_logged_in()){
				redirect('auth/login');
			}
		}
	}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */