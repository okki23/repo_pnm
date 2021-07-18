 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Instansi
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
  
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Kategori instansi</th>
                                            <th style="width:5%;">Nama instansi</th>                                           
                                            <th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_kategori_instansi" id="nama_kategori_instansi" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_kategori_instansi" id="id_kategori_instansi" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariInstansi();" class="btn btn-primary"> Pilih Kategori Instansi... </button>
                                                </span>
                                    </div>
 
									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" placeholder="Nama instansi" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" />
                                        </div>
                                    </div>
                                     

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>



    <!-- modal cari kategori -->
    <div class="modal fade" id="CariInstansiModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Kategori</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_kategori_instansi" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Nama Kategori Instansi </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_kategori_instansix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

 
    
     <!-- modal detail -->
     <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Detail</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                <br>
                                <hr>
                                <table class="table table-bordered table-hovered">
                                <tr>
                                    <td>Nama instansi</td>
                                    <td>:</td>
                                    <td><div id="nama_instansidtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Kategori instansi</td>
                                    <td>:</td>
                                    <td><div id="nama_kategori_instansidtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Alamat Instansi</td>
                                    <td>:</td>
                                    <td><div id="alamatdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Telp Instansi</td>
                                    <td>:</td>
                                    <td><div id="telpdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>PIC Instansi</td>
                                    <td>:</td>
                                    <td><div id="picdtl"> </div></td>
                                </tr>
                               
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>



 

  
 
   <script type="text/javascript"> 
    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>instansi/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 //$("#DetailModal").modal('show'); 
                 $("#nama_instansidtl").html(result.nama_instansi);
                 $("#alamatdtl").html(result.alamat);
                 $("#telpdtl").html(result.telp);
                 $("#picdtl").html(result.pic);
                 $("#nama_kategori_instansidtl").html(result.nama_kategori_instansi);
			 }
		 });
    } 
    
    // cari direktorat
    $('#daftar_kategori_instansi').DataTable( {
            "ajax": "<?php echo base_url(); ?>kategori_instansi/fetch_kategori_instansi"           
    });

     
     
    function CariInstansi(){
        $("#CariInstansiModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_kategori_instansi = $('#daftar_kategori_instansi').DataTable();
     
        $('#daftar_kategori_instansi tbody').on('click', 'tr', function () {
            
            var content = daftar_kategori_instansi.row(this).data()
            console.log(content);
            $("#nama_kategori_instansi").val(content[0]);
            $("#id_kategori_instansi").val(content[2]);
            $("#CariInstansiModal").modal('hide');
        } );


	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>instansi/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama_instansi").val(result.nama_instansi);
                 $("#alamat").val(result.alamat);
                 $("#telp").val(result.telp);
                 $("#pic").val(result.pic);
                 $("#id_kategori_instansi").val(result.id_kategori_instansi); 
                 $("#nama_kategori_instansi").val(result.nama_kategori_instansi);
              
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
         
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('instansi/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
      
  
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
                 //transaksi dibelakang layar
                 $.ajax({
                 url:"<?php echo base_url(); ?>instansi/simpan_data",
                 type:"POST",
                 data:formData,
                 contentType:false,  
                 processData:false,   
                 success:function(result){ 
                    
                     $("#defaultModal").modal('hide');
                     $('#example').DataTable().ajax.reload(); 
                     $('#user_form')[0].reset();
                     Bersihkan_Form();
                     
                     $.notify("Data berhasil disimpan!", {
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                     } 
                     },{
                        type: 'success'
                    });
                 }
                }); 
 
 
         

	}
      
	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});

        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1; //months from 1-12
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();
 
		 
		$('#example').append('<caption style="caption-side: top">   </caption>');
		$('#example').DataTable({
             
			"ajax": "<?php echo base_url(); ?>instansi/fetch_instansi", 
		});


	  
		 
	  });
  
		
		 
    </script>