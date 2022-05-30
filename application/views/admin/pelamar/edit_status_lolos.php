<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$nik 		= empty($siswa) ? null : $siswa->nik;
$nama		= empty($siswa) ? null : $siswa->nama;
$jk			= empty($siswa) ? null : $siswa->jk;
$tahun_keluar			= empty($siswa) ? null : $siswa->tahun_keluar;
$id_jurusan     = empty($siswa) ? null : $siswa->id_jurusan;
$alamat     = empty($siswa) ? null : $siswa->alamat;
$nohp     = empty($siswa) ? null : $siswa->nohp;
$perusahaan     = empty($siswa) ? null : $siswa->perusahaan;
$pendidikan     = empty($siswa) ? null : $siswa->pendidikan;
$perguruan_tinggi     = empty($siswa) ? null : $siswa->perguruan_tinggi;
$fakultas     = empty($siswa) ? null : $siswa->fakultas;
$foto		= empty($siswa) ? null : $siswa->foto;
$id_loker		= empty($id_loker) ? null : $id_loker;
$id_pelamar		= empty($id_pelamar) ? null : $id_pelamar;
$nama_pendidikan		= empty($nama_pendidikan) ? null : $nama_pendidikan;
$nama_jurusan		= empty($nama_jurusan) ? null : $nama_jurusan;
$status			= empty($status) ? null : $status;
$tgl_diterima	= empty($status) ? null : $tgl_diterima;
?>

<form class="form-horizontal" action="" method="post" id="fform" enctype="multipart/form-data">
	<div class="box box-primary">
		<div class="box-header with-border">
			<button type="submit" name="simpan_pelamar" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
            <a href="<?php echo site_url('admin/pelamar');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
		</div>
  		
		<div class="box-body">
			<table class="table table-striped table-sm">
                <tbody>
                    <tr>
                        <td width="180" style="font-weight:bold;">NIK</td>
                        <td width="20">:</td>
                        <td><?php echo $nik; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nama</td>
                        <td>:</td>
                        <td><?php echo $nama; ?></td>
                    </tr>
					<tr>
                        <td style="font-weight:bold;">Jurusan</td>
                        <td>:</td>
                        <td><?php 
							foreach($data_jurusan as $row):
								if($row->id_jurusan == $id_jurusan) {
									$nama_jurusan=$row->nama_jurusan;
								} 
							endforeach;
							echo $nama_jurusan; ?>
						</td>
                    </tr>
					<tr>
                        <td style="font-weight:bold;">No HP.</td>
                        <td>:</td>
                        <td><?php echo $nohp; ?></td>
                    </tr>
					<tr>
                        <td style="font-weight:bold;">Pendidikan Terakhir</td>
                        <td>:</td>
                        <td><?php 
							switch ($pendidikan){
								case 1: $nama_pendidikan='SMK';break;
								case 2: $nama_pendidikan='D1';break;
								case 3: $nama_pendidikan='D3';break;
								case 4: $nama_pendidikan='S1';break;
								case 5: $nama_pendidikan='S2';break;
								case 6: $nama_pendidikan='S3';break;
							}
							echo $nama_pendidikan; 
							?>
						</td>
                    </tr>
					<tr>
                        <td style="font-weight:bold;">Preview Foto</td>
                        <td>:</td>
                        <td>
							<?php if(!empty($foto)){?>
								<img id="image-preview" style="width:150px;height:160px;" src="<?php echo base_url();?>assets\images\alumni\<?=$foto?>" class="user-image" alt="image preview">
							<?php }else{ ?>
								<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:150px;height:160px;" alt="image preview" />
							<?php } ?>
						</td>
                    </tr>
					<tr>
						<td style="font-weight:bold;">Status</td>
                        <td>:</td>
                        <td>
							<select class="form-control" name="status" data-bv-trigger="blur">
								<option value="4" selected>Lolos administrasi (diundang tes)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;">Pilih Jadwal Tes (*)</td>
                        <td>:</td>
                        <td>
							<select class="form-control" name="id_jadwal" data-bv-trigger="blur" >
                            	<option value="">- pilih Jadwal -</option>
                            	<?php 
								foreach($data_jadwal as $rows):
									if($rows->id_jadwal == $id_jadwal) {
										echo '<option value="'.$rows->id_jadwal.'" selected="selected">'.$rows->judul.' ('.$rows->waktu.')</option>';
									} else {
										echo '<option value="'.$rows->id_jadwal.'">'.$rows->judul.' ('.$rows->waktu.')</option>';
									}
								endforeach; 
								?>
                        	</select>
						</td>
					</tr>
				</tbody>
			</table>
							
			<input class="form-control" type="hidden" name="id_loker" value="<?php echo $id_loker ?>">
			<input class="form-control" type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
			<input class="form-control" type="hidden" name="proses" value="true">
		</div>
	</div>
</form>			

<script type="text/javascript">
$(document).ready(function() {  // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nisn: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},					
					},
				},
			
			dokumen: {
					validators: {
						notEmpty: {
                            message: 'Data Harus Diisi'
                        },
					},
				},
 
        }
    });

    // Validate the form manually
});
</script>				
