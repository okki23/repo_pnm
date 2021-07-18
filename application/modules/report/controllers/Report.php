<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report extends Parent_Controller {
 
  var $nama_tabel = 'm_report';
  var $daftar_field = array('id','nama_report');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report/report_view';
		$this->load->view('template_view',$data);		
   
	} 

 
	 
	public function print(){  
		
		$filename ="ReportPeriod".date('Y-m').".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		

		echo '
		<table  width="100%" border="0" cellpadding="3" cellspacing="0">
		<tr> 
			<td colspan="8" align="center"> <b> STOK MARKETING TOOL </b> </td> 
		</tr>
		<tr> 
		<td colspan="8" align="center"> <b> '.tanggalan_mod(date('Y-m-d')).' </b> </td>
		</tr>

		
		</table>
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
		  <th rowspan="2"> No </th>
		  <th rowspan="2"> Kategori</th>
		  <th rowspan="2"> Uraian</th>
		  <th rowspan="2"> Jenis </th>
		  <th colspan="2"> Lokasi</th>
		  <th rowspan="2"> Stok Akhir</th>
		  <th rowspan="2"> Ket</th>
		</tr>
		<tr>
		  <th>Subang</th>
		  <th>Jakarta</th>
		</tr>
		';

		$gethead = $this->db->query("select a.*,b.nama_kategori,c.nama_sub_kategori from m_barang a 
		left join m_kategori b on b.id = a.id_kategori
		left join m_sub_kategori c on c.id = a.id_sub_kategori")->result();
		$no = 1;
		foreach($gethead as $k=>$v){
			echo '
			<tr>
			<td>'.$no.'</td>
			<td>'.$v->nama_kategori.'</td>
			<td>'.$v->nama_sub_kategori.'</td>
			<td>'.$v->nama_barang.'</td>
			<td>'.$v->qty_subang.'</td>
			<td>'.$v->qty_jkt.'</td>
			<td>'.($v->qty_subang + $v->qty_jkt).'</td>
			<td>'.$v->keterangan.'</td>
		  </tr>';
		$no++;
		}
		echo '</table>';

	}
	

	public function report_out(){

	}
 


}
