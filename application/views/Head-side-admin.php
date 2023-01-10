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
					<!-- search form -->
					<!-- end search form -->
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-cog"></i>
								</a>
								<ul class="dropdown-menu user-menu menu-icon">
									<li class="menu-heading">PENGATURAN</li>
									<li><a href="#"><i class="fa fa-fw fa-edit"></i> <span>Pengaturan</span></a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-question-circle"></i>
								</a>
								<ul class="dropdown-menu user-menu">
									<li>
										<form class="search-form help-search-form">
											<input value="" class="form-control" placeholder="Butuh bantuan?" type="text">
											<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
										</form>
									</li>
									<li class="menu-heading">LANGKAH-LANGKAH TRANSAKSI</li>
									<li><a href="#">Konfirmasi Pesanan</a></li>
									<li><a href="#">Pengiriman Pesanan</a></li>
									<li><a href="#">Penambahan Nomor Resi</a></li>
									<li><a href="#">Melakukan Konfirmasi Terkirimnya Produk</a></li>
									<li class="menu-heading">PENAMBAHAN PRODUK</li>
									<li><a href="#">Penentuan Detail Produk</a></li>
									<li><a href="#">Upload Produk</a></li>
									<li><a href="#">Cek Produk</a></li>
									<li class="menu-heading">LAIN-LAIN</li>
									<li><a href="#">Laporkan Masalah</a></li>
									<li class="menu-button">
										<a href="#" class="btn btn-primary"><i class="fa fa-question-circle"></i> PUSAT BANTUAN</a>
									</li>
								</ul>
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
					<?php
						if ($this->session->userdata('jenis_kelamin') == "Laki-Laki") {
							echo "<img src='assets/img/user_man.png' class='img-responsive img-circle user-photo' alt='User Profile Picture'>";
						}

						elseif ($this->session->userdata('jenis_kelamin') == "Perempuan") {
							echo "<img src='assets/img/user_wom.png' class='img-responsive img-circle user-photo' alt='User Profile Picture'>";
						}

						else {
							echo "<img src='assets/img/user_unk.png' class='img-responsive img-circle user-photo' alt='User Profile Picture'>";
						}
					?>	
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Selamat datang, <strong><?=$this->session->userdata('username');?></strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a href="#">Profil Saya</a></li>
							<li><a href="#">Pesan</a></li>
							<li><a href="#">Pengaturan</a></li>
							<li class="divider"></li>
							<li><a href="index.php?/Login/logout">Keluar</a></li>
						</ul>
					</div>
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="index.php?/Admin"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li class="">
							<a href="#subPages" class="has-arrow" aria-expanded="false"><i class="lnr lnr-user"></i> <span>Pengguna</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="index.php?/Admin/show_admin">Admin</a></li>
								<li class=""><a href="index.php?/Admin/show_user">Pembeli Kita</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#product" class="has-arrow" aria-expanded="false"><i class="lnr lnr-pencil"></i> <span>Product</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="index.php?/Admin/show_product">Produk</a></li>
								<li class=""><a href="index.php?/Admin/add_product">Tambah Produk</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#order" class="has-arrow" aria-expanded="false"><i class="lnr lnr-file-empty"></i> <span>Pesanan</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="index.php?/Admin/show_order">Pesanan Belum Dibayar</a></li>
								<li class=""><a href="index.php?/Admin/show_order_dibayar">Pesanan Dibayar</a></li>
								<li class=""><a href="index.php?/Admin/show_order_dikonfirmasi">Pesanan Terkonfirmasi</a></li>
								<li class=""><a href="index.php?/Admin/show_order_dikirim">Pesanan Sedang Dikirim</a></li>
								<li class=""><a href="index.php?/Admin/show_order_terkirim">Pesanan Terkirim</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->