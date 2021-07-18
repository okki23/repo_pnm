<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_sub_kategori_barang extends Parent_Model { 
  
     var $nama_tabel = 'm_sub_kategori';
     var $daftar_field = array('id','id_kategori','nama_sub_kategori');
     var $primary_key = 'id';
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_sub_kategori_barang(){
       $sql = "select a.*,b.nama_kategori from m_sub_kategori a
       left join m_kategori b on b.id = a.id_kategori";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->nama_kategori;  
                $sub_array[] = $row->nama_sub_kategori; 
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                $sub_array[] = $row->id;
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
 
 
}
