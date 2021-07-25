<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login_front extends Parent_Model { 
 
 
        var $nama_tabel_mhs = 'mahasiswa';
        var $daftar_field_mhs = array('id','nim','nama','jenkel','telp','alamat','email','password');
        var $primary_key_mhs = 'id';

        var $nama_tabel_dsn = 'dosen';
        var $daftar_field_dsn = array('id','nidn','nama','jenkel','telp','alamat','email','password');
        var $primary_key_dsn = 'id';

	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function auth_dsn($arrpost){
        $sql = $this->db->where($arrpost)->get($this->nama_tabel_dsn); 
        return $sql;
        }
        
        public function auth_mhs($arrpost){
        $sql = $this->db->where($arrpost)->get($this->nama_tabel_mhs); 
        return $sql;
	}
 
 
}
