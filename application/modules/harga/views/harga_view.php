 
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
                              Master Harga
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Harga </a> &nbsp; 
                            <a href="javascript:void(0);" id="addmodalharga" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Generate Harga </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">No</th>  
                                            <th style="width:5%;">Harga</th> 
                                            <th style="width:5%;">Tahun</th>  
                                            <th style="width:5%;">Kota</th>  
                                            <th style="width:15%;">Opsi</th> 
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
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Harga</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id">    

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_harga" id="nama_harga" class="form-control" placeholder="Nama Harga" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="year" id="year" class="form-control" placeholder="Tahun" />
                                        </div>
                                    </div>

                                     <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_country" id="nama_country" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_country" id="id_country" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariCountry();" class="btn btn-primary"> Pilih Provinsi... </button>
                                                </span>
                                    </div>
                                     

                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>

    <!-- form generate -->
    <div class="modal fade" id="GenerateModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Generate Harga</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                 <form method="post" id="user_form_gen" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id">    

                                     <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_asal_harga" id="nama_asal_harga" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_asal_harga" id="id_asal_harga" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariAsalHarga();" class="btn btn-primary"> Pilih Asal Harga... </button>
                                                </span>
                                    </div>
                                     <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="persentase_kenaikan" id="persentase_kenaikan" class="form-control" placeholder="Persentase Kenaikan" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_harga" id="nama_harga" class="form-control" placeholder="Nama Harga" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="year" id="year" class="form-control" placeholder="Tahun" />
                                        </div>
                                    </div>

                                     <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_country_second" id="nama_country_second" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_country_second" id="id_country_second" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariCountryX();" class="btn btn-primary"> Pilih Provinsi... </button>
                                                </span>
                                    </div>
                                     

                                   <button type="button" onclick="SaveGen();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Generate</button>

                                 
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>


  
  
    <!-- modal cari contry -->
    <div class="modal fade" id="CariCountryModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Country</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_country" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Country </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_countryx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

    <!-- modal cari contry -->
    <div class="modal fade" id="CariCountryModalX" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Country</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_country_second" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Country </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_country_secondx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

      <!-- modal cari asal_harga -->
    <div class="modal fade" id="CariAsalHargaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Asal Harga</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_asal_harga" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:3%;">No </th>
                                            <th style="width:10%;">Nama Harga </th>
                                            <th style="width:10%;">Tahun </th>
                                            <th style="width:10%;">Country </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_asal_hargax">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

 

 
    <div class="modal fade" id="DetailHargaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Detail Harga</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>
                               

                               <table id="examplez" width="100%" class="table table-bordered table-striped table-hover js-basic-examplez">
                            <thead>
                            <tr>
                                        <td> No </td>
                                        <td> Nama Harga </td>
                                        <td> Harga </td>
                                        <td> Jenis Layanan </td>
                                        <td> Komponen Biaya</td>
                                    </tr>
                                </thead>
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>


    <div class="modal fade" id="UbahHargaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Ubah Harga</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>
                               
                            <form method="post" id="user_form_update" enctype="multipart/form-data">  

                               <table id="exampleg" width="100%" class="table table-bordered table-striped table-hover js-basic-exampleg">
                            <thead>
                            <tr>
                                        <td> No </td>
                                        <td> Nama Harga </td>
                                        <td> Harga </td>
                                        <td> Satuan </td>
                                        <td> Jenis Layanan </td>
                                        <td> Komponen Biaya</td>
                                    </tr>
                                </thead>
                                </table>
                                <br>
                                 <h3 align="center" > 
                                                        <p id ="msgform"> </p> 
                                                    </h3> 

                                                     <div id="loading">
                                                     <div align="center">
                                                        <img src="<?php echo base_url('assets/images/loadingku.gif');  ?>" style="width: 20%; height: 20%; ">
                                                     </div>
                                                     <br>
                                                     <h3 align="center"> Mohon tunggu, data sedang di upload ... </h3>
                                                     </div>
                                                     <br>
                                  <button type="button" onclick="Simpan_Data_Ubah();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>
                                 </form>
                                <br>
                                &nbsp;
                       </div>
                     
                    </div>
                </div>
    </div>
            

 
