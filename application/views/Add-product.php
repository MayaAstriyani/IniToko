<		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Tambah Produk</h1>
				</div>
				<?=form_open_multipart('/Admin/add_product_process', ['class'=>'form-auth-small'])?>
				<p class="lead"><?=$this->session->flashdata('error');?> <br> <?=validation_errors()?></p>
				<div class="row">
					<div class="col-md-6">
						<div class="panel-content">
							<h2 class="heading"><i class="fa fa-square"></i> Pilih gambar produk dengan ukuran 720px x 960px</h2>
							<label hidden>Gambar Produk</label>
                            <input type="file" class="dropify" data-allowed-file-extensions="jpg png" name="img">
						</div>
                    </div>
                </div>

                <div class="row">
					<div class="col-md-6">
						<div class="panel-content">
							<h2 class="heading"><i class="fa fa-square"></i>Rincian Produk</h2>
                            <div class="form-group">
								<label>Nama Produk</label>
								<input type="text" class="form-control" id="signup-email" placeholder="Nama Produk" name="nama">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" placeholder="Deskripsi Produk" name="desc" rows="4"></textarea>
							</div>
							<div class="form-group">
								<label>Harga Produk</label>
								<input type="text" class="form-control" id="signup-email" placeholder="Harga Produk" name="harga">
							</div>
                            <div class="form-group">
								<label class="control-label">Jenis Barang</label>
								<select class="form-control" name="jenis">
									<option value="Kaos">Kaos</option>
									<option value="Kemeja">Kemeja</option>
									<option value="Jaket">Jaket</option>
									<option value="Topi">Topi</option>
									<option value="Sepatu">Sepatu</option>
									<option value="Sandal">Sandal</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Kategori Masa</label>
								<select class="form-control" name="kategori_satu">
									<option value="Baru">Baru</option>
								</select>
							</div>
                            <div class="form-group">
								<label class="control-label">Kategori Gender</label>
								<select class="form-control" name="kategori_dua">
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
									<option value="Anak-Anak">Anak-Anak</option>
                                    <option value="Pria dan Wanita">Pria dan Wanita</option>
                                    <option value="Semua Usia">Semua Usia</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Kategori Warna</label>
								<select class="form-control" name="kategori_tiga">
									<option value="Kaos">Kaos</option>
									<option value="Kemeja">Kemeja</option>
									<option value="Jaket">Jaket</option>
									<option value="Topi">Topi</option>
									<option value="Sepatu">Sepatu</option>
									<option value="Sandal">Sandal</option>
								</select>
							</div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
					<?=form_close();?>
						</div>
                    </div>
                </div>
                
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
	<script src="assets/vendor/vendor2/dropify/js/dropify.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {
		$('.dropify').dropify();

		var drEvent = $('#dropify-event').dropify();
		drEvent.on('dropify.beforeClear', function(event, element) {
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});

		drEvent.on('dropify.afterClear', function(event, element) {
			alert('File deleted');
		});

		$('.dropify-fr').dropify({
			messages: {
				default: 'Glissez-déposez un fichier ici ou cliquez',
				replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
				remove: 'Supprimer',
				error: 'Désolé, le fichier trop volumineux'
			}
		});
	});
	</script>
</body>

</html>