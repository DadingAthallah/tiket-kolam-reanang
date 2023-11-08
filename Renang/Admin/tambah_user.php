<?php
require '..\functions.php';

if(isset($_POST["tambah_user"])){
    $nama_user = $_POST["nama_user"];
    $saldo = $_POST["saldo"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    //cek nama
    $result = mysqli_query($conn,"SELECT nama_user FROM user WHERE nama_user = '$nama'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('nama sudah terdaftar')
            </script>";
            return false;
    }

    //keamanan password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO user (nama_user, password, saldo, role) VALUES ('$nama_user', '$password', $saldo, '$role')");
    echo "<script>alert('User berhasil ditambahkan');</script>";
    header('Location: form_tambah_user.php');

}
?>
