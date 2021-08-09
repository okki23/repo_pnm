 
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
                                Dosen
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr> 
                                            <th style="width:5%;">NIM</th> 
                                            <th style="width:5%;">Nama</th>
                                            <th style="width:5%;">Alamat</th> 
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
                                        <label for="nim"> NIDN </label>
										<input type="text" name="nidn" id="nidn" tabindex="1" class="form-control" placeholder="NIDN" value="">
									</div>
                                    <div class="form-group">
                                        <label for="nama"> Nama </label>
										<input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama" value="">
									</div>
                                    <div class="form-group">
                                        <label for="alamat"> Alamat </label>
										<input type="text" name="alamat" id="alamat" tabindex="1" class="form-control" placeholder="Alamat" value="">
									</div>
                                    <div class="form-group">
                                        <label for="telp"> Telp </label>
										<input type="text" name="telp" id="telp" tabindex="1" class="form-control" placeholder="Telepon" value="">
									</div> 
                                    <div class="form-group">
                                        <label for="jenkel"> Jenis Kelamin </label>
                                        <select name="jenkel" id="jenkel"  class="form-control" >
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select> 
									</div> 

									<div class="form-group"> 
                                        <label for="email"> Email </label>
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
                                        <label for="password"> Password </label>
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
                              
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>


  
   
 
</style>
   <script type="text/javascript">
     
       
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>dosen/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id); 
                 $("#nidn").val(result.nidn); 
                 $("#nama").val(result.nama); 
                 $("#alamat").val(result.alamat); 
                 $("#telp").val(result.telp); 
                 $("#email").val(result.email);  
                 if(result.jenkel == 'L'){
                    $('#jenkel').val('L').change(); 
                 }else{
                    $('#jenkel').val('P').change(); 
                 } 
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
            url : "<?php echo base_url('dosen/hapus_data')?>/"+id,
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
            error: function (jqXHR, textdosen, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
    }
    
      
  
    function Simpan_Data(){ 
        var formData = new FormData($('#user_form')[0]);  
 
            $.ajax({
             url:"<?php echo base_url(); ?>dosen/simpan_data",
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
         
       
     $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>dosen/fetch_dosen" 
               
        });
 
      
         
      });
  
        
         
    </script>