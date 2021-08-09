<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Beranda extends Parent_Controller {
 
  var $nama_tabel = 'page_beranda';
  var $daftar_field =  array('id','title','desc');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_beranda'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'beranda/beranda_view';
		$this->load->view('template_view',$data);		
   
	}
 
  public function fetch_beranda(){  
       $getdata = $this->m_beranda->fetch_beranda();
       echo json_encode($getdata);   
  }  
	  
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
 
    $sqlhapus = $this->m_beranda->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
     

    $id =  $this->input->post('id');
	$arrpost = array('title'=>$this->input->post('title'),
					'desc'=>$this->input->post('desc')); 

	$simpan_data = $this->db->set($arrpost)->where('id', $id)->update($this->nama_tabel);
 
	
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
	 
       


}
