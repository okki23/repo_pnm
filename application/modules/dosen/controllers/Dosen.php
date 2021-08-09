<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dosen extends Parent_Controller {
 
  var $nama_tabel = 'dosen';
  var $daftar_field = array('id','nidn','nama','jenkel','telp','alamat','email','password');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_dosen'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'dosen/dosen_view';
		$this->load->view('template_view',$data);		
   
	} 

  	public function fetch_dosen(){  
       $getdata = $this->m_dosen->fetch_dosen();
       echo json_encode($getdata);   
  	} 
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get('dosen')->row(); 
		echo json_encode($sql,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('dosen');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    } 

		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){ 
	$data_form = $this->m_dosen->array_from_post(array('id','nidn','nama','jenkel','telp','alamat','email','password'));
	$id = $data_form['id'];	 
		if($id == '' || empty($id)){ 
				 
			return $this->db->query("insert into dosen set nidn = '".$data_form['nidn']."', nama = '".$data_form['nama']."', jenkel= '".$data_form['jenkel']."', telp= '".$data_form['telp']."', alamat= '".$data_form['alamat']."', email= '".$data_form['email']."', password = '".md5($data_form['password'])."' ");
	   
		}else{

			if($data_form['password'] == '' || empty($data_form['password'])){
				
				return $this->db->query("update dosen set  nidn = '".$data_form['nidn']."', nama = '".$data_form['nama']."', jenkel= '".$data_form['jenkel']."', telp= '".$data_form['telp']."', alamat= '".$data_form['alamat']."', email= '".$data_form['email']."' where id = '".$id."' ");
		
			}else{
				
				return $this->db->query("update dosen set nidn = '".$data_form['nidn']."', nama = '".$data_form['nama']."', jenkel= '".$data_form['jenkel']."', telp= '".$data_form['telp']."', alamat= '".$data_form['alamat']."', email= '".$data_form['email']."', password = '".md5($data_form['password'])."'  where id = '".$id."' ");
			}

		}

 

	}}