<style type="text/css">
    td.details-control {
    background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://raw.githubusercontent.com/DataTables/DataTables/1.10.7/examples/resources/details_close.png') no-repeat center center;
}
</style>
   <script type="text/javascript">

    function Ubah_Data_Val_Harga(id){
        $("#UbahHargaModal").modal({backdrop: 'static', keyboard: false,show:true});
        
        var example_table = $('#exampleg').DataTable({
            "destroy": true,
             "displayLength": 400,
            "ajax": {
            "type"   : "POST",
            "url"    : '<?php echo base_url('harga/list_detail_harga_ubah'); ?>',
            "data"   : {id:id},
            "dataSrc": ""
            },
            "columns" : [ 
                    {
                        "data" : "no"
                    },
                    {
                        "data" : "nama_pricelist"
                    },
                    {
                        "data" : "harga"
                    },
                    {
                        "data" : "satuan"
                    },
                    {
                        "data" : "nama_pelayanan"
                    },
                    {
                        "data" : "nama_komp_biaya"
                    } ]
            });

 
            example_table.ajax.reload()

 
 
    }

     function Detail_Data(id){
        $("#DetailHargaModal").modal({backdrop: 'static', keyboard: false,show:true});
        //$('#examplez').DataTable().ajax.reload(); 

        var example_table = $('#examplez').DataTable({
            "destroy": true,
            "ajax": {
            "type"   : "POST",
            "url"    : '<?php echo base_url('harga/list_detail_harga'); ?>',
            "data"   : {id},
            "dataSrc": ""
            },
            "columns" : [ 
                    {
                        "data" : "no"
                    },
                    {
                        "data" : "nama_pricelist"
                    },
                    {
                        "data" : "harga"
                    },
                    {
                        "data" : "nama_pelayanan"
                    },
                    {
                        "data" : "nama_komp_biaya"
                    } ]
            });

 
            example_table.ajax.reload()

 
 
    }  

    $('#daftar_country').DataTable( {
            "ajax": "<?php echo base_url(); ?>harga/fetch_country"           
    });

    $('#daftar_country_second').DataTable( {
            "ajax": "<?php echo base_url(); ?>harga/fetch_country"           
    });

    $('#daftar_asal_harga').DataTable( {
            "ajax": "<?php echo base_url(); ?>harga/fetch_harga"           
    });
     
     
    function CariCountry(){
        $("#CariCountryModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_country = $('#daftar_country').DataTable();
     
        $('#daftar_country tbody').on('click', 'tr', function () {
            
            var content = daftar_country.row(this).data()
            console.log(content);
            $("#nama_country").val(content[0]);
            $("#id_country").val(content[1]);
            $("#CariCountryModal").modal('hide');
        } );

    function CariCountryX(){
        $("#CariCountryModalX").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_country_second = $('#daftar_country_second').DataTable();
     
        $('#daftar_country_second tbody').on('click', 'tr', function () {
            
            var content = daftar_country_second.row(this).data()
            console.log(content);
            $("#nama_country_second").val(content[0]);
            $("#id_country_second").val(content[1]);
            $("#CariCountryModalX").modal('hide');
        } );

    function CariAsalHarga(){
        $("#CariAsalHargaModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
        
        var daftar_asal_harga = $('#daftar_asal_harga').DataTable();
     
        $('#daftar_asal_harga tbody').on('click', 'tr', function () {
            
            var content = daftar_asal_harga.row(this).data()
            console.log(content);
            $("#nama_asal_harga").val(content[1]);
            $("#id_asal_harga").val(content[5]);
            $("#CariAsalHargaModal").modal('hide');
        } );
     
     
    function GetParentsVal(id){
        console.log(id);
        $.get("<?php echo base_url('harga/fetch_nama_parents_row/'); ?>"+id,function(result){
            console.log(result);
            var parse = JSON.parse(result);
            $("#id_parent_harga").val(id);
            $("#nama_harga_parent").val(parse.nama_harga);
            $("#CariParentModal").modal('hide');
        });

    }

   
   
         
       
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>harga/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#id_country").val(result.id_country);                 
                 $("#nama_harga").val(result.nama_harga);
                 $("#year").val(result.year);
                 $("#nama_country").val(result.country);
                
                  
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
            url : "<?php echo base_url('harga/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
               $('#example').DataTable().ajax.reload(); 
                //$('#examplez').DataTable().ajax.reload(); 
               $('#daftar_asal_harga').DataTable().ajax.reload(); 
               
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

           
         var nama_harga = $("#nama_harga").val();
          var id_satuan = $("#id_satuan").val();
       
        if(id_satuan == ''){
            alert("Satuan Belum anda masukkan!");
            $("#id_satuan").parents('.form-line').addClass('focused error');
            $("#id_satuan").focus();
        }else{

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>harga/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 // $('#examplez').DataTable().ajax.reload(); 
                 $('#daftar_asal_harga').DataTable().ajax.reload(); 
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
            

    }

    function Simpan_Data_Ubah(){
        //setting semua data dalam form dijadikan 1 variabel 
         var formData = new FormData($('#user_form_update')[0]); 

           
        
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>harga/simpan_data_ubah",
             type:"POST",
             data:formData,
              beforeSend: function(){
                   $("#loading").show();
                    $("#msgform").html("");
                 },
                 complete: function(){
                   $("#loading").hide();
                    $("#msgform").html("Data sudah di simpan!");
                 },
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#UbahHargaModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 // $('#examplez').DataTable().ajax.reload(); 
                $("#msgform").html("");
                 $('#user_form_update')[0].reset();
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

    function SaveGen(){
          
            $.ajax({
             url:"<?php echo base_url(); ?>harga/generate_harga",
             type:"POST",
             data:$("#user_form_gen").serialize(),
             
             success:function(result){ 
                
                 
                 $('#user_form_gen')[0].reset();
                 Bersihkan_Form();
                 $('#example').DataTable().ajax.reload(); 
                  //$('#examplez').DataTable().ajax.reload(); 
                 $('#daftar_asal_harga').DataTable().ajax.reload(); 

                 $("#GenerateModal").modal('hide');
                 
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
      
 
var g_dataFull = [];

/* Formatting function for row details - modify as you need */
function format ( d ) {
    var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">';
      
    var dataChild = [];
    var hasChildren = false;
    $.each(g_dataFull, function(){
       if(this.id_parent_harga === d.id){
          html += 
            '<tr><td>' + $('<div>').text(this.nama_pelayanan).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_komp_biaya).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_harga).html() +'</td>' + 
            '<td>' +  $('<div>').text(this.nama_satuan).html() + '</td>'+
            '<td>' +  $('<div>').text(this.action).html() + '</td></tr>';

         
          hasChildren = true;
       }
    });
  
    if(!hasChildren){
        html += '<tr><td>There are no items in this view.</td></tr>';
     
    }
  
 
    html += '</table>';
    return html;
}
    

       $(document).ready(function() {
        $("#loading").hide();
        $("#addmodal").on("click",function(){
            $("#defaultModal").modal({backdrop: 'static', keyboard: false, show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
        });
        $("#addmodalharga").on("click",function(){
            $("#GenerateModal").modal({backdrop: 'static', keyboard: false, show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
        });
         
      
        
     $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>harga/fetch_harga" 
               
        });
 
      
         
      });
  
        
         
    </script>