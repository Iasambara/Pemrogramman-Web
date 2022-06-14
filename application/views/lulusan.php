<div class="col-md-12">
	<div class="box box-default" style="padding: 12px"> 
	<?php
//		echo $this->session->flashdata('success'); 	
	?>
<!-- berita -->
<div class="box-header with-border" style="border-bottom:3px solid #337ab7; margin-bottom: 8px; padding-bottom: 10px; padding-top: 8px">
		<h3 class="box-title"><b><?php echo $title; ?></b></h3>
</div>
<div class="box-body">
	<table class="table table-bordered table-striped" id="example">
	<tr>
		<th>No.</th><th>Nama</th><th>Tempat,tgl. Lahir</th><th>Alamat</th>
		<th>Nama Fakultas</th>
	</tr>

		<div class="box-body">
			<?php $nomor=1; foreach ($lulusan as $row) :?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row->nama;?></td>
					<td><?php echo $row->tempat_lahir.", ".tgl_indo($row->tgl_lahir);?></td>
					<td><?php echo $row->alamat;?></td>
					<td><?php echo $row->nama_fakultasy;?></td>
				</tr>
				<?php $nomor++; endforeach;  ?>
	</table>
</div>
</div>
</div>
<?php
// $this->load->view( 'info' ); 
?>