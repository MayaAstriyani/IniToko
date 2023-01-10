<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>IniToko.com : Belanja Pakaian Berkualitas Tinggi & Gratis Pengiriman</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/vendor2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/vendor2/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/vendor2/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main2.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box register">
					<div class="content">
						<div class="header">
							<div class="logo text-center"><img src="assets/images/logo.png" alt="Logo"></div>
							<p class="lead"><?=$this->session->flashdata('error');?> <br> <?=validation_errors()?></p>
						</div>
                        <?=form_open('/Register', ['class'=>'form-auth-small'])?>
                            <div class="form-group">
								<label>Nama Pengguna</label>
								<input type="text" class="form-control" id="signup-email" placeholder="blackneko24" name="username">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" id="signup-email" placeholder="youremail@email.com" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" id="signup-password" placeholder="(Minimal 8 Karakter)" name="password">
							</div>
                            <div class="form-group">
								<label>Nama Depan</label>
								<input type="text" class="form-control" placeholder="Black" name="nama_depan">
							</div>
							<div class="form-group">
								<label>Nama Belakang</label>
								<input type="text" class="form-control" placeholder="Neko" name="nama_belakang">
							</div>
                            <div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<div>
									<label class="fancy-radio">
										<input name="jenis_kelamin" value="Laki-Laki" type="radio" checked>
										<span><i></i>Laki-Laki</span>
									</label>
									<label class="fancy-radio">
										<input name="jenis_kelamin" value="Perempuan" type="radio">
										<span><i></i>Perempuan</span>
									</label>
								</div>
							</div>
                            <div class="form-group">
								<label>Nomor HP</label>
								<input type="tel" class="form-control" placeholder="08xxxxxxxxxx" name="phoneNumber">
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
							<div class="bottom">
								<span class="helper-text">Sudah punya akun? <a href="index.php?/Login">Login</a></span>
							</div>
						<?=form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
    <script src="assets/vendor/vendor2/jquery/jquery.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/vendor2/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/vendor2/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/vendor2/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
</body>

</html>
