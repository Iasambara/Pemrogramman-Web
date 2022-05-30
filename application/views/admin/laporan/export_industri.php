<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=mitra_industri.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="assets/images/favicon.png"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 4px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
    </style>
  </head>
  <body>
<h2><?php echo $title;?></h2>
   <table width="100%" border="1">
      <tr>
        <th>No.</th>
        <th>Nama Industri</th>
        <th>Bidang</th>
        <th>Alamat</th>
        <th>Kab./Kota</th>
        <th>No. Telp.</th>
        <th>Email</th>
      </tr>
      <?php $no=1;
      error_reporting(0);
      foreach ($industri as $baris):
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $baris->nama; ?></td>
          <td><?php echo ucwords($baris->nama_bidang); ?></td>
          <td><?php echo $baris->alamat; ?></td>
          <td><?php echo $baris->nama_kabkot; ?></td>
          <td><?php 
          if (substr($baris->notlp,0,1)=="0")
            echo str_replace("0","+62",substr($baris->notlp,0,1)).substr($baris->notlp,1); 
          else echo $baris->notlp;
          ?></td>
          <td><?php echo strtolower($baris->email); ?></td>
        </tr>
      <?php
      endforeach; ?>
    </table>

  </body>
</html>
