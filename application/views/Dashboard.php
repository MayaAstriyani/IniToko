<?php
	$data_user = $this->model->getAllUser(); 
	$data_produk = $this->model->getAllProduk(); 
	$data_visitor = $this->model->getAllVisitor();
	$data_order = $this->model->getAllOrder();
	$data_order_terkini = $this->model->getOrderLimit(5); 
	$data_penghasilan_hariIni = $this->model->getTotalPenghasilanHariIni();
	$data_order_hariIni = $this->model->getOrderHariIni();
?>
<!-- MAIN CONTENT -->
<div id="main-content">
			<div class="container-fluid">
				<h1 class="sr-only">Dashboard</h1>
				<!-- WEBSITE ANALYTICS -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-pie-chart"></i> Analisis IniToko</h2>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<!-- <div class="mini-stat">
										<div id="number-chart1" class="inlinesparkline">23,65,89,32,67,38,63,12,34,22</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 19% compared to last week</p>
									</div> -->
									<div class="number"><span><?php echo count($data_order); ?></span> <span>TOTAL PESANAN</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<!-- <div class="mini-stat">
										<div id="number-chart2" class="inlinesparkline">77,44,10,80,88,87,19,59,83,88</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 24% compared to last week</p>
									</div> -->
									<div class="number"><span><?php echo count($data_user); ?></span> <span>PENGGUNA</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<!-- <div class="mini-stat">
										<div id="number-chart3" class="inlinesparkline">99,86,31,72,62,94,50,18,74,18</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i> 44% compared to last week</p>
									</div> -->
									<div class="number"><span><?php echo count($data_visitor); ?></span> <span>PENGUNJUNG</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<!-- <div class="mini-stat">
										<div id="number-chart4" class="inlinesparkline">28,44,70,21,86,54,90,25,83,42</div>
										<p class="text-muted"><i class="fa fa-caret-down text-danger"></i> 6% compared to last week</p>
									</div> -->
									<div class="number"><span><?php echo count($data_produk); ?></span> <span>PRODUK</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END WEBSITE ANALYTICS -->
				<!-- SALES SUMMARY -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-shopping-basket"></i> Ringkasan Penjualan</h2>
					</div>
					<?php
						$total_hari_ini = 0;
						$data_penghasilan_hariIni = $this->model->getTotalPenghasilanHariIni();
						foreach ($data_penghasilan_hariIni as $d) {
						$total_hari_ini += $d['total_pembayaran'];
						}
					?>
					<div class="row">
						<div class="col-md-3">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Hari ini</h3>
								<ul class="list-unstyled list-justify small-number">
									<li class="clearfix">Penghasilan <span>Rp. <?php echo $this->cart->format_number($total_hari_ini); ?></span></li>
									<li class="clearfix">Pesanan <span><?php echo count($data_order_hariIni); ?></span></li>
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Performa Penjualan</h3>
								<div class="row">
									<div class="col-md-6">
										<table class="table">
											<thead>
												<tr>
													<th>&nbsp;</th>
													<th>Minggu Lalu</th>
													<th>Minggu Ini</th>
													<th>Perubahan</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>Penghasilan</th>
													<td>$2752</td>
													<td><span class="text-info">$3854</span></td>
													<td><span class="text-success">40.04%</span></td>
												</tr>
												<tr>
													<th>Pesanan</th>
													<td>243</td>
													<td>
														<div class="text-info">322</div>
													</td>
													<td><span class="text-success">32.51%</span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Pesanan Terkini</h3>
								<div class="table-responsive">
									<table class="table table-striped no-margin">
										<thead>
											<tr>
												<th>ID Pesanan</th>
												<th>Nama</th>
												<th>Total</th>
												<th>Tanggal</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$i = 0; 
											foreach ($data_order_terkini as $d) {
												$i++;
										?>
											<tr>
												<td><?php echo $d['id_pesanan']; ?></td>
												<td><?php echo $d['nama']; ?></td>
												<td><?php echo $d['total']; ?></td>
												<td><?php echo $d['tanggal']; ?></td>
												<td><?php echo $d['status']; ?></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END SALES SUMMARY -->
				<!-- SOCIAL -->
				<div class="dashboard-section no-margin">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Social <span class="section-subtitle">(7 days report)</span></h2>
						<a href="#" class="right">View Social Reports</a>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-thumbs-o-up"></i> +636 <span>LIKES</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-reply-all"></i> +528 <span>FOLLOWERS</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-envelope-o"></i> +1065 <span>SUBSCRIBERS</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-user-circle-o"></i> +201 <span>USERS</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- END SOCIAL -->
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/vendor2/jquery/jquery.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/vendor2/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/vendor2/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/vendor2/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="assets/vendor/vendor2/chartist/js/chartist.min.js"></script>
	<script src="assets/vendor/vendor2/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
	<script src="assets/vendor/vendor2/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js"></script>
	<script src="assets/vendor/vendor2/chartist-plugin-legend-latest/chartist-plugin-legend.js"></script>
	<script src="assets/vendor/vendor2/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {

		// sparkline charts
		var sparklineNumberChart = function() {

			var params = {
				width: '140px',
				height: '30px',
				lineWidth: '2',
				lineColor: '#20B2AA',
				fillColor: false,
				spotRadius: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				disableInteraction: false
			};

			$('#number-chart1').sparkline('html', params);
			$('#number-chart2').sparkline('html', params);
			$('#number-chart3').sparkline('html', params);
			$('#number-chart4').sparkline('html', params);
		};

		sparklineNumberChart();


		// traffic sources
		var dataPie = {
			series: [45, 25, 30]
		};

		var labels = ['Direct', 'Organic', 'Referral'];
		var sum = function(a, b) {
			return a + b;
		};

		new Chartist.Pie('#demo-pie-chart', dataPie, {
			height: "270px",
			labelInterpolationFnc: function(value, idx) {
				var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
				return labels[idx] + ' (' + percentage + ')';
			}
		});


		// progress bars
		$('.progress .progress-bar').progressbar({
			display_text: 'none'
		});

		// line chart
		var data = {
			labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			series: [
				[200, 380, 350, 480, 410, 450, 550],
			]
		};

		var options = {
			height: "200px",
			showPoint: true,
			showArea: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
			chartPadding: {
				top: 0,
				right: 0,
				bottom: 30,
				left: 30
			},
			plugins: [
				Chartist.plugins.tooltip({
					appendToBody: true
				}),
				Chartist.plugins.ctAxisTitle({
					axisX: {
						axisTitle: 'Day',
						axisClass: 'ct-axis-title',
						offset: {
							x: 0,
							y: 50
						},
						textAnchor: 'middle'
					},
					axisY: {
						axisTitle: 'Reach',
						axisClass: 'ct-axis-title',
						offset: {
							x: 0,
							y: -10
						},
					}
				})
			]
		};

		new Chartist.Line('#demo-line-chart', data, options);


		// sales performance chart
		var sparklineSalesPerformance = function() {

			var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
			var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

			$('#chart-sales-performance').sparkline(lastWeekData, {
				fillColor: 'rgba(90, 90, 90, 0.1)',
				lineColor: '#5A5A5A',
				width: '' + $('#chart-sales-performance').innerWidth() + '',
				height: '100px',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});

			$('#chart-sales-performance').sparkline(currentWeekData, {
				composite: true,
				fillColor: 'rgba(60, 137, 218, 0.1)',
				lineColor: '#3C89DA',
				lineWidth: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				chartRangeMin: 0,
				chartRangeMax: 1000
			});
		}

		sparklineSalesPerformance();

		var sparkResize;
		$(window).on('resize', function() {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineSalesPerformance, 200);
		});


		// top products
		var dataStackedBar = {
			labels: ['Q1', 'Q2', 'Q3'],
			series: [
				[800000, 1200000, 1400000],
				[200000, 400000, 500000],
				[100000, 200000, 400000]
			]
		};

		new Chartist.Bar('#chart-top-products', dataStackedBar, {
			height: "250px",
			stackBars: true,
			axisX: {
				showGrid: false
			},
			axisY: {
				labelInterpolationFnc: function(value) {
					return (value / 1000) + 'k';
				}
			},
			plugins: [
				Chartist.plugins.tooltip({
					appendToBody: true
				}),
				Chartist.plugins.legend({
					legendNames: ['Phone', 'Laptop', 'PC']
				})
			]
		}).on('draw', function(data) {
			if (data.type === 'bar') {
				data.element.attr({
					style: 'stroke-width: 30px'
				});
			}
		});


		// notification popup
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		toastr['info']('Halo, selamat datang di dashboard admin.');

	});
	</script>
</body>

</html>