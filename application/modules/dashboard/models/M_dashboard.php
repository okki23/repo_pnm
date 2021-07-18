<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_dashboard extends Parent_Model { 
  
  
  var $nama_tabel = 'm_struktur';
  var $daftar_field = array('id','kode_menu','nama_menu','link','kode_parent');
  var $primary_key = 'id';
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function cobax(){
    $data_div = $this->db->query("select * from m_divisi")->result();
        foreach ($data_div as $key => $value) {
            $list_div[] = $value->nama_divisi;
        }
       return $list_div;
  }


  public function cobas(){
         $data_div = $this->db->query("SELECT a.*,b.nama_karyawan,c.nama_kelompok_jabatan,d.nama_kelas_jabatan,e.nama_seksi,f.nama_divisi from m_formasi_jabatan a
                            LEFT JOIN m_karyawan b on b.npp = a.npp
                            LEFT JOIN m_kelompok_jabatan c on c.id = a.id_kelompok_jabatan
                            LEFT JOIN m_kelas_jabatan d on d.id = c.id_kelas_jabatan
                            LEFT JOIN m_seksi e on e.id = a.id_seksi
                            LEFT JOIN m_divisi f on f.id = a.id_divisi 
                            where a.id_departemen = 0 and a.id_divisi != 0")->result();
            $return = [];
            foreach ($data_div as $key => $value) {
                $data['name'] = $value->nama_divisi;
             
                     $sqlb = $this->db->query("SELECT a.*,b.nama_karyawan,c.nama_kelompok_jabatan,
                                        d.nama_kelas_jabatan,e.nama_seksi,f.nama_divisi from 
                                        m_formasi_jabatan a
                                        LEFT JOIN m_karyawan b on b.npp = a.npp
                                        LEFT JOIN m_kelompok_jabatan c on c.id = a.id_kelompok_jabatan
                                        LEFT JOIN m_kelas_jabatan d on d.id = c.id_kelas_jabatan
                                        LEFT JOIN m_seksi e on e.id = a.id_seksi
                                        LEFT JOIN m_divisi f on f.id = a.id_divisi 
                                        where a.id_divisi = '".$value->id_divisi."'
                                        GROUP BY c.id_kelas_jabatan")->result();
                     $listing = array();
                     foreach ($sqlb as $keyz => $valuez) {
                        $listing[] = $valuez->nama_kelas_jabatan;
                        
                     }
 
                $return_arr = ["name" => $value->nama_divisi,
                               "categories" => $listing,];
                $return[] = $return_arr;
                
            }
                echo json_encode($return);
            
            
    }
 
  /* function getMenu($parent,$hasil){*/ 
  function getMenu($parent,$hasil){
        // echo "<pre>";
        $sql = $this->db->where('kode_parent',$parent)->get($this->nama_tabel);

        if(($sql->num_rows())>0)
        {
            $hasil .= "<ul>";
        }
        foreach($sql->result() as $h)
        {
            $hasil .= "<li> <a href='javascript::void(0);'>".$h->nama_menu." </a>";
            $hasil = $this->getMenu($h->kode_menu,$hasil);
            $hasil .= "</li>";
        }
        if(($sql->num_rows())>0)
        {
            $hasil .= "</ul>";
        }
        return $hasil;

        // var_dump($sql);
        // echo "</pre>";
        // exit();

        // $w = $this->db->query("SELECT * from tbl_menu where id_parent='".$parent."'");
        // if(($sql->num_rows())>0)
        // {
        //     $hasil .= "<ul>";
        // }
        // foreach($w->result() as $h)
        // {
        //     $hasil .= "<li><span>".$h->menu."</span>";
        //     $hasil = $this->getMenu($h->id_menu,$hasil);
        //     $hasil .= "</li>";
        // }
        // if(($w->num_rows)>0)
        // {
        //     $hasil .= "</ul>";
        // }
        // return $hasil;
    } 
  
 
}
