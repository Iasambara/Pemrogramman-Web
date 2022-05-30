<!DOCTYPE html>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>

<?php $this->load->view( 'tpl_header' ); ?>

  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
	  
	  <section class="content container-fluid fcontent">
				<?php $this->load->view( $file ); ?>
	  </section>
	  

      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view( 'tpl_footer' ); ?>
  
  
  
