<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Job_order_detail extends Parent_Controller {
 
  var $nama_tabel = 't_job_order_detail';
  var $daftar_field = array('id','no_order','id_produk','qty');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_job_order_detail'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'job_order_detail/job_order_detail_view';
		$data['userid'] = $this->session->userdata('userid');
		$this->load->view('template_view',$data);		
   
	}
 	
  
  	public function fetch_job_order_list(){  
       $getdata = $this->m_job_order_detail->fetch_job_order_list();
       echo json_encode($getdata);   
  	}

  	public function fetch_jabatan(){  
       $getdata = $this->m_job_order_detail->fetch_jabatan();
       echo json_encode($getdata);   
  	}

  	public function get_last_id(){
		echo $this->transaksi_id();
	}

	public function transaksi_id($param = '') {
        $data = $this->m_job_order_detail->get_no();
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
   
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_jabatan from m_job_order_detail a 
				left join m_jabatan b on b.id = a.id_jabatan 
				where a.id = '".$id."' ";
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('t_job_order');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_job_order_detail->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_job_order_detail->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 


}
