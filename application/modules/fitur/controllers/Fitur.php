<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Fitur extends Parent_Controller {
 
  var $nama_tabel = 'page_fitur';
  var $daftar_field = array('id','title','desc');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_fitur'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'fitur/fitur_view';
		$this->load->view('template_view',$data);		
   
	} 

  	public function fetch_fitur(){  
       $getdata = $this->m_fitur->fetch_fitur();
       echo json_encode($getdata);   
  	}
  	  
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get('page_fitur')->row();
		//$get = $this->db->query($sql)->row();
		echo json_encode($sql,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('page_fitur');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	  
	public function simpan_data(){
    
    
		$data_form = $this->m_fitur->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
	
		$simpan_data = $this->m_fitur->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
	 
			if($simpan_data){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
			
			echo json_encode($result,TRUE);
	
		}
}
