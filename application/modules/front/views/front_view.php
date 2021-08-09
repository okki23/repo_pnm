<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title><?php echo $page_header->header; ?> </title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/'.$page_logo->logo);?>"> 
	 
    <link href="<?php echo base_url('assets/frontend/');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/font-awesome.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/frontend/');?>css/styles.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/frontend/');?>css/tambahan.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>sweetalert/sweetalert2.min.css" rel="stylesheet">  

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.session.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url('assets/frontend/');?>js/smoothscroll.js"></script>  
    <script src="<?php echo base_url('assets/frontend/');?>js/custom-scripts.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>sweetalert/sweetalert2.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head> 

<body id="home">
    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/'.$page_logo->logo);?>" style="width:10%;" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>  
                        <li class="scroll"><a href="#services">Fitur</a></li>
                        <li class="scroll"><a href="#about">Repository</a></li> 
                        <li class="scroll"><a href="#contact-us">Kontak</a></li> 
                    </ul>
                    
                    <a href="javascript:void(0);" id="linklogin" style="margin-top:30px; font-weight:bold;" onclick="BukaModalForm();" class="btn btn-lg btn-sm btn-info"> <i class="fa fa-user-o" aria-hidden="true"></i> LOGIN </a>
                    
                    <a href="javascript:void(0);" id="linklogout" style="margin-top:30px; font-weight:bold;" onclick="Logout();" class="btn btn-lg btn-sm btn-info"> <i class="fa fa-user-o" aria-hidden="true"></i> LOGOUT </a>
            
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
 
    <!-- Modal Form Login -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> &nbsp; </h4>
        </div>
        <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-4">
								<a href="#" id="register-form-link">Daftar</a>
							</div>
                            <div class="col-xs-4">
								<a href="#" id="forgot-form-link">Lupa Password</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="nomor_induk" id="nomor_induk" tabindex="1" class="form-control" placeholder="Nomor Induk" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div> 
                                    <div class="form-group">
										<select name="roles_login" id="roles_login"  class="form-control" >
                                            <option value="">--Pilih Role--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                        </select> 
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <button  id="login-submit" type="button" class="form-control btn btn-login"> Login </button>
											</div>
										</div>
									</div>
									 
								</form>

								<form id="register-form" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="nomor_induk_regis" id="nomor_induk_regis" tabindex="1" class="form-control" placeholder="Nomor Induk" value="">
									</div>
                                    <div class="form-group">
										<input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama" value="">
									</div>
                                    <div class="form-group">
										<input type="text" name="alamat" id="alamat" tabindex="1" class="form-control" placeholder="Alamat" value="">
									</div>
                                    <div class="form-group">
										<input type="text" name="telp" id="telp" tabindex="1" class="form-control" placeholder="Telepon" value="">
									</div> 
                                    <div class="form-group">
                                    <select name="jenkel" id="jenkel"  class="form-control" >
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                    </select> 
									</div> 
									<div class="form-group"> 
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password_regis" id="password_regis" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password_regis" id="confirm_password_regis" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
                                    <select name="roles" id="roles"  class="form-control" >
                                            <option value="">--Pilih Role--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                    </select> 
                                    <br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3"> 
                                                <button id="register-submit" name="register-submit" type="button" class="form-control btn btn-login"> Daftar </button>
											</div>
										</div>
									</div>
                                    </br>
								</form>

                                <form id="forgot-pass" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="email_forget" id="email_forget" tabindex="1" class="form-control" placeholder="Email" value="">
									</div> 
                                    <div class="form-group">
										<input type="password" name="password_forget" id="password_forget" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password_forget" id="confirm_password_forget" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
                                    <div class="form-group">
										<select name="roles_forget" id="roles_forget"  class="form-control" >
                                            <option value="">--Roles--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                        </select>  
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                            <button id="forgot-submit" name="forgot-submit" type="button" class="form-control btn btn-login"> Reset Password </button>
											</div>
										</div>
									</div> 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
       
        </div>
    </div>
    </div>

    <!-- Modal History Login -->
    <div class="modal fade" id="ModalHistory" tabindex="-1" role="dialog" aria-labelledby="ModalHistoryLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> &nbsp; </h4>
        </div>
        <div class="modal-body">  
            <h3 style="text-align:center;"> History Submission </h3>
            <div id="res_history"></div>
        </div> 

        </div>
    </div>
    </div>


    <!-- Modal Submission -->
    <div class="modal fade" id="Submission" tabindex="-1" role="dialog" aria-labelledby="SubmissionLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="SubmissionLabel"> &nbsp; </h4>
        </div>
        <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4">
								<a href="#" class="active" id="jurnal-form-link">Jurnal</a>
							</div>
							<div class="col-xs-4">
								<a href="#" id="ilmiah-form-link">Karya Ilmiah</a>
							</div>
                            <div class="col-xs-4">
								<a href="#" id="skripsi-form-link">Skripsi</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="jurnal-form" style="display: block;" enctype="multipart/form-data">  
									<div class="form-group">
										<input type="text" name="judul_jurnal" id="judul_jurnal" tabindex="1" class="form-control" placeholder="Nama Jurnal" value="">
									</div>
									<div class="form-group">
										<input type="hidden" name="nomor_induk_jurnal" id="nomor_induk_jurnal" tabindex="2" class="form-control" readonly="readonly">
									</div> 
                                    <div class="form-group">
										<input type="text" name="nama_penulis_jurnal" id="nama_penulis_jurnal" tabindex="1" class="form-control" placeholder="Nama Penulis" >
									</div>
                                    <div class="form-group">
										<input type="text" name="doi_jurnal" id="doi_jurnal" tabindex="1" class="form-control" placeholder="DOI">
									</div>
                                    <div class="form-group">
										<input type="text" name="issn_jurnal" id="issn_jurnal" tabindex="1" class="form-control" placeholder="ISSN">
									</div>    
                                    <div class="form-group">
										<input type="text" name="tahun_terbit_jurnal" id="tahun_terbit_jurnal" tabindex="1" class="form-control" placeholder="Tahun Terbit">
									</div> 
                                    <div class="form-group">
										<input type="text" name="volume_jurnal" id="volume_jurnal" tabindex="1" class="form-control" placeholder="Volume">
									</div> 
                                    <div class="form-group">
										<input type="text" name="penerbit_jurnal" id="penerbit_jurnal" tabindex="1" class="form-control" placeholder="Penerbit">
									</div>    
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">Hanya File PDF Yang Diizinkan!!!</div>
										<input type="file" name="file_jurnal" id="file_jurnal" tabindex="1" class="form-control" >
                                    </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <button id="jurnal-submit" type="button" class="form-control btn btn-login"> Simpan </button>
											</div>
										</div>
									</div> 
								</form>

								<form id="ilmiah-form" style="display: none;" enctype="multipart/form-data">
									<input type="hidden" name="nomor_induk_ilmiah" id="nomor_induk_ilmiah" tabindex="2" class="form-control" readonly="readonly">
                                    <div class="form-group">
										<input type="text" name="judul_ilmiah" id="judul_ilmiah" tabindex="1" class="form-control" placeholder="Judul Ilmiah">
									</div>
									<div class="form-group">
										<input type="text" name="nama_penulis_ilmiah" id="nama_penulis_ilmiah" tabindex="1" class="form-control" placeholder="Nama Penulis">
									</div> 
                                    <div class="form-group">
										<input type="text" name="tanggal_disahkan_ilmiah" id="tanggal_disahkan_ilmiah" tabindex="1" class="form-control" placeholder="Tanggal Disahkan">
									</div> 
									<div class="form-group">
                                    <div class="alert alert-danger" role="alert">Hanya File PDF Yang Diizinkan!!!</div>
										<input type="file" name="file_ilmiah" id="file_ilmiah" tabindex="2" class="form-control">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                            <button id="ilmiah-submit" type="button" class="form-control btn btn-login"> Simpan </button>
											</div>
										</div>
									</div> 
								</form>

                                <form id="skripsi-form"  enctype="multipart/form-data" style="display: none;">
                                    <input type="hidden" name="nomor_induk_skripsi" id="nomor_induk_skripsi" tabindex="2" class="form-control" readonly="readonly">
                                    <div class="form-group">
										<input type="text" name="judul_skripsi" id="judul_skripsi" tabindex="1" class="form-control" placeholder="Judul Skripsi">
									</div>
									<div class="form-group">
										<input type="text" name="nama_penulis_skripsi" id="nama_penulis_skripsi" tabindex="1" class="form-control" placeholder="Nama Penulis">
									</div>
									<div class="form-group">
										<input type="text" name="pembimbing_skripsi" id="pembimbing_skripsi" tabindex="2" class="form-control" placeholder="Nama Pembimbing">
									</div>
                                    <div class="form-group">
										<input type="text" name="penguji_skripsi" id="penguji_skripsi" tabindex="2" class="form-control" placeholder="Penguji Skripsi">
									</div>
                                    <div class="form-group">
										<input type="text" name="tanggal_sidang_skripsi" id="tanggal_sidang_skripsi" tabindex="2" class="form-control" placeholder="Tanggal Sidang">
									</div> 
									<div class="form-group">
										<input type="file" name="file_skripsi" id="file_skripsi" tabindex="2" class="form-control">
									</div>
									<div class="form-group">
										<div class="row">
											<div clas                                                                                                                                                               s="col-sm-6 col-sm-offset-3">
                                            <button  id="skripsi-submit" type="button" class="form-control btn btn-login"> Simpan </button>
											</div>
										</div>
									</div> 
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
       
        </div>
    </div>
    </div>
    <section id="home" >
        <div class="container">

            <div class="section-header" style="margin-top:100px;">
            
            <h2 class="section-title wow fadeInDown"><?php echo $parse_beranda->title; ?></h2>
            
            <div class="alert alert-success" role="alert" id="sessions"> </div>
            <div class="alert alert-success" role="alert" id="his_sessions"> </div>  
 
            <br>
            &nbsp;
                <p class="wow fadeInDown" style="text-align:justify;"> <?php echo $parse_beranda->desc; ?></p>
            </div>
  
        </div><!--/.container-->
    </section><!--/#services-->
    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown">Fitur Sistem Repository</h2>
                <p class="wow fadeInDown">Silahkan nikmati fitur berikut ini untuk melakukan upload download penelitian</p>
            </div>
          
            <div class="row">
                <div class="features">
                <?php 
                    foreach($page_fitur as $pf){
                ?>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-futbol-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $pf->title; ?></h4>
                                <p><?php echo $pf->desc; ?></p>
                            </div>
                        </div>
                    </div> 
                <?php 
                    }
                ?>
                     
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->

  
 <section id="about">
     
    <div class="container"> 
        
        <div class="section-header" style="margin-top:100px;"> 
            <h2 class="section-title wow fadeInDown">Repository Politeknik Negeri Manado</h2>
            <table id="example" class="display table table-bordered table-stripped table-hovered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th> 
                    <th>Judul</th> 
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        </div> 
    </div><!--/.container-->

    </section><!--/#about-->
 
      
    <section id="contact-us">
            <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">Kontak</h2>
                <p class="wow fadeInDown">Hubungi kami segera apabila ada pertanyaan serta saran dan masukan.</p>
            </div>
        </div>
  
        <div class="container">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-4 col-md-4">
                        <div class="contact-form">
                            <h3>Info Kontak</h3>

                            <address>
                              <strong><?php echo $page_alamat->title; ?></strong><br>
                              <?php echo $page_alamat->desc; ?>
                            </address>
					</div></div>
                    <div class="col-sm-8 col-md-8">
                        <div class="contact-form">
                            <form id="contact-form" method="post" role="form">
                                <div class="form-group">
                                    <input type="text" name="name_kontak" id="name_kontak" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email_kontak" id="email_kontak" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject_kontak" id="subject_kontak" class="form-control" placeholder="Subjek" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message_kontak" id="message_kontak" class="form-control" rows="8" placeholder="Pesan" required></textarea>
                                </div>
                                <button id="contact-submit" name="register-submit" type="button" class="form-control btn btn-login"> Kirim Pesan </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
   </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row" >
                <div class="col-sm-12" style="text-align:center;">
                <?php echo $page_footer->footer; ?>
                </div>
               
            </div>
        </div>
    </footer><!--/#footer-->
    
    <style>
        td.details-control {
        background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_close.png') no-repeat center center;
        }
    </style>
    <script> 
    $(document).ready(function(){ 
        $("#results_history").DataTable();
        $("#his_sessions").html("<button class='btn btn-primary' id='submisi' onclick='HisSubmission("+localStorage.getItem('nomor_induk')+");'> History Submisi </button>");            
        if(localStorage.getItem("nama") == '' || !(localStorage.getItem("nama"))){
            $("#linklogin").show();
            $("#linklogout").hide();
            $("#sessions").html("Harap Login Terlebih Dahulu Sebelum Melakukan Submisi");  
            $("#his_sessions").html("");            
        }else{
            $("#linklogin").hide();
            $("#linklogout").show();
            $("#sessions").html("Halo <b>"+localStorage.getItem("nama")+" - "+localStorage.getItem("nomor_induk")+ "!</b> Silahkan Submisi Dengan Menekan Tombol <button class='btn btn-primary' id='submisi' onclick='Submission();'> Submisi </button>");            
            $("#his_sessions").html("<button class='btn btn-primary' id='submisi' onclick='HisSubmission("+localStorage.getItem('nomor_induk')+");'> History Submisi </button>");            
            $("#nomor_induk_jurnal").val(localStorage.getItem("nomor_induk"));
            $("#nomor_induk_ilmiah").val(localStorage.getItem("nomor_induk"));
            $("#nomor_induk_skripsi").val(localStorage.getItem("nomor_induk"));
        }
    });
    function BukaModalForm(){
        $("#myModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
  
    function Submission(){
        $("#Submission").modal({backdrop: 'static', keyboard: false,show:true});
    }

    function HisSubmission(params){
        $("#ModalHistory").modal({backdrop: 'static', keyboard: false,show:true});
        $.get("<?php echo base_url('front/get_history/')?>"+params,function(result){
            $("#res_history").html(result)
        }); 
    }

    function clear_form(){
        $(':input').val('');
        $('#roles_login').prop('selected', false);
    }
    function Logout(){
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 800,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        });

        Toast.fire({
            icon: 'success',
            title: 'Anda Telah Logout!'
            }).then(function() { 
                $("#linklogin").show();
                $("#linklogout").hide();
                localStorage.removeItem('nama');
                localStorage.removeItem('nomor_induk');
                $("#sessions").html("Harap Login Terlebih Dahulu Sebelum Melakukan Submisi");
                $("#his_sessions").html("");     
            }); 
    }
     
