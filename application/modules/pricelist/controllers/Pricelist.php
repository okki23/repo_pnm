<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pricelist extends Parent_Controller {
  
  var $nama_tabel = 't_pricelist';
  var $daftar_field = array('id','id_barang','id_supplier','harga');
  var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_pricelist'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'pricelist/pricelist_view';
  		$this->load->view('template_view',$data);		
     
  	}
 
 
  	public function fetch_pricelist(){  
       $getdata = $this->m_pricelist->fetch_pricelist();
       echo json_encode($getdata);   
  	}

  	public function fetch_jenis(){  
       $getdata = $this->m_pricelist->fetch_jabatan();
       echo json_encode($getdata);   
  	}  

   

	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_barang,c.nama_supplier from t_pricelist a
		left join m_barang b on b.id = a.id_barang
		left join m_supplier c on c.id = a.id_supplier where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    

    $sqlhapus = $this->m_pricelist->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_pricelist->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_pricelist->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
