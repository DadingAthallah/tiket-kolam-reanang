<?php
require '..\functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = query("SELECT * FROM user WHERE id_user = $id");
    if(isset($_POST['submit'])){
        // Proses perubahan data
        $nama = $_POST['nama'];
        $saldo = $_POST['saldo'];
        mysqli_query($conn, "UPDATE user SET nama_user = '$nama', saldo = $saldo WHERE id_user = $id");
        header('Location: list_member.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Member</title>
</head>
<body>
    <?php foreach($user as $row):?>
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama_user']; ?>"><br><br>
            <label for="saldo">Saldo:</label>
            <input type="number" id="saldo" name="saldo" value="<?php echo $row['saldo']; ?>"><br><br>
            <input type="submit" name="submit" value="Simpan Perubahan">
        </form>
    <?php endforeach;?>
</body>
</html>
