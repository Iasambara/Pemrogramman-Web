<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$status					= empty($status) ? null : $status;
$tahun_keluar			= empty($tahun_keluar) ? null : $tahun_keluar;
$id_jurusan				= empty($id_jurusan) ? null : $id_jurusan;
//$pesan				= empty($pesan) ? null : $pesan;
$totjumlah=0;
$totkuliah=0;
$totbekerja=0;
$totwirausaha=0;
$totlain2=0;

$totkuliahpersen=0;
$totbekerjapersen=0;
$totwirausahapersen=0;
$totlain2persen=0;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
				<b>Print Area</b> 
				<div class="pull-right form-group">
					<!-- <a href="#" class="btn btn-primary btn-sm pull-right" onclick="return printCanvas('ChartKeterserapan');" value="Print"><i class="glyphicon glyphicon-print"></i> Print</a> -->
                    <a href="#" class="btn btn-primary btn-sm pull-right" onclick="printDiv('printableArea')" value="Print Invoice"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                </div>
			</div>
			
			<div class="panel-body row table-responsive">
				<div class="col-lg-12" style="height:50px;"></div>	
				<div id="printableArea">
						<div align="center" style="padding:0px 10px 0px 10px"><img src="/assets/images/kop_surat.jpg" width="100%"/></div>
                    <h3 style="text-align: center;"><?= $title; ?></h3>
					<br />
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
                                <th width="4%" align="center">NO</th>
                                <th>PAKET KEAHLIAN</th>
                                <th width="7%" align="center">Jumlah</th>
                                <th width="6%" align="center">Kuliah</th>
                                <th width="7%" align="center">%</th>
                                <th width="6%" align="center">Bekerja</th>
                                <th width="7%" align="center">%</th>
                                <th width="7%" align="center">Wirausaha</th>
                                <th width="5%" align="center">%</th>
                                <th width="7%" align="center">Lain2 / Tidak Diketahui</th>
                                <th width="6%" align="center">%</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php 
                    foreach ($KeterserapanJ2 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">1</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php } 
                    foreach ($KeterserapanJ3 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">2</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php } 
                    foreach ($KeterserapanJ4 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">3</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ5 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">4</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ6 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">5</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ7 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">6</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ8 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">7</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ9 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">8</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ10 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen = $totkuliahpersen+$persenkuliah;
                        $totbekerjapersen = $totbekerjapersen+$persenbekerja;
                        $totwirausahapersen = $totwirausahapersen+$persenwirausaha;
                        $totlain2persen = $totlain2+$persenlain2;
                        ?>
                        <tr>
                            <td align="center">9</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                    <?php }
                    foreach ($KeterserapanJ11 as $kj) { 
                        $persenkuliah=round(($kj['kuliah']/$kj['jumlah'])*100,2);
                        $persenbekerja=round(($kj['bekerja']/$kj['jumlah'])*100,2);
                        $persenwirausaha=round(($kj['wirausaha']/$kj['jumlah'])*100,2);
                        $persenlain2=round(($kj['lain2']/$kj['jumlah'])*100,2);

                        $totjumlah = $totjumlah+$kj['jumlah'];
                        $totkuliah = $totkuliah+$kj['kuliah'];
                        $totbekerja = $totbekerja+$kj['bekerja'];
                        $totwirausaha = $totwirausaha+$kj['wirausaha'];
                        $totlain2 = $totlain2+$kj['lain2'];

                        $totkuliahpersen=round(($totkuliah/$totjumlah)*100,2);
                        $totbekerjapersen=round(($totbekerja/$totjumlah)*100,2);
                        $totwirausahapersen=round(($totwirausaha/$totjumlah)*100,2);
                        $totlain2persen=round(($totlain2/$totjumlah)*100,2);
                        ?>
                        <tr>
                            <td align="center">10</td>
                            <td><?php echo $kj['jurusan'] ?></td>
                            <td align="center"><?php echo $kj['jumlah'] ?></td>
                            <td align="center"><?php echo $kj['kuliah'] ?></td>
                            <td align="center"><?php echo $persenkuliah ?></td>
                            <td align="center"><?php echo $kj['bekerja'] ?></td>
                            <td align="center"><?php echo $persenbekerja ?></td>
                            <td align="center"><?php echo $kj['wirausaha'] ?></td>
                            <td align="center"><?php echo $persenwirausaha ?></td>
                            <td align="center"><?php echo $kj['lain2'] ?></td>
                            <td align="center"><?php echo $persenlain2 ?></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center"><strong>TOTAL</strong></td>
                            <td align="center"><strong><?php echo $totjumlah ?></strong></td>
                            <td align="center"><strong><?php echo $totkuliah ?></strong></td>
                            <td align="center" bgcolor="#cccccc"><strong><?php echo $totkuliahpersen ?></strong></td>
                            <td align="center"><strong><?php echo $totbekerja ?></strong></td>
                            <td align="center" bgcolor="#cccccc"><strong><?php echo $totbekerjapersen ?></strong></td>
                            <td align="center"><strong><?php echo $totwirausaha ?></strong></td>
                            <td align="center" bgcolor="#cccccc"><strong><?php echo $totwirausahapersen ?></strong></td>
                            <td align="center"><strong><?php echo $totlain2 ?></strong></td>
                            <td align="center" bgcolor="#cccccc"><strong><?php echo $totlain2persen ?></strong></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
				<br>
                <!--
                    <div class="container mt-3" style="width:600px">
					    <div id="piechart" style="width: 900px; height: 500px;"></div>
					</div>
                        -->
                    <h3 style="margin-top:30px;margin-bottom:30px;text-align:center;">Grafik Keterserapan Lulusan Perjurusan</h3>
                    <center>
                    <table class="columns">
                        <tr>
                            <td><div id="2_chart_div" style="border: 1px solid #ccc"></div></td>
                            <td><div id="3_chart_div" style="border: 1px solid #ccc"></div></td>
                        </tr>
                        <tr>
                            <td><div id="4_chart_div" style="border: 1px solid #ccc"></div></td>
                            <td><div id="5_chart_div" style="border: 1px solid #ccc"></div></td>
                        </tr>
                        <tr>
                            <td><div id="6_chart_div" style="border: 1px solid #ccc"></div></td>
                            <td><div id="7_chart_div" style="border: 1px solid #ccc"></div></td>
                        </tr>
                        <tr>
                            <td><div id="8_chart_div" style="border: 1px solid #ccc"></div></td>
                            <td><div id="9_chart_div" style="border: 1px solid #ccc"></div></td>
                        </tr>
                        <tr>
                            <td><div id="10_chart_div" style="border: 1px solid #ccc"></div></td>
                            <td><div id="11_chart_div" style="border: 1px solid #ccc"></div></td>
                        </tr>
                    </table>
                    </center>
					
				
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(draw2Chart);    
    google.charts.setOnLoadCallback(draw3Chart);
    google.charts.setOnLoadCallback(draw4Chart);
    google.charts.setOnLoadCallback(draw5Chart);    
    google.charts.setOnLoadCallback(draw6Chart);
    google.charts.setOnLoadCallback(draw7Chart);
    google.charts.setOnLoadCallback(draw8Chart);    
    google.charts.setOnLoadCallback(draw9Chart);
    google.charts.setOnLoadCallback(draw10Chart);
    google.charts.setOnLoadCallback(draw11Chart);

    function draw2Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan2 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('2_chart_div'));
        chart.draw(data, options);
    }

    function draw3Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan3 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('3_chart_div'));
        chart.draw(data, options);
    }

    function draw4Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan4 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('4_chart_div'));
        chart.draw(data, options);
    }

    function draw5Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan5 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('5_chart_div'));
        chart.draw(data, options);
    }

    function draw6Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan6 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('6_chart_div'));
        chart.draw(data, options);
    }

    function draw7Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan7 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('7_chart_div'));
        chart.draw(data, options);
    }

    function draw8Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan8 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('8_chart_div'));
        chart.draw(data, options);
    }

    function draw9Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan9 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('9_chart_div'));
        chart.draw(data, options);
    }

    function draw10Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan10 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('10_chart_div'));
        chart.draw(data, options);
    }

    function draw11Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($Keterserapan11 as $siswa) {
                echo "['" . $siswa['judul_status'] . "'," . $siswa['JUMLAH'] . "],";
                $judul=$siswa['nama_jurusan'];
            }
            ?>
        ]);

        var options = {title: '<?php echo $judul; ?>',
                       width:450,
                       height:300};

        var chart = new google.visualization.PieChart(document.getElementById('11_chart_div'));
        chart.draw(data, options);
    }

</script>


<script>
	function printCanvas(canvas1)  
    {  
        var dataUrl1 = document.getElementById(canvas1).toDataURL(); //attempt to save base64 string to server using this var  
        //var dataUrl2 = document.getElementById(canvas2).toDataURL();
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'
        windowContent += '<head><title>Print Grafik Keterserapan Lulusan</title></head>';
        windowContent += '<body>'
        //windowContent += '<img src="' + dataUrl1 + '"> <img src="' + dataUrl2 + '">';
		windowContent += '<center><img src="' + dataUrl1 + '"></center> ';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('','','width=1024,height=500');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        //printWin.close();
    }
</script>
