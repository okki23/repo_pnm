<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_harga extends Parent_Model { 
  
  var $nama_tabel = 'm_harga';
  var $daftar_field = array('id','nama_harga','year','id_country');
  var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_country(){
      
       $getdata = $this->db->get('m_country')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_country;  
                $sub_array[] = $row->id;  
                 
                  
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  }
  public function fetch_harga(){
       $sql = "select a.*,b.nama_country as country from m_harga a
              LEFT JOIN m_country b on b.id = a.id_country";
               
       $getdata = $this->db->query($sql)->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $no;
                $sub_array[] = $row->nama_harga;  
                $sub_array[] = $row->year;  
                $sub_array[] = $row->country;  
        
                    
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="val_harga_update" onclick="Ubah_Data_Val_Harga('.$row->id.');" > <i class="material-icons">create</i> Ubah Harga </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-warning btn-xs waves-effect" onclick="Detail_Data('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a> &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                 $sub_array[] = $row->id;
                
               
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }


      public function fetch_harga_parent(){
      
       $sql = "select a.*,b.nama_komp_biaya,c.nama_pelayanan,d.nama_satuan from m_harga a
              LEFT JOIN m_komp_biaya b on b.id = a.id_komp_biaya
              LEFT JOIN m_jenis_pelayanan c on c.id = a.id_pelayanan
              LEFT JOIN m_satuan d on d.id = a.id_satuan";
               
       $getdata = $this->db->query($sql)->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
              
                $sub_array[] = $row->nama_pelayanan;  
                $sub_array[] = $row->nama_komp_biaya;  
                $sub_array[] = $row->nama_harga;  
                $sub_array[] = $row->nama_satuan;  
                $sub_array[] = $row->id;  
                 
                
               
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }
   
  
   
 
}
