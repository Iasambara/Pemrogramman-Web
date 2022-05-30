<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>How to upload and Extract Zip file in CodeIgniter</title>

</head>
<body>

	<?php 
	// Message
	echo $this->session->flashdata('msg');
	?>
	<!-- Form -->
	<form method='post' action='<?= base_url() ?>index.php/unzip/extract/' enctype='multipart/form-data'>
		<input type='file' name='file'>
		<input type="submit" name="submit" value="Upload & Extract">
	</form>

</body>
</html>