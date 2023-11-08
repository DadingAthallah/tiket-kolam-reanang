<?php
session_start();
require '..\functions.php';

//wajib login
$id_user = $_SESSION['id_user'];
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['id_user'];
    $jumlah_anak = $_POST['anak'];
    $jumlah_dewasa = $_POST['dewasa'];

    //cek batas max tiket
    if ($jumlah_anak + $jumlah_dewasa > 5) {
        echo "Anda melebihi batas maksimal pemesanan (5 tiket).";
        exit;
    }

    //cek saldo
    $query_saldo = "SELECT saldo FROM user WHERE id_user = $id_user";
    $result_saldo = mysqli_query($conn, $query_saldo);
    $row_saldo = mysqli_fetch_assoc($result_saldo);
    $saldo = $row_saldo['saldo'];

    //harga tiket anak dan dewasa
    $harga_anak = 10000;
    $harga_dewasa = 15000;
    $total_harga = ($jumlah_anak * $harga_anak) + ($jumlah_dewasa * $harga_dewasa);


    if ($saldo < $total_harga) {
        echo "Saldo tidak mencukupi untuk melakukan pembelian.";
        exit;
    }

    //transaksi
    mysqli_autocommit($conn, false);

    //simpan transaksi
    $tanggal_pemesanan = $_POST['tanggal_pemesanan']; // Tanggal pemesanan
    $query_transaksi = "INSERT INTO transaksi (id_user, total_harga, tanggal_pemesanan) VALUES ('$id_user', '$total_harga', '$tanggal_pemesanan')";
    mysqli_query($conn, $query_transaksi);
    $id_transaksi = mysqli_insert_id($conn);

    //simpan detail transaksi tiket anak
    for ($i = 0; $i < $jumlah_anak; $i++) {
        $query_tiket_anak = "INSERT INTO tiket (harga, jenis) VALUES ('$harga_anak', 'anak')";
        mysqli_query($conn, $query_tiket_anak);
        $id_tiket_anak = mysqli_insert_id($conn);

        $query_detail_anak = "INSERT INTO detail_transaksi (id_user, id_transaksi, id_tiket, total_harga) 
            VALUES ('$id_user', '$id_transaksi', '$id_tiket_anak', '$harga_anak')";
        mysqli_query($conn, $query_detail_anak);
    }

    //simpan detail transaksi tiket dewasa
    for ($i = 0; $i < $jumlah_dewasa; $i++) {
        $query_tiket_dewasa = "INSERT INTO tiket (harga, jenis) VALUES ('$harga_dewasa', 'dewasa')";
        mysqli_query($conn, $query_tiket_dewasa);
        $id_tiket_dewasa = mysqli_insert_id($conn);

        $query_detail_dewasa = "INSERT INTO detail_transaksi (id_user, id_transaksi, id_tiket, total_harga) 
            VALUES ('$id_user', '$id_transaksi', '$id_tiket_dewasa', '$harga_dewasa')";
        mysqli_query($conn, $query_detail_dewasa);
    }

    //kurangi saldo user
    $saldo_baru = $saldo - $total_harga;
    $query_update_saldo = "UPDATE user SET saldo = '$saldo_baru' WHERE id_user = '$id_user'";
    mysqli_query($conn, $query_update_saldo);

    //commit transaksi
    mysqli_commit($conn);
    mysqli_autocommit($conn, true);

    header("Location: index.php");
}
?>
