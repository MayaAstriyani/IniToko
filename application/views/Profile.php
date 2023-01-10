<body>
<!-- WRAPPER -->
<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<div class="navbar-right">
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php?/Initoko/">
									<i class="lnr lnr-home"></i>
								</a>
							</li>
							<li>
								<a href="index.php?/Initoko/cart">
									<i class="lnr lnr-cart"></i>
								</a>
							</li>
							<li>
								<a href="index.php?/Login/logout">
									<i class="lnr lnr-exit"></i>
								</a>
							</li>
						</ul>
					</div>
					<!-- end navbar menu -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Selamat datang, <strong><?=$this->session->userdata('username');?></strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a href="index.php?/Login/logout">Logout</a></li>
						</ul>
					</div>
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="index.php?/Initoko/"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li class="">
							<a href="index.php?/Initoko/profile" aria-expanded="true"><i class="lnr lnr-user"></i> <span>Profil Anda</span></a>
						</li>
						<li class="">
							<a href="#forms" class="has-arrow" aria-expanded="false"><i class="lnr lnr-book"></i> <span>Pesanan</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="index.php?/Initoko/cart">Tas</a></li>
								<li class=""><a href="index.php?/Initoko/show_order_user">Pesanan Anda</a></li>
								<li class=""><a href="forms-basic.html">Lacak Pesanan</a></li>
							</ul>
						</li>
						<!-- <li class=""><a href="notifications.html"><i class="lnr lnr-alarm"></i> <span>Notifikasi</span> <span class="badge bg-danger">15</span></a></li> -->
						<!-- <li class=""><a href="notifications.html"><i class="lnr lnr-cog"></i> <span>Pengaturan</span></a></li> -->
						<li class=""><a href="index.php?/Login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Profil Pengguna</h1>
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#myprofile" role="tab" data-toggle="tab">Profil Saya</a></li>
					<li><a href="#account" role="tab" data-toggle="tab">Akun</a></li>
				</ul>
				<form>
					<div class="tab-content content-profile">
						<!-- MY PROFILE -->
						<div class="tab-pane fade in active" id="myprofile">
							<div class="profile-section">
								<h2 class="profile-heading">Informasi Diri</h2>
								<div class="clearfix">
									<!-- LEFT SECTION -->
									<div class="left">
										<div class="form-group">
											<label>Nama Depan</label>
											<input type="text" class="form-control" value="<?=$this->session->userdata('nama_depan');?>" disabled>
										</div>
										<div class="form-group">
											<label>Nama Belakang</label>
											<input type="text" class="form-control" value="<?=$this->session->userdata('nama_belakang');?>" disabled>
										</div>
										<div class="form-group">
											<label>Jenis Kelamin</label>
											<div>
                                                <?php
                                                    if ($this->session->userdata('jenis_kelamin') == "Laki-Laki") {
                                                        echo    "<label class='fancy-radio'>
                                                                    <input name='gender2' value='Laki-Laki' type='radio' checked>
                                                                    <span><i></i>Laki-Laki</span>
                                                                </label>
                                                                <label class='fancy-radio'>
                                                                    <input name='gender2' value='Perempuan' type='radio' disabled>
                                                                    <span><i></i>Perempuan</span>
                                                                </label>";
                                                    }

                                                    else {
                                                        echo    "<label class='fancy-radio'>
                                                                    <input name='gender2' value='Laki-Laki' type='radio' disabled>
                                                                    <span><i></i>Laki-Laki</span>
                                                                </label>
                                                                <label class='fancy-radio'>
                                                                    <input name='gender2' value='Perempuan' type='radio' checked>
                                                                    <span><i></i>Perempuan</span>
                                                                </label>";
                                                    }
                                                ?>
											</div>
										</div>
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												<input type="text" class="form-control" value="<?=$this->session->userdata('tanggal_lahir');?>" disabled>
											</div>
										</div>
									</div>
									<!-- END LEFT SECTION -->
									<!-- END RIGHT SECTION -->
								</div>
							</div>
						</div>
						<!-- END MY PROFILE -->
						<!-- ACCOUNT -->
						<div class="tab-pane fade" id="account">
							<div class="profile-section">
								<div class="clearfix">
									<!-- LEFT SECTION -->
									<div class="left">
										<h2 class="profile-heading">Akun</h2>
										<div class="form-group">
											<label>Nama Pengguna</label>
											<input type="text" class="form-control" value="<?=$this->session->userdata('username');?>" disabled>
										</div>
										<div class="form-group">
											<label>E-mail</label>
											<input type="email" class="form-control" value="<?=$this->session->userdata('email');?>" disabled>
										</div>
										<div class="form-group">
											<label>Nomor Ponsel</label>
											<input type="text" class="form-control" value="<?=$this->session->userdata('nomor_handphone');?>" disabled>
										</div>
									</div>
									<!-- END LEFT SECTION -->
								</div>
							</div>
						</div>
						<!-- END ACCOUNT -->  
					</div>
				</form>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
	</div>

    <script src="assets/vendor/vendor2/jquery/jquery.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/vendor2/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/vendor2/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {
		// photo upload
		$('#btn-upload-photo').on('click', function() {
			$(this).siblings('#filePhoto').trigger('click');
		});

		// plans
		$('.btn-choose-plan').on('click', function() {
			$('.plan').removeClass('selected-plan');
			$('.plan-title span').find('i').remove();

			$(this).parent().addClass('selected-plan');
			$(this).parent().find('.plan-title').append('<span><i class="fa fa-check-circle"></i></span>');
		});
	});
	</script>
</body>

</html>