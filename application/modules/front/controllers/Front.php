<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Front extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front');
 	} 

	public function index(){
	 
		$data['judul'] = $this->data['judul'];    
		$this->load->view('front_view',$data);
	}

	public function simpan_jurnal(){ 
 
		$judul_jurnal   		= $_POST['judul_jurnal'];  
		$nomor_induk_jurnal   	= $_POST['nomor_induk_jurnal'];  
		$nama_penulis_jurnal   	= $_POST['nama_penulis_jurnal'];  
		$nomor_induk_jurnal   	= $_POST['nomor_induk_jurnal'];  
		$doi_jurnal   			= $_POST['doi_jurnal'];  
		$issn_jurnal   			= $_POST['issn_jurnal'];
		$tahun_terbit_jurnal   	= $_POST['tahun_terbit_jurnal'];  
		$volume_jurnal   		= $_POST['volume_jurnal'];
		$penerbit_jurnal   		= $_POST['penerbit_jurnal'];  

		$fileupload      = $_FILES['file_jurnal']['tmp_name'];
		$ImageName       = $_FILES['file_jurnal']['name'];
		$ImageType       = $_FILES['file_jurnal']['type'];

		$dir = "publikasi/jurnal/";
		$ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    	$ImageExt       = str_replace('.','',$ImageExt); // Extension
		$newname = $nomor_induk_jurnal.'-'.$nama_penulis_jurnal.'-'.$judul_jurnal.'.'.$ImageExt; 
		move_uploaded_file($_FILES["file_jurnal"]["tmp_name"], $dir.$newname); // Menyimpan file

		$post_data = array('judul'=>$judul_jurnal,
		'id_jenis_publikasi'=>1,
		'nomor_induk'=>$nomor_induk_jurnal,
		'nama_penulis'=>$nama_penulis_jurnal,
		'doi'=>$doi_jurnal,
		'issn'=>$issn_jurnal,
		'tahun_terbit'=>$tahun_terbit_jurnal,
		'volume'=>$volume_jurnal,
		'penerbit'=>$penerbit_jurnal,
		'file'=>$_FILES['file_jurnal']['name']
		);
		$this->db->set($post_data);
		$save = $this->db->insert('t_repository');
		if($save){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	 
}
 