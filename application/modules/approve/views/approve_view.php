 
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
                                Approval Publikasi
                            </h2>
                            
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">No </th>
                                            <th style="width:5%;">Jenis Publikasi</th>
                                            <th style="width:5%;">Judul</th>      
                                            <th style="width:5%;">Status</th>                                           
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
                                <br>
                                <button type="button" class="btn btn-success btn-block" id="approve"> Approve </button>
                                <input type="hidden" name="idnya" id="idnya">
                                <br>
                                <button type="button" class="btn btn-danger btn-block" id="reject"> Reject </button>
                                <input type="hidden" name="is_approve" id="is_approve">
                                <hr>
                                <table class="table table-bordered table-hovered">
                                <tr>
                                    <td>Nama Penulis</td>
                                    <td>:</td>
                                    <td><div id="namapenulis"> </div></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Sidang</td>
                                    <td>:</td>
                                    <td><div id="tanggalsidang"> </div></td>
                                </tr>    
                                <tr>
                                    <td>Pembimbing</td>
                                    <td>:</td>
                                    <td><div id="pembimbing"> </div></td>
                                </tr>
                                <tr>
                                    <td>Penguji</td>
                                    <td>:</td>
                                    <td><div id="penguji"> </div></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Disahkan</td>
                                    <td>:</td>
                                    <td><div id="tanggaldisahkan"> </div></td>
                                </tr>
                                <tr>
                                    <td>DOI</td>
                                    <td>:</td>
                                    <td><div id="doi"> </div></td>
                                </tr>
                                <tr>
                                    <td>ISSN </td>
                                    <td>:</td>
                                    <td><div id="issn"> </div></td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>:</td>
                                    <td><div id="volume"> </div></td>
                                </tr>
                                
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>
 
   <script type="text/javascript"> 
     
    $("#approve").on("click",function(){
        $("#reject").prop("disabled",true);
        $("#is_approve").val("Y");
        var idnya = $("#idnya").val();
        $.ajax({
            url:"<?php echo base_url('approve/update_status'); ?>",
            data:{status:"Y",idnya:idnya},
            type:"POST",
            success:function(result){
                console.log(result);
                $('#example').DataTable().ajax.reload();  
                     $("#DetailModal").modal('hide'); 
                     $('#example').DataTable().ajax.reload();  
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
    });
    $("#reject").on("click",function(){
        $("#approve").prop("disabled",true);
        $("#is_approve").val("N");
        var idnya = $("#idnya").val();
        $.ajax({
            url:"<?php echo base_url('approve/update_status'); ?>",
            data:{status:"N",idnya:idnya},
            type:"POST",
            success:function(result){
                console.log(result); 
                     $("#DetailModal").modal('hide');
                     $('#example').DataTable().ajax.reload();  
                     
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
    });
    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>approve/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 console.log(result.id);
                 $("#idnya").val(result.id);
                 $("#namapenulis").html(result.nama_penulis);
                 $("#doi").html(result.doi);
                 $("#pembimbing").html(result.pembimbing); 
                 $("#penguji").html(result.penguji);
                 $("#tanggalsidang").html(result.tanggal_sidang); 
                 $("#tanggaldisahkan").html(result.tanggal_disahkan);
                 $("#volume").html(result.volume); 
                 $("#issn").html(result.issn);
                if(result.is_approve == 'Y'){
                    $("#approve").prop("disabled",true);
                    $("#reject").prop("disabled",false);
                    $("#is_approve").val('Y'); 
                }else{
                    $("#approve").prop("disabled",false);
                    $("#reject").prop("disabled",true);
                    $("#is_approve").val('N'); 
                }
			 }
		 });
    }  

	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama_barang").val(result.nama_barang);
                 $("#qty_jkt").val(result.qty_jkt);
                 $("#qty_subang").val(result.qty_subang);
                 $("#qty").val(result.qty);
                 $("#keterangan").val(result.keterangan); 
                 $("#id_kategori").val(result.id_kategori);
                 $("#nama_kategori").val(result.nama_kategori); 
                 $("#id_sub_kategori").val(result.id_sub_kategori);
                 $("#nama_sub_kategori").val(result.nama_sub_kategori); 
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val('');  
     }
 
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
                 //transaksi dibelakang layar
                 $.ajax({
                 url:"<?php echo base_url(); ?>barang/simpan_data",
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
	 
		$('#example').DataTable({ 
			"ajax": "<?php echo base_url(); ?>approve/fetch_approve"
		}); 
		 
	  });
   
    </script>