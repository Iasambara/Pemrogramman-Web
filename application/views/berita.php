<?php //$this->load->view( 'carousel' ); ?>

<div class="col-md-12">
	<?php
//		echo $this->session->flashdata('success'); 	
	?>
<!-- berita -->
	<div class="box box-default" style="padding:8px">			
         <div class="box-header with-border" style="border-bottom: 3px solid #337ab7;margin-bottom:8px;padding-top:8px;padding-bottom:10px">
            <h3 class="box-title"><b><?php echo $title; ?></b></h3>
         </div>
		<div class="box-body">
			<?php $i=1; foreach ($berita as $row) :?>
            	<tr>	
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo ucwords($row->judul_kat);?></h3>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12">
								<b><?php echo 'Published: '.tgl_indo(substr($row->tgl_kat,0,10)).' '.substr($row->tgl_kat,11,5); ?></br></br></b>
								
								<?php 
								if ($row->foto_kat!="") {
								    echo '<p><a href="/assets/images/info/'.$row->foto_kat.'" target="_blank"><img src=/assets/images/info/'.$row->foto_kat.' class="img-responsive" 
								    style="width:400px;margin-bottom:20px;" alt="'.$row->judul_kat.'" /></a></p>';
								    
								}
								echo $row->ket_kat;
								?>
								</p>
							</div>		
						</div> <!-- /.box-body -->
					</div> <!-- /.box -->
				</tr>
            <?php $i++; endforeach; ?>		
		</div>
	</div><!-- end info berita -->

</div>
<?php
// $this->load->view( 'info' ); 
?>