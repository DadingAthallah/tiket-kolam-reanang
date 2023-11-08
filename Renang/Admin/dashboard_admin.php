<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">s

    <title>Dashboard</title>
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
            margin-top: 50px;
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
            <img src="..\img\Dashboard.png" class="gambar-img-top" alt="Gambar Kolam Renang">
        </div>
        <div class="card">
            <div class="card-body">
                <form action="beli_tiket.php" method="post">
                <h4 class="text-center">Dashboard Admin</h4>
                <br>
                    <div class="btn-center">
                        <a href="list_member.php" class="btn btn-primary w-100">Data Member</a>
                    </div>
                    <div class="btn-center">
                        <a href="list_pembelian_tiket.php" class="btn btn-primary w-100">Data Tiket</a>
                    </div>
                    <div class="btn-center">
                        <a href="form_tambah_user.php" class="btn btn-primary w-100">Menambah User</a>
                    </div><br><br>
                    <p class="text-center">Username: admin | Password: admin</p>
                </form>
            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>