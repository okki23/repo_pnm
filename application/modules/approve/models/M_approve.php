<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_approve extends Parent_Model { 
  
     var $nama_tabel = 't_repository';
     var $daftar_field = array('id','id_jenis_publikasi','judul','nomor_induk','nama_penulis','pembimbing','penguji','tanggal_sidang','tanggal_disahkan','tahun_terbit','doi','issn','tempat_terbit','tanggal_terbit','volume','penerbit','tanggal_setor','file','is_approve');
     var $primary_key = 'id'; 

  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_approve(){
       $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_approve a
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
                $sub_array[] = $row->nama_approve; 
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
 
    public function fetch_approve_front(){
     $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_approve a
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
              $sub_array[] = $row->nama_approve;  
              $sub_array[] = $row->qty_jkt;
              $sub_array[] = $row->qty_subang;
             
              $data[] = $sub_array;  
              $no++;
         }  
        
           return $output = array("data"=>$data);
    }
  


   
	 
 
}
