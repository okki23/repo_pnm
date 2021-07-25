<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Repository Politeknik Negeri Manado</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/');?>logopnm.png"> 
	 
    <link href="<?php echo base_url('assets/frontend/');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/font-awesome.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/frontend/');?>css/styles.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/frontend/');?>css/tambahan.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>sweetalert/sweetalert2.min.css" rel="stylesheet">  

    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.js"></script>
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/');?>logopnm.png" style="width:10%;" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>  
                        <li class="scroll"><a href="#services">Fitur</a></li>
                        <li class="scroll"><a href="#about">Repository</a></li> 
                        <li class="scroll"><a href="#contact-us">Kontak</a></li>
                        <!-- <li><a href="javascript:void(0);" onclick="Ohyes();" class="btn btn-lg btn-info"> LOGIN </a> </li>  -->
                    </ul>
                    
                    <a href="javascript:void(0);" id="linklogin" style="margin-top:30px; font-weight:bold;" onclick="BukaModalForm();" class="btn btn-lg btn-sm btn-info"> <i class="fa fa-user-o" aria-hidden="true"></i> LOGIN </a>
                    
                    <a href="javascript:void(0);" id="linklogout" style="margin-top:30px; font-weight:bold;" onclick="Logout();" class="btn btn-lg btn-sm btn-info"> <i class="fa fa-user-o" aria-hidden="true"></i> LOGOUT </a>
            
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
 
    <!-- Modal -->
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
                                            <option value="">--Roles--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                        </select> 
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Masuk">
											</div>
										</div>
									</div>
									 
								</form>
								<form id="register-form" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
                                    <select name="roles" id="roles"  class="form-control" >
                                            <option value="">--Roles--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                        </select> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
                                <form id="forgot-pass" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
								 
                                    <div class="form-group">
										<select name="roles" id="roles"  class="form-control" >
                                            <option value="">--Roles--</option>
                                            <option value="1">Dosen</option>
                                            <option value="2">Mahasiswa</option>
                                        </select> 
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" name="por-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Masuk">
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
                 
            <h2 class="section-title wow fadeInDown">Repository Politeknik Negeri Manado</h2>
            <div id="sessions"> </div>
                <p class="wow fadeInDown" style="text-align:justify;">Sebagai tempat menimba ilmu pengetahuan. Universitas Gunadarma menyediakan Perpustakaan yang dilengkapi dengan beragam bahan pustaka yang terdiri dari buku literatur baik dalam bahasa Indonesia maupun dalam bahasa Inggris, majalah, jurnal ilmiah serta buku ilmu pengetahuan lainnya. Fasilitas Perpustakaan Universitas Gunadarma telah digunakan oleh mahasiswa, dosen, karyawan dan alumni Universitas Gunadarma. Sesuai dengan kemajuan teknologi komunikasi telah dikembangkan perpustakaan audio visual di Universitas Gunadarma. Perpustakaan ini dilengkapi dengan peralatan video dan TV , juga perangkat komputer untuk keperluan belajar mandiri.Koleksi perpustakaan bersifat satu arah dan dua arah (multi media interaktif) Apabila seorang mahasiswa kesulitan dalam salah satu mata kuliah, mahasiswa dapat mengunjungi perpustakaan audio visual kemudian mencari koleksi yang diinginkan, kemudiana belajar secara mandiri. Dengan perpustakaan audio visual diharapkan keterbatasan ruang dan waktu dapat dihilangkan. seorang mahasiswa sastra Inggris, dapat mempelajari bagaimana kebudayaan inggris dan karya sastra klasik inggris melalui video, atau melalui audio. Untuk memenuhi koleksi video dan multi media interaktif, perpustakaan audio visual dilengkapi dengan studio produksi. distudio ini diproduksi video dan multi media interaktif. Direncanakan akan di produksi video/vcd dan multimedia interaktif untuk semua mata kuliah yang diberikan di universitas gunadarma. Para mahasiswa, dosen dan karyawan serta pihak lain yang berkepentingan dapat memanfaatkan fasilitas tersebut guna mendukung pelaksanaan kegiatan belajar mengajar. Tujuan Menunjang Tridarma Perguruan Tinggi dengan fungsinya sebagai sumber informasi bagi pelaksanaan proses belajar dan mengajar, penelitian dan pengabdian pada masyarakat. Sejarah 1987 Berdiri Perpustakaan STKG di kampus Depok 1992 Berdiri Perpustakaan STIE di kampus Kelapa Dua 1996 Bertambah 4 buah Perpustakaan fakultas yaitu: Perpustakaan fakultas Teknik Perencanaan, Teknik Industri, Psikologi dan Sastra 2000 Secara keseluruhan disebut sebagai Perpustakaan Universitas Lokasi Operasional Kampus D Jalan Margonda Raya No. 100 Depok Telepon : 78881112 - ext. 301 Gedung III Lt. 1 Perpustakaan Fakultas Ilmu Komputer, Fakultas Teknologi Industri, dan Fakultas Teknik Perencanaan dan Sipil Kampus E Jalan Akses UI Kelapa Dua Telepon : 8727541 - ext. 501 Gedung V Lt. 1 Perpustakaan Fakultas Ekonomi, Fakultas Psikologi dan Fakultas Sastra dan Bahasa Perpustakaan Audio Visual Kampus J Jl. KH. Noer Ali, Kalimalang, Bekasi Telepon : 021-88860117 ext 117 Lt. 3 Perpustakaan Fakultas Ilmu Komputer, Fakultas Teknologi Industri, Fakultas Teknik Perencanaan dan Sipil,Fakultas Ekonomi, Fakultas Psikologi dan Fakultas Sastra  .</p>
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
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-futbol-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Panduan</h4>
                                <p>Silahkan anda baca panduan terlebih dahulu tentang penggunaan sistem repository ini.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-compass"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"> Sign In dan Register</h4>
                                <p>Anda dapat melakukan login dan daftar akun agar dapat berkontribusi di sistem repository ini.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-database"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Multi Dokumen</h4>
                                <p>Anda dapat mencari dokumentasi jurnal, karya ilmiah dan skripsi yang sudah lulus uji.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                 
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->

  
 <section id="about">
     
    <div class="container"> 
        
        <div class="section-header" style="margin-top:100px;"> 
            <h2 class="section-title wow fadeInDown">Repository Politeknik Negeri Manado</h2>
            <div align="center">
                <button class='btn btn-primary'> Jurnal </button> 
                <button class='btn btn-primary'> Karya Ilmiah </button>
                <button class='btn btn-primary'> Skripsi </button>
                <br>
                &nbsp;
            </div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th> 
                    </tr>
                </tfoot>
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
                              <strong>Kampus Politeknik Negeri Manado</strong><br>
                              Jl. Raya Politeknik Kel. Buha Manado, Kecamatan Mapanget, Sulawesi Utara <br>
                              Indonesia<br>
                              <abbr title="Phone">P:</abbr> (0431) 815 212, 815 217 <br>
                              <abbr title="Phone">E:</abbr> informasi@polimdo.ac.id 
                            </address>
					</div></div>
                    <div class="col-sm-8 col-md-8">
                        <div class="contact-form">
                       
                            <form id="main-contact-form" name="contact-form" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subjek" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Pesan" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
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
                    &copy; 2021 Repository Politeknik Negeri Manado   
                </div>
               
            </div>
        </div>
    </footer><!--/#footer-->
    

    <script> 
    $(document).ready(function(){ 
        if(localStorage.getItem("nama") == '' || !(localStorage.getItem("nama"))){
            $("#linklogin").show();
            $("#linklogout").hide();
            $("#sessions").html("Harap Login Terlebih Dahulu");
        }else{
            $("#linklogin").hide();
            $("#linklogout").show();
            $("#sessions").html(localStorage.getItem("nama"));
        }
    });
    function BukaModalForm(){
        $("#myModal").modal({backdrop: 'static', keyboard: false,show:true});
    }

    function Logout(){
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
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
                $("#sessions").html("Harap Login Terlebih Dahulu");
            }); 
    }


    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.names+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
    
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            "ajax": "<?php echo base_url('backend_jurnal/fetch_data'); ?>",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "names" },
                { "data": "position" },
                { "data": "office" }
            ],
            "order": [[1, 'asc']]
        } );
        
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
        } );
    } );
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


$("#login-submit").on("click",function(){
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
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
            $('form#login_form').trigger("reset");
            var obj = JSON.parse(result);  
            Toast.fire({
            icon: 'success',
            title: 'Login Sukses!'
            }).then(function() { 
                localStorage.setItem('nama',obj.data.nama);
                localStorage.setItem('nomor_induk',obj.data.nomor_induk); 
                $("#linklogin").hide();
                $("#linklogout").show();
                $("#sessions").html(localStorage.getItem("nama"));               
            }); 
       }
   });
});

$("#register-submit").on("click",function(){
    alert('ente register');
});

$("#forgot-submit").on("click",function(){
    alert('ente forgot');
});
    
    </script> 
</body>
</html>