<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_barang extends Parent_Model { 
  
     var $nama_tabel = 'm_barang';
     var $daftar_field = array('id','nama_barang','id_kategori','id_sub_kategori','qty_subang','qty_jkt','keterangan');
     var $primary_key = 'id'; 
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_barang(){
       $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_barang a
       left join m_kategori b on b.id = a.id_kategori
       left join m_sub_kategori c on c.id = a.id_sub_kategori";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->nama_kategori;  
                $sub_array[] = $row->nama_sub_kategori;  
                $sub_array[] = $row->nama_barang; 
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
                <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                $sub_array[] = $row->id;
                $sub_array[] = $row->qty_jkt;
                $sub_array[] = $row->qty_subang;
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
 
    public function fetch_barang_front(){
     $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_barang a
     left join m_kategori b on b.id = a.id_kategori
     left join m_sub_kategori c on c.id = a.id_sub_kategori order by a.id asc";
             
           $getdata = $this->db->query($sql)->result();
           $data = array();  
           $no = 1;
         foreach($getdata as $row)  
         {  
              $sub_array = array();  

              $sub_array[] = $row->nama_kategori;  
              $sub_array[] = $row->nama_sub_kategori;  
              $sub_array[] = $row->nama_barang;  
              $sub_array[] = $row->qty_jkt;
              $sub_array[] = $row->qty_subang;
             
              $data[] = $sub_array;  
              $no++;
         }  
        
           return $output = array("data"=>$data);
    }
  


   
	 
 
}
