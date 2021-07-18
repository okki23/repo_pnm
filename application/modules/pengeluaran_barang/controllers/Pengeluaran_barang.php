<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pengeluaran_barang extends Parent_Controller {
  
  var $nama_tabel = 't_pengeluaran';
  var $daftar_field = array('id','no_transaksi','id_instansi','keterangan','id_pegawai','date_assign');  
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_pengeluaran_barang'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	   public function index(){
		  $data['judul'] = $this->data['judul']; 
		  $data['konten'] = 'pengeluaran_barang/pengeluaran_barang_view';
		  $data['userid'] = $this->session->userdata('userid');
		  $this->load->view('template_view',$data);		
   
	   }
 	
  
  	public function fetch_pengeluaran_barang_list(){  
       $getdata = $this->m_pengeluaran_barang->fetch_pengeluaran_barang_list();
       echo json_encode($getdata);   
    }
    
    public function hapus_no_transaksi(){
      $no_transaksi = $this->input->post('no_transaksi');
      echo $no_transaksi;
 
      $this->db->query("delete from t_pengeluaran where no_transaksi = '".$no_transaksi."' ");

    }


    public function produk_list(){  
       
      $no_order =  $this->input->post('no_order');
       
        $sql = "select 
        a.*,b.nama_produk,c.nama_bahan,c.ukuran,d.nama_satuan,c.berat_bahan from 
        m_pricelist a
        LEFT JOIN m_produk b on b.id = a.id_produk
        LEFT JOIN m_bahan c on c.id = a.id_bahan
        LEFT JOIN m_satuan d on d.id= c.id_satuan  order by a.id asc";
        $exsql = $this->db->query($sql)->result();
      
        $dataparse = array();  
           foreach ($exsql as $key => $value) {  
                $sub_array['nama_produk'] = $value->nama_produk;
                $sub_array['nama_bahan'] = $value->nama_bahan;  
                $sub_array['ukuran'] = $value->ukuran;
                $sub_array['nama_satuan'] = $value->nama_satuan;
                $sub_array['berat_bahan'] = $value->berat_bahan;
                $sub_array['harga'] = "Rp. ".number_format($value->harga);
                //$sub_array['foto'] = "x";
                $sub_array['foto'] = "<a href='upload/".$value->foto."' data-fancybox data-type='image' data-caption='".$value->nama_produk ." - ". $value->nama_bahan ." - ". $value->ukuran ." ". $value->nama_satuan ." - ". $value->berat_bahan ." Gram - Rp. ". number_format($value->harga)."'> View </a> ";
                $sub_array['action'] =  "<button typpe='button' onclick='GetDataProduk(".$value->id.");' class = 'btn btn-primary'> <i class='material-icons'>shopping_cart</i> Pilih </button>";  
   
               array_push($dataparse,$sub_array); 
            }  
       
        echo json_encode($dataparse);
 
    }


    public function listingdetail(){  
      //No 	Nama Barang 	Qty 	Source 	Keterangan
      $id =  $this->input->post('id');
       
      $sql = "select a.*,b.nama_barang, CASE a.source
      WHEN 'jkt' THEN 'Jakarta'
      WHEN 'sbg' THEN 'Subang'
      ELSE NULL
      END as 'src' from t_pengeluaran_detail a
      left join m_barang b on b.id = a.id_barang
                  where a.no_transaksi = '".$id."' ";
        $exsql = $this->db->query($sql)->result();
      
          $dataparse = array();  
          $no = 1;
           foreach ($exsql as $key => $value) {  
                $sub_array['no'] = $no;
                $sub_array['nama_barang'] = $value->nama_barang;  
                $sub_array['qty'] = $value->qty;
                $sub_array['source'] = $value->src;
                $sub_array['keterangan'] = $value->keterangan; 
               array_push($dataparse,$sub_array); 
               $no++;
            }  
       
        echo json_encode($dataparse);
 
    }

    public function calc_weight(){
       $data = $this->uri->segment(3);
       $res = 0;
       $sql = $this->db->query(" 
                  SELECT a.*,b.harga,c.nama_produk,d.berat_bahan FROM t_pengeluaran_barang_detail a
                  LEFT JOIN m_pricelist b on b.id = a.id_pricelist
                  LEFT JOIN m_produk c on c.id = b.id_produk
                  LEFT JOIN m_bahan d on d.id = b.id_bahan
                  where a.no_order = '".$data."' ")->result();
       foreach ($sql as $key => $value) {
         $res += $value->total_berat;
       }
       echo $res;
    }

    public function datalist(){
      $data = $this->uri->segment(3);
      //echo $data;
 
      $sql = $this->db->query("select a.*,b.nama_barang, CASE a.source
      WHEN 'jkt' THEN 'Jakarta'
      WHEN 'sbg' THEN 'Subang'
      ELSE NULL
      END as 'src' from t_pengeluaran_detail a
      left join m_barang b on b.id = a.id_barang
                  where a.no_transaksi = '".$data."' ");
      
      $no = 1;

      if($sql->num_rows() > 0){
        echo "<thead>
                <tr>
                    <th style='width:1%; text-align:center;'>No</th>  
                    <th style='width:2%; text-align:center;'>Nama Barang</th>
                    <th style='width:2%; text-align:center;'>Qty</th> 
                    <th style='width:2%; text-align:center;'>Source</th>
                    <th style='width:5%; text-align:center;'>Keterangan</th> 
                    <th style='width:5%; text-align:center;'>Opsi</th>  
                </tr>
            </thead>";
        foreach ($sql->result() as $key => $value) {
          echo "<tr>
                    <td align='center'>".$no."</td>
                    <td>".$value->nama_barang."</td>
                    <td align='center'>".$value->qty."</td>
                    <td align='center'>".$value->src."</td>
                    <td>".$value->keterangan."</td> 
                    <td align='center'><button type='button' onclick='HapusDetailList(".$value->id.",".$value->no_transaksi.");' class = 'btn btn-danger btn-xs'> <i class='material-icons'>delete_forever</i> Hapus </button> 
  
                    </td>
                </tr>";
       
        $no++;
        } 

      }else{
        echo "<thead>
        <tr>
            <th style='width:1%;' align='center'>No</th>  
            <th style='width:2%;' align='center'>Nama Barang</th>
            <th style='width:2%;' align='center'>Qty</th> 
            <th style='width:2%;' align='center'>Source</th>
            <th style='width:5%;' align='center'>Keterangan</th>  
            <th style='width:5%;' align='center'>Opsi</th> 
        </tr>
        <tr>
        <td colspan='6'>Tidak ada data order</td> 
      </tr>
    </thead>";
      }
    
 
    }

    public function list_order_customer(){
       $getdata = $this->m_pengeluaran_barang->list_order_customer();
       echo json_encode($getdata);   
    }

    public function list_pengeluaran_barangdetail_bycustomer(){  
  
      $data =  $this->input->post('data');
       
        $sql = "select 
        a.*,b.nama_produk,c.nama_bahan,c.ukuran,d.nama_satuan,c.berat_bahan from 
        m_pricelist a
        LEFT JOIN m_produk b on b.id = a.id_produk
        LEFT JOIN m_bahan c on c.id = a.id_bahan
        LEFT JOIN m_satuan d on d.id= c.id_satuan where a.no_order = '".$data."'  order by a.id asc";
        $exsql = $this->db->query($sql)->result();
      
        $dataparse = array();  
           foreach ($exsql as $key => $value) {  

                $sub_array['no'] = $no;
                $sub_array['produk'] = $row->nama_produk;   
                $sub_array['design'] = $row->design_file_upload;   
                $sub_array['qty'] = $row->qty;  
                $sub_array['total'] = $row->total;  
                $sub_array['action'] = "<button type='button' onclick='HapusDetailList(".$value->id.",".$data.");'> Hapus </button>";
                // $sub_array['action'] =  "<button type='button' onclick='HapusDetailList(".$value->id.",".$data.");' class = 'btn btn-danger'> <i class='material-icons'>delete_forever</i> Hapus </button>";  
   
               array_push($dataparse,$sub_array); 
            }  
       
        echo json_encode($dataparse);
 
    }

 

  	public function get_last_id(){
    $params = date('Ymd');
		echo $this->transaksi_id($params); 
    $dataid = $this->transaksi_id($params); 
    //store
    $sql = "insert into t_pengeluaran (no_transaksi) values ('".$this->transaksi_id($params)."')";
    $this->db->query($sql);

	  }

    public function hapus_no_order(){
      $no_order = $this->input->post('no_order');
      echo $no_order;
      $this->db->query("delete from t_pengeluaran_barang where no_order = '".$no_order."' ");

    }
 
     
	  public function transaksi_id($param = '') {
        $data = $this->m_pengeluaran_barang->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        }else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }  	

    public function invoice_id($param = '') {
        $data = $this->m_pengeluaran_barang->get_invoice_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        }else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }   
   
	  
  public function get_data_produk(){
    $id = $this->uri->segment(3);
    $sql = "select 
        a.*,b.nama_produk,c.nama_bahan,c.ukuran,d.nama_satuan,c.berat_bahan from 
        m_pricelist a
        LEFT JOIN m_produk b on b.id = a.id_produk
        LEFT JOIN m_bahan c on c.id = a.id_bahan
        LEFT JOIN m_satuan d on d.id= c.id_satuan where a.id = '".$id."' ";
    $get = $this->db->query($sql)->row();
    echo json_encode($get,TRUE);
  }
 
	
   public function hapus_data_detail(){
 
    $id = $this->input->post('id');
    $no_transaksi = $this->input->post('no_transaksi');

    $arr = array('id'=>$id,'no_transaksi'=>$no_transaksi);
    $get = $this->db->where($arr)->get('t_pengeluaran_detail')->row();

    if($get->source == 'jkt'){
      $this->db->query("update m_barang set qty_jkt = qty_jkt+".$get->qty." where id = '".$get->id_barang."' ");
    }else{
      $this->db->query("update m_barang set qty_subang = qty_subang+".$get->qty." where id = '".$get->id_barang."' ");
    }
    
    $arr = array('id'=>$id,'no_transaksi'=>$no_transaksi);
 
      $delitem = $this->db->where($arr)->delete('t_pengeluaran_detail');
      
      if($delitem){
        $result = array("response"=>array('message'=>'success')); 
      }else{
        $result = array("response"=>array('message'=>'failed'));
      }
 
    
    echo json_encode($result,TRUE);
  }

  public function detailmodal(){
    $no_transaksi = $this->uri->segment(3);
     
    $sql = "select a.*,c.pic,c.nama_instansi,c.alamat,c.telp,d.nama,d.nip,e.nama_kategori_instansi from t_pengeluaran a
    left join t_pengeluaran_detail b on b.no_transaksi = a.no_transaksi
    left join m_instansi c on c.id = a.id_instansi
    left join m_pegawai d on d.id = a.id_pegawai
    left join m_kategori_instansi e on e.id = c.id_kategori_instansi where a.no_transaksi = '".$no_transaksi."' ";
    $parse = $this->db->query($sql)->row();
    echo json_encode($parse,TRUE);
  }
  public function hapus_data(){
    $no_transaksi = $this->input->post('no_transaksi'); 
    
    $sa = $this->db->query("select * from t_pengeluaran_detail where no_transaksi = '".$no_transaksi."' ")->result();
    foreach($sa as $k=>$v){
      if($v->source == 'jkt'){
        $this->db->query("update m_barang set qty_jkt = qty_jkt + '".$v->qty."' ");
      }else{
        $this->db->query("update m_barang set qty_subang = qty_subang + '".$v->qty."' ");
      }
      
    }

    $delete_pengeluaran_barang = $this->db->where('no_transaksi',$no_transaksi)->delete('t_pengeluaran');
    $delete_pengeluaran_barang_detail = $this->db->where('no_transaksi',$no_transaksi)->delete('t_pengeluaran_detail');
     
    if($delete_pengeluaran_barang && $delete_pengeluaran_barang_detail){
      $result = array("response"=>array('message'=>'success')); 
    }else{
      $result = array("response"=>array('message'=>'failed'));
    }

  
  echo json_encode($result,TRUE);
	}

	function berkas_file_upload(){  
	    if(isset($_FILES["berkas_file_upload"])){  
	        $extension = explode('.', $_FILES['berkas_file_upload']['name']);   
	        $destination = './upload/' . $_FILES['berkas_file_upload']['name'];  
	        return move_uploaded_file($_FILES['berkas_file_upload']['tmp_name'], $destination);  
	         
	    }  
  	} 

    function bukti_bayar_upload(){  
      if(isset($_FILES["bukti_bayar_upload"])){  
          $extension = explode('.', $_FILES['bukti_bayar_upload']['name']);   
          $destination = './upload/' . $_FILES['bukti_bayar_upload']['name'];  
          return move_uploaded_file($_FILES['bukti_bayar_upload']['tmp_name'], $destination);  
           
      }  
    } 
 
   public function simpan_data_bb(){
    $no_ordery = $this->input->post('no_ordery');
    $bukti_bayar_upload_file = $this->input->post('bukti_bayar_upload_file');
    
    $data_form = $this->m_pengeluaran_barang->array_from_post($this->daftar_field);
    $bukti_bayar_upload = $this->bukti_bayar_upload();
    $sql = $this->db->query("update t_pengeluaran_barang set bukti_bayar_upload = '".$bukti_bayar_upload_file."', bukti_bayar_upload_date = '".date('Y-m-d H:i:s')."',  status ='2' where no_order = '".$no_ordery."' ");

    if($sql && $bukti_bayar_upload){
      $result = array("response"=>array('message'=>'success'));
    }else{
      $result = array("response"=>array('message'=>'failed'));
    }
    
    echo json_encode($result,TRUE);
 
   }

	public function simpan_data(){
    
    
    $data_form = $this->m_pengeluaran_barang->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 

    $berkas_file_upload = $this->berkas_file_upload();

    if($id == '' || $id == NULL){
    	//query insert
    	$sql = $this->db->query("insert into t_pengeluaran_barang (no_order,id_pelanggan,date_create,berkas_file,status) values ('".$data_form['no_order']."','".$data_form['id_pelanggan']."','".$data_form['date_create']."','".$data_form['berkas_file']."','1')");
    }else{
    	$sql = $this->db->query("update t_pengeluaran_barang set no_order = '".$data_form['no_order']."', id_pelanggan = '".$data_form['id_pelanggan']."', berkas_file = '".$data_form['berkas_file']."' where id = '".$id."' ");
    }

    //$simpan_data = $this->m_pengeluaran_barang->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($sql && $berkas_file_upload){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

  public function fetch_pengeluaran_baranglist_table(){
    $getdata = $this->m_pengeluaran_barang->fetch_pengeluaran_baranglist_table();
    echo json_encode($getdata);
  }

  public function simpan_data_detail(){
    $field = array('id','no_transaksi','id_barang','qty','source','keterangan');   
    
    $data_form = $this->m_pengeluaran_barang->array_from_post($field); 

    $sql = $this->db->query("insert into t_pengeluaran_detail (no_transaksi,id_barang,qty,source,keterangan) values ( '".$this->input->post('no_transaksix')."','".$this->input->post('id_barang')."','".$this->input->post('qty')."','".$this->input->post('source')."','".$this->input->post('keterangan')."') "); 
    
    if($this->input->post('source') == 'jkt'){
      $sqlupd = "update m_barang set qty_jkt = qty_jkt-".$this->input->post('qty')." where id = '".$this->input->post('id_barang')."' ";
      $this->db->query($sqlupd);
    }else{
      $sqlupd = "update m_barang set qty_subang = qty_subang-".$this->input->post('qty')." where id = '".$this->input->post('id_barang')."' ";
      $this->db->query($sqlupd);
     
    }
    
    if($sql){
      $result = array("response"=>array('message'=>'success'));
    }else{
      $result = array("response"=>array('message'=>'failed'));
    }
    
    echo json_encode($result,TRUE);

  }



  function _api_ongkir_post($origin,$des,$qty,$cour)
   {
      $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$des."&weight=".$qty."&courier=".$cour,   
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      /* masukan api key disini*/
      "key: 3cec7ae69603aa38b16aff8d285b9632"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return $err;
    } else {
      return $response;
    }
   }





   function _api_ongkir($data)
   {
      $curl = curl_init();

    curl_setopt_array($curl, array(
      //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
      //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
      CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",     
      CURLOPT_HTTPHEADER => array(
        /* masukan api key disini*/
        "key: 3cec7ae69603aa38b16aff8d285b9632"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return  $err;
    } else {
      return $response;
    }
   }

    public function daftar_provinsi_asal(){
      $curl = curl_init();

        curl_setopt_array($curl, array(
        //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
        //CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $data = json_decode($response, true);
      //var_dump($data['rajaongkir']['results']);
 
      $dataparse = array();  
           $no = 1;
           
            foreach ($data['rajaongkir']['results'] as $key => $value) { 
                $sub_array = array();  
                //$sub_array[] = $no;
                $sub_array[] = $value['province']; 
                $sub_array[] = $value['province_id']; 
               
                $dataparse[] = $sub_array;   
            $no++;
            }  
        echo json_encode(array("data"=>$dataparse));
         
       
    }

    public function daftar_provinsi_tujuan(){
      $curl = curl_init();

        curl_setopt_array($curl, array(
        //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
        //CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $data = json_decode($response, true);
      //var_dump($data['rajaongkir']['results']);
 
      $dataparse = array();  
           $no = 1;
           
            foreach ($data['rajaongkir']['results'] as $key => $value) { 
                $sub_array = array();  
                //$sub_array[] = $no;
                $sub_array[] = $value['province']; 
                $sub_array[] = $value['province_id']; 
               
                $dataparse[] = $sub_array;   
            $no++;
            }  
        echo json_encode(array("data"=>$dataparse));
         
       
    }

    public function daftar_kabkota_asal(){
        $curl = curl_init();
        $id_provinsi_asal = $this->input->post('id_provinsi_asal');
        curl_setopt_array($curl, array(
          //('city?province='.$provinsi); 
        //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_URL =>"http://api.rajaongkir.com/starter/city?province=".$id_provinsi_asal,
        //CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $data = json_decode($response, true);
      //var_dump($data['rajaongkir']['results']);
        $return_arr = array();

        foreach ($data['rajaongkir']['results'] as $key => $value) {
         $row_array['kabkotaasal'] = $value['city_name']; 
         $row_array['action'] = "<button typpe='button' onclick='GetDataKabKotaAsal(".$value['province_id'].",".$value['city_id'].");' class = 'btn btn-warning'> Pilih </button>";  
         
         array_push($return_arr,$row_array);
        }
       echo json_encode($return_arr);
      
       
    }

    public function daftar_kabkota_tujuan(){
        $curl = curl_init();
        $id_provinsi_tujuan = $this->input->post('id_provinsi_tujuan');
        curl_setopt_array($curl, array(
          //('city?province='.$provinsi); 
        //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_URL =>"http://api.rajaongkir.com/starter/city?province=".$id_provinsi_tujuan,
        //CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $data = json_decode($response, true);
      //var_dump($data['rajaongkir']['results']);
        $return_arr = array();

        foreach ($data['rajaongkir']['results'] as $key => $value) {
         $row_array['kabkotatujuan'] = $value['city_name']; 
         $row_array['action'] = "<button typpe='button' onclick='GetDataKabKotaTujuan(".$value['province_id'].",".$value['city_id'].");' class = 'btn btn-warning'> Pilih </button>";  
         
         array_push($return_arr,$row_array);
        }
       echo json_encode($return_arr);
      
       
    }

    public function get_city_name_asal(){
        $id_province = $this->uri->segment(3);
        $id_city = $this->uri->segment(4);
      
        $curl = curl_init(); 
        curl_setopt_array($curl, array( 
        CURLOPT_URL =>"https://api.rajaongkir.com/starter/city?id=".$id_city."&province=".$id_province."", 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl); 
     
      $data = json_decode($response);
      echo $data->rajaongkir->results->city_name;
       
    }

    public function get_city_name_tujuan(){
        $id_province = $this->uri->segment(3);
        $id_city = $this->uri->segment(4);
      
        $curl = curl_init(); 
        curl_setopt_array($curl, array( 
        CURLOPT_URL =>"https://api.rajaongkir.com/starter/city?id=".$id_city."&province=".$id_province."", 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",     
        CURLOPT_HTTPHEADER => array(
          /* masukan api key disini*/
          //apikey dari rajaongkir
          "key: 3cec7ae69603aa38b16aff8d285b9632"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl); 
     
      $data = json_decode($response);
      echo $data->rajaongkir->results->city_name;
       
    }
  public function provinsi()
  {

    $provinsi = $this->_api_ongkir('province');
    $data = json_decode($provinsi, true);
    echo json_encode($data['rajaongkir']['results']);
  }

 

  public function kota($provinsi="")
  {
    if(!empty($provinsi))
    {
      if(is_numeric($provinsi))
      {
        $kota = $this->_api_ongkir('city?province='.$provinsi); 
        $data = json_decode($kota, true);
        echo json_encode($data['rajaongkir']['results']);                
      }
      else
      {
        show_404();
      }
    }
     else
     {
      show_404();
     }
  }

  public function tarif()
  {
    //$berat = $qty*1000;
    $no_order = $this->input->post('no_order');
    $kurir = $this->input->post('kurir');
    $total_berat = $this->input->post('total_berat');
    $id_kabkota_asal = $this->input->post('id_kabkota_asal');
    $id_kabkota_tujuan = $this->input->post('id_kabkota_tujuan');

    //kurang dari 1kg akan dihitung 1 kg
    if($total_berat > 1000){
      $parsetotal = 1000;
    }else{
      $parsetotal = $total_berat;
    }
    $tarif = $this->_api_ongkir_post($id_kabkota_asal,$id_kabkota_tujuan,$parsetotal,$kurir);    
    $data = json_decode($tarif, true);
    $results = $data['rajaongkir']['results'];
    echo '<table border="1" class="table" cellpadding="3" cellspacing="0">
    <tr style="font-weight:bold; text-align:center;"> 
      <td> Kurir </td>
      <td> Layanan </td>
      <td> Deskripsi </td>
      <td> Estimasi Pengiriman  </td>
      <td> Biaya Kirim </td>
      <td> Opsi </td>
    </tr>';
    // print_r($results);
    if(!empty($results)){
    foreach($results as $r):
    foreach($r['costs'] as $rc):
    foreach($rc['cost'] as $rcc):
      echo '<tr>
              <td style="text-transform: uppercase";>'.$r['code'].'</td>
              <td>'.$rc['service'].'</td>
              <td>'.$rc['description'].'</td>
              <td>'.$rcc['etd'].' Hari </td>
              <td>Rp.'.number_format($rcc['value']).'</td>
              <td><a  href="javascript:void(0);" onclick="PickService(\''.$r['code'].'\',\''.$rc['service'].'\',\''.$rcc['value'].'\',\''.$rc['description'].'\',\''.$rcc['etd'].'\',\''.$no_order.'\');" > Pilih </a></td>
            <tr>';
    endforeach;
    endforeach;
    endforeach;
    }else{
    echo 'paket tidak tersedia';
    }
    echo '</table>';

  }

  public function simpan_summary(){
    $no_transaksi = $this->input->post('no_transaksi');

    //$paraminvoice = "INV".date('Ymd');
    //$no_invoice = $this->invoice_id($paraminvoice);

    //$kurir = $this->input->post('kurir');
 
    $id_instansi = $this->input->post('id_instansi');
    $keterangan = $this->input->post('keterangan');
    $userid = $this->session->userdata('userid');
 
    
    $store = array("id_instansi"=>$id_instansi,"keterangan"=>$keterangan,"id_pegawai"=>$userid,"date_assign"=>date('Y-m-d'));
    $this->db->where('no_transaksi', $no_transaksi);
    $this->db->update('t_pengeluaran', $store);
   


  }
   function upload_file_design(){  
    if(isset($_FILES["file_design_upload"])){  
        $extension = explode('.', $_FILES['file_design_upload']['name']);   
        $destination = './upload/' . str_replace(" ","_", $_FILES['file_design_upload']['name']);  
        return move_uploaded_file($_FILES['file_design_upload']['tmp_name'], $destination);  
         
    }  
  } 




 


}
