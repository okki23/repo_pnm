<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_payroll extends Parent_Model { 
  
     var $nama_tabel = 'm_payroll';
     var $daftar_field = array('id','id_pegawai','periode','date_generate');
     var $primary_key = 'id';  
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_payroll(){
       $sql = "select * from t_payroll GROUP BY periode";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->periode;  
                $sub_array[] = $row->date_generate;  
    
                $sub_array[] = '<a href="'.base_url('payroll/slip/').$row->periode.'" class="btn btn-primary btn-xs waves-effect" id="edit" onclick="Print('.$row->id.');" > <i class="material-icons">print</i> Cetak Slip Gaji </a>  &nbsp; 
               <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->periode.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
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
