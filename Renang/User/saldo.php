<?php
session_start();
include('..\functions.php');

$id_user = $_SESSION['id_user']; //ambil id

//wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

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
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Form Pengisian Saldo</title>
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
        <h4 class="text-left">Pengisian Saldo <a href="index.php">Home</a></h4><br>
        <form action="pengisian.php" method="post">
            <p class="text-center">Saldo anda sekarang: Rp.<?php echo $saldo_sekarang?></p><br>
            <div class="mb-3">
                <label for="Isi saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" id="jumlah_saldo" name="jumlah_saldo" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="Isi saldo">Beli</button>
            <br>
            <p class="text-center">Minimal Rp.10.000 jon!</p>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
