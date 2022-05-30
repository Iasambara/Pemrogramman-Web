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


<div class="col-sm-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title" style="font-weight:600"><?php echo $title; ?></h3>
        </div>
        <div class="box-body">

			<form class="form-horizontal" action="" method="post" id="signupform" enctype="multipart/form-data">
                
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                        <a href="<?php echo site_url('beranda');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
                    </div>
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">NIK
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-9">
								<input class="form-control" type="text" name="username" id="username" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="NIK (16 Digit)" autocomplete="off" required/>
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
                            <label for="inputEmail3" class="col-sm-3 control-label">Nama Alumni
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Contoh : Achmad Khoirul Zulfikar" name="nama" required>
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
                            <label for="inputEmail3" class="col-sm-3 control-label">Tahun Keluar
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
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Jurusan
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
							<label for="inputEmail3" class="col-sm-3 control-label">Status
                                <text class="text-danger"><b>*</b></text>
                            </label>									
							<div class="col-md-8">
								<select class="form-control" name="status" data-bv-trigger="blur">
									<option value="">- pilih status -</option>
									<option value="1" <?php if($status=='1'){echo "selected=selected";} ?>>Belum Bekerja</option>
									<option value="2" <?php if($status=='2'){echo "selected=selected";} ?>>Bekerja</option>
									<option value="3" <?php if($status=='3'){echo "selected=selected";} ?>>Kuliah</option>
									<option value="4" <?php if($status=='4'){echo "selected=selected";} ?>>Berwirausaha</option>
								</select>
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
							<label for="inputEmail3" class="col-sm-3 control-label">Perusahaan Tempat Kerja</label>									
							<div class="col-md-8">
								<input class="form-control" type="text" name="perusahaan" value="<?php echo $perusahaan ?>" data-bv-trigger="blur">
							</div>
						</div>	
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Pendidikan Terakhir</label>									
							<div class="col-md-8">
								<select class="form-control" name="pendidikan" data-bv-trigger="blur">
									<option value="">- pilih pendidikan -</option>
									<option value="1" <?php if($pendidikan=='1'){echo "selected=selected";} ?>>SMK</option>
									<option value="2" <?php if($pendidikan=='2'){echo "selected=selected";} ?>>D1</option>
									<option value="3" <?php if($pendidikan=='3'){echo "selected=selected";} ?>>D3</option>
									<option value="4" <?php if($pendidikan=='4'){echo "selected=selected";} ?>>S1</option>
									<option value="5" <?php if($pendidikan=='5'){echo "selected=selected";} ?>>S2</option>
									<option value="6" <?php if($pendidikan=='6'){echo "selected=selected";} ?>>S3</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Perguruan Tinggi</label>									
							<div class="col-md-8">
								<input class="form-control" type="text" name="perguruan_tinggi" value="<?php echo $perguruan_tinggi ?>" data-bv-trigger="blur">
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Fakultas</label>									
							<div class="col-md-8">
								<input class="form-control" type="text" name="fakultas" value="<?php echo $fakultas ?>" data-bv-trigger="blur">
							</div>
						</div>
                                              
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No HP (Alternatif)</label>									
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

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Foto</label>									
                            <div class="col-md-8">
                                <input class="form-control" type="file" name="foto" value="<?php echo $foto ?>" data-bv-trigger="blur" id="image-source" onchange="previewImage();">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Preview Foto</label>									
                            <div class="col-md-8">
                                <?php if(!empty($foto)){?>
                                    <img id="image-preview" style="width:150px;height:160px;" src="<?php echo base_url();?>assets\images\alumni\<?=$foto?>" class="user-image" alt="image preview">
                                <?php }else{ ?>
                                    <img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:150px;height:160px;" alt="image preview" />
                                <?php } ?>
                                
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
                    <button type="submit" class="btn btn-block btn-info btn-lg"><i class="glyphicon glyphicon-hdd"></i> <b>SIMPAN DATA ALUMNI</b></button>
                </div><!-- /.card-footer -->
            </form>	

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>		
<?php // $this->load->view( 'info' ); ?>

<script type="text/javascript">
	function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#username").on("input", function(e) {
			$('#msg').hide();
			if ($('#username').val() == null || $('#username').val() == "") {
				$('#msg').show();
				$("#msg").html("NIK Wajib diisi").css("color", "red");
				$('#add_data').attr('disabled', 'disabled');
				$('#add_data1').attr('disabled', 'disabled');
			} else {
				$.ajax({
					type: "POST",
					url: "http://bkk.edunusa.web.id/index.php/UsernameCheck/get_username_availability",
					data: $('#signupform').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
						
							$('#add_data').removeAttr('disabled');
							$('#add_data1').removeAttr('disabled');
						
						
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
<script type="text/javascript">
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
</script>