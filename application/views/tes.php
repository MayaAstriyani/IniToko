<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
    $total = 0;
    $data_penghasilan_hariIni = $this->model->getTotalPenghasilanHariIni();
    foreach ($data_penghasilan_hariIni as $d) {
       $total += $d['total_pembayaran'];
    }

    echo $total;
?>
</body>
</html>