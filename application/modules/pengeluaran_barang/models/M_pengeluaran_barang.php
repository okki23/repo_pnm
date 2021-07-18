<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pengeluaran_barang extends Parent_Model { 
  
  var $nama_tabel = 't_pengeluaran';
  var $daftar_field = array('id','no_transaksi','id_instansi','keterangan','id_pegawai','date_assign');  
  var $primary_key = 'id';
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function get_no(){
    $query = $this->db->query("SELECT SUBSTR(MAX(no_transaksi),-7) AS id  FROM t_pengeluaran");
         
    return $query;
  }

   
  public function fetch_pengeluaran_baranglist_table(){
       $getdata = $this->db->query("select 
                  SELECT a.*,b.harga,c.nama_produk FROM t_pengeluaran_barang_detail a
                  LEFT JOIN m_pricelist b on b.id = a.id_pricelist
                  LEFT JOIN m_produk c on c.id = b.id_produk")->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_produk;   
                $sub_array[] = $row->design_file_upload;   
                $sub_array[] = $row->qty;  
                $sub_array[] = $row->total;  
          
                $sub_array[] = "<button typpe='button' onclick='HapusDetailList(".$value->id.");' class = 'btn btn-danger'> <i class='material-icons'>delete_forever</i> Hapus </button>  ";  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
       return $output = array("data"=>$data);
  }

  public function list_order_customer(){
      $getdata = $this->db->query('select * from t_pengeluaran_barang where id_pelanggan = "'.$this->session->userdata('userid').'" ')->result();
      $data = array();  
          $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $no;  
                $sub_array[] = $row->no_order; 
                $sub_array[] = "<button typpe='button' onclick='Hapus(".$row->id.");' class = 'btn btn-primary'> <i class='material-icons'>aspect_ratio</i> Detail </button> &nbsp; <button typpe='button' onclick='Hapus(".$row->id.");' class = 'btn btn-danger'> <i class='material-icons'>delete_forever</i> Hapus </button>";  
                 
                  
                $data[] = $sub_array;  
          $no++;
           }  
          
       return $output = array("data"=>$data);
  }

  public function fetch_pengeluaran_barang_list(){
      
       $getdata = $this->db->query("select a.*,b.nama_instansi,c.nama from t_pengeluaran a
       left join m_instansi b on b.id = a.id_instansi
       left join m_pegawai c on c.id = a.id_pegawai")->result();
       $data = array();  
           $no = 1;
         
           foreach($getdata as $row)  
           {  
                
                $sub_array = array();  
                
                $sub_array[] = $row->no_transaksi;
                $sub_array[] = $row->nama_instansi;
                $sub_array[] = $row->keterangan;
                $sub_array[] = $row->date_assign; 
                    
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Show_Detail('.$row->no_transaksi.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->no_transaksi.');" > <i class="material-icons">delete</i> Hapus </a>';  
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
