<?php $this->load->view( 'carousel' ); ?>

<div class="col-sm-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title" style="font-weight:600"><?php echo $title; ?></h3>
        </div>
		<div class="box-body">
			<?php
                echo $this->session->flashdata('message');
            ?>
			<form id="signupform" class="form-horizontal" action="<?php echo site_url('regis/formulir_save'); ?>" method="post">
				<div class="box box-primary">
                    <div class="box-header with-border">
                        <button type="submit" id="add_data" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
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
                            <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Contoh : Achmad Khoirul Zulfikar" name="nama" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No HP/WA
                                <text class="text-danger"><b>*</b></text>
                            </label>									
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="nohp" onkeypress="return hanyaAngka(this);" placeholder="Contoh : 0811233416" data-bv-trigger="blur" required>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 control-label">Alamat Email
                                <text class="text-danger"><b>*</b></text>
                            </label>	
                            <div class="col-md-9">
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

					</div>
				</div>
				<div class="card-body">
                    <div class="callout callout-warning">
                        <h3>Info</h3>
                        <p>Setelah berhasil daftar, akan langsung diarahkan ke halaman Login, 
                            silahkan gunakan user & password NIK, untuk melengkapi biodata anda.</p>
                    </div>
                </div><!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" id="add_data1" class="btn btn-block btn-info btn-lg"><i class="glyphicon glyphicon-hdd"></i> <b>SIMPAN DATA REGISTRASI</b></button>
                </div><!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>

<?php //$this->load->view( 'info' ); ?>

<!-- below jquery things triggered on on input event and checks the username availability in the database -->
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
					url: "http://localhost/AplikasiBKK/index.php/UsernameCheck/get_username_availability",
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

<script type="text/javascript">
$(document).ready(function() {  // Generate a simple captcha
    $('#signupform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			username: {
                //message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'NIK harus diisi'
                    },
                    stringLength: {
                        min: 16,
                        max: 17,
                        message: 'NIK harus 16 Digit'
                    }
                }
            },
			nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},

			tahun_keluar: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			status: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			id_jurusan: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
						},						
					},
				},
			nohp: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
						},						
					},
				},
			pendidikan: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			foto: {
					validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 2097152,   // 2048 * 1024
                            message: 'Foto harus bertipe jpeg,jpg,png'
                        },
					},
				},
 
        }
    });

    // Validate the form manually
});
</script>