/* Formatting function for row details - modify as you need */
function format ( d ) {
    var doi = '';
    var dir = '';
    if(d.doi==null){
        doi = ' - ';
    }else{
        doi = d.doi;
    }

    if(d.id_jenis_publikasi==1){
        dir = 'jurnal';
    }else if(d.id_jenis_publikasi==2){
        dir = 'karya_ilmiah';
    }else if(d.id_jenis_publikasi==3){
        dir = 'skripsi';
    }
    // `d` is the original data object for the row
    return '<div class="slider">'+
        '<table class="display tabletable-hovered"  cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td style="width:25%;"> <b> Nama Penulis </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.nama_penulis+' </b> </td>'+
                '<td style="width:25%;"> <b> DOI </b> </td>'+
                '<td style="width:25%;"> <b>: '+doi+' </b> </td>'+
            '</tr><tr>'+
                '<td style="width:25%;"> <b> Pembimbing </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.pembimbing+' </b> </td>'+
                '<td style="width:25%;"> <b> Penguji </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.penguji+' </b> </td>'+
            '</tr><tr>'+
                '<td style="width:25%;"> <b> ISSN </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.issn+' </b> </td>'+
                '<td style="width:25%;"> <b> Volume </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.volume+' </b> </td>'+
            '</tr><tr>'+
                '<td style="width:25%;"> <b> Tanggal Sidang </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.tanggal_sidang+' </b> </td>'+
                '<td style="width:25%;"> <b> Tanggal Disahkan </b> </td>'+
                '<td style="width:25%;"> <b>: '+d.tanggal_disahkan+' </b> </td>'+
            '</tr><tr>'+
                '<td colspan="4"> Download File <br> <a href="publikasi/'+dir+'/'+d.file+'" target="_blank"> '+d.file+'</a></td>'+
            '</tr></table>'+
    '</div>';
}

    $(document).ready(function() {
        var table = $('#example').DataTable({
            "ajax": '<?php echo base_url('front/fetch_repository')?>',
            "columns": [
                {
                    "class":          'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                }, 
                { "data": "judul"}
            ]
        });

        // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            }
            else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            }
        });
    });


    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100); 
    $("#register-form").fadeOut(100);
    $("#forgot-pass").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $('#forgot-form-link').removeClass('active');  
    $(this).addClass('active');
    e.preventDefault();
    });
    
    $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $("#forgot-pass").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#forgot-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });
    
    $('#forgot-form-link').click(function(e) {
    $("#forgot-pass").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $("#register-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });

    /*--- */
    $('#jurnal-form-link').click(function(e) {
    $("#jurnal-form").delay(100).fadeIn(100); 
    $("#ilmiah-form").fadeOut(100);
    $("#skripsi-form").fadeOut(100);
    $('#ilmiah-form-link').removeClass('active');
    $('#skripsi-form-link').removeClass('active');  
    $(this).addClass('active');
    e.preventDefault();
    });
    
    $('#ilmiah-form-link').click(function(e) {
    $("#ilmiah-form").delay(100).fadeIn(100);
    $("#jurnal-form").fadeOut(100);
    $("#skripsi-form").fadeOut(100);
    $('#jurnal-form-link').removeClass('active');
    $('#skripsi-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });
    
    $('#skripsi-form-link').click(function(e) {
    $("#skripsi-form").delay(100).fadeIn(100);
    $("#jurnal-form").fadeOut(100);
    $("#ilmiah-form").fadeOut(100);
    $('#jurnal-form-link').removeClass('active');
    $('#ilmiah-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });

    $("#login-submit").on("click",function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 800,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
    }); 
  
    var nomor_induk = $("#nomor_induk").val();
    var password = $("#password").val();
    var roles_login = $("#roles_login").val(); 
    
    $.ajax({
       url:"<?php echo base_url('login_front/auth'); ?>",
       data:{nomor_induk:nomor_induk,password:password,roles_login:roles_login},
       type:"POST",
       success:function(result){ 
            $("#myModal").modal('hide');
            clear_form(); 
            var obj = JSON.parse(result);  
            Toast.fire({
            icon: 'success',
            title: 'Login Sukses!'
            }).then(function() { 
                localStorage.setItem('nama',obj.data.nama);
                localStorage.setItem('nomor_induk',obj.data.nomor_induk); 
                $("#linklogin").hide();
                $("#linklogout").show();
                $("#sessions").html("Halo <b>"+localStorage.getItem("nama")+" - "+localStorage.getItem("nomor_induk")+ "!</b> Silahkan Submisi Dengan Menekan Tombol <button class='btn btn-primary' id='submisi' onclick='Submission();'> Submisi </button>");            
                $("#his_sessions").html("<button class='btn btn-primary' id='submisi' onclick='HisSubmission("+localStorage.getItem('nomor_induk')+");'> History Submisi </button>");            
                $("#nomor_induk_jurnal").val(localStorage.getItem("nomor_induk"));
                $("#nomor_induk_ilmiah").val(localStorage.getItem("nomor_induk"));
                $("#nomor_induk_skripsi").val(localStorage.getItem("nomor_induk"));
            }); 
       }
   });
});

$("#register-submit").on("click",function(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 800,
            timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        }); 
    var  nomor_induk_regis = $("#nomor_induk_regis").val();
    var  email = $("#email").val();
    var  nama = $("#nama").val();
    var  alamat = $("#alamat").val();
    var  telp = $("#telp").val();
    var  jenkel = $("#jenkel").val();
    var  password_regis = $("#password_regis").val();
    var  confirm_password_regis = $("#confirm_password_regis").val();
    var  roles = $("#roles").val();
  
    if(password_regis != confirm_password_regis){
        Toast.fire({
                icon: 'error',
                title: 'Password anda tidak sesuai!'
                });
        
    }else{
        $.ajax({
        url:"<?php echo base_url('front/register'); ?>",
        type:"POST",
        data:{nomor_induk_regis:nomor_induk_regis,email:email,nama:nama,alamat:alamat,telp:telp,jenkel:jenkel,password_regis:password_regis,confirm_password_regis:confirm_password_regis,roles:roles},
        success:function(result){ 
            clear_form();
            $("#myModal").modal('hide');
            Toast.fire({
            icon: 'success',
            title: 'Registrasi Sukses!'
            });
        }
        });
    }
    
});

$("#contact-submit").on("click",function(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 800,
            timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        }); 

    var  name_kontak = $("#name_kontak").val();
    var  email_kontak = $("#email_kontak").val();
    var  subject_kontak = $("#subject_kontak").val();
    var  message_kontak = $("#message_kontak").val();
     
        $.ajax({
        url:"<?php echo base_url('front/kontak'); ?>",
        type:"POST",
        data:{name_kontak:name_kontak,email_kontak:email_kontak,subject_kontak:subject_kontak,message_kontak:message_kontak},
        success:function(result){ 
            clear_form(); 
            Toast.fire({
            icon: 'success',
            title: 'Berjasil Kirim Pesan!'
            });
        }
        });
   
    
});


$("#forgot-submit").on("click",function(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 800,
            timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        });  

    var  email_forget = $("#email_forget").val(); 
    var  password_forget = $("#password_forget").val();
    var  confirm_password_forget = $("#confirm_password_forget").val();
    var  roles_forget = $("#roles_forget").val();
  
    if(password_forget != confirm_password_forget){
        Toast.fire({
                icon: 'error',
                title: 'Password anda tidak sesuai!'
                });
        
    }else{
        $.ajax({
        url:"<?php echo base_url('front/forget_pass'); ?>",
        type:"POST",
        data:{email_forget:email_forget,password_forget:password_forget,roles_forget:roles_forget},
        success:function(result){ 
            clear_form();
            $("#myModal").modal('hide');
            Toast.fire({
            icon: 'success',
            title: 'Berhasil Reset Password!'
            });
        }
        });
    }
    
});

