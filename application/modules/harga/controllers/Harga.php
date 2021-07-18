<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Harga extends Parent_Controller {
 
  var $nama_tabel = 'm_harga';
  var $daftar_field = array('id','nama_harga','year','id_country');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_harga'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'harga/harga_view';
		$this->load->view('template_view',$data);		
   
	}
 	
 	public function fetch_nama_komp_biaya(){  
  	   
  	   $id_pelayanan =  $this->input->post('id_pelayanan');
       $sql = "select * from m_komp_biaya where id_jenis_layanan = '".$id_pelayanan."' ";
   
       $getdata = $this->db->query($sql)->result();
       $return_arr = array();

       foreach ($getdata as $key => $value) {
       	 $row_array['nama'] = $value->nama_komp_biaya; 
       	 $row_array['action'] = "<button typpe='button' onclick='GetDataKompBiaya(".$value->id.");' class = 'btn btn-warning'> Pilih </button>";  
       	 array_push($return_arr,$row_array);
       }
       echo json_encode($return_arr);
 
  	}  
    
    public function list_detail_harga(){
    $id = $this->input->post('id');

      $sql = "select a.*,b.nama_komp_biaya,c.nama_pelayanan,d.nama_satuan,e.harga,e.id_kel_harsat,f.nama_harga from m_pricelist a
      LEFT JOIN m_komp_biaya b on b.id = a.id_komp_biaya
      LEFT JOIN m_jenis_pelayanan c on c.id = a.id_pelayanan
      LEFT JOIN m_satuan d on d.id = a.id_satuan
      LEFT JOIN m_harsat_val e on e.id_pricelist = a.id  
      LEFT JOIN m_harga f on f.id = e.id_kel_harsat where e.id_kel_harsat = '".$id."'  ";
     //echo $sql;
       $getdata = $this->db->query($sql)->result();
       $return_arr = array();
       $no = 1;
       foreach ($getdata as $key => $value) {

         $row_array['no'] = $no;
         $row_array['nama_pricelist'] = $value->nama_pricelist; 
         $row_array['harga'] = "Rp. ".number_format((intval($value->harga)),0);
         $row_array['nama_pelayanan'] = $value->nama_pelayanan;
         $row_array['nama_komp_biaya'] = $value->nama_komp_biaya;
          
         array_push($return_arr,$row_array);
         $no++;
       }
       echo json_encode($return_arr);
   
  }

   public function list_detail_harga_ubah(){
    $id = $this->input->post('id');

      $sql = "select a.*,b.nama_komp_biaya,c.nama_pelayanan,d.nama_satuan,e.harga,e.id as idharsatval,e.id_kel_harsat,f.nama_harga from m_pricelist a
      LEFT JOIN m_komp_biaya b on b.id = a.id_komp_biaya
      LEFT JOIN m_jenis_pelayanan c on c.id = a.id_pelayanan
      LEFT JOIN m_satuan d on d.id = a.id_satuan
      LEFT JOIN m_harsat_val e on e.id_pricelist = a.id  
      LEFT JOIN m_harga f on f.id = e.id_kel_harsat where e.id_kel_harsat = '".$id."'  ";
     //echo $sql;
       $getdata = $this->db->query($sql)->result();
       $return_arr = array();
       $no = 1;
       foreach ($getdata as $key => $value) {

         $row_array['no'] = $no."<input type='hidden' name='id[]' value='".$value->idharsatval."' >";
         $row_array['nama_pricelist'] = $value->nama_pricelist; 
         $row_array['harga'] = "<input type='text' class='form-control' name='harga[]' value='".$value->harga."' >";
          $row_array['satuan'] = $value->nama_satuan; 
         $row_array['nama_pelayanan'] = $value->nama_pelayanan;
         $row_array['nama_komp_biaya'] = $value->nama_komp_biaya;
          
         array_push($return_arr,$row_array);
         $no++;
       }
       echo json_encode($return_arr);
   
  }

    public function generate_harga(){

    $nama_harga = $_POST['nama_harga'];
    $id_country = $_POST['id_country_second'];
    $year = $_POST['year'];
    $id_asal_harga = $_POST['id_asal_harga'];
    $persentase_kenaikan = $_POST['persentase_kenaikan'];

    //store to harga

    $sql_harga = "insert into m_harga (nama_harga,year,id_country) values ('".$nama_harga."','".$year."','".$id_country."')";

    $this->db->query($sql_harga);
    
    //last_id for generate harga
    $last_id = $this->db->insert_id();

    //ambil harga 
    $sql_ah = $this->db->query("select * from m_harsat_val where id_kel_harsat = '".$id_asal_harga."' ");

    foreach ($sql_ah->result() as $key => $value) {
      //echo ($value->harga + ($value->harga * 5 / 100))."<br>";

     $sql = "insert into m_harsat_val (id_kel_harsat,id_pricelist,harga) values ('".$last_id."','".$value->id_pricelist."','".($value->harga + ($value->harga * $persentase_kenaikan / 100))."') ";
    $this->db->query($sql);
    }
    }
 

  	public function fetch_nama_komp_biaya_row(){
  		$id = $this->uri->segment(3);
  		$data = $this->db->where('id',$id)->get('m_komp_biaya')->row();
  		echo json_encode($data);
  	}

  	public function fetch_nama_parents_row(){
  		$id = $this->uri->segment(3);
  		$data = $this->db->where('id',$id)->get('m_harga')->row();
  		echo json_encode($data);
  	}


  	public function fetch_harga(){  
       $getdata = $this->m_harga->fetch_harga();
       echo json_encode($getdata);   
  	}
  	
  	public function fetch_country(){  
       $getdata = $this->m_harga->fetch_country();
       echo json_encode($getdata);   
  	}

  	public function fetch_satuan(){  
       $getdata = $this->m_harga->fetch_satuan();
       echo json_encode($getdata);   
  	}  

  	public function fetch_pelayanan(){  
       $getdata = $this->m_harga->fetch_pelayanan();
       echo json_encode($getdata);   
  	}

  	public function fetch_komp_biaya(){  
       $getdata = $this->m_harga->fetch_komp_biaya();
       echo json_encode($getdata);   
  	}
 
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_country as country from m_harga a
              LEFT JOIN m_country b on b.id = a.id_country
              where a.id = '".$id."' ";
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('m_harga');
    	$deletex =  $this->db->where('id_kel_harsat',$id)->delete('m_harsat_val');
    	if($delete && $deletex){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_harga->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_harga->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
  
  public function simpan_data_ubah(){
 

  $cid = count($_POST['id']); 
  
    //masukkan data jika belum ada

    if($cid > 0)  {

      for($i=0; $i<$cid; $i++){
        $this->db->query("update m_harsat_val SET harga = '".$_POST['harga'][$i]."' where id = '".$_POST['id'][$i]."' "); 

        echo $this->db->last_query()."<br>";
      }
        

    } 
    
    echo 1; 
   
  } 

	public function dataget(){
    //header('Content-type: text/javascript');
    $sql = $this->db->query("select a.*,b.nama_komp_biaya,c.nama_pelayanan,d.nama_satuan,e.nama_harga as parent from m_harga a
              LEFT JOIN m_komp_biaya b on b.id = a.id_komp_biaya
              LEFT JOIN m_jenis_pelayanan c on c.id = a.id_pelayanan
              LEFT JOIN m_satuan d on d.id = a.id_satuan
              LEFT JOIN m_harga e on e.id = a.id_parent_harga")->result();
    $arr = array();
    foreach ($sql as $key => $value) {
      $sub_arr = array();
      $sub_arr['nama_pelayanan'] = $value->nama_pelayanan; 
      $sub_arr['nama_komp_biaya'] = $value->nama_komp_biaya; 
      $sub_arr['nama_harga'] = $value->nama_harga; 
      $sub_arr['nama_satuan'] = $value->nama_satuan; 
      $sub_arr['parent'] = $value->parent; 

      $arr[] = $sub_arr;
    }

		//$arr = array('data1'=>1,'data2'=>2,'data3'=>3);
    echo json_encode(array("data"=>$arr));
	}
  
       


}
