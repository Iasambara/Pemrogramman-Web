<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($v_kat) ? null : $v_kat->id_kat;
$judulnya 	= empty($v_kat) ? null : $v_kat->judul_kat;
$isi_kat		= empty($v_kat) ? null : $v_kat->ket_kat;
$fotonya	= empty($v_kat) ? null : $v_kat->foto_kat;
?>

<form class="form-horizontal" action="" method="post" id="fform" enctype="multipart/form-data">
<div class="box box-primary">

	<div class="box-header with-border">
		<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
		<a href="<?php echo site_url('admin/berita/');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
	</div>
	<div class="box-body">
	
		<div class="form-group">
			<label for="judulnya" class="col-sm-2 control-label">Judul informasi</label>									
			<div class="col-sm-8">
				<input class="form-control" type="text" id="judulnya" name="judul_kat" value="<?php echo $judulnya ?>" data-bv-trigger="blur" required>
			</div>
		</div>			
		
		
		<div class="form-group">
			<label for="isinya" class="col-sm-2 control-label">Isi informasi</label>									
			<div class="col-sm-8">
			   <textarea id="richtext" class="form-control" id="isinya" name="isi_kat" data-bv-trigger="blur" rows=20 richtext><?=$isi_kat;?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="fotonya" class="col-sm-2 control-label">Foto</label>									
			<div class="col-sm-8">
				<input class="form-control" type="file" id="fotonya" name="foto_kat" value="<?php echo $fotonya ?>" data-bv-trigger="blur" id="image-source" onchange="previewImage();">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Preview Foto</label>									
			<div class="col-sm-8">
				<?php if(!empty($fotonya)){?>
					<img id="image-preview" style="width:250px;" src="<?php echo base_url();?>assets\images\info\<?=$fotonya?>" class="user-image" alt="image preview">
				<?php }else{ ?>
					<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:250px;" alt="image preview" />
				<?php } ?>
				
			</div>
		</div>
				<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
			
		<div class="form-group">
			<div class="col-sm-8">
        		<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        		<a href="<?php echo site_url('admin/berita/');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
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

