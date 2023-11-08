<?php
session_start();
require '..\functions.php';

//wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// mengambil data transaksi pengguna
$query_transaksi = "SELECT * FROM transaksi WHERE id_user = '$id_user'";
$result_transaksi = mysqli_query($conn, $query_transaksi);

// mengambil data detail transaksi untuk setiap transaksi
$transaksi_details = array();

while ($row = mysqli_fetch_assoc($result_transaksi)) {
    $id_transaksi = $row['id_transaksi'];
    $query_detail = "SELECT tiket.id_tiket, tiket.jenis, tiket.harga, detail_transaksi.total_harga 
                     FROM detail_transaksi 
                     INNER JOIN tiket ON detail_transaksi.id_tiket = tiket.id_tiket 
                     WHERE detail_transaksi.id_transaksi = '$id_transaksi'";

    $result_detail = mysqli_query($conn, $query_detail);
    $details = array();

    while ($detail_row = mysqli_fetch_assoc($result_detail)) {
        $details[] = $detail_row;
    }

    $row['details'] = $details;
    $transaksi_details[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
<div class="container mt-5">
        <h3>History Pemesanan Tiket <a href="index.php">Home</a></h3><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Detail Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transaksi_details as $transaksi):?>
                    <tr>
                        <td><?php echo $transaksi["id_transaksi"];?></td>
                        <td><?php echo $transaksi["total_harga"];?></td>
                        <td><?php echo $transaksi["tanggal_pemesanan"];?></td>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID Tiket</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transaksi['details'] as $detail):?>
                                        <tr>
                                            <td><?php echo $detail["id_tiket"];?></td>
                                            <td><?php echo $detail["jenis"];?></td>
                                            <td><?php echo $detail["harga"];?></td>
                                            <td><?php echo $detail["total_harga"];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
