<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
					<b>Print Area</b> 
					
					<div class="pull-right form-group">
						<a href="#" class="btn btn-primary btn-sm pull-right" onclick="printDiv('printableArea')" value="Print"><i class="glyphicon glyphicon-print"></i> Cetak</a> 
						<a href="<?php echo base_url();?>index.php/admin/laporan/export_industri" class="btn btn-primary btn-sm pull-right" style="margin-right:5px"><i class="glyphicon glyphicon-share"></i> Export</a>
					</div>
			</div>
			
			<div class="panel-body row table-responsive">
				
				<div id="printableArea">
<style>
    #printableArea .table-bordered>tbody>tr>td {font-family:Arial;font-size:12px;}
</style>				
					<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tr style="padding:0px">
							<td align="center" style="padding:0px 10px 0px 10px"><img src="/assets/images/kop_surat.jpg" width="100%"/></td>
						</tr>
						<tr style="padding:0px">
							<td style="text-align:center;padding:0px"><h3 style="margin-top:10px;margin-bottom:0px">Laporan Data Mitra Industri</h3>
							</td>
						</tr>
					</table>
			
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
					<?php 
						if($this->session->flashdata('alert')==null){						
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}?>
						<thead>
                        <tr>
                            <th width="40">No</th>
                            <th width="260">Nama</th>
							<th width="150">Bidang</th>
							<th>Alamat</th>
							<th width="150">Kabupaten</th>							
							<th width="80">No Telp.</th>
							<th width="100">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($industri as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:left;"><?php echo $row->nama ?></td>
								<td style="text-align:left;"><?php echo ucwords($row->nama_bidang) ?></td>
								<td style="text-align:left;"><?php echo $row->alamat ?></td>
								<td style="text-align:left;"><?php echo $row->nama_kabkot ?></td>								
								<td style="text-align:center;"><?php echo $row->notlp ?></td>
								<td style="text-align:left;"><?php echo strtolower($row->email) ?></td>
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
				<br><br><br><br><br><br>
			</div>
            </div>
        </div>
</div>
</div>
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>