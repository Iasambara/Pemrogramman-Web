<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$status					= empty($status) ? null : $status;
$tahun_keluar			= empty($tahun_keluar) ? null : $tahun_keluar;
$id_jurusan				= empty($id_jurusan) ? null : $id_jurusan;
//$pesan				= empty($pesan) ? null : $pesan;
?>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
				<b>Print Area</b> 
				<div class="pull-right form-group">
				<!--	<a href="#" class="btn btn-primary btn-sm pull-right" onclick="return printCanvas('piechart');" value="Print"><i class="glyphicon glyphicon-print"></i> Print</a> -->
                    <a href="#" class="btn btn-primary btn-sm pull-right" onclick="printDiv('printableArea')" value="Print Invoice"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                </div>
			</div>
			
			<div class="panel-body row table-responsive">
				<div class="col-lg-12" style="height:50px;"></div>	
				<div id="printableArea">
						<div align="center" style="padding:0px 10px 0px 10px"><img src="/assets/images/kop_surat.jpg" width="100%"/></div>

					<div class="container mt-3" style="margin-top:30px;width:600px">
						<h3 style="text-align: center;"><?= $title; ?></h3>
						<br />
                        

                        <div id="piechart" style="width: 900px; height: 500px;">

                        </div>
                                                
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($chartSiswa as $siswa) {
                echo "['" . $siswa['TAHUN'] . "'," . $siswa['total_siswa_lulus'] . "],";
            }
            ?>
        ]);
        var options = {
            //title: 'Total Siswa Yang Lulus',
            //is3D: true,
            pieHole : 0.4,
            chartArea:{left:30,top:70,width:'100%',height:'80%'}
        };
        
        /*var chart_area = document.getElementById('piechart');
        var chart = new google.visualization.PieChart(chart_area);
        
        chart.draw(data, options);
        */

        var chart_area = document.getElementById('piechart');
        var chart = new google.visualization.PieChart(chart_area);

        google.visualization.events.addListener(chart, 'ready', function(){
            chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
        });
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
        windowContent += '<head><title>Print Grafik Lulusan</title></head>';
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

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>