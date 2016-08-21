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
				'menu_produkactive' => 'active',
				'loadCategory' => $this->modeladmin->loadCategory()
			);
			$this->load->view( 'admin/admin-categories', $data );
		}

		/**
		 * add_category()
		 * @params -
		 * @return void
		 */
		public function add_category(){
			$this->form_validation->set_rules('produk_kategori', 'produk_kategori', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('messageerror', 'Nama kategori dibutuhkan, tidak boleh kosong');
				redirect('administrator/categories');
			}else{	
				$this->modeladmin->insertCategory();
				$this->session->set_flashdata('messagesuccess', "Penambaran kategori baru berhasil!");
				redirect('administrator/categories');
			}
		}

		/**
		 * update_category()
		 * @params - 
		 * @return void
		 */
		public function update_category(){
			$this->form_validation->set_rules('produk_kategori', 'produk_kategori', 'required|xss_clean|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('messageerror', 'Please input a category name');
				redirect('administrator/categories/'.$this->input->post('id_kategori'));
			}else{	
				$id = $this->input->post('id_kategori');
				$this->modeladmin->updateCategory($id);
				$this->session->set_flashdata('messagesuccess', "Category updated!");
				redirect('administrator/categories');
			}
		}
		
		/**
		 * delete_category()
		 * @params -
		 * @return void
		 */
		public function delete_category(){
			$id = $this->uri->segment(3);
			if(!empty($id)){
				$this->modeladmin->deleteCategory($id);
				$this->session->set_flashdata('messagesuccess',"Category Deleted!");
				redirect('administrator/categories');
			}else{
				$data = array(
					'title' => '404 Not Found',
					'previousPage' => 'categories'
				);
				$this->load->view('admin/admin-404', $data);
			}
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
		public function update_password(){
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
		public function page_about(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'Page About',
				'menu_pageactive' => 'active'
			);
			$this->load->view( 'admin/admin-page_about', $data );
		}

		/**
		 * page_contact()
		 * @params - 
		 * @return html layout page_contact
		 */
		public function page_contact(){
			$data = array( 
				'web_title' => MANDAKA,
				'title' => 'Page Contact',
				'menu_pageactive' => 'active'
			);
			$this->load->view( 'admin/admin-page_contact', $data );
		}

		/**
		 * page_store_locator()
		 * @params - 
		 * @return html layout page_store_locator
		 */
		public function page_store_locator(){
			$data = array(
				'web_title' => MANDAKA,
				'title' => 'Page Store Locator',
				'menu_pageactive' => 'active'
			);
			$this->load->view( 'admin/admin-page_store_locator', $data );
		}
		
		/**
		 * _create_thumb_product
		 * @params $filename
		 * @return void
		 */
		public function _create_thumb_product( $filename ) {
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
		
		/**
		 * _is_logged_in()
		 * @params -
		 * @return void
		 */
		public function _is_logged_in(){
			if(!$this->tank_auth->is_logged_in()){
				redirect('auth/login');
			}
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
	}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */