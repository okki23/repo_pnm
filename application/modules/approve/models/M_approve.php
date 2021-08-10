<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_approve extends Parent_Model { 
  
     var $nama_tabel = 't_repository';
     var $daftar_field = array('id','id_jenis_publikasi','judul','nomor_induk','nama_penulis','pembimbing','penguji','tanggal_sidang','tanggal_disahkan','tahun_terbit','doi','issn','tempat_terbit','tanggal_terbit','volume','penerbit','tanggal_setor','file','is_approve');
     var $primary_key = 'id'; 

  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_approve(){
       $sql = "select a.*,b.jenis_publikasi,case when(a.is_approve='Y') then 'Sudah' else 'Belum' end as status  from t_repository a
       left join jenis_publikasi b on b.id = a.id_jenis_publikasi";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                
                $sub_array = array();  
 
                $sub_array[] = $no;  
                $sub_array[] = $row->jenis_publikasi;  
                if($row->id_jenis_publikasi == 1){
                    $sub_array[] = '<a href="'.base_url('publikasi/jurnal/').$row->file.'" target="_blank"> '.$row->judul.'  <i class="material-icons">open_in_new</i> </a>'; 
                }else if($row->id_jenis_publikasi == 2){
                    $sub_array[] = '<a href="'.base_url('publikasi/karya_ilmiah/').$row->file.'" target="_blank"> '.$row->judul.'  <i class="material-icons">open_in_new</i> </a>'; 
                }else{
                    $sub_array[] = '<a href="'.base_url('publikasi/skripsi/').$row->file.'" target="_blank"> '.$row->judul.'  <i class="material-icons">open_in_new</i> </a>'; 
                }
          
                $sub_array[] = $row->status; 
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp;';  
             
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
  
}
