<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_pelamar.xls");
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
        <th>NIK</th>
        <th>Nama Siswa</th>
        <th>Jns Kel.</th>
        <th>Thn Lulus</th>
        <th>Nama Industri</th>
        <th>Judul Loker</th>
        <th>Status</th>
      </tr>
      <?php $no=1;
      error_reporting(0);
      foreach ($pelamar as $baris):
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $baris->nik; ?></td>
          <td><?php echo strtoupper($baris->nama_siswa); ?></td>
          <td align=center><?php echo $baris->jk; ?></td>
          <td align=center><?php echo $baris->tahun_keluar; ?></td>
          <td><?php echo $baris->nama_industri; ?></td>
          <td><?php echo $baris->judul; ?></td>
          <td><?php 
					switch($baris->status){
						case 1:echo "Diproses";break;
						case 2:echo "Diterima";break;
						case 3:echo "Ditolak";break;
					}
          ?></td>
        </tr>
      <?php
      endforeach; ?>
    </table>

  </body>
</html>
