 
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
                                Payroll
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Generate Payroll </a>
 
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Periode</th>
                                            <th style="width:5%;">Date Generate</th>
                                      
                                            <th style="width:5%;">Opsi</th> 
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
                                   

									<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="periode" id="periode" class="form-control" placeholder="EX: (201801) Tahun Bulan" />
                                             
                                        </div>
                                    </div>
                               

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari jabatan -->
    <div class="modal fade" id="CariJabatanModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Jabatan</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_jabatan" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Jabatan </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_jabatanx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>


    
    <!-- modal cari status -->
    <div class="modal fade" id="CariStatusModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Status</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_status" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Status </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_statusx">

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
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td><div id="nipdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><div id="namadtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><div id="alamatdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td>:</td>
                                    <td><div id="telpdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><div id="emaildtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><div id="jabatandtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><div id="statusdtl"> </div></td>
                                </tr>
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>

 
 
   <script type="text/javascript"> 

     
    $('#daftar_jabatan').DataTable( {
            "ajax": "<?php echo base_url(); ?>jabatan/fetch_jabatan"           
    });

     
    $('#daftar_status').DataTable( {
            "ajax": "<?php echo base_url(); ?>status/fetch_status"           
    });
    function CariJabatan(){
        $("#CariJabatanModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 

    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>payroll/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 //$("#DetailModal").modal('show'); 
				 $("#nipdtl").html(result.nip);
                 $("#namadtl").html(result.nama);
                 $("#alamatdtl").html(result.alamat);
                 $("#telpdtl").html(result.telp);
                 $("#emaildtl").html(result.email);  
                 $("#jabatandtl").html(result.nama_jabatan); 
                 $("#statusdtl").html(result.nama_status); 
                  
			 }
		 });
    } 
   
        
        var daftar_jabatan = $('#daftar_jabatan').DataTable();
     
        $('#daftar_jabatan tbody').on('click', 'tr', function () {
            
            var content = daftar_jabatan.row(this).data()
            console.log(content);
            $("#nama_jabatan").val(content[0]);
            $("#id_jabatan").val(content[3]);
            $("#CariJabatanModal").modal('hide');
        } );

    function CariStatus(){
        $("#CariStatusModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_status = $('#daftar_status').DataTable();
     
        $('#daftar_status tbody').on('click', 'tr', function () {
            
            var content = daftar_status.row(this).data()
            console.log(content);
            $("#nama_status").val(content[0]);
            $("#id_status").val(content[3]);
            $("#CariStatusModal").modal('hide');
        } );

 
       
 
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>payroll/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama").val(result.nama);
                 $("#nip").val(result.nip);
                 $("#telp").val(result.telp);
                 $("#email").val(result.email); 
                 $("#alamat").val(result.alamat);
                 $("#id_jabatan").val(result.id_jabatan);
                 $("#nama_jabatan").val(result.nama_jabatan);
                 $("#id_status").val(result.id_status);
                 $("#nama_status").val(result.nama_status);
                
              
                  
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
            url : "<?php echo base_url('payroll/hapus_data')?>/"+id,
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
                 url:"<?php echo base_url(); ?>payroll/simpan_data",
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
             
			"ajax": "<?php echo base_url(); ?>payroll/fetch_payroll"
		});


	  
		 
	  });
  
		
		 
    </script>