<?php
$cari 		= empty($cari) ? null : $cari;
?>
<div class="box box-primary">
	<div class="box-header with-border">
		<?=form_open('admin/pelamar/loker_pribadi_cari', array('role'=>'form', 'class'=>'inline'))?>
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
								<p>
								<?php echo $row->deskripsi;?>
								</p>
							</div>
							
							<div class="col-sm-2">
								<center>
									<b>Daftar</b></br></br>
									<?php if($row->tgl_tutup < date('Y-m-d')) {
										//echo date('Y-m-d');
										?>
										<button type="button" class="btn btn-block btn-danger disabled">Sudah Tutup</button>
										<?php
									} else {
										//echo "NOT OK";
										//$data['lkr'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where i.nama like '%".$cari."%' or l.judul like '%".$cari."%' ")->result();
										$datas = $this->posisi_model->GetPosisi($row->id_loker);
										foreach ($datas as $value){
											//echo $value->id_posisi;
											?>
											<?=form_open('admin/pelamar/loker_pribadi_add2', array('role'=>'form', 'class'=>'inline'))?>
												<input type="hidden" name="id_loker" value="<?=$row->id_loker?>">
												<input type="hidden" name="id_posisi" value="<?=$value->id_posisi?>">
												<button type="submit" name="edit_pelamar" class="btn btn-block btn-info btn-flat" data-placement='top' title="Daftar Lowongan <?php echo $value->posisi ?>" >
													<i class="glyphicon glyphicon-plus-sign"></i> <?php echo $value->posisi ?>
												</button>
											<?=form_close()?>
											<?php
										}
										
									}?>
								</center>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</tr>
            <?php $i++; endforeach; ?>
    	</table>
    </div>
</div>