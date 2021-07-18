<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Payroll extends Parent_Controller {
  
  var $nama_tabel = 'm_payroll';
  var $daftar_field = array('id','id_pegawai','periode','date_generate');
  var $primary_key = 'id';  

 	public function __construct(){
		 parent::__construct();
		 $this->load->library("pdf");
 		$this->load->model('m_payroll'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'payroll/payroll_view';
  		$this->load->view('template_view',$data);		
     
  	}
 
	  
	public function slip(){
		//echo 1;
	    $periode = $this->uri->segment(3);
        $sql = $this->db->query("select a.*,b.nama_jabatan,b.gapok,c.nama_status,c.tunjangan from m_karyawan a 
		left join m_jabatan b on b.id = a.id_jabatan
		left join m_status c on c.id = a.id_status")->result();
		$data['listing'] = $sql;
		
		$infosql = $this->db->query("select * from t_payroll where periode = '".$periode."' ")->row();
		$data['info'] = $infosql;
		$this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(true, 'aku', 'kau');
        $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // add a page
        $this->pdf->AddPage("P", "A4");
        // set font
        $this->pdf->SetFont("helvetica", "", 9);
        $html = $this->load->view('payroll/payroll_print', $data, true);

        $this->pdf->writeHTML($html, true, false, true, false, "");
        ob_end_clean();
        $this->pdf->Output("Employee Information.pdf", "I");
	}
  	public function fetch_payroll(){  
       $getdata = $this->m_payroll->fetch_payroll();
       echo json_encode($getdata);   
  	}
  
	 
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
		
		$sql = $this->db->query("delete from t_payroll where periode = '".$id."' ");

  
		
		if($sql){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
	$periode = $this->input->post('periode');
	
	$list = $this->db->get('m_karyawan')->result();

		foreach($list as $key=>$val){

			$this->db->query("insert into t_payroll (id_pegawai,periode,date_generate) values ('".$val->id."','".$periode."','".date('Y-m-d H:i:s')."') ");
			
		}
    

	}
 
  
       


}
