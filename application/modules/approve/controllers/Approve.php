<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Approve extends Parent_Controller {
  
  var $nama_tabel = 't_repository';
  var $daftar_field = array('id','id_jenis_publikasi','judul','nomor_induk','nama_penulis','pembimbing','penguji','tanggal_sidang','tanggal_disahkan','tahun_terbit','doi','issn','tempat_terbit','tanggal_terbit','volume','penerbit','tanggal_setor','file','nomor_induk_approval');
  var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_approve'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'approve/approve_view';
  		$this->load->view('template_view',$data);		
     
  	} 
 
  	public function fetch_approve(){  
       $getdata = $this->m_approve->fetch_approve();
       echo json_encode($getdata);   
	}

	public function fetch_approve_front(){  
		$getdata = $this->m_approve->fetch_approve_front();
		echo json_encode($getdata);   
	 }

  
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.jenis_publikasi from t_repository a
		left join jenis_publikasi b on b.id = a.id_jenis_publikasi where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}

	public function update_status(){
		$idnya = $this->input->post('idnya');
		$status = $this->input->post('status');

		$simpan_data = $this->db->set("is_approve",$status)->where("id",$idnya)->update("t_repository");
	 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		echo json_encode($result,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
	

    $sqlhapus = $this->m_approve->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_approve->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_approve->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
