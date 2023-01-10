<?php
	$berat = 0;
?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(assets/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Tas
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Produk</th>
							<th class="column-3">Harga</th>
							<th class="column-4 p-l-70">Jumlah</th>
							<th class="column-5">Total</th>
						</tr>

						<?php
							$i = 0;
							foreach ($this->cart->contents() as $items) {
								$i++;
								$berat += $items['berat'] * $items['qty'];
						?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="assets/images/produk/<?=$items['img']?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?=$items['name']?></td>
							<td class="column-3" id="harga">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?=$items['qty']?>" id="qty" disabled>
								</div>
							</td>
							<td class="column-5" id="subtotal">Rp. <?php echo $this->cart->format_number($items['price'] * $items['qty']); ?></td>
						</tr>
						<?php
							} 
						?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<?=anchor('/Initoko/cart/', 'Muat Ulang Tas', [
						'class' => 'flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4' , 
						'role' => 'button'
					])?>
				</div>
			</div>

			<!-- Total -->
			<?=form_open('/Initoko/add_order', ['class'=>'form-auth-small'])?>
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Total Tas
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Pengiriman:
					</span>

					<div class="w-size20 w-full-sm">
						<span class="s-text19">
							Alamat Anda
						</span>

						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="id_user" name="id_user" placeholder="Nama Anda" value="<?=$this->session->userdata('id');?>" hidden>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="nama" name="nama" placeholder="Nama Anda">
						</div>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="nohp" name="nohp" placeholder="Nomor Ponsel">
						</div>
						
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select onChange="getKota()" id="provinsi" class="selection-2 provinsi" name="provinsi">
								<option value="">Pilih Provinsi Tujuan</option>
							</select>
						</div>

						
						<input id="prov" class="sizefull s-text7 p-l-15 p-r-15 prov" type="text" name="prov" placeholder="Nama Anda" hidden>
					

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select id="kota" onChange="getKotaById()" class="selection-2 kota" name="kota">
								<option value="">Pilih Kota Tujuan</option>
							</select>
						</div>

						<input id="kot" class="sizefull s-text7 p-l-15 p-r-15 kot" type="text" name="kot" placeholder="Nama Anda" hidden>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap">
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="kodepos" name="kodepos" placeholder="Kode Pos">
						</div>

						<Label>Berat Barang (dalam Kg)</Label>
						<div class="size13 bo4 m-b-22">
							<input id="berat" class="sizefull s-text7 p-l-15 p-r-15" type="text" name="berat" placeholder="Total Berat Barang" value = "<?=$berat?>">
						</div>
						
						<Label>Pilih Kurir</Label>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select onChange="getOngkir()" id="kurir" class="selection-2 kurir" name="kurir">
								<option value="0">Pilih Jasa Pengiriman</option>
								<option value="jne">JNE</option>
								<option value="pos">POS</option>
								<option value="tiki">TIKI</option>
							</select>
						</div>

						<Label>Pilih Paket Pelayanan</Label>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select id="service" class="selection-2 service" name="service">
								
							</select>
						</div>

						<!-- <div class="size14 trans-0-4 m-b-10">
							
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Total
							</button>
						</div> -->
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<input id="submit" type="submit" value="Lanjut Pembayaran" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				</div>
			</div>
			</form>
		</div>
	</section>

	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

	<script type="text/javascript">
		window.onload = function() {
			if(!window.location.hash) {
				window.location = window.location + '#loaded';
				window.location.reload();
			}
		}
		$(function() {
			$.get("<?= site_url('/initoko/get_provinsi') ?>",{}, (response)=>{
				let output = '';
				let provinsi = response.rajaongkir.results
				console.log(response);
				
				output += `<option value="0">Pilih Provinsi Tujuan</option>`
				provinsi.map((val, i)=>{
					output += `<option value="${val.province_id}">${val.province} </option>`
				})
				$('.provinsi').html(output)
			})
		});

		function getKota() {
			let id_provinsi = $('#provinsi').val();

			let provs = '';

			$.get("<?= site_url('/initoko/get_provinsi/') ?>"+id_provinsi,{}, (response)=>{
				let prov = response.rajaongkir.results[id_provinsi - 1].province
				console.log(prov);
				document.getElementById("prov").value = prov;
			})
			
			$.get("<?= site_url('/initoko/get_kota/') ?>"+id_provinsi,{}, (response)=>{
				let output = '';
				let kota = response.rajaongkir.results
				console.log(response)
				
				output += `<option value="0">Pilih Kota Tujuan</option>`
				kota.map((val, i)=>{
					output += `<option value="${val.city_id}">${val.city_name} </option>`
				})
				$('#kota').html(output)
			})
		}

		function getKotaById() {
			let id_provinsi = $('#provinsi').val();
			let id_kota = $('#kota').val();

			$.get("<?= site_url('/initoko/get_kotaId/') ?>"+id_provinsi+"/"+id_kota,{}, (response)=>{
				let kota = response.rajaongkir.results.city_name
				console.log(kota);
				document.getElementById("kot").value = kota;
			})
		}

		function getOngkir() {
			let id_kota = $('#kota').val();
			let berat = $('#berat').val();
			let asal = "37";
			let tujuan = $('#kota').val();
			let kurir = $('#kurir').val();
			let output = '';

			$.get("<?= site_url('/initoko/get_kota/') ?>"+id_kota,{}, (response)=>{
				let kota = response.rajaongkir.results[id_kota - 1].city_name
				console.log(kota);
				// document.getElementById("prov").value = prov;
			})
			
			$.get("<?= site_url('/initoko/get_biaya/') ?>"+`${asal}/${tujuan}/${berat}/${kurir}`,{}, (response)=>{
				let biaya = response.rajaongkir.results
				console.log(response)
				
				biaya.map((val, i)=>{
					for (var i = 0; i < val.costs.length; i++) {
						let jenis_layanan = val.costs[i].service
						val.costs[i].cost.map((val, i)=>{
							output += `<option value="Rp. ${val.value} - ${jenis_layanan}">${jenis_layanan} Rp. ${val.value} ${val.et} Hari</option>`
						})
					}
				})
				$('#service').html(output)
			})
		}
	</script>