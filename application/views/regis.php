<?php $this->load->view( 'carousel' ); ?>

<?php
$nisn 		= empty($siswa) ? null : $siswa->nisn;
$nama		= empty($siswa) ? null : $siswa->nama;
$jk			= empty($siswa) ? null : $siswa->jk;
$tahun_keluar			= empty($siswa) ? null : $siswa->tahun_keluar;
$status			= empty($siswa) ? null : $siswa->status;
$id_jurusan     = empty($siswa) ? null : $siswa->id_jurusan;
$alamat     = empty($siswa) ? null : $siswa->alamat;
$nohp     = empty($siswa) ? null : $siswa->nohp;
$perusahaan     = empty($siswa) ? null : $siswa->perusahaan;
$pendidikan     = empty($siswa) ? null : $siswa->pendidikan;
$perguruan_tinggi     = empty($siswa) ? null : $siswa->perguruan_tinggi;
$fakultas     = empty($siswa) ? null : $siswa->fakultas;
$foto		= empty($siswa) ? null : $siswa->foto;
?>


<div class="col-sm-9">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title" style="font-weight:600"><?php echo $title; ?></h3>
        </div>
        <div class="box-body">

            <form id="signupform" class="form-horizontal" action="<?php echo site_url('regis/formulir_save'); ?>" method="post" id="fform">
                
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpana</button>
                        <a href="<?php echo site_url('beranda');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
                    </div>
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">NIK
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik" required>
                                <div id="msg"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">NISN
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="NISN" name="nisn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Contoh : Achmad Khoirul Zulfikar" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">Asal SMK / SLTA
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Contoh : SMK Negeri 1 Singosari" name="sekolah_asal" required>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Program Keahlian/Jurusan
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                                <select class="form-control" name="id_jurusan" data-bv-trigger="blur">
                                        <option value="">- pilih Jurusan -</option>
                                        <?php 
                                                foreach($data_jurusan as $row):
                                                    if($row->id_jurusan == $id_jurusan) {
                                                        echo '<option value="'.$row->id_jurusan.'" selected="selected">'.$row->nama_jurusan.'</option>';
                                                    } 
                                                    else {
                                                        echo '<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>';
                                                    }
                                                endforeach; 
                                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tahun Lulus SMK/SLTA
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                                <select class="form-control" name="tahun_keluar" data-bv-trigger="blur" id="cboprov">
                                    <option value="">- pilih Tahun -</option>
                                        <?php 
                                                for($i=date('Y')-10;$i<=date('Y');$i++){
                                                    if($i == $tahun_keluar) {
                                                        echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                                                    } 
                                                    else {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                }
                                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tempat Lahir
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Contoh : Malang" name="tempat_lahir" required>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Lahir</label>									
					        <div class="col-md-8">
                                <input class="form-control" type="date" name="tgl_lahir" data-bv-trigger="blur">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Agama
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                                <select class="form-control" name="agama" data-bv-trigger="blur">
                                    <option value="">- Pilih Agama -</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katholik">Katholik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jk" value="L" <?php if($jk=='L'){echo "checked";} ?> checked>
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jk" value="P" <?php if($jk=='P'){echo "checked";} ?>>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Alamat Lengkap
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                            <textarea class="form-control" name="alamat"  data-bv-trigger="blur" rows=5><?=$alamat;?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No HP/WA
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nohp" value="<?php echo $nohp ?>" data-bv-trigger="blur">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No HP (Alternatif)
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nohp_alt" value="<?php echo $nohp ?>" data-bv-trigger="blur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">Alamat Email
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Contoh : achmadkhoirul@gmail.com" name="email" required>
                            </div>
                        </div> 

                        <!-- Pernyataan  -->
                        <hr>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">PERNYATAAN
                                <text class="text-danger"><b>*</b></text>
                            </label>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label">Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar/palsu, saya bersedia <b class="text-danger">MENERIMA SANKSI DI DEPAN HUKUM</b></label>
                                </div>
                            </div>
                        </div>
                        

                    </div><!-- /.box-body -->
                </div><!-- /.box-primary -->

                <div class="card-body">
                    <div class="callout callout-warning">
                        <h3>Info</h3>
                        <p>Setelah berhasil daftar, anda akan langsung diarahkan ke halaman Login, 
                            silahkan gunakan user & password NIK anda, untuk melengkapi biodata</p>
                    </div>
                </div><!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-info"><i class="glyphicon glyphicon-hdd"></i> <b>SIMPAN DATA REGISTRASI</b></button>
                </div><!-- /.card-footer -->
            </form>	

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>		
<?php $this->load->view( 'info' ); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#nik").on("input", function(e) {
			$('#msg').hide();
			if ($('#nik').val() == null || $('#nik').val() == "") {
				$('#msg').show();
				$("#msg").html("NIK is required field.").css("color", "red");
			} else {
				$.ajax({
					type: "POST",
					url: "http://localhost/AplikasiBKK/index.php/UsernameCheck/get_username_availability",
					data: $('#signupform').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>