<?php
session_start();
require '..\functions.php';

//wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$nama_user = $_SESSION['nama_user'];

$id_user = $_SESSION['id_user']; //ambil id
//periksa id
$query = "SELECT * FROM user WHERE id_user = $id_user";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $saldo_sekarang = $row['saldo'];
} else {
    echo "ID pengguna tidak valid.";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Tiket Kolam Renang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('background.png');
            background-size: 1021.28px 668.16px;
            background-repeat: no-repeat;
            background-position: center; 
        }
        .card-container {
            display: flex;
            justify-content: center; /* Menengahkan card-container */
            gap: 30px;
        }
        .card img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 15px;
        }
        .card {
            background-color: #ffffff;
            border: 1.5px solid #E5E5E5;
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }
        .btn-center{
            display: flex;
            justify-content: center;
        }
        
        .card-body h4 a {
            font-size: smaller; /* Ukuran font lebih kecil */
            text-decoration: none; /* Tidak ada garis bawah */
            float: right; /* Posisi kanan */
            margin-top: 5px; /* Sedikit jarak dari atas */
        }
    </style>
</head>
<body>
<div class="container card-container">
        <div class="card">
            <img src="..\img\jadwalkolam.png" class="gambar-img-top" alt="Gambar Kolam Renang">
        </div>
        <div class="card">
            <div class="card-body">
                <form action="beli_tiket.php" method="post">
                <h4 class="text-left">Pembelian Tiket<a href="index.php">Home</a></h4>
                <br>
                    <div class="mb-3">
                        <label for="anak" class="form-label">Jumlah Tiket Anak (Rp 10.000/tiket):</label>
                        <input type="number" class="form-control" name="anak" id="anak" min="0" max="5">
                    </div>
                    <div class="mb-3">
                        <label for="dewasa" class="form-label">Jumlah Tiket Dewasa (Rp 15.000/tiket):</label>
                        <input type="number" class="form-control" name="dewasa" id="dewasa" min="0" max="5">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan:</label>
                        <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan">
                    </div><br>
                    <div class="btn-center">
                        <button type="submit" class="btn btn-primary" >Beli Tiket</button>
                    </div>
                    <a href="saldo.php" class="mt-3 d-block text-center">Saldo anda sekarang: <?php echo $saldo_sekarang?>, Isi aja!</a>
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
