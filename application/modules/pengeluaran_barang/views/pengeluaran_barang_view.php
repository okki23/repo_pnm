 
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
                                Pengeluaran Barang
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
                            
                        </div>
                        <div class="body"> 
                           
                             <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" > 
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">No Transaksi</th>  
                                            <th style="width:2%;">Instansi</th> 
                                            <th style="width:5%;">Keterangan</th>
                                            <th style="width:5%;">Tanggal Keluar</th> 
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
    <div class="modal fade" id="defaultModal" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id">  

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label> No Transaksi </label>
                                            <input type="text" name="no_transaksi" id="no_transaksi" class="form-control" placeholder="No Transaksi" readonly="readonly" />
                                        </div>
                                    </div> 
                                    
                                    <br>
                                     
                                     <button type="button" class="btn btn-primary waves-effect" onclick="TambahDataChild();"> <i class="material-icons">add_circle</i>  Tambah Data</button>
 
                                        <br>
                                        &nbsp;
                                        <table class="table table-bordered table-striped table-hover js-basic-example" id="datalist"> 
  
                                        <thead>
                                            <tr>
                                                <th style="width:1%;">No</th>  
                                                <th style="width:2%;">Nama Barang</th>
                                                <th style="width:2%;">Qty</th> 
                                                <th style="width:2%;">Source</th>
                                                <th style="width:5%;">Keterangan</th> 
                                                
                                            </tr>
                                        </thead> 
                                        </table>
 
                                  
                                  <br>
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_instansi" id="id_instansi" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihInstansi();" class="btn btn-primary"> Pilih Instansi.. </button>
                                                </span>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label> Keterangan </label>
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"  />
                                        </div>
                                    </div> 
                                    

                                  <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan </button>

                                    <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form_Order();" > <i class="material-icons">clear</i> Batal</button>
                        </div>
                                 
                        </div>

                                   
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
  

  <!-- form tambah child -->
  <div class="modal fade" id="defaultModalChild" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalChildLabel">Form Tambah Item</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form_detail" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <input type="hidden" name="no_transaksix" id="no_transaksix">  

                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_barang" id="id_barang" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihBarang();" class="btn btn-primary"> Pilih Barang.. </button>
                                                </span>
                                    </div> 

                                    <div class="form-group">

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box hover-zoom-effect">
                                                <div class="icon bg-blue">
                                                    <i class="material-icons">equalizer</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">JAKARTA</div>
                                                    <div class="number" id="jkt"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box hover-zoom-effect">
                                                <div class="icon bg-blue">
                                                    <i class="material-icons">equalizer</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">SUBANG</div>
                                                    <div class="number" id="sbg"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="form-group">
                                    
                                    <label> Source  </label>
                                    <br>
                                    <input type="hidden" name="source" id="source">

                                    <button type="button" id="jktbtn" class="btn btn-default waves-effect "> Jakarta </button>

                                    <button type="button" id="sbgbtn" class="btn btn-default waves-effect "> Subang </button>
                                
                                    </div>
                             
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label> Qty </label>
                                            <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" />
                                        </div>
                                    </div> 
                                   
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label> Keterangan </label>
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"/>
                                        </div>
                                    </div> 
                                     
                                 
                                  
                                  <br>
                                  <button type="button" onclick="Simpan_DataItem();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                    <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:defaultModalChildClose();" > <i class="material-icons">clear</i> Batal</button>
                        </div>
                                 
                        </div>

                                   
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
  
    
    <!-- modal cari barang -->
    <div class="modal fade" id="PilihBarangModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Barang </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                <table width="100%" class="table table-bordered table-striped table-hover" id="daftar_barang" > 
                                     <thead>
                                        <tr>  
                                            <th style="width:5%;">Kategori Barang</th>
                                            <th style="width:5%;">Sub Kategori Barang</th>
                                            <th style="width:5%;">Nama Barang</th>    
                                            <th style="width:12%;">Action </th> 
                                         </tr>
                                    </thead> 
                                    <tbody>
                                        
                                    </tbody>  
                                </table> 

 
                       </div>
                     
                    </div>
                </div>
    </div>


    
    <!-- modal cari istansi -->
    <div class="modal fade" id="PilihInstansiModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Instansi</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_instansi" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Kategori Instansi </th> 
                                            <th style="width:98%;">Nama Instansi </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_instansix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

	
	
	<!-- detail data -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Pengeluaran</h4>
                        </div>
                        <div class="modal-body">

                        <div class="row clearfix">

                        <div class="col-lg-12">

                            <table class="table table-responsive">
                            <tr>
                                <td style="font-weight:bold;"> No Transaksi</td>
                                <td> : </td>
                                <td> <p id="notrdtl"> </p> </td>
                                
                                <td style="font-weight:bold;"> Instansi</td>
                                <td> : </td>
                                <td> <p id="instansidtl"> </p> </td> 
                            </tr>
                            
                            <tr>
                                <td style="font-weight:bold;"> Nama PIC Instansi</td>
                                <td> : </td>
                                <td> <p id="picdtl"> </p> </td>
                                
                                <td style="font-weight:bold;"> Kategori Instansi</td>
                                <td> : </td>
                                <td> <p id="katinsdtl"> </p> </td> 
                            </tr>

                            
                            <tr>
                                <td style="font-weight:bold;"> Keterangan  </td> 
                                <td> : </td>
                                <td> <p id="ketdtl"> </p> </td>
                                <td style="font-weight:bold;"> Tanggal Keluar</td>
                                <td> : </td>
                                <td> <p id="tglkeluardtl"> </p> </td>
                            </tr> 
                            <tr>
                                <td colspan="6"> Penanggung Jawab </td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;"> Nama  </td> 
                                <td> : </td>
                                <td> <p id="namapjdtl"> </p> </td>
                                <td style="font-weight:bold;"> NIP</td>
                                <td> : </td>
                                <td> <p id="nippjdtl"> </p> </td>
                            </tr> 
                            </table> 

                            <br>

                            <table width="100%" class="table table-bordered table-striped table-hover " id="tabeldetail" > 
                                    <thead>
                                        <tr>  
                                            <th style="width:15%;">No</th> 
                                            <th style="width:15%;">Nama Barang</th> 
                                            <th style="width:15%;">Qty</th> 
                                            <th style="width:15%;">Source</th> 
                                            <th style="width:15%;">Keterangan</th> 
                                         </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>  
                            </table>  

                        </div>
 
                        <!-- No 	Nama Barang 	Qty 	Source 	Keterangan -->
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
					
                           
					   </div>
                     
                    </div>
                </div>
    </div>
            
    
       
   <script type="text/javascript">
   
   

    // cari direktorat
    $('#daftar_instansi').DataTable( {
            "ajax": "<?php echo base_url(); ?>instansi/fetch_instansi"           
    });

     
     
    function PilihInstansi(){
        $("#PilihInstansiModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
   
 
        var daftar_instansi = $('#daftar_instansi').DataTable();
     
        $('#daftar_instansi tbody').on('click', 'tr', function () {
            
            var content = daftar_instansi.row(this).data()
            console.log(content);
            $("#nama_instansi").val(content[1]);
            $("#id_instansi").val(content[3]);
            $("#PilihInstansiModal").modal('hide');
        } );




    function Simpan_DataItem(){
        
        
        var formData = new FormData($('#user_form_detail')[0]);  
        var no_transaksix = $("#no_transaksix").val();

            $.ajax({
             url:"<?php echo base_url(); ?>pengeluaran_barang/simpan_data_detail",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                TableListDetail(no_transaksix);
                //CalcWeight(no_transaksix);
                 $("#defaultModalChild").modal('hide');
                 //$("#example_list").DataTable.reload();
                 $('#user_form_detail')[0].reset();
                 
                 //ReloadListTableDetail(no_transaksix);
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

    
    $("#jktbtn").on("click",function(){
        $("#source").val('jkt');
        $(this).attr('class','btn btn-primary');
        $("#sbgbtn").attr('class','btn btn-default');

    });

    $("#sbgbtn").on("click",function(){
        $("#source").val('sbg');
        $(this).attr('class','btn btn-primary');
        $("#jktbtn").attr('class','btn btn-default');

         
    });

    function PilihBarang(){
        $("#PilihBarangModal").modal({backdrop: 'static', keyboard: false,show:true});


        var no_transaksix = $("#no_transaksix").val();
         
        $('#daftar_barang').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "<?php echo base_url('barang/item_list'); ?>",
                "data":{no_transaksix},
                "type":"POST" ,
                "dataSrc" : '' 
            },
  
            "columns" : [{
                "data" : "nama_kategori"
            },{
                "data" : "nama_sub_kategori"
            },{
                "data" : "nama_barang"
            },{
                "data" : "action"
            }],

            "rowReorder": {
                "update": false
            },

            "destroy":true,
        });

    }


    function GetItemList(id){
        console.log(id);
        $.get("<?php echo base_url('barang/fetch_item_list/'); ?>"+id,function(result){
            console.log(result);
            var parse = JSON.parse(result);
           
            $("#id_barang").val(id);
            $("#nama_barang").val(parse.nama_barang);
            $("#jkt").html(parse.qty_jkt);
            $("#sbg").html(parse.qty_subang);
           
            $("#PilihBarangModal").modal('hide');
        });

    }

   
	 function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});

        $('#tabeldetail').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "<?php echo base_url('pengeluaran_barang/listingdetail'); ?>",
                "data":{id},
                "type":"POST",
                dataSrc : '',

            },
            // No 	Nama Barang 	Qty 	Source 	Keterangan
            // $sub_array['no'] = $no;
            //     $sub_array['nama_barang'] = $value->nama_barang;  
            //     $sub_array['qty'] = $value->qty;
            //     $sub_array['source'] = $value->src;
            //     $sub_array['keterangan'] = $value->keterangan; 
            "columns" : [ {
                "data" : "no"
            },{
                "data" : "nama_barang"
            },{
                "data" : "qty"
            },{
                "data" : "source"
            },{
                "data" : "keterangan"
            }],

            "rowReorder": {
                "update": false
            },

            "destroy":true,
        });
    

		$.ajax({
			 url:"<?php echo base_url(); ?>pengeluaran_barang/detailmodal/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  

                // {"id":"153","no_transaksi":"201907290000001","id_instansi":"2","keterangan":"Sudah OK","id_pegawai":"1","date_assign":"2019-07-29","pic":"Putra","nama_instansi":"PT.Pindad","alamat":"Jl.Nangka","telp":"021345446","nama":"Admin","nip":"9999999","nama_kategori_instansi":"Pemerintahan"}
                // <tr>
				// 				<td style="font-weight:bold;"> No Transaksi</td>
				// 				<td> : </td>
				// 				<td> <p id="notrdtl"> </p> </td>
								
				// 				<td style="font-weight:bold;"> Instansi</td>
				// 				<td> : </td>
				// 				<td> <p id="instansidtl"> </p> </td> 
				// 			</tr>
							 
				// 			<tr>
				// 				<td style="font-weight:bold;"> Nama PIC Instansi</td>
				// 				<td> : </td>
				// 				<td> <p id="picdtl"> </p> </td>
								
				// 				<td style="font-weight:bold;"> Tanggal Keluar</td>
				// 				<td> : </td>
				// 				<td> <p id="tglkeluardtl"> </p> </td> 
                //             </tr>
                //             <tr>
				// 				<td style="font-weight:bold;"> Nama Penanggung Jawab </td>
				// 				<td> : </td>
				// 				<td> <p id="namapjdtl"> </p> </td>
								
				// 				<td style="font-weight:bold;"> NIP Penanggung Jawab</td>
				// 				<td> : </td>
				// 				<td> <p id="nippjdtl"> </p> </td> 
                //             </tr>
                   
							 
				// 			<tr>
				// 				<td style="font-weight:bold;"> Keterangan  </td> 
                //                 <td> : </td>
                //                 <td> <p id="ketdtl"> </p> </td>
                //                 <td coslpan="3"> </td>
				// 			</tr> 
              
                 $("#notrdtl").html(result.no_transaksi);
                 $("#nama_jabatandtl").html(result.nama_jabatan);
                 $("#instansidtl").html(result.nama_instansi); 
                 $("#picdtl").html(result.pic); 
                 $("#tglkeluardtl").html(result.date_assign); 
                 $("#namapjdtl").html(result.nama); 
                 $("#nippjdtl").html(result.nip);
                 $("#ketdtl").html(result.keterangan); 
                 $("#katinsdtl").html(result.nama_kategori_instansi); 
			 	   
			 }
		 });
	 }
       

       
    // $('#daftar_barang').DataTable( {
    //     "ajax": "<?php echo base_url(); ?>barang/fetch_barang",
    //     "rowReorder": {
    //             "update": false
    //         },
    //     "destroy":true,
    // });

    //  var daftar_barang = $('#daftar_barang').DataTable();
     
    //     $('#daftar_barang tbody').on('click', 'tr', function () {
 
          
    //         var content = daftar_barang.row(this).data()
    //         console.log(content[5]+content[6]);
    //         alert(content[5]+content[6]);
    //         $("#nama_barang").val(content[2]);
    //         $("#id_barang").val(content[4]);
    //         $("#jkt").html(content[5])
    //         $("#sbg").html(content[6])
    //         $("#PilihBarangModal").modal('hide');
    //     } );

 
    function TableListDetail(no_transaksix=null){
   
      $.get("<?php echo base_url('pengeluaran_barang/datalist/'); ?>"+no_transaksix, function(data) {
          $("#datalist").html(data);
      });
    }
    function CalcWeight(no_transaksix){
      $.get("<?php echo base_url('pengeluaran_barang/calc_weight/'); ?>"+no_transaksix, function(data) {
          $("#total_berat").val(data);
      });
    }
 
     function TambahDataChild(){

        $("#defaultModalChild").modal({backdrop: 'static', keyboard: false,show:true});
        $("#defaultModalChildLabel").html("Form Tambah Order");  
        var no_transaksi = $("#no_transaksi").val();
        $("#no_transaksix").val(no_transaksi);

        $("#jkt").html('0');
        $("#sbg").html('0');
        $("#source").val('');
        $("#sbgbtn").attr('class','btn btn-default');
        $("#jktbtn").attr('class','btn btn-default'); 

        //TableListDetail(no_transaksi);

        $.get("<?php echo base_url('pengeluaran_barang/datalist/'); ?>"+no_transaksi, function(data) {
          console.log(data);
          //$("#datalist").html(data);
      });
     }

     function defaultModalChildClose(){
        $("#defaultModalChild").modal('hide'); 
     }
     function CloseModalDetail(){
        $("#defaultModalChild").modal('hide'); 
     }
        $("#addmodal").on("click",function(){
          $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
          $("#defaultModalLabel").html("Form Tambah Data");
            var no_transaksi = $("#no_transaksi").val();
         
        
          $.ajax({
          url:"<?php echo base_url('pengeluaran_barang/get_last_id'); ?>",
          type:"GET",
          data:{id:1},
          success:function(result){

            $("#no_transaksi").val(result);

            $.get("<?php echo base_url('pengeluaran_barang/datalist/'); ?>"+result, function(data) {
                //console.log(data); 
                $("#datalist").html(data);
            });
          
          } 
          }); 
          
        });

          

    function UploadBuktiBayar(no_transaksi){
        $("#no_transaksiy").val(no_transaksi);
        $("#UploadBuktiBayarModal").modal({backdrop: 'static', keyboard: false,show:true});
    }


    function CariProduk(){
        $("#CariProdukModal").modal({backdrop: 'static', keyboard: false,show:true});

        var no_transaksi = $("#no_transaksi").val();
        TableListDetail(no_transaksi);
        $('#tabel_produk').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "<?php echo base_url('pengeluaran_barang/produk_list'); ?>",
                "data":{no_transaksi},
                "type":"POST" ,
                "dataSrc" : '' 
            },
  
            "columns" : [{
                "data" : "nama_produk"
            },{
                "data" : "nama_bahan"
            },{
                "data" : "ukuran"
            },{
                "data" : "nama_satuan"
            },{
                "data" : "berat_bahan"
            },{
                "data" : "harga"
            },{
                "data" : "foto"
            },{
                "data" : "action"
            }],

            "rowReorder": {
                "update": false
            },

            "destroy":true,
        });
    
 
    } 
 
    function GetDataProduk(id){
        console.log(id);
        $.get("<?php echo base_url('pengeluaran_barang/get_data_produk/'); ?>"+id,function(result){
            console.log(result);
            var parse = JSON.parse(result);
            var nf = new Intl.NumberFormat();
            $("#id_pricelist").val(id);
            $("#harga_hidden").val(parse.harga);
            $("#berat_bahan_hidden").val(parse.berat_bahan);
            $("#nama_produk").val(parse.nama_produk+' - '+parse.nama_bahan+' - '+parse.ukuran+' - '+parse.nama_satuan+' - '+parse.berat_bahan+' Gram - Rp. '+nf.format(parse.harga));
            $("#barang").html("<a href='upload/"+parse.foto+"' data-fancybox data-type='image' class='btn btn-success'> <i class='material-icons'>aspect_ratio</i> Lihat Produk</a>");
            $("#CariProdukModal").modal('hide');
        });

    }

        
     function Bersihkan_Form(){
        $(':input').val('');  
     }
 

    function Bersihkan_Form_Order(){
        
        var no_transaksi = $("#no_transaksi").val();
        swal({
        title: "Anda yakin ingin membatalkan transaksi ini?",
        text: "ini akan membatalkan transaksi "+no_transaksi+" !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url('pengeluaran_barang/'); ?>hapus_no_transaksi",
                        data: {no_transaksi:$("#no_transaksi").val()},
                        success: function(data){
                        }
                    }
                ).done(function(data) {
                    swal("Transaksi Batal!", "Transaksi berhasil dibatalkan", "success");
                    $("#defaultModal").modal('hide');
                    $(':input').val('');  
                    }); 
            }else{
            swal("Lanjut", "Transaksi tetap dilanjutkan", "success");
          }
        });
      
       
    }
  

     function HapusDetailList(id,no_transaksi){
        swal({
        title: "Anda yakin ingin menghapus item ini?",
        text: "ini akan menghapus item dari daftar anda !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax(
                    {
                      type: "POST",
                      url: "<?php echo base_url('pengeluaran_barang/'); ?>hapus_data_detail",
                      data: {id:id,no_transaksi:no_transaksi},
                      success: function(data){
                      }
                    }
                ).done(function(data) {
                    swal("Item Dihapus!", "Item berhasil dihapus", "success");
                    TableListDetail(no_transaksi);
                   // CalcWeight(no_transaksi);
                    //$('#example').DataTable().ajax.reload(); 
                    //$("#defaultModal").modal('hide'); 
                    //$(':input').val('');  
                    }); 
            }else{
            swal("Batal", "Data Tidak Dihapus!", "info");
          }
        });  

     }

     function Hapus_Data(no_transaksi){  
        swal({
        title: "Anda yakin ingin menghapus transaksi ini?",
        text: "ini akan menghapus transaksi "+no_transaksi+" !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url('pengeluaran_barang/'); ?>hapus_data",
                        data: {no_transaksi:no_transaksi},
                        success: function(data){
                        }
                    }
                ).done(function(data) {
                    swal("Transaksi Dihapus!", "Transaksi berhasil dibatalkan", "success"); 
                    $('#example').DataTable().ajax.reload(); 
                    $("#defaultModal").modal('hide'); 
                    $(':input').val('');  
                    }); 
            }else{
            swal("Batal", "Data Tidak Dihapus!", "info");
          }
        }); 
 
    }
    
      
    function Simpan_Data(){

        var no_transaksi = $("#no_transaksi").val();
        var formData = new FormData($('#user_form')[0]);  
        swal({
        title: "Anda yakin ingin mengkonfirmasi pengeluaran barang ini?",
        text: "ini akan menyimpan transaksi dengan nomor transaksi "+no_transaksi+" !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url:"<?php echo base_url(); ?>pengeluaran_barang/simpan_summary",
                      type:"POST",
                      data:formData, 
                      contentType:false,  
                      processData:false,   
                       success:function(result){
                        console.log(result);
                       }
                });
               $("#defaultModal").modal('hide');

                //window.open('<?php echo base_url('invoice/print_invoice/'); ?>'+window.btoa(no_transaksi), 'print_invoice', 'width=1366, height=768, status=1,scrollbar=yes'); 

               $(':input').val('');  
               swal("Lanjut", "Transaksi selesai", "success");
               $('#example').DataTable().ajax.reload(); 
            }else{
            swal("Lanjut", "Transaksi tetap dilanjutkan", "success");
          }
        });
    }

    function Simpan_Data_Detail(){ 
      
        var no_transaksix = $("#no_transaksix").val(); 
        var formData = new FormData($('#user_form_detail')[0]);  
       

            $.ajax({
             url:"<?php echo base_url(); ?>pengeluaran_barang/simpan_data_detail",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                TableListDetail(no_transaksix);
               // CalcWeight(no_transaksix);
                 $("#defaultModalChild").modal('hide');
                 //$("#example_list").DataTable.reload();
                 $('#user_form_detail')[0].reset();
                 
                 //ReloadListTableDetail(no_transaksix);
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
 
    function Simpan_Data_BB(){
        //setting semua data dalam form dijadikan 1 variabel 

          

        var formData = new FormData($('#bukti_bayar_form')[0]);  
        //var nama_pengeluaran_barang = $("#nama_pengeluaran_barang").val(); 
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>pengeluaran_barang/simpan_data_bb",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#UploadBuktiBayarModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#bukti_bayar_form')[0].reset();
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

      
      $("#slideongkir").slideUp(); 
      $('#example').DataTable({
        "ajax": "<?php echo base_url(); ?>pengeluaran_barang/fetch_pengeluaran_barang_list" 
      }); 
 
      });
  
        
         
    </script>