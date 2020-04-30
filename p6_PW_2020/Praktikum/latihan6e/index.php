<?php
require 'php/functions.php';
$pakaian = query("SELECT * FROM pakaian");

if (isset($_GET['cari'])){
    $keyword = $_GET['keyword'];
    $pakaian = query("SELECT * FROM pakaian WHERE 
                ukuran LIKE '%keyword%' OR
                warna LIKE '%keyword%' OR
                keterangan LIKE '%keyword%' OR
                harga LIKE '%keyword%' ");
}else{
    $pakaian = query("SELECT * FROM pakaian");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    
</head>
<body>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Index
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="php/admin.php">Admin</a>
            <a class="dropdown-item" href="php/tambah.php">Tambah Data</a>
        </div>
    </div>
    <br>
    <br>
    <form action="" method="get">
        <input type="text" name="keyword" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>       
    <br>
    <?php if (empty($pakaian)) : ?>
            <tr>
                <td colspan="7">
                    <h1>Tidak Ditemukan</h1>
                </td>
            </tr>
    <?php endif; ?>
    <div class="container">
        <?php foreach ($pakaian as $apparel) : ?>
            <p class="nama">
                <a href="php/detail.php?id=<?= $apparel['id'] ?>">
                    <?= $apparel["warna"] ?>
                </a>
            </p>
            <?php endforeach ;?>
    </div>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>