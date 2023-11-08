<?php
session_start();
include('..\functions.php');

if(isset($_POST['jumlah_saldo'])) {
    $jumlah_saldo = $_POST['jumlah_saldo'];

    $id_user = $_SESSION['id_user']; //ambil ID

    //periksa id
    $query = "SELECT * FROM user WHERE id_user = $id_user";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $saldo_sekarang = $row['saldo'];

        //update saldo
        $saldo_baru = $saldo_sekarang + $jumlah_saldo;
        $update_query = "UPDATE user SET saldo = $saldo_baru WHERE id_user = $id_user";
        $conn->query($update_query);

        //ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        echo "ID pengguna tidak valid.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
