 
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
                                Pricelist
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Barang</th>
                                            <th style="width:5%;">Supplier</th>
                                            <th style="width:5%;">Harga</th>  
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
                                   
 
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_barang" id="id_barang" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariBarang();" class="btn btn-primary"> Pilih Barang... </button>
                                                </span>
                                    </div>
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_supplier" id="id_supplier" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariSupplier();" class="btn btn-primary"> Pilih Supplier... </button>
                                                </span>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" />
                                        </div>
                                    </div>

                                  

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari barang -->
    <div class="modal fade" id="CariBarangModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Barang</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_barang" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Barang </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_barangx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari supplier -->
    <div class="modal fade" id="CariSupplierModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Supplier</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_supplier" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Supplier </th> 
                                            <th style="width:98%;">Alamat </th> 
                                            <th style="width:98%;">Telp </th> 
                                            <th style="width:98%;">Email </th> 
                                         </tr>
 
                                    </thead> 
                                    <tbody id="daftar_supplierx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

  
 
   <script type="text/javascript"> 

     
    $('#daftar_barang').DataTable( {
            "ajax": "<?php echo base_url(); ?>barang/fetch_barang"           
    });

    $('#daftar_supplier').DataTable( {
            "ajax": "<?php echo base_url(); ?>supplier/fetch_supplier"           
    });

  
    function CariBarang(){
        $("#CariBarangModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 

    function CariSupplier(){
        $("#CariSupplierModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
 
        var daftar_barang = $('#daftar_barang').DataTable();
     
        $('#daftar_barang tbody').on('click', 'tr', function () {
            
            var content = daftar_barang.row(this).data()
            console.log(content);
            $("#nama_barang").val(content[0]);
            $("#id_barang").val(content[4]);
            $("#CariBarangModal").modal('hide');
        } );

        var daftar_supplier = $('#daftar_supplier').DataTable();
     
        $('#daftar_supplier tbody').on('click', 'tr', function () {
            
            var content = daftar_supplier.row(this).data()
            console.log(content);
            $("#nama_supplier").val(content[0]);
            $("#id_supplier").val(content[5]);
            $("#CariSupplierModal").modal('hide');
        } );
 
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>pricelist/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#harga").val(result.harga);
                 $("#id_barang").val(result.id_barang); 
                 $("#nama_barang").val(result.nama_barang);
                 $("#id_supplier").val(result.id_supplier); 
                 $("#nama_supplier").val(result.nama_supplier); 
                  
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
            url : "<?php echo base_url('pricelist/hapus_data')?>/"+id,
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
                 url:"<?php echo base_url(); ?>pricelist/simpan_data",
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
             
			"ajax": "<?php echo base_url(); ?>pricelist/fetch_pricelist",
                'filterDropDown': {                                       
                        columns: [
                            { 
                                idx: 0
                            },
                            { 
                                idx: 1
                            } 

                        ],
                        bootstrap: true
                    } 
		});


	  
		 
	  });
  
		
		 
    </script>