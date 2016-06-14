<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Product extends CI_Controller{
	
		function __construct(){
			parent::__construct();
			$this->load->model('modelpublic');
		}

		public function index(/* $page="page" */){
			$limit = 9;
			$count = $this->modelpublic->countAllProduct();
			$configpage=array(
				'base_url' => base_url()."product/",
				'per_page' => 9,
				'uri_segment'=> 2,
				'num_links' => 3,
				'total_rows'=> $count,
				'num_tag_open' => '',
				'num_tag_close' => '',
				'cur_tag_open' => '',
				'cur_tag_close' => ''
			);
			$this->pagination->initialize($configpage);
			if($this->uri->segment(2) == ""){
				$offset = 0;
				$data = array(
					'titlepage' => 'Baju Hamil, Baju Menyusui, Baju Anak',
					'loadCategory' => $this->modelpublic->loadCategory(),
					'loadAllProduct' => $this->modelpublic->loadAllProduct($offset, $limit)
				);
			}else{
				$offset = $this->uri->segment(2);
				$data = array(
					'titlepage' => 'Baju Hamil, Baju Menyusui, Baju Anak',
					'loadCategory' => $this->modelpublic->loadCategory(),
					'loadAllProduct' => $this->modelpublic->loadAllProduct($offset, $limit)
				);
			}
			$this->load->view('public/frontpage', $data);
		}
		
		public function detail($urltitle=""){
			$querycheck = $this->modelpublic->querySpecificProduct($urltitle);
			$uri=$this->uri->segment(3);
			$row = $querycheck->row();
			if(($querycheck->num_rows() == 0) || ($uri == FALSE)){
				redirect('product/');
			}else{
				$urltitle = $row->url_title;
				$data = array(
					'titlepage' => 'Baju Hamil, Baju Menyusui, Baju Anak',
					'loadCategory' => $this->modelpublic->loadCategory(),
					'loadKetentuan' => $this->modelpublic->loadKetentuan(),
					'loadSpecificProductPhoto' => $this->modelpublic->loadSpecificProductPhoto($urltitle),
					'produk_nama' => $row->produk_nama,
					'produk_deskripsi' => $row->produk_deskripsi,
					'harga' => $row->harga,
					'harga_sale' => $row->harga_sale,
					'produk_kategori' => $row->produk_kategori,
					'produk_status' => $row->produk_status
				);
				$this->load->view('public/produk_detail', $data);
			}
		}
		
		public function category($category=""){
			$querycheck = $this->modelpublic->querySpecificCategory($category);
			$uri=$this->uri->segment(3);
			$rowcategory = $querycheck->row();
			if(($querycheck->num_rows() == 0) || ($uri == FALSE)){
				redirect('product/');
			}else{
				$limit = 9;
				$urltitle = $rowcategory->kategori_url_title;
				$count = $this->modelpublic->countAllProductCategory($urltitle);
				$configpage=array(
					'base_url' => base_url()."product/category/". $urltitle . "/",
					'per_page' => 9,
					'uri_segment'=> 4,
					'num_links' => 3,
					'total_rows'=> $count,
					'num_tag_open' => '',
					'num_tag_close' => '',
					'cur_tag_open' => '',
					'cur_tag_close' => ''
				);
				$this->pagination->initialize($configpage);
				
				if($this->uri->segment(4) == ""){
					$offset = 0;
					$data = array(
						'titlepage' => 'Baju Hamil, Baju Menyusui, Baju Anak',
						'loadCategory' => $this->modelpublic->loadCategory(),
						'loadAllProductCategory' => $this->modelpublic->loadAllProductCategory($urltitle, $offset, $limit)
					);
				}else{
					$offset = $this->uri->segment(4);
					$data = array(
						'titlepage' => 'Baju Hamil, Baju Menyusui, Baju Anak',
						'loadCategory' => $this->modelpublic->loadCategory(),
						'loadAllProductCategory' => $this->modelpublic->loadAllProductCategory($urltitle, $offset, $limit)
					);
				}
				$this->load->view('public/kategori', $data);
			}
		
		} 
	}

/* End of file product.php */
/* Location: ./application/controllers/product.php */