 
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
                                Status
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr>
                                           
                                            <th style="width:5%;">Status</th>
                                            <th style="width:5%;">Tunjangan</th>   
                                             
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
                                            <input type="text" name="nama_status" id="nama_status" class="form-control" placeholder="Status" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tunjangan" id="tunjangan" class="form-control" placeholder="Tunjangan (Ex: 1000000)" />
                                        </div>
                                    </div>
                                  
                                     

                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
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
    

   
   
         
       
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>status/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
               
                 $("#nama_status").val(result.nama_status);
                 $("#tunjangan").val(result.tunjangan);
                
                  
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
            url : "<?php echo base_url('status/hapus_data')?>/"+id,
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

           
        var nama_status = $("#nama_status").val();
        var tunjangan = $("#tunjangan").val();
       
        if(nama_status == ''){
            alert("Satuan Belum anda masukkan!");
            $("#nama_status").parents('.form-line').addClass('focused error');
            $("#id_satuan").focus();
        }else if(tunjangan == ''){
            alert("Tunjangan Belum anda masukkan!");
            $("#tunjangan").parents('.form-line').addClass('focused error');
            $("#tunjangan").focus();
        }else{

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>status/simpan_data",
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
           

          
         

    }
      
 
var g_dataFull = [];

/* Formatting function for row details - modify as you need */
function format ( d ) {
    var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">';
      
    var dataChild = [];
    var hasChildren = false;
    $.each(g_dataFull, function(){
       if(this.id_parent_status === d.id){
          html += 
            '<tr><td>' + $('<div>').text(this.nama_pelayanan).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_komp_biaya).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_status).html() +'</td>' + 
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
           
        $("#addmodal").on("click",function(){
            $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
        });
         
      
        
     $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>status/fetch_status" 
               
        });
 
      
         
      });
  
        
         
    </script>