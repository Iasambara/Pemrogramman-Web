<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<form method='post' action='<?= base_url() ?>index.php/admin/pelamar/loker_pribadi_upload_dokumen/' enctype='multipart/form-data'>
    <div class="box box-primary"> 
        <div class="box-header with-border">				
            <input type="submit" name="submit" class="btn btn-info" value="Upload File">
        </div>

        <div class="box-body">
		    <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Berkas File (zip) / (rar)</label>
                <div class="col-sm-8">	
                    <input type='file' name='file'>
                    <input type='hidden' name='id_lamaran' value=<?php echo $idl; ?>>
                </div>
			    </div>
		    </div>
        </div>
    </div>
</form>



<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			file: {
				validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},						
					},
			},
			
            
        }
    });

    // Validate the form manually
});
</script>

<!--
<?php echo form_open_multipart('admin/pelamar/loker_pribadi_upload_dokumen/',array('role'=>'form','id'=>'fform'));?>
<div class="box box-primary">
						
  				<div class="box-header with-border">				
					<button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-upload"></i> Import</button>
				</div>
  				<div class="box-body">
					<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Berkas File (zip)</label>
                    <div class="col-sm-8">
								<input type="file" name="file" class="form-control" data-bv-trigger="blur">
							</div>
						</div>
				</div>
</div>
<?=form_close()?>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			userfile: {
				validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},						
					},
			},
			
            
        }
    });

    // Validate the form manually
});
</script>					
				
-->
