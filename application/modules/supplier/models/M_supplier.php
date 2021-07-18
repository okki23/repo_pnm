<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_supplier extends Parent_Model { 
  
 
     var $nama_tabel = 'm_supplier';
     var $daftar_field = array('id','nama_supplier','alamat','telp','email');
     var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_supplier(){
      
       $getdata = $this->db->get($this->nama_tabel)->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_supplier;
                $sub_array[] = $row->alamat;
                $sub_array[] = $row->telp;
                $sub_array[] = $row->email;  
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $sub_array[] = $row->id;   
                  
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  }
   
  
   
 
}
