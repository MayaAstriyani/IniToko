<?php 
    $thisInfo = $this->input->get('info');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
        body{
            margin-left : 100px;
            margin-right : 200px;
            margin-top : 100px;
        }
    </style>
</head>
<body>
    <?php
        if ($thisInfo == "sukses") {
            echo "<div class='alert alert-success' role='alert'>
                    <h4 class='alert-heading'>Sukses!</h4>
                    <p>Terima kasih sudah melakukan pembayaran, pesanan anda akan segera kami kirim.</p>
                    <hr>
                    <p class='mb-0'>Klik link berikut untuk info lebih lanjut : <a href=''>Klik!</a></p>
                    <a href='/Initoko'>Kembali!</a>
                </div>";
        }
        
        else if ($thisInfo == "gagalAlamat") {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>Gagal!</h4>
                    <p>Alamat yang harus diisikan masih kosong.</p>
                    <hr>
                    <p class='mb-0'><a href=''>Kembali</a></p>
                </div>";
        } 

        else if ($thisInfo == "gagalKeranjang") {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>Gagal!</h4>
                    <p>Anda tidak mempunyai barang di keranjang anda.</p>
                    <hr>
                    <p class='mb-0'>Silahkan <a href=''>Klik!</a> terlebih dahulu.</p>
                </div>";
        } 

        else if ($thisInfo == "gagalBayar") {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>Gagal!</h4>
                    <p>Gagal melakukan pemesanan.</p>
                    <hr>
                    <p class='mb-0'>Silahkan ulangi lagi. <a href=''>Klik!</a></p>
                </div>";
        } 

        else if ($thisInfo == "gagalResi") {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>Peringatan!</h4>
                    <p>Masukan resi pada kolom input.</p>
                    <hr>
                    <p class='mb-0'>Silahkan ulangi lagi. <a href=''>Klik!</a></p>
                </div>";
        } 
    ?>
</body>
</html>