$("#ilmiah-submit").on("click",function(){
    const file_ilmiah = $('#file_ilmiah').prop('files')[0]; 
    var filetype = file_ilmiah.type;
                                        
    let formData = new FormData();
    formData.append('file_ilmiah', file_ilmiah);
    formData.append('judul_ilmiah', $('#judul_ilmiah').val()); 
    formData.append('nomor_induk_ilmiah', $('#nomor_induk_ilmiah').val()); 
    formData.append('nama_penulis_ilmiah', $('#nama_penulis_ilmiah').val());  
    formData.append('tanggal_disahkan_ilmiah', $('#tanggal_disahkan_ilmiah').val());  
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 800,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
    }); 
   
    if(filetype != 'application/pdf'){
        Toast.fire({
                icon: 'error',
                title: 'File yang diizinkan hanya PDF!'
                }); 
    }else{
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url('front/simpan_ilmiah')?>",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(result){   
                clear_form();
                Toast.fire({
                icon: 'success',
                title: 'Upload Berhasil, Menunggu Proses Approval Redaksi!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                });  
        },
        error: function(){
            Toast.fire({
                icon: 'error',
                title: 'Upload Gagal, Mohon Periksa Kembali!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                }); 
        }
        });
    } 
}); 

$("#skripsi-submit").on("click",function(){
    const file_skripsi = $('#file_skripsi').prop('files')[0]; 
    var filetype = file_skripsi.type;
                                        
    let formData = new FormData();
    formData.append('file_skripsi', file_skripsi);

    formData.append('judul_skripsi', $('#judul_skripsi').val()); 
    formData.append('nomor_induk_skripsi', $('#nomor_induk_skripsi').val()); 
    formData.append('nama_penulis_skripsi', $('#nama_penulis_skripsi').val());  
    formData.append('pembimbing_skripsi', $('#pembimbing_skripsi').val());  
    formData.append('penguji_skripsi', $('#penguji_skripsi').val());  
    formData.append('tanggal_sidang_skripsi', $('#tanggal_sidang_skripsi').val());  
     

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 800,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
    }); 
   
    if(filetype != 'application/pdf'){
        Toast.fire({
                icon: 'error',
                title: 'File yang diizinkan hanya PDF!'
                }); 
    }else{
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url('front/simpan_skripsi')?>",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(result){   
                clear_form();
                Toast.fire({
                icon: 'success',
                title: 'Upload Berhasil, Menunggu Proses Approval Redaksi!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                });  
        },
        error: function(){
            Toast.fire({
                icon: 'error',
                title: 'Upload Gagal, Mohon Periksa Kembali!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                }); 
        }
        });
    } 
}); 


