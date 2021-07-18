<!DOCTYPE html>
<html>
<head>
  <title>Invoice</title>
  <style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
      }

      .table > tbody > tr > .no-line {
          border-top: none;
      }

      .table > thead > tr > .no-line {
          border-bottom: none;
      }

      .table > tbody > tr > .thick-line {
          border-top: 2px solid;
      }
  </style>
</head>
<body>
<img src="<?php echo base_url('assets/images/mgp.jpeg'); ?>" style="width: 1000%; height: 500%; ">
 
<div class="container">
    <div class="row">
       
    
</div>
 

<table border="1" cellpadding="3" cellspacing="0"> 

      <?php
      foreach($listing as $k => $v){

      
      ?>
      <tr> 
        <td colspan="3"> <h3 align="center"> SLIP GAJI 201801 </h3>  
        <p align="center"> CV.Primaguna Hatta Asri  </p>  </td> 
      </tr>
      <tr> 
        <td> Tanggal Generate </td>
        <td> : </td>
        <td> <?php echo $info->date_generate; ?> </td>
      </tr>
      <tr> 
        <td> Tanggal Cetak </td>
        <td> : </td>
        <td> <?php echo date('Y-m-d H:i:s'); ?> </td>
      </tr>
      <tr>
      <td colspan="3">  
      <h3 align="center"> Rincian Perhitungan Gaji </h3>
      </td>
      </tr>
      <tr> 
        <td> NIP </td>
        <td> : </td>
        <td> <?php echo $v->nip; ?></td>
      </tr>
      <tr> 
        <td> Nama </td>
        <td> : </td>
        <td> <?php echo $v->nama; ?></td>
      </tr>
      <tr> 
        <td> Telp </td>
        <td> : </td>
        <td> <?php echo $v->telp; ?></td>
      </tr>
      <tr> 
        <td> Email </td>
        <td> : </td>
        <td> <?php echo $v->email; ?></td>
      </tr>
      <tr> 
        <td> Alamat </td>
        <td> : </td>
        <td> <?php echo $v->alamat; ?></td>
      </tr>
      <tr> 
        <td> Jabatan </td>
        <td> : </td>
        <td> <?php echo $v->nama_jabatan; ?></td>
      </tr>
      <tr> 
        <td> Status </td>
        <td> : </td>
        <td> <?php echo $v->nama_status; ?></td>
      </tr> 
      <tr> 
        <td> Gapok </td>
        <td> : </td>
        <td> <?php echo "Rp. ". number_format($v->gapok); ?></td>
      </tr>
      <tr> 
        <td> Tunjangan </td>
        <td> : </td>
        <td> <?php echo "Rp. ". number_format($v->tunjangan); ?></td>
      </tr>
      <tr> 
        <td> Total Gaji </td>
        <td> : </td>
        <td> <?php echo  "Rp. ". number_format((($v->gapok) + ($v->tunjangan))); ?></td>
      </tr>
      <tr> 
        <td> Potongan PPH21 (3%) </td>
        <td> : </td>
        <td> <?php echo  "Rp. ". number_format( ((($v->gapok) + ($v->tunjangan)) * 3) / 100 ); ?> </td>
      </tr>
      <tr> 
        <td> Gaji Bersih </td>
        <td> : </td>
        <td> <?php echo  "Rp. ". number_format( (($v->gapok) + ($v->tunjangan)) - ((($v->gapok) + ($v->tunjangan)) * 3) / 100 ); ?> </td>
      </tr>
      <tr>
      <td colspan="3"> 
      <b><i>TERBILANG : </i></b>
      <p> <?php echo ucwords(kekata((($v->gapok) + ($v->tunjangan)) - ((($v->gapok) + ($v->tunjangan)) * 3) / 100)." rupiah"); ?> </p>
      </td>
      </tr>
      <tr>
        <td colspan="3">
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>

          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>

          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>

          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>

          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>
          &nbsp; <br>

         
           
        </td>
      </tr>
      <?php
      }
    ?>

</table>
              
                 

 
   
</body>
</html>