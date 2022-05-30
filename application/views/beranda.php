<?php $this->load->view( 'carousel' ); ?>

<div class="col-sm-9">
	<?php
		echo $this->session->flashdata('success'); 	
	?>
	<!-- info loker -->
	<div class="box box-info box-solid">			
		<div class="box-header with-border">
			<h2 class="box-title" style="font-weight:500;font-size:21px">Lowongan Kerja</h2>
			<!-- /.box-tools -->
		</div>	
		<div class="box-body">
			<?php $i=1; foreach ($loker as $row) :?>
            	<tr>	
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo ucwords($row->judul);?></h3>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-sm-10">
								<b><?php echo strtoupper($row->nama).' | Tanggal '.tgl_indo($row->tgl_buka).' s/d '.tgl_indo($row->tgl_tutup); ?></br></br></b>
								<?php
								if (! empty($row->posisi)){
									?>
									<b>POSISI :</b><br>
									<?php
										$datapos = explode("," , $row->posisi);
										for($x=0;$x<count($datapos);$x++){
											echo ($x+1).'. '.$datapos[$x]."<br/>";
										}
										echo "<br><p>";
								}?>
								<?php echo $row->deskripsi;?>
								</p>
							</div>		
						</div> <!-- /.box-body -->
					</div> <!-- /.box -->
				</tr>
            <?php $i++; endforeach; ?>		
		</div>
	</div><!-- end info loker -->
	
	<!-- info jadwal -->
	<div class="box box-warning box-solid">
		<div class="box-header with-border">
			<h3 class="box-title" style="font-weight:500;font-size:21px">Info Jadwal Test</h3>
			<!-- /.box-tools -->
		</div>	
		<div class="box-body">					
			<?php $i=1; foreach ($jadwal as $row) :?>
                <tr>
					<div class="box box-danger box-solid">
						<div class="box-header with-border">
							<h3 class="box-title" style="font-weight:500;font-size:18px"><?php echo ucwords($row->judul);?></h3>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-sm-10">
								<b><?php echo strtoupper($row->nama).' | Tanggal '.tgl_indo($row->tgl_mulai).' s/d '.tgl_indo($row->tgl_selesai); ?></br></br></b>
								<p>Akan dilaksanakan di
								<?php echo $row->lokasi_alamat;?>
								</p>
							</div>
						</div> <!-- /.box-body -->
					</div> <!-- /.box -->
				</tr>
            <?php $i++; endforeach; ?>		
		</div>
	</div> <!-- end info jadwal -->
</div>
<?php $this->load->view( 'info' ); ?>