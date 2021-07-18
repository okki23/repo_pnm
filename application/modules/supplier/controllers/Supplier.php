<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class supplier extends Parent_Controller {
 
  var $nama_tabel = 'm_supplier';
  var $daftar_field = array('id','nama_supplier','alamat','telp','email');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_supplier'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'supplier/supplier_view';
		$this->load->view('template_view',$data);		
   
	}
 	 
   
  	public function fetch_supplier(){  
       $getdata = $this->m_supplier->fetch_supplier();
       echo json_encode($getdata);   
  	}  

   
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
	 
		$get = $this->db->where('id',$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('m_supplier');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_supplier->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_supplier->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 
  
       


}
