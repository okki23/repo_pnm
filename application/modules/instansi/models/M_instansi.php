<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_instansi extends Parent_Model { 
  
     var $nama_tabel = 'm_instansi';
     var $daftar_field = array('id','id_kategori_instansi','nama_instansi','alamat','telp','pic');
     var $primary_key = 'id'; 
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_instansi(){
       $sql = "select a.*,b.nama_kategori_instansi from m_instansi a
       left join m_kategori_instansi b on b.id = a.id_kategori_instansi";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->nama_kategori_instansi;  
                $sub_array[] = $row->nama_instansi;  
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
                <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                $sub_array[] = $row->id;
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

   
	 
 
}
