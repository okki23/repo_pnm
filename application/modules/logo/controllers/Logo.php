<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Logo extends Parent_Controller {
 
  var $nama_tabel = 'page_logo';
  var $daftar_field =  array('id','logo');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_logo'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'logo/logo_view';
		$this->load->view('template_view',$data);		
   
	}
 
  public function fetch_logo(){  
       $getdata = $this->m_logo->fetch_logo();
       echo json_encode($getdata);   
  }  
	  
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
 
    $sqlhapus = $this->m_logo->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 

	public function simpan_data(){
    
    
		$data_form = $this->m_logo->array_from_post($this->daftar_field);
	
		$id = isset($data_form['id']) ? $data_form['id'] : NULL; 
	 
	
		$simpan_data = $this->m_logo->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
		$simpan_foto = $this->upload_foto();
	  
	 
		
			if($simpan_data && $simpan_foto){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
			
			echo json_encode($result,TRUE);
	
		}
	 
	  function upload_foto(){  
		if(isset($_FILES["user_image"])){  
			$extension = explode('.', $_FILES['user_image']['name']);   
			$destination = './assets/images/' . $_FILES['user_image']['name'];  
			return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
			 
		}  
	  }  
		   
       


}
