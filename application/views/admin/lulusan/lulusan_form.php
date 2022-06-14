<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($lulusan) ? null : $lulusan->id_alumni;
$nama 		= empty($lulusan) ? null : $lulusan->nama;
$tempat_lahir	= empty($lulusan) ? null : $lulusan->tempat_lahir;
$tgl_lahir	= empty($lulusan) ? null : $lulusan->tgl_lahir;
$email		= empty($lulusan) ? null : $lulusan->email;
$jkel		= empty($lulusan) ? null : $lulusan->jenis_kelamin;
$alamat		= empty($lulusan) ? null : $lulusan->alamat;
$fakultasnya= empty($lulusan) ? null : $lulusan->id_fakultas;
$fotonya	= empty($lulusan) ? null : $lulusan->photo;
?>

<form class="form-horizontal" action="" method="post" id="fform" enctype="multipart/form-data">
<div class="box box-primary">

	<div class="box-header with-border">
		<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
		<a href="<?php echo site_url('admin/lulusan/');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
	</div>
	<div class="box-body">
	
		<div class="form-group">
			<label for="namanya" class="col-sm-2 control-label">Nama</label>									
			<div class="col-sm-8">
				<input class="form-control" type="text" id="namanya" name="nama" value="<?php echo $nama ?>" data-bv-trigger="blur" required>
			</div>
		</div>			
		
		<div class="form-group">
			<label for="tmplhr" class="col-sm-2 control-label">Tempat Lahir</label>									
			<div class="col-sm-8">
				<input class="form-control" type="text" id="tmplhr" name="tempat_lahir" value="<?php echo $tempat_lahir ?>" data-bv-trigger="blur" required>
			</div>
		</div>
		
		<div class="form-group">
			<label for="tgllhr" class="col-sm-2 control-label">Tanggal Lahir</label>									
			<div class="col-sm-8">
				<input class="form-control" type="date" id="tgllhr" name="tgl_lahir" value="<?php echo $tgl_lahir ?>" data-bv-trigger="blur" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Jenis kelamin</label>									
			<div class="col-sm-8">
				<label for="laki">Laki-laki</label>&nbsp; <input type="radio" id="laki" name="jkel" value="1" <?php if ($jkel==1) echo " checked";?>>&nbsp; &nbsp;
				<label for="pere">Perempuan</label>&nbsp; <input type="radio" id="pere" name="jkel" value="2" <?php if ($jkel==2) echo " checked";?>>
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>		
			<div class="col-sm-8">
				<input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?>" required />
			</div>
		</div>
		
		<div class="form-group">
			<label for="alamat" class="col-sm-2 control-label">Alamat</label>		<div class="col-sm-8">
				<textarea class="form-control" id="alamat" name="alamat"><?php echo $alamat ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="fakultas" class="col-sm-2 control-label">Fakultas</label>		
			<div class="col-sm-8">
				<select class="form-control" id="fakultas" name="fakultas">
				<option>Pilih fakultas</option>
				<?php
				foreach($fakultas as $row) { 
				echo "<option value='$row->kode_fakultasy'";
				if ($row->kode_fakultasy==$fakultasnya)
					echo " selected";
				echo ">$row->nama_fakultasy</option>";
				}
				?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="fotonya" class="col-sm-2 control-label">Foto</label>									
			<div class="col-sm-8">
				<input class="form-control" type="file" id="fotonya" name="fotoalumni" value="<?php echo $fotonya ?>" data-bv-trigger="blur" id="image-source" onchange="previewImage();">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Preview Foto</label>									
			<div class="col-sm-8">
				<?php if(!empty($fotonya)){?>
					<img id="image-preview" style="width:250px;" src="<?php echo base_url();?>assets\images\alumni\<?=$fotonya?>" class="user-image" alt="image preview">
				<?php }else{ ?>
					<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:250px;" alt="image preview" />
				<?php } ?>
				
			</div>
		</div>
				<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
			
		<div class="form-group">
			<div class="col-sm-8">
        		<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        		<a href="<?php echo site_url('admin/lulusan/');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
			</div>
		</div>
								
	</div>
	</div>
</form>			

<script type="text/javascript">
	function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("fotonya").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>

<script type="text/javascript">
$(document).ready(function() {  // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang diinput tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			judul_kat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
/*
			isi_kat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},						
					},
				},
*/
			foto_kat: {
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
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $("#richtext").wysihtml5();
  });
</script>