<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logo extends Parent_Model { 
   
      var $nama_tabel = 'page_logo';
      var $daftar_field =  array('id','logo');
      var $primary_key = 'id';
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_logo(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = '<img src="assets/images/'.$row->logo.'" style="width:30%">';
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
