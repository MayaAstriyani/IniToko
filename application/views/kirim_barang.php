<?php 
    $thisId = $this->input->get('id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kirim Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            margin-left : 50px;
            margin-right : 500px;
            margin-top : 50px;
        }
    </style>
</head>
<body>
    <?=form_open('/Admin/inputResi/'.$thisId)?>
    <div class="form-group">
        <h3 class="display-4">Nomor Resi Pengiriman</h3>
        <input type="text" class="form-control" id="inputResi" name="inputResi" aria-describedby="emailHelp" placeholder="Masukan nomor resi">
        <small id="emailHelp" class="form-text text-muted">Cek terlebih dahulu sebelum lanjut.</small>
    </div>
    <button type="submit" class="btn btn-primary">Lanjut</button>
    </form>
</body>
</html>