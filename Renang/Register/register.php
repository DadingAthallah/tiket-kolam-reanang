<?php
require '..\functions.php';

if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo "<script>
                alert('berhasil')
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Registrasi</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('background.png'); /* Atur gambar latar belakang di sini */
            background-size: 1021.28px 668.16px;
    background-repeat: no-repeat; /* Untuk menghindari pengulangan gambar */
    background-position: center; 
        }
        .login-container {
            
            background-color: #ffffff;
            border: 1.5px solid #E5E5E5;
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }
        .login-container h4 a {
        font-size: smaller; /* Ukuran font lebih kecil */
        text-decoration: none; /* Tidak ada garis bawah */
        float: right; /* Posisi kanan */
        margin-top: 5px; /* Sedikit jarak dari atas */
        }
    </style>
</head>
<body>
<div class="login-container">
        <h4 class="text-left">Register <a href="login.php">Login</a></h4>
        <br>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-100" name="register">Register</button>
            <br>
            <a href="login.php" class="mt-3 d-block text-center">Udah punya akun? Masuk aja lah!</a>
        </form>
    </div>
</body>
</html>