<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Modeladmin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function loadProduct(){
		$query = $this->db->query("
			SELECT p.*, ps.produk_status, pk.produk_kategori
			FROM produk p, produk_kategori pk, produk_status ps 
			WHERE p.id_produk_status = ps.id AND
			p.id_produk_kategori = pk.id
			ORDER BY p.id DESC
		");
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function loadProductSpecific($id){
		$query = $this->db->query("
			SELECT p.*, ps.produk_status, pk.produk_kategori
			FROM produk p, produk_kategori pk, produk_status ps 
			WHERE 
			p.id = '$id' AND
			p.id_produk_status = ps.id AND
			p.id_produk_kategori = pk.id
		");
		if($query->num_rows()>0){
			$row = $query->row();
			return $row;
		}
	}
	
	public function loadPhotoDetail($id){
		$query = $this->db->query("
			SELECT pd.*
			FROM produk p, produk_detail pd
			WHERE 
			pd.id_produk = '$id' AND
			pd.id_produk = p.id
			ORDER BY p.id ASC
		");
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function loadPhotoSpecific($id){
		$query = $this->db->query("
			SELECT pd.*
			FROM produk_detail pd
			WHERE pd.id = '$id'
		");
		if($query->num_rows()>0){
			$row = $query->row();
			return $row;
		}
	}
	
	public function loadLastProduct(){
		$query = $this->db->query("
			SELECT p.id
			FROM produk p
			ORDER BY p.id DESC
			LIMIT 0 , 1
		");
		if($query->num_rows()>0){
			$row = $query->row();
			return $row;
		}
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
	
	public function updateKetentuan(){
		$ganti = array("'");
		$oleh = "&#039;";
		$field = array(
			'ketentuan' => str_replace($ganti, $oleh ,$this->input->post('ketentuan'))
		);
		$this->db->where('id', 1);
		$this->db->update('produk_ketentuan', $field);
	}
	
	public function insertProduct(){
		$ganti = array("'");
		$oleh = "&#039;";
		
		/* generate url title */
		$asal = array(" ", "'", '"');
		$jadi = array("", "", "");
		$ppost = str_replace($asal,$jadi,$this->input->post('produk_nama'));
		
		$field = array(
			'produk_nama' => str_replace($ganti, $oleh ,$this->input->post('produk_nama')),
			'produk_deskripsi' => str_replace($ganti, $oleh ,$this->input->post('produk_deskripsi')),
			'harga' => $this->input->post('harga'),
			'harga_sale' => $this->input->post('hargasale') ,
			'id_produk_status' =>  $this->input->post('produk_status'),
			'id_produk_kategori' => $this->input->post('produk_kategori'),
			'url_title' => ""
		);
		$insert = $this->db->insert('produk', $field);
		$id = mysql_insert_id();
		if(isset($insert)){
			$urltitle = $ppost."-".$id;
			$f = array(
				'url_title' => $urltitle
			);
			$this->db->where('id', $id);
			$this->db->update('produk', $f);
		}
	}
	
	public function insertPhotoProduct($id, $produkfoto){
		$field = array(
			'produk_foto' => $produkfoto,
			'produk_foto_deskripsi' => "",
			'id_produk' => $id
		);
		$this->db->insert('produk_detail', $field);
	}
	
	public function deleteProduct($id){
		return $this->db->delete('produk', array('id' => $id));
	}
	
	public function deleteProductDetail($id){
		return $this->db->delete('produk_detail', array('id_produk' => $id));
	}
	
	public function deletePhoto($id){
		return $this->db->delete("produk_detail", array('id' => $id));
	}
	
	public function updateProduct($id){
		$ganti = array("'");
		$oleh = "&#039;";
		
		/* generate url title */
		$asal = array(" ", "'", '"');
		$jadi = array("", "", "");
		$ppost = str_replace($asal,$jadi,$this->input->post('produk_nama'));
		
		$field = array(
			'produk_nama' => str_replace($ganti, $oleh ,$this->input->post('produk_nama')),
			'produk_deskripsi' => str_replace($ganti, $oleh ,$this->input->post('produk_deskripsi')),
			'harga' => $this->input->post('harga'),
			'harga_sale' => $this->input->post('hargasale') ,
			'id_produk_status' =>  $this->input->post('produk_status'),
			'id_produk_kategori' => $this->input->post('produk_kategori'),
			'url_title' => $ppost."-".$id
		);
		$this->db->where('id', $id);
		$this->db->update('produk', $field);
	}
	
	public function loadStatus(){
		$query = $this->db->query("
			SELECT ps.* FROM produk_status ps ORDER BY ps.id ASC
		");
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
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
	
	public function loadCategorySpecific($id){
		$query = $this->db->query("
			SELECT pk.* FROM produk_kategori pk WHERE pk.id='$id' 
		");
		if($query->num_rows()>0){
			$row = $query->row();
			return $row;
		}
	}
	
	public function insertCategory(){
		$ganti = array("'");
		$oleh = "&#039;";
		
		/* generate url title */
		$asal = array(" ", "'", '"');
		$jadi = array("", "", "");
		$kpost = str_replace($asal,$jadi,$this->input->post('produk_kategori'));
		
		$field = array(
			'produk_kategori' => str_replace($ganti, $oleh ,$this->input->post('produk_kategori')),
			'kategori_url_title' => ""
		);
		$insert = $this->db->insert('produk_kategori', $field);	
		$id = mysql_insert_id();
		if(isset($insert)){
			$kurltitle = $kpost."-".$id;
			$f = array(
				'kategori_url_title' => $kurltitle
			);
			$this->db->where('id', $id);
			$this->db->update('produk_kategori', $f);
		}
	}
	
	public function updateCategory($id){
		$ganti = array("'");
		$oleh = "&#039;";
		/* generate url title */
		$asal = array(" ", "'", '"');
		$jadi = array("", "", "");
		$kpost = str_replace($asal,$jadi,$this->input->post('produk_kategori'));
		
		$field = array(
				'produk_kategori' => str_replace($ganti, $oleh ,$this->input->post('produk_kategori')),
				'kategori_url_title' => $kpost."-".$id
			);
		$this->db->where('id', $id);
		$this->db->update('produk_kategori', $field);
	}
	
	public function deleteCategory($id){
		return $this->db->delete('produk_kategori', array('id' => $id));
	}
	
}