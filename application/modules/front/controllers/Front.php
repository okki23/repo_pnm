<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Front extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front');
 	} 

	public function index(){
	 
		$data['judul'] = $this->data['judul'];    
		$this->load->view('front_view',$data);
	}

	public function simpan_jurnal(){  
		$judul_jurnal   		= $_POST['judul_jurnal'];  
		$nomor_induk_jurnal   	= $_POST['nomor_induk_jurnal'];  
		$nama_penulis_jurnal   	= $_POST['nama_penulis_jurnal'];  
		$nomor_induk_jurnal   	= $_POST['nomor_induk_jurnal'];  
		$doi_jurnal   			= $_POST['doi_jurnal'];  
		$issn_jurnal   			= $_POST['issn_jurnal'];
		$tahun_terbit_jurnal   	= $_POST['tahun_terbit_jurnal'];  
		$volume_jurnal   		= $_POST['volume_jurnal'];
		$penerbit_jurnal   		= $_POST['penerbit_jurnal'];  

		$fileupload      = $_FILES['file_jurnal']['tmp_name'];
		$filename       = $_FILES['file_jurnal']['name'];
		$ImageType       = $_FILES['file_jurnal']['type'];

		$dir = "publikasi/jurnal/";
		$filetype       = substr($filename, strrpos($filename, '.'));
    	$filetype       = str_replace('.','',$filetype);
		$newname = $nomor_induk_jurnal.'-'.$nama_penulis_jurnal.'-'.$judul_jurnal.'.'.$filetype; 

		move_uploaded_file($_FILES["file_jurnal"]["tmp_name"], $dir.$newname); 

		$post_data = array('judul'=>$judul_jurnal,
			'id_jenis_publikasi'=>1,
			'nomor_induk'=>$nomor_induk_jurnal,
			'nama_penulis'=>$nama_penulis_jurnal,
			'doi'=>$doi_jurnal,
			'issn'=>$issn_jurnal,
			'tahun_terbit'=>$tahun_terbit_jurnal,
			'volume'=>$volume_jurnal,
			'penerbit'=>$penerbit_jurnal,
			'file'=>$newname,
			'tanggal_setor'=>date("Y-m-d")
		);
		$this->db->set($post_data);
		$save = $this->db->insert('t_repository');
		if($save){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}

	public function simpan_ilmiah(){    
  
		$judul_ilmiah   		= $_POST['judul_ilmiah'];  
		$nomor_induk_ilmiah   	= $_POST['nomor_induk_ilmiah'];  
		$nama_penulis_ilmiah   	= $_POST['nama_penulis_ilmiah'];   
		$tanggal_disahkan_ilmiah   	= $_POST['tanggal_disahkan_ilmiah'];   

		$fileupload      = $_FILES['file_ilmiah']['tmp_name'];
		$filename       = $_FILES['file_ilmiah']['name'];
		$ImageType       = $_FILES['file_ilmiah']['type'];

		$dir = "publikasi/karya_ilmiah/";

		$filetype       = substr($filename, strrpos($filename, '.'));
    	$filetype       = str_replace('.','',$filetype);
		$newname = $nomor_induk_ilmiah.'-'.$nama_penulis_ilmiah.'-'.$judul_ilmiah.'.'.$filetype; 
		
		move_uploaded_file($_FILES["file_ilmiah"]["tmp_name"], $dir.$newname); 

		$post_data = array('judul'=>$judul_ilmiah,
			'id_jenis_publikasi'=>2,
			'nomor_induk'=>$nomor_induk_ilmiah,
			'nama_penulis'=>$nama_penulis_ilmiah, 
			'tanggal_disahkan'=>$tanggal_disahkan_ilmiah, 
			'file'=>$newname,
			'tanggal_setor'=>date("Y-m-d")
		);
		$this->db->set($post_data);
		$save = $this->db->insert('t_repository');
		if($save){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	 

	public function simpan_skripsi(){   

		$judul_skripsi   		= $_POST['judul_skripsi'];  
		$nomor_induk_skripsi   	= $_POST['nomor_induk_skripsi'];  
		$nama_penulis_skripsi   = $_POST['nama_penulis_skripsi'];   
		$pembimbing_skripsi   	= $_POST['pembimbing_skripsi'];   
		$penguji_skripsi   		= $_POST['penguji_skripsi'];  
		$tanggal_sidang_skripsi = $_POST['tanggal_sidang_skripsi']; 

		$fileupload      = $_FILES['file_skripsi']['tmp_name'];
		$filename       = $_FILES['file_skripsi']['name'];
		$ImageType       = $_FILES['file_skripsi']['type'];

		$dir = "publikasi/skripsi/";
		$filetype       = substr($filename, strrpos($filename, '.'));
    	$filetype       = str_replace('.','',$filetype);
		$newname = $nomor_induk_skripsi.'-'.$nama_penulis_skripsi.'-'.$judul_skripsi.'.'.$filetype; 
		
		move_uploaded_file($_FILES["file_skripsi"]["tmp_name"], $dir.$newname); 

		$post_data = array('judul'=>$judul_skripsi,
			'id_jenis_publikasi'=>3,
			'nomor_induk'=>$nomor_induk_skripsi,
			'nama_penulis'=>$nama_penulis_skripsi,
			'pembimbing'=>$pembimbing_skripsi,
			'penguji'=>$penguji_skripsi,
			'tanggal_sidang'=>$tanggal_sidang_skripsi, 
			'file'=>$newname,
			'tanggal_setor'=>date("Y-m-d")
		);
		$this->db->set($post_data);
		$save = $this->db->insert('t_repository');
		if($save){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}

	public function get_history(){
		$id = $this->uri->segment(3);
		$sql = $this->db->query("select a.*,b.jenis_publikasi from t_repository a 
		left join jenis_publikasi b on b.id = a.id_jenis_publikasi where a.nomor_induk = '$id' ")->result();
		$no = 1;
		echo "<table class='table table-striped table-hovered table-bordered' id='results_history'> 
		<tr>
			<td> No  </td>
			<td> Jenis Publikasi </td>
			<td> Judul </td>
			<td> Tanggal Setor </td> 
			<td> Status </td> 
		</tr>";
		foreach($sql as $res){
			echo "<tr>
				<td>".$no."</td>
				<td>".$res->jenis_publikasi."</td>
				<td>";
				if($res->id_jenis_publikasi == 1){
					echo "<a href='".base_url('publikasi/jurnal/').$res->file."' target='_blank'> ".$res->judul ."</a>";	
				}else if($res->id_jenis_publikasi == 2){
					echo "<a href='".base_url('publikasi/karya_ilmiah/').$res->file."' target='_blank'> ".$res->judul ."</a>";	
				}else{
					echo "<a href='".base_url('publikasi/skripsi/').$res->file."' target='_blank'> ".$res->judul ."</a>";	
				}
				echo "<td>".$res->tanggal_setor."</td>
				<td>";
				if($res->nomor_induk_approval == NULL || $res->nomor_induk_approval == ''){
					echo "Belum Disetujui";	
				}else{
					echo "Telah Disetujui";
				}
				echo "</td> </tr>";
		$no++;
		}
		echo "</table>"; 
	}

	public function fetch_repository(){
	 
		$sql_data = $this->db->query('select a.*,b.jenis_publikasi from t_repository a
		left join jenis_publikasi b on b.id = a.id_jenis_publikasi')->result_array(); 
		
		$callback = array('data'=>$sql_data);     
		header('Content-Type: application/json');    
		echo json_encode($callback);
	 
	}
}
 