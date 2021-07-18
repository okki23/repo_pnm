<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sub_kategori_barang extends Parent_Controller {
  
	var $nama_tabel = 'm_sub_kategori';
	var $daftar_field = array('id','id_kategori','nama_sub_kategori');
	var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_sub_kategori_barang'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'sub_kategori_barang/sub_kategori_barang_view';
  		$this->load->view('template_view',$data);		
     
  	}
 
 
  	public function fetch_sub_kategori_barang(){  
       $getdata = $this->m_sub_kategori_barang->fetch_sub_kategori_barang();
       echo json_encode($getdata);   
  	}

  	public function fetch_jabatan(){  
       $getdata = $this->m_sub_kategori_barang->fetch_jabatan();
       echo json_encode($getdata);   
  	}  

    public function fetch_status(){  
       $getdata = $this->m_sub_kategori_barang->fetch_status();
       echo json_encode($getdata);   
    }  
  

	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori from m_sub_kategori a
		left join m_kategori b on b.id = a.id_kategori where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    

    $sqlhapus = $this->m_sub_kategori_barang->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_sub_kategori_barang->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_sub_kategori_barang->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
