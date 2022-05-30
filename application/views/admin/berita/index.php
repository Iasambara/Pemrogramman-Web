<div class="box box-primary">

  	<div class="box-header with-border">
		<a href="<?php echo site_url('admin/berita/add_berita');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
	</div>
  	<div class="box-body">
	
  		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fdatatables">
			<?php 
			if($this->session->flashdata('alert')!=null)
				echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> ".$this->session->flashdata('alert')."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
			?>
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th width="300px;">Judul Berita</th>
              <th>Isi Berita</th>
              <th width="160">Tanggal Posting</th>
              <th class="text-center" width="60">Aksi</th>
            </tr>
          </thead>
            <tbody>
                <?php $no=0; foreach($v_kat as $baris ): $no++;?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $baris->judul_kat; ?></td>
                  <td><?php echo substr(htmlentities(strip_tags($baris->ket_kat)), 0, 115); ?>...</td>
                  <td class="text-center"><?php echo date('d-m-Y H:i', strtotime($baris->tgl_kat)); ?></td>
                  <td align="center">
                    <!--
                      <a href="admin/berita/e/<?php echo $baris->id_kat; ?>" class="btn btn-success btn-xs" title="Edit Berita"><i class="icon-pencil"></i></a>
                      <a href="admin/hapus_kat/berita/<?php echo $baris->id_kat; ?>" class="btn btn-danger btn-xs" title="Hapus Berita" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                    -->
					<a href="<?php echo site_url('admin/berita/edit_berita/'.$baris->id_kat);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
					  &nbsp;							 
					<a href="<?php echo site_url('admin/berita/hapus_berita/'.$baris->id_kat);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>



