<?php
require '..\functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");
    header('Location: list_member.php');
}
?>
