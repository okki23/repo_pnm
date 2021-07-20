<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Backend_jurnal extends Parent_Controller {
  
//   var $nama_tabel = 'm_barang';
//   var $daftar_field = array('id','nama_barang','id_kategori','id_sub_kategori','qty_subang','qty_jkt','keterangan');
//   var $primary_key = 'id'; 
  
 	public function __construct(){
 		// parent::__construct();
 		// $this->load->model('m_barang'); 
		// if(!$this->session->userdata('username')){
		//    echo "<script language=javascript>
		// 		 alert('Anda tidak berhak mengakses halaman ini!');
		// 		 window.location='" . base_url('login') . "';
		// 		 </script>";
		// }
 	} 
 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'barang/barang_view';
  		// $this->load->view('template_view',$data);		
     
  	} 
 
  	public function fetch_data(){  
    //    $var = '{
	// 	"data": [
	// 	  {
	// 		"id": "1",
	// 		"judul": "PENGARUH KUALITAS PELAYANAN, HARGA DAN PROMOSI TERHADAP KEPUASAN PELANGGAN PADA PENGGUNAAN PRODUK WELTRADE",
	// 		"jenis_penulisan": "PENULISAN ILMIAH JENJANG SETARA SARJANA MUDA",
	// 		"pembimbing": "$320,800",
	// 		"tanggal_diserahkan": "2011/04/25",
	// 		"tanggal_sidang": "Edinburgh",
	// 		"penulis": "Rofiah",
	// 		"nim": "5421"
	// 	  },
	// 	  {
	// 		"id": "3",
	// 		"judul": "PENGARUH KUALITAS PELAYANAN, HARGA DAN PROMOSI TERHADAP KEPUASAN PELANGGAN PADA PENGGUNAAN PRODUK WELTRADE",
	// 		"jenis_penulisan": "PENULISAN ILMIAH JENJANG SETARA SARJANA MUDA",
	// 		"pembimbing": "$320,800",
	// 		"tanggal_diserahkan": "2011/04/25",
	// 		"tanggal_sidang": "Edinburgh",
	// 		"penulis": "Rofiah",
	// 		"nim": "5421"
	// 	  },
	// 	]
	//   }';
	$var = '{
  "data": [
    {
      "id": "1",
      "names": "Tiger Nixon",
      "position": "System Architect", 
      "start_date": "2011/04/25",
      "office": "Edinburgh",
      "extn": "5421"
    }
  ]
}';
       echo $var;
	}
  

}
