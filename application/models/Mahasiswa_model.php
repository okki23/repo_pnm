<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $sql = "SELECT m.id, m.nama, j.nama_jurusan, p.nama_prodi
            FROM mahasiswa m
            INNER JOIN jurusan j ON m.id_jurusan = j.id
            INNER JOIN prodi p ON m.id_prodi = p.id";
    return $this->db->query($sql)->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('mahasiswa')->row();
  }

  // fungsi menampilkan semua jurusan
  public function get_jurusan()
  {
    $this->db->select('*');
    $this->db->from('jurusan');
    $result = $this->db->get();
    return $result->result();
  }

  // fungsi menampilkan prodi berdasarkan jurusan
  public function get_prodi($id_jurusan)
  {
    if (isset($id_jurusan)) {
      $this->db->where('id_jurusan', $id_jurusan);
    }

    $this->db->select('id, id_jurusan, nama_prodi');
		$this->db->from('prodi');
		$result = $this->db->get();
		return $result->result();
  }

  public function insert($data)
  {
    $this->db->insert('mahasiswa', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('mahasiswa', $data);
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('mahasiswa');
  }

}
