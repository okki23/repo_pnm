<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Front extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_front');
 	} 

	public function index(){
	 
		$data['judul'] = $this->data['judul'];
		$data_beranda = $this->db->get('page_beranda')->row();
		$data_alamat = $this->db->get('page_alamat')->row();
		$data_fitur= $this->db->get('page_fitur')->result();
		$data_header= $this->db->get('page_header')->row();
		$data_footer= $this->db->get('page_footer')->row();
		$data_logo= $this->db->get('page_logo')->row();
		$data['parse_beranda'] = $data_beranda; 
		$data['page_alamat'] = $data_alamat;
		$data['page_fitur'] = $data_fitur;  
		$data['page_header'] = $data_header;
		$data['page_footer'] = $data_footer;
		$data['page_logo'] = $data_logo;   
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
				if($res->is_approve == 'N' || $res->is_approve == ''){
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
		left join jenis_publikasi b on b.id = a.id_jenis_publikasi 
		where a.is_approve != "N" ')->result_array(); 
		
		$callback = array('data'=>$sql_data);     
		header('Content-Type: application/json');    
		echo json_encode($callback);
	 
	}

	public function sendmail(){ 
		$mail = new PHPMailer(true);

		try { 
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'okkisetyawan@gmail.com';                     //SMTP username
			$mail->Password   = 'DoaTerbaik2019_OKE!@';                     //Enable implicit TLS encryption
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			 
			$mail->setFrom('from@example.com', 'Mailer');
			$mail->addAddress('okkisetyawan@gmail.com', 'Okki Setyawan');     //Add a recipient
			$mail->addReplyTo('info@example.com', 'Information'); 
			
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function register(){

		$nomor_induk = $this->input->post('nomor_induk_regis');
		$email = $this->input->post('email');
		$password = $this->input->post('password_regis');
		$confirm_password = $this->input->post('confirm_password_regis'); 
		$nama = $this->input->post('nama');
		$jenkel = $this->input->post('jenkel');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$roles = $this->input->post('roles');

		if($roles == '1'){
			$post_dosen = array('nidn'=>$nomor_induk,
							    'nama'=>$nama,
								'jenkel'=>$jenkel,
								'telp'=>$telp,
								'alamat'=>$alamat,
								'email'=>$email,
								'password'=>md5($password));
			$this->db->insert('dosen',$post_dosen);
		}else{
			$post_mhs = array('nim'=>$nomor_induk,
							    'nama'=>$nama,
								'jenkel'=>$jenkel,
								'telp'=>$telp,
								'alamat'=>$alamat,
								'email'=>$email,
								'password'=>md5($password));
			$this->db->insert('mahasiswa',$post_mhs);
		}
 		
		$mail = new PHPMailer(true);

		try { 
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
			$mail->isSMTP();                                         
			$mail->Host 	  = 'mail.weskonangan.com';
			$mail->SMTPAuth   = true;                                   
			$mail->Username   = 'okki@weskonangan.com';
			$mail->Password   = 'kecepatan93';
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 465;                              
			
			$mail->setFrom('repository@pnm.sch.id', 'Info Repository');
			$mail->addAddress($email, 'User Repository');     
			$mail->addReplyTo('repository@pnm.sch.id', 'Info Repository');
			
			$mail->isHTML(true);                                 
			$mail->Subject = 'Informasi Akun Repository';
			$mail->Body    = 'Halo ini akun anda dan telah aktif <br> <b> Username / Nomor Induk : '.$nomor_induk. ' </b> <br> <b> Password : '.$password.' </b> <br> Terima kasih';
			$mail->AltBody = 'Halo ini akun anda dan telah aktif <br> <b> Username / Nomor Induk : '.$nomor_induk. ' </b> <br> <b> Password : '.$password.' </b> <br> Terima kasih';

			$mail->send(); 
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function forget_pass(){ 
		$email_forget = $this->input->post('email_forget'); 
		$password_forget = $this->input->post('password_forget'); 
		$roles_forget = $this->input->post('roles_forget'); 
		$mail = new PHPMailer(true);
		if($roles_forget == '1'){ 
			$sql = $this->db->query("update dosen set password = '".md5($password_forget)."' where email = '".$email_forget."' ");
				try { 
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
				$mail->isSMTP();                                         
				$mail->Host 	  = 'smtp.gmail.com';
				$mail->SMTPAuth   = true;                                   
				$mail->Username   = 'okkisetyawan@gmail.com';
				$mail->Password   = 'DoaTerbaik2019_OKE!@';
				$mail->SMTPSecure = "ssl";
				$mail->Port       = 465;                              
				
				$mail->setFrom('repository@pnm.sch.id', 'Info Repository - Reset Password');
				$mail->addAddress($email_forget, 'User Repository');     
				$mail->addReplyTo('repository@pnm.sch.id', 'Info Repository  - Reset Passwords');
				
				$mail->isHTML(true);                                 
				$mail->Subject = 'Informasi Reset Password';
				$mail->Body    = 'Halo, akun kamu sudah di reset dan berikut ini password baru kamu : <br>
								  <b> Password Baru : '.$password_forget.' </b> <br> Terima kasih';
				$mail->AltBody = 'Halo, akun kamu sudah di reset dan berikut ini password baru kamu : <br>
								  <b> Password Baru : '.$password_forget.' </b> <br> Terima kasih';

				$mail->send(); 
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}else{
			$sql = $this->db->query("update mahasiswa set password = '".md5($password_forget)."' where email = '".$email_forget."' ");
				try { 
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
				$mail->isSMTP();                                         
				$mail->Host 	  = 'smtp.gmail.com';
				$mail->SMTPAuth   = true;                                   
				$mail->Username   = 'okkisetyawan@gmail.com';
				$mail->Password   = 'DoaTerbaik2019_OKE!@';
				$mail->SMTPSecure = "ssl";
				$mail->Port       = 465;                                                   
				
				$mail->setFrom('repository@pnm.sch.id', 'Info Repository - Reset Password');
				$mail->addAddress($email_forget, 'User Repository');     
				$mail->addReplyTo('repository@pnm.sch.id', 'Info Repository  - Reset Passwords');
				
				$mail->isHTML(true);                                 
				$mail->Subject = 'Informasi Reset Password';
				$mail->Body    = 'Halo, akun kamu sudah di reset dan berikut ini password baru kamu : <br>
								  <b> Password Baru : '.$email_forget.' </b> <br> Terima kasih';
				$mail->AltBody = 'Halo, akun kamu sudah di reset dan berikut ini password baru kamu : <br>
								  <b> Password Baru : '.$email_forget.' </b> <br> Terima kasih';

				$mail->send(); 
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
 		 
	}

	public function kontak(){  

		$name_kontak = $this->input->post('name_kontak'); 
		$email_kontak = $this->input->post('email_kontak'); 
		$subject_kontak = $this->input->post('subject_kontak'); 
		$message_kontak = $this->input->post('message_kontak'); 

		$mail = new PHPMailer(true); 
		$this->db->query("insert into kontak set nama = '".$name_kontak."', email= '".$email_kontak."', subjek= '".$subject_kontak."', pesan= '".$message_kontak."' ");
	 
				try { 
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
				$mail->isSMTP();                                         
				$mail->Host 	  = 'smtp.gmail.com';
				$mail->SMTPAuth   = true;                                   
				$mail->Username   = 'okkisetyawan@gmail.com';
				$mail->Password   = 'DoaTerbaik2019_OKE!@';
				$mail->SMTPSecure = "ssl";
				$mail->Port       = 465;                              
				
				$mail->setFrom('repository@pnm.sch.id', 'Info Repository - Reset Password');
				$mail->addAddress('okkisetyawan@gmail.com', 'User Repository');     
				$mail->addReplyTo('repository@pnm.sch.id', 'Info Repository  - Reset Passwords');
				
				$mail->isHTML(true);                                 
				$mail->Subject = 'Kontak Website Repository';
				$mail->Body    = 'Ada pesan masuk dari website repository : <br>
								  <b> Nama : '.$name_kontak.' </b> <br> 
								  <b> Email : '.$email_kontak.' </b> <br> 
								  <b> Subjek : '.$subject_kontak.' </b> <br> 
								  <b> Pesan : '.$message_kontak.' </b> <br> ';
				$mail->AltBody = 'Ada pesan masuk dari website repository : <br>
									<b> Nama : '.$name_kontak.' </b> <br> 
									<b> Email : '.$email_kontak.' </b> <br> 
									<b> Subjek : '.$subject_kontak.' </b> <br> 
									<b> Pesan : '.$message_kontak.' </b> <br> ';

				$mail->send(); 
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		 
 		 
	}
}
 