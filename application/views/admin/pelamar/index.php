<?php
$cari 		= empty($cari) ? null : $cari;
?>
<div class="box box-primary">
	<div class="box-header with-border">
		<?=form_open('admin/pelamar/cari_loker', array('role'=>'form', 'class'=>'inline'))?>
			<div class="form-group">								
				<div class="col-sm-11">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Lowongan Kerja" value="<?php echo $cari ?>" data-bv-trigger="blur">
                </div>
            </div>
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="glyphicon glyphicon-search"></i> Cari
			</button>
		<?=form_close()?>
	</div>
  	<div class="box-body">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fdatatables">
			<?php 
			if($this->session->flashdata('alert')==null){						
			}else if($this->session->flashdata('alert')==1){
				echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
			}else if($this->session->flashdata('alert')!=1){
				echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
			}?>
            <?php $i=1; foreach ($loker as $row) :?>
                <tr>
					<div class="box box-success box-solid">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo strtoupper($row->judul);?></h3>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-sm-9">
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
								<p>
									<?php echo $row->deskripsi;?>
								</p>
							</div>
							<div class="col-sm-3">
								<center>
									<b>Pelamar</b></br></br>
									<!-- <a href="<?php echo site_url('admin/pelamar/kelola_pelamar/'.$row->id_loker);?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Pelamar</a> -->
									<?php
									$datas = $this->posisi_model->GetPosisi($row->id_loker);
									foreach ($datas as $value){
										//echo $value->id_posisi;
										$total=$this->posisi_model->HitungPelamarPosisi($row->id_loker,$value->id_posisi);
										//echo $total;
										?>
										<?=form_open('admin/pelamar/kelola_pelamar2', array('role'=>'form', 'class'=>'inline'))?>
											<input type="hidden" name="id_loker" value="<?=$row->id_loker?>">
											<input type="hidden" name="id_posisi" value="<?=$value->id_posisi?>">
											<button type="submit" name="edit_pelamar" class="btn btn-block btn-info btn-flat" data-placement='top' title="Daftar Lowongan <?php echo $value->posisi ?>" >
												<i class="glyphicon glyphicon-plus-sign"></i> <?php echo '[<b>'.$total.'</b>] '.$value->posisi ?>
											</button>
										<?=form_close()?>
										<?php
									}
									?>
								</center>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
</div>