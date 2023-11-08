<?php
session_start();
require '..\functions.php';

if(isset($_POST["login"])){

    $nama = $_POST["nama"];
    $password = $_POST["password"];

//cari nama
    $result = mysqli_query($conn,"SELECT * FROM user WHERE nama_user = '$nama'");
    
//cek nama
    if(mysqli_num_rows($result)===1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if  (password_verify($password,$row["password"])){
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama_user'] = $row['nama_user'];
            if($row['role'] == 'admin'){
                header("Location: ..\Admin\dashboard_admin.php"); // Redirect ke halaman admin
            } else if($row['role'] == 'member'){
                header("Location: ..\User\index.php"); // Redirect ke halaman home member
            }
            exit;
        }

    }

    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('background.png');
            background-size: 1021.28px 668.16px;
            background-repeat: no-repeat;
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
        font-size: smaller;
        text-decoration: none;
        float: right;
        margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="login-container">
        <h4 class="text-left">Login <a href="register.php">Register</a></h4>
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
            <br>
            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
            <br>
            <a href="register.php" class="mt-3 d-block text-center">Belom punya akun? Daftar dulu lah!</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>