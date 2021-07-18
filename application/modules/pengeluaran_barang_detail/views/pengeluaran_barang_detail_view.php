 
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
                                Job Order Detail
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">No</th>  
                                            <th style="width:5%;">No Order</th>
                                            <th style="width:2%;">Pelanggan</th> 
                                            <th style="width:5%;">Tanggal Order</th>
                                     
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
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data </h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id">

                                    <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $userid; ?>">   

                                    <input type="hidden" name="status" id="status" value="1">   

                                    <input type="hidden" name="date_create" id="date_create"  value="<?php echo date('Y-m-d H:i:s'); ?>">    

                                   <!--  <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_order" id="no_order" class="form-control" placeholder="No Order" readonly="readonly" />
                                        </div>
                                    </div>  -->
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="no_order" id="no_order" class="form-control" required readonly="readonly" >
                                                   
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariNoOrder();" class="btn btn-primary"> Pilih No Order... </button>
                                                </span>
                                    </div>
 
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>

 
    <!-- modal cari no order -->
    <div class="modal fade" id="CariNoOrderModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Order</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_order" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:5%;"> No Order </th> 
                                            <th style="width:5%;"> Pelanggan </th>
                                            <th style="width:5%;"> Tanggal Order </th>  
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_orderx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

    <!-- modal cari no produk -->
    <div class="modal fade" id="CariProdukModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Produk</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_order" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:5%;"> No Order </th> 
                                            <th style="width:5%;"> Pelanggan </th>
                                            <th style="width:5%;"> Tanggal Order </th>  
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_orderx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
 
   <script type="text/javascript">
     $("#addmodal").on("click",function(){
          $.ajax({
          url:"<?php echo base_url('job_order/get_last_id'); ?>",
          type:"GET",
          data:{id:1},
          success:function(result){
            $("#no_order").val(result);
          }
        });
        
        $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
             
        $("#defaultModalLabel").html("Form Tambah Data");
        });

    $('#daftar_jabatan').DataTable( {
            "ajax": "<?php echo base_url(); ?>job_order/fetch_jabatan"           
    });

     
    
    function CariJabatan(){
        $("#CariJabatanModal").modal({backdrop: 'static', keyboard: false,show:true});
    }  
        
        var daftar_jabatan = $('#daftar_jabatan').DataTable();
     
        $('#daftar_jabatan tbody').on('click', 'tr', function () {
            
            var content = daftar_jabatan.row(this).data()
            console.log(content);
            $("#nama_jabatan").val(content[0]);
            $("#id_jabatan").val(content[1]);
            $("#CariJabatanModal").modal('hide');
        } );

    $('#daftar_jabatan').DataTable( {
            "ajax": "<?php echo base_url(); ?>job_order/fetch_jabatan"           
    });

     
    
    function CariJabatan(){
        $("#CariJabatanModal").modal({backdrop: 'static', keyboard: false,show:true});
    }  
        
        var daftar_jabatan = $('#daftar_jabatan').DataTable();
     
        $('#daftar_jabatan tbody').on('click', 'tr', function () {
            
            var content = daftar_jabatan.row(this).data()
            console.log(content);
            $("#nama_jabatan").val(content[0]);
            $("#id_jabatan").val(content[1]);
            $("#CariJabatanModal").modal('hide');
        } );
      
       
    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>job_order/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
            
                 $("#nik").val(result.nik);
                 $("#nama").val(result.nama);
                 $("#alamat").val(result.alamat);
                 $("#email").val(result.email);
                 $("#telp").val(result.telp);
                 $("#nama_jabatan").val(result.nama_jabatan);
                 $("#id_jabatan").val(result.id_jabatan);
          
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
            url : "<?php echo base_url('job_order/hapus_data')?>/"+id,
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
        var nama_job_order = $("#nama_job_order").val(); 
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>job_order/simpan_data",
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
            
        
        $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>job_order_detail/fetch_job_order_list" 
               
        });
 
      
         
      });
  
        
         
    </script>