$("#jurnal-submit").on("click",function(){ 
    const file_jurnal = $('#file_jurnal').prop('files')[0]; 
    var filetype = file_jurnal.type;
     
    let formData = new FormData();
    formData.append('file_jurnal', file_jurnal);
    formData.append('judul_jurnal', $('#judul_jurnal').val()); 
    formData.append('nomor_induk_jurnal', $('#nomor_induk_jurnal').val()); 
    formData.append('nama_penulis_jurnal', $('#nama_penulis_jurnal').val()); 
    formData.append('doi_jurnal', $('#doi_jurnal').val()); 
    formData.append('issn_jurnal', $('#issn_jurnal').val()); 
    formData.append('tahun_terbit_jurnal', $('#tahun_terbit_jurnal').val());
    formData.append('volume_jurnal', $('#volume_jurnal').val()); 
    formData.append('penerbit_jurnal', $('#penerbit_jurnal').val()); 

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 800,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
    }); 
   
    if(filetype != 'application/pdf'){
        Toast.fire({
                icon: 'error',
                title: 'File yang diizinkan hanya PDF!'
                }); 
    }else{
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url('front/simpan_jurnal')?>",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(result){   
                clear_form();
                Toast.fire({
                icon: 'success',
                title: 'Upload Berhasil, Menunggu Proses Approval Redaksi!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                });  
        },
        error: function(){
            Toast.fire({
                icon: 'error',
                title: 'Upload Gagal, Mohon Periksa Kembali!'
                }).then(function() { 
                    $("#Submission").modal('hide');
                }); 
        }
        });
    } 
});
    
    </script> 
</body>
</html>