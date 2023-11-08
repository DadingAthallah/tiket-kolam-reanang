<?php
session_start();
require '..\functions.php';

//wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

// Mengambil data pembelian tiket dari semua member
$query_pembelian = "SELECT tiket.id_tiket, tiket.jenis, transaksi.tanggal_pemesanan,
                    transaksi.id_user, user.nama_user 
                    FROM tiket 
                    INNER JOIN detail_transaksi ON tiket.id_tiket = detail_transaksi.id_tiket
                    INNER JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
                    INNER JOIN user ON transaksi.id_user = user.id_user
                    GROUP BY tiket.id_tiket, transaksi.id_user";

$result_pembelian = mysqli_query($conn, $query_pembelian);

$pembelian_tiket = array();

while ($row = mysqli_fetch_assoc($result_pembelian)) {
    $pembelian_tiket[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">s
    <style>
        h3 a {
        font-size: smaller;
        text-decoration: none;
        float: right;
        margin-top: 5px;
        }
    </style>
</head>
<body>
<div class = "container">
    <h3>Data Tiket <a href="dashboard_admin.php">Dashboard</a></h3><br>
    <table class = "table table-bordered mx-auto">
        <thead>    
            <tr class="text-center">
                <th>No</th>
                <th>ID Tiket</th>
                <th>Jenis</th>
                <th>Tanggal Pemesanan</th>
                <th>ID User</th>
                <th>Nama User</th>
            </tr>
        </thead>
        <?php $i = 1;?>
        <?php foreach($pembelian_tiket as $pembelian):?>
            <tr>
                <th class="text-center"><?php echo $i;?></th>
                <td class="text-center"><?php echo $pembelian["id_tiket"];?></td>
                <td class="text-center"><?php echo $pembelian["jenis"];?></td>
                <td class="text-center"><?php echo $pembelian["tanggal_pemesanan"];?></td>
                <td class="text-center"><?php echo $pembelian["id_user"];?></td>
                <td class="text-center"><?php echo $pembelian["nama_user"];?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach;?>
    </table>
</div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
