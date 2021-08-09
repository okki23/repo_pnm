<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_front extends Parent_Controller {
 
  	var $nama_tabel_mhs = 'mahasiswa';
  	var $daftar_field_mhs = array('id','nim','nama','jenkel','telp','alamat','email','password');
  	var $primary_key_mhs = 'id';

	var $nama_tabel_dsn = 'dosen';
  	var $daftar_field_dsn = array('id','nidn','nama','jenkel','telp','alamat','email','password');
  	var $primary_key_dsn = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_login_front');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$this->load->view('login/login_view',$data);
	}
	public function auth(){
	 
		$nomor_induk = $this->input->post('nomor_induk');
		$password = md5($this->input->post('password')); 
		$roles_login = $this->input->post('roles_login');
	 
		if($roles_login == 1){
			//dsn
			$arrpost = array('nidn'=>$nomor_induk,'password'=>$password);
			$auth = $this->m_login_front->auth_dsn($arrpost)->num_rows(); 
			if($auth > 0){
				$result = $this->m_login_front->auth_dsn($arrpost)->row(); 
				$response = array("code"=>200,"data"=>array("nomor_induk"=>$result->nidn,"nama"=>$result->nama,"role"=>"dosen","message"=>"success")); 
				$this->session->set_userdata(array("nomor_induk"=>$result->nidn,"nama"=>$result->nama,"role"=>"dosen"));
				echo json_encode($response);
			}else{
				$result = $this->m_login_front->auth_dsn($arrpost)->row(); 
				$response = array("code"=>400,"data"=>array("nomor_induk"=>$result->nidn,"nama"=>$result->nama,"role"=>"dosen","message"=>"failed")); 
				$this->session->set_userdata(array("nomor_induk"=>$result->nidn,"nama"=>$result->nama,"role"=>"dosen",));
				echo json_encode($response);
			}
		}else{
			//mhs
			$arrpost = array('nim'=>$nomor_induk,'password'=>$password);
			$auth = $this->m_login_front->auth_mhs($arrpost)->num_rows();   
			if($auth > 0){
				$result = $this->m_login_front->auth_mhs($arrpost)->row();  
				$response = array("code"=>200,"data"=>array("nomor_induk"=>$result->nim,"nama"=>$result->nama,"role"=>"mahasiswa","message"=>"success")); 
				$this->session->set_userdata(array("nomor_induk"=>$result->nim,"nama"=>$result->nama,"role"=>"mahasiswa"));
				echo json_encode($response);
			}else{
				$result = $this->m_login_front->auth_mhs($arrpost)->row();   
				$response = array("code"=>200,"data"=>array("nomor_induk"=>$result->nim,"nama"=>$result->nama,"role"=>"mahasiswa","message"=>"failed")); 
				$this->session->set_userdata(array("nomor_induk"=>$result->nim,"nama"=>$result->nama,"role"=>"mahasiswa"));
				echo json_encode($response);
			}
		}
			
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('login') . "';
             </script>";
		 
	}
}
