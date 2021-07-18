<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Parent_Model extends CI_Model {
 

    protected $nama_tabel = '';
    protected $daftar_field = '';
    protected $primary_key = 'id';
  
	public function __construct(){
		parent::__construct();
	}

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

	
    
    public function hapus_data($id){
    	$hapus = $this->db->where('id',$id)->delete($this->nama_tabel);
    	return $hapus;
 	}
 
 	public function simpan_data_master($data_form,$nama_tabel,$primary_key,$id){

 		$user_insert = $this->session->userdata('username');
 		$date_insert = date('Y-m-d H:i:s');
 		$user_update = $this->session->userdata('username');
 		$date_update = date('Y-m-d H:i:s');
		
		$log_data_baru = array("user_insert"=>$user_insert,"date_insert"=>$date_insert); 
		$log_data_update = array("user_update"=>$user_update,"date_update"=>$date_update); 
	 

		$save = array_merge($data_form,$log_data_baru);
		
		$update = array_merge($data_form,$log_data_update);
		
 		if ($id === NULL || $id == '') { 
            $this->db->set($save);
            return $this->db->insert($nama_tabel);
           
        } else {
            
            $this->db->set($update);
            $this->db->where($primary_key, $id);
            return $this->db->update($nama_tabel);
           
        }

 	}
	
	public function simpan_data_transaksi($data_form,$nama_tabel,$primary_key,$id){

 		$user_insert = $this->session->userdata('username');
 		$date_insert = date('Y-m-d H:i:s');
 		$user_update = $this->session->userdata('username');
 		$date_update = date('Y-m-d H:i:s');
		
		
 		if ($id === NULL || $id == '') { 
            $this->db->set($data_form);
            return $this->db->insert($nama_tabel);
           
        } else {
            
            $this->db->set($data_form);
            $this->db->where($primary_key, $id);
            return $this->db->update($nama_tabel);
           
        }

 	}
	
	 public function simpan_data($data_form,$nama_tabel,$primary_key,$id){

        $user_insert = $this->session->userdata('username');
        $date_insert = date('Y-m-d H:i:s');
        $user_update = $this->session->userdata('username');
        $date_update = date('Y-m-d H:i:s');
        
        
        if ($id === NULL || $id == '') { 
            $this->db->set($data_form);
            return $this->db->insert($nama_tabel);
           
        } else {
            
            $this->db->set($data_form);
            $this->db->where($primary_key, $id);
            return $this->db->update($nama_tabel);
           
        }

    }
}
