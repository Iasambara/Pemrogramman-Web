<div class="box box-primary">

  	<div class="box-header with-border">
		<a href="<?php echo site_url('admin/lulusan/add_lulusan');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
	</div>
  	<div class="box-body">
	
  		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fdatatables">
			<?php 
			if($this->session->flashdata('alert')!=null)
				echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> ".$this->session->flashdata('alert')."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
			?>
          <thead>
            <tr>
              <th>No.</th><th>Nama</th><th>Tempat, Tgl.Lahir</th><th>Alamat</th>
              <th class="text-center" width="60">Aksi</th>
            </tr>
          </thead>
            <tbody>
                <?php $no=0; foreach($lulusan as $baris ): $no++;?>
                <tr>
					<td><?php echo $no;?></td>
					<td><?php echo $baris->nama;?></td>
					<td><?php echo $baris->tempat_lahir.", ".tgl_indo($baris->tgl_lahir);?></td>
					<td><?php echo $baris->alamat;?></td>
                  <td align="center">
					<a href="<?php echo site_url('admin/lulusan/edit_lulusan/'.$baris->id_alumni);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
					  &nbsp;							 
					<a href="<?php echo site_url('admin/lulusan/hapus_lulusan/'.$baris->id_alumni);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>



