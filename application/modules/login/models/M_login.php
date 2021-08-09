<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends Parent_Model { 
 
	var $nama_tabel_user = 'm_user';
  	var $daftar_field_user = array('id','username','password');
  	var $primary_key_user = 'id';

	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function autentikasi($username,$password){
        $sql = $this->db->query("select * from m_user where username = '".$username."' AND password = '".$password."' "); 
        return $sql;
	}
 
 
}
