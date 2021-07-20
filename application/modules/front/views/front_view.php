<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Repository Politeknik Negeri Manado</title>
	<!-- core CSS -->
    <link href="<?php echo base_url('assets/frontend/');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/animate.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/frontend/');?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/styles.css" rel="stylesheet"> 
	
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/');?>css/slider-style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/');?>css/slider-custom.css" />
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/');?>js/modernizr.custom.79639.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/');?>logopnm.png"> 
    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url('assets/frontend/');?>js/mousescroll.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/smoothscroll.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/jquery.inview.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/wow.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/');?>js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/');?>js/jquery.slitslider.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/');?>js/slitslider-custom.js"></script>
    <script src="<?php echo base_url('assets/frontend/');?>js/custom-scripts.js"></script>
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
                    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('assets/images/');?>logopnm.png" style="width:10%;" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>  
                        <li class="scroll"><a href="#services">Fitur</a></li>
                        <li class="scroll"><a href="#about">Repository</a></li> 
                        <li class="scroll"><a href="#contact-us">Kontak</a></li>
                        <li><a href="javascript::void(0);" onclick="Ohyes();" class="btn btn-lg btn-info"> LOGIN </a> </li> 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
 
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
        </div>
        <div class="modal-body">
             
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <section id="home" >
        <div class="container">

            <div class="section-header" style="margin-top:100px;">
                 
            <h2 class="section-title wow fadeInDown">Repository Politeknik Negeri Manado</h2>
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
     
    function Ohyes(){
        $("#myModal").modal({backdrop: 'static', keyboard: false,show:true});
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
    </script>
    <style>
        td.details-control {
            background: url('assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('assets/images/details_close.png') no-repeat center center;
        }
    </style>
</body>
</html>