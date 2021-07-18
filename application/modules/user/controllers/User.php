<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class User extends Parent_Controller {
 
  var $nama_tabel = 'm_user';
  var $daftar_field = array('id','username','password','id_pegawai','level');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_user'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'user/user_view'; 
		$this->load->view('template_view',$data);		
   
	}
 
 
  	public function fetch_user(){  
       $getdata = $this->m_user->fetch_user();
       echo json_encode($getdata);   
 	}  
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->query("select a.*,b.nama from m_user a
		left join m_pegawai b on b.id = a.id_pegawai WHERE a.id = '".$id."' ")->row();
		echo json_encode($get,TRUE);
	}
	
  	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
     
  		$sqlhapus = $this->m_user->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
 
	public function simpan_data_user(){
		$data_form = $this->m_user->array_from_post(array('id','username','password','id_pegawai','level'));
		$id = $data_form['id'];	 
	 
		//apabila user id kosong maka input data baru
		if($id == '' || empty($id)){ 
				 
				return $this->db->query("insert into m_user set username = '".$data_form['username']."', password = '".base64_encode($data_form['password'])."', id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."' ");
		  

		//apabila user id tersedia maka update data
		}else{

			if($data_form['password'] == '' || empty($data_form['password'])){
				 
				return $this->db->query("update m_user set username = '".$data_form['username']."',  id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."'  where id = '".$id."' ");
		 
			}else{
				 
				return $this->db->query("update m_user set username = '".$data_form['username']."',password = '".base64_encode($data_form['password'])."', id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."'  where id = '".$id."' ");
			}

		}

	 
		
	}
       


}
