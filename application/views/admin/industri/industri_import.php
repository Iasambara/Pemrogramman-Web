<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open_multipart('admin/industri/import_industri_proses/',array('role'=>'form','id'=>'fform'));?>
<div class="box box-primary">
						
  				<div class="box-header with-border">
				
					<button type="submit" name="upload" class="btn btn-info"><i class="glyphicon glyphicon-upload"></i> Import</button>
					<a href="http://bkk.edunusa.web.id/assets/files/Template Data Industri_bkk.xlsx" class="btn btn-success"><i class="glyphicon glyphicon-download"></i> Template</a>
					<a href="<?php echo site_url('admin/industri/index');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
					<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Industri (xlsx)</label>
                    <div class="col-sm-8">
								<input type="file" name="userfile" class="form-control" data-bv-trigger="blur">
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
				

