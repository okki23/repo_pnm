<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Pegawai extends Parent_Controller {
  

  var $nama_tabel = 'm_pegawai';
  var $daftar_field = array('id','nip','nama','telp','alamat','email','id_jabatan','foto');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_pegawai');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'pegawai/pegawai_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_pegawai(){  
       $getdata = $this->m_pegawai->fetch_pegawai();
       echo json_encode($getdata);   
  	}  

  	public function fetch_cat_pegawai(){  
       $getdata = $this->m_pegawai->fetch_cat_pegawai();
       echo json_encode($getdata);   
  	} 
	
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.nama_jabatan from m_pegawai a
		left join m_jabatan b on b.id = a.id_jabatan where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    //cek apakah pegawai/gambar tersedia
		$cek_pegawai = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($cek_pegawai->pegawai != '' || $cek_pegawai->pegawai != NULL){
          //apabila pegawai ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$cek_pegawai->pegawai));
		}   

    $sqlhapus = $this->m_pegawai->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_pegawai->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_pegawai->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_pegawai = $this->upload_pegawai();
  
 
	
		if($simpan_data && $simpan_pegawai){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_pegawai(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
