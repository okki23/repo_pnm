<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_job_order_detail extends Parent_Model { 
  
  
  var $nama_tabel = 't_job_order_detail';
  var $daftar_field = array('id','no_order','id_produk','qty');
  var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function get_no(){
    $query = $this->db->query("SELECT SUBSTR(MAX(no_order),-7) AS id  FROM t_job_order");
          //$query = $this->db->query("select max(personnel_id) as id from human_pa_md_emp_personal");

    return $query;
  }

  public function fetch_job_order_list(){
      
       $getdata = $this->db->query('select a.*,b.nama as nama_pelanggan,c.nama as nama_pegawai from t_job_order a
LEFT JOIN m_pelanggan b on b.id = a.id_pelanggan
LEFT JOIN m_pegawai c on c.id = a.id_admin_verif')->result();
       $data = array();  
           $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->no_order;
                $sub_array[] = $row->nama_pelanggan;
                $sub_array[] = $row->date_create;

                 
                $sub_array[] = '<a href="javascript:void(0)" id="delete" class="btn btn-info btn-xs waves-effect" onclick="Detail('.$row->id.');" > 
                  <i class="material-icons"> cast </i>Detail </a> 
                  &nbsp;  
                  <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                  
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
  
   
 
}
