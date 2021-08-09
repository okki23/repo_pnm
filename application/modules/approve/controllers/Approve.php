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


	public function item_list(){  
       
		$no_transaksix =  $this->input->post('no_transaksix');
		 
		  $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_approve a
		left join m_kategori b on b.id = a.id_kategori
		left join m_sub_kategori c on c.id = a.id_sub_kategori";
		  $exsql = $this->db->query($sql)->result();
					
		  $dataparse = array();  
			 foreach ($exsql as $key => $value) {  
				  $sub_array['nama_kategori'] = $value->nama_kategori;
				  $sub_array['nama_sub_kategori'] = $value->nama_sub_kategori;  
				  $sub_array['nama_approve'] = $value->nama_approve;
				 
				  $sub_array['action'] =  "<button typpe='button' onclick='GetItemList(".$value->id.");' class = 'btn btn-primary'> <i class='material-icons'>shopping_cart</i> Pilih </button>";  
	 
				 array_push($dataparse,$sub_array); 
			  }  
		 
		  echo json_encode($dataparse);
   
	  }
	public function fetch_item_list(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get('m_approve')->row();
	    echo json_encode($sql,TRUE);
	}
	public function fetch_sub_kategori_approve(){  
  	   
		$id_kategori =  $this->input->post('id_kategori');
		$sql = "select * from m_sub_kategori where id_kategori = '".$id_kategori."' ";
  
	  $getdata = $this->db->query($sql)->result();
	  $return_arr = array();

	  foreach ($getdata as $key => $value) {
		   $row_array['nama'] = $value->nama_sub_kategori; 
		   $row_array['action'] = "<button typpe='button' onclick='GetDataSubKategori(".$value->id.");' class = 'btn btn-warning'> Pilih </button>";  
		   array_push($return_arr,$row_array);
	  }
	  echo json_encode($return_arr);

	 }  

	 public function fetch_nama_sub_kategori_row(){
		$id = $this->uri->segment(3);
		$data = $this->db->where('id',$id)->get('m_sub_kategori')->row();
		echo json_encode($data);
	}


	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_approve a
		left join m_kategori b on b.id = a.id_kategori
		left join m_sub_kategori c on c.id = a.id_sub_kategori where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
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
