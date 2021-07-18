<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends Parent_Model { 
 
  
  var $nama_tabel = 'm_user';
  var $daftar_field = array('id', 'username', 'password', 'user_insert', 'date_insert', 'user_update', 'date_update');
  
  var $primary_key = 'id';

	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function autentikasi($username,$password){
        $sql = $this->db->query("select a.*,b.nip,b.nama,b.foto from m_user a 
        left join m_pegawai b on b.id = a.id_pegawai where username = '".$username."' AND password = '".$password."' "); 
        return $sql;
	}
 
 
}
