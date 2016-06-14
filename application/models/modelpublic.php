<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Modelpublic extends CI_Model{
		
		function __construct() {
			parent::__construct();
		}
		
		public function loadKetentuan(){
			$query = $this->db->query("
				SELECT pk.*
				FROM produk_ketentuan pk
			");
			if($query->num_rows()>0){
				$row = $query->row();
				return $row;
			}
		}
		
		public function loadCategory(){
			$query = $this->db->query("
				SELECT pk.* FROM produk_kategori pk ORDER BY pk.id ASC
			");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		
		public function countAllProduct(){
			$this->db->from('produk');
			$count = $this->db->count_all_results();
			return $count;
		}
		
		public function countAllProductCategory($category){
			$this->db->where('produk_kategori.kategori_url_title', $category);
			$this->db->join('produk', 'produk.id_produk_kategori = produk_kategori.id');
			$this->db->from('produk_kategori');
			return $this->db->count_all_results();
		}
		
		public function loadAllProduct($offset, $limit){
			$query = $this->db->query("
				SELECT p.id as id_produkutama, p.*, ps.produk_status, pk.produk_kategori,
				(SELECT pd.produk_foto FROM produk_detail pd WHERE pd.id_produk = p.id LIMIT 0,1) as foto,
				(SELECT SUM(pd.id) FROM produk_detail pd WHERE p.id = pd.id_produk) as jum
				FROM produk p, produk_status ps, produk_kategori pk
				WHERE ps.id = p.id_produk_status
				AND pk.id = p.id_produk_kategori 
				ORDER BY p.id DESC
				LIMIT $offset, $limit
			");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		
		public function loadAllProductCategory($category, $offset, $limit){
			$query = $this->db->query("
				SELECT p.id as id_produkutama, p.*, ps.produk_status, pk.produk_kategori,
				(SELECT pd.produk_foto FROM produk_detail pd WHERE pd.id_produk = p.id LIMIT 0,1) as foto,
				(SELECT SUM(pd.id) FROM produk_detail pd WHERE p.id = pd.id_produk) as jum
				FROM produk p, produk_status ps, produk_kategori pk
				WHERE ps.id = p.id_produk_status
				AND pk.id = p.id_produk_kategori 
				AND pk.kategori_url_title = '$category'
				ORDER BY p.id DESC
				LIMIT $offset, $limit
			");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		
		public function loadSpecificProductPhoto($urltitle){
			$query = $this->db->query("
				SELECT pd.id, pd.produk_foto
				FROM produk p, produk_detail pd
				WHERE pd.id_produk = p.id
				AND p.url_title = '$urltitle'
				ORDER BY pd.id ASC
			");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		
		public function querySpecificCategory($category){
			return $this->db->query("SELECT pk.* FROM produk_kategori pk WHERE pk.kategori_url_title = '$category' ");
		}
		
		public function querySpecificProduct($urltitle){
			return $this->db->query("SELECT p.*, pk.produk_kategori, pk.kategori_url_title, ps.produk_status FROM produk p, produk_kategori pk, produk_status ps WHERE p.url_title = '$urltitle' AND p.id_produk_kategori = pk.id AND p.id_produk_status = ps.id");
		}
		
	}
	
/* End of file modelpublic.php */
/* Location: ./application/controllers/modelpublic.php */