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
				<div class="auth-box">
					<div class="content">
						<div class="header">
							<div class="logo text-center"><img src="assets/images/logo.png" alt="DiffDash"></div>
							<p class="lead"><?=$this->session->flashdata('error');?> <br> <?=validation_errors()?></p>
						</div>
						<?=form_open('/login', ['class'=>'form-auth-small'])?>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" id="signin-email" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" id="signin-password" placeholder="Password" name="password">
							</div>
							<div class="form-group clearfix">
								<label class="fancy-checkbox element-left">
									<input type="checkbox">
									<span>Ingat saya</span>
								</label>
								<span class="helper-text element-right">Belum punya akun? <a href="index.php?/Register">Register</a></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							<div class="bottom">
								<span class="helper-text"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>