<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report_out extends Parent_Controller {
 
  var $nama_tabel = 'm_report_out';
  var $daftar_field = array('id','nama_report_out');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_out'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_out/report_out_view';
		$this->load->view('template_view',$data);		
   
	} 

 
	 
	public function print(){  
		
		$from = $this->input->post('from');
		$to = $this->input->post('to');


		// $from = '2019-07-01';
		// $to = '2019-07-31';

		// echo $from;
		// echo "<br>";
		// echo $to;
		// exit();

		$filename ="Report-Pengeluaran.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		
		$sql = "select a.*,c.nama_instansi,c.pic,d.nama,d.nip,e.nama_kategori_instansi from t_pengeluaran a
		left join m_instansi c on c.id = a.id_instansi
		left join m_pegawai d on d.id = a.id_pegawai 
		left join m_kategori_instansi e on e.id = c.id_kategori_instansi
		where a.date_assign BETWEEN '".$from."' AND '".$to."' ";

		$exsql = $this->db->query($sql)->result();
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
			<th> No Transaksi </th>
			<th> Nama Instansi</th>
			<th> Kategori Instansi</th>
			<th> PIC Instansi </th>
			<th> Penanggung Jawab </th>
			<th> Tanggal Keluar </th>
			<th> Keterangan </th> 
		</tr> 
		'; 
		foreach($exsql as $k=>$v){
		echo '
		<tr> 
			<td>'."'".$v->no_transaksi.'</td>
			<td>'.$v->nama_instansi.'</td>
			<td>'.$v->nama_kategori_instansi.'</td>
			<td>'.$v->pic.'</td>
			<td>'.$v->nip." - ".$v->nama.'</td>
			<td>'.tanggalan($v->date_assign).'</td>	 
			<td>'.$v->keterangan.'</td>
		</tr> 
	 
	 <tr>
	 <td colspan="7"><b> Detail </b> </td>
	 </tr>
			 <tr>
				 <td> <b> Nama Barang </b> </td>
				 <td> <b> Qty </b> </td>
				 <td> <b> Source </b> </td>
				 <td> <b> Keterangan </b> </td>
				 <td colspan="3"> &nbsp; </td>
			 </tr>';

			 $listdetail = $this->db->query("select a.*,b.nama_barang from t_pengeluaran_detail a
			 left join m_barang b on b.id = a.id_barang where a.no_transaksi = '".$v->no_transaksi."' ");
			foreach($listdetail->result() as $ky=>$vy){
				echo '
				<tr>
					<td>'.$vy->nama_barang.'</td>
					<td> '.$vy->qty.'</td>
					<td> '.$vy->source.'</td>
					<td> '.$vy->keterangan.'</td>
					<td colspan="3"> &nbsp; </td>
				</tr>';
			}
	 
	 
		 echo ' 
		 <tr>
			<td colspan="7" style="background-color:blue;"> &nbsp; </td> 
		</tr>
		  ';
		}
		 
		echo '</table>';

	}
	

	public function report_out_out(){

	}
 


}
