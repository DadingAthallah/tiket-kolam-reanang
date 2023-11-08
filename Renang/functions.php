<?php
//koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db   = "renang";

$conn = mysqli_connect($host,$user,$pass,$db);

if (!$conn) {
	die("Koneksi gagal:".mysqli_connect_error());
}
//register
function registrasi($data){
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $role = "member";
//cek nama
    $result = mysqli_query($conn,"SELECT nama_user FROM user WHERE nama_user = '$nama'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('nama sudah terdaftar')
            </script>";
            return false;
    }
//cek konfrim password
    if($password !== $password2){
        echo "<script>
                alert('konfrimasi password tidak sesuai')
            </script>";
            return false;
    }

//keamanan password
    $password = password_hash($password, PASSWORD_DEFAULT);

//insert user
mysqli_query($conn, "INSERT INTO user (nama_user, password, role) VALUES ('$nama', '$password', '$role')");

return mysqli_affected_rows($conn);
}

//dashboard
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}



?>