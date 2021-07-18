<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pricelist extends Parent_Model { 
  
     var $nama_tabel = 't_pricelist';
     var $daftar_field = array('id','id_barang','id_supplier','harga');
     var $primary_key = 'id'; 
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_pricelist(){
       $sql = "select a.*,b.nama_barang,c.nama_supplier from t_pricelist a
       left join m_barang b on b.id = a.id_barang
       left join m_supplier c on c.id = a.id_supplier";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->nama_barang;  
                $sub_array[] = $row->nama_supplier;  
                $sub_array[] = "Rp. ".number_format($row->harga); 
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                $sub_array[] = $row->id;
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_jabatan(){
      
       $getdata = $this->db->get('m_jabatan')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_jabatan;  
                $sub_array[] = $row->id;  
                 
                  
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
    } 

    public function fetch_status(){
      
     $getdata = $this->db->get('m_status')->result();
     $data = array();  
    
         foreach($getdata as $row)  
         {  
              $sub_array = array();  
           
              $sub_array[] = $row->nama_status;  
              $sub_array[] = $row->id;  
               
                
              $data[] = $sub_array;  
            
         }  
        
     return $output = array("data"=>$data);
      
  } 
	 
 
}
