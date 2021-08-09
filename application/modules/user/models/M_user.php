<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_user extends Parent_Model { 
 
      var $nama_tabel = 'm_user';
      var $daftar_field = array('id','username','password');
      var $primary_key = 'id';
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_user(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
         
                $sub_array[] = $row->username;  
     
                      $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                      <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
