<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Instansi extends Parent_Controller {
  
  var $nama_tabel = 'm_instansi';
  var $daftar_field = array('id','id_kategori_instansi','nama_instansi','alamat','telp','pic');
  var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_instansi'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'instansi/instansi_view';
  		$this->load->view('template_view',$data);		
     
  	} 
 
  	public function fetch_instansi(){  
       $getdata = $this->m_instansi->fetch_instansi();
       echo json_encode($getdata);   
  	}
 


	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori_instansi from m_instansi a
		left join m_kategori_instansi b on b.id = a.id_kategori_instansi where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    

    $sqlhapus = $this->m_instansi->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_instansi->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_instansi->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
