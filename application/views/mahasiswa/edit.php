<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Mahasiswa</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
     
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/tree.css" rel="stylesheet">
   <!--  <link href="<?php echo base_url(); ?>assets/css/orgchart.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
  
  <link href="<?php echo base_url(); ?>assets/css/card_custom.css" rel="stylesheet" />
    
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

      
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/dataTables.rowsGroup.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> 

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
   
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script> 
  
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
  
  
  
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <?php echo form_open('mahasiswa/update/'.$id); ?>
                <?php echo form_label('Nama','nama'); ?>
                <?php echo form_error('nama'); ?>
                <?php
                    $nama = array(
                                      'type' => 'text',
                                      'name' => 'nama',
                                      'value' => set_value('nama', $nama),
                                      'id' => 'nama',
                                      'class' => 'form-control',
                                      'placeholder' => 'Nama Mahasiswa',
                                      'required' => 'required',
                                      'autofocus' => 'autofocus'
                    );
                 echo form_input($nama); ?>

                 <br><br>

                <?php echo form_label('Jurusan', 'id_jurusan'); ?>
                <?php echo form_error('id_jurusan'); ?>
                <select name="id_jurusan" id="jurusan" class="form-control" onchange="getProdi(this.value)" required>
                  <option value="">Silahkan Pilih</option>
                  <?php foreach ($dd_jurusan as $row): ?>
                    <option value="<?php echo $row->id; ?>"
                      <?php if ($row->id == $id_jurusan): ?>
                        selected="selected"
                      <?php endif; ?>>
                      <?php echo $row->nama_jurusan; ?>
                    </option>
                  <?php endforeach; ?>
                </select>

                <br><br>

                <?php echo form_label('Prodi', 'id_prodi'); ?>
                <?php echo form_error('id_prodi'); ?>
                <select name="id_prodi" id="prodi" class="form-control" required>
                  <option value="">Silahkan Pilih</option>
                  <?php foreach ($dd_prodi as $row): ?>
                    <option value="<?php echo $row->id; ?>"
                      <?php if ($row->id == $id_prodi): ?>
                        selected="selected"
                      <?php endif; ?>>
                      <?php echo $row->nama_prodi; ?>
                    </option>
                  <?php endforeach; ?>
                </select>

                <br><br>

                <?php echo form_hidden('id', $id); ?>

                <?php echo anchor(site_url('mahasiswa'), 'Kembali', 'class="btn btn-default"'); ?>
                <?php echo form_submit('submit', 'Ubah', 'class="btn btn-warning"'); ?>

          <?php echo form_close(); ?><!-- /.form end -->
        </div>
      </div>
    </div>
     
    <script>
    /* Ajax Dropdown Jurusan Prodi */
    function getProdi(value) {
      console.log(value);
      var row = value;
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('mahasiswa/get_prodi');?>",
        data: {row},
        success: function(data) {
          $("#prodi").html(data);
          console.log(data);
        },

        error:function(XMLHttpRequest){
          alert(XMLHttpRequest.responseText);
        }
      });
    };
    </script>
  </body>
</html>
