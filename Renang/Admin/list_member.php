<?php
require '..\functions.php';
$user = query("SELECT * FROM user");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">s
    <title>List Member</title>
    <style>
        h3 a {
        font-size: smaller;
        text-decoration: none;
        float: right;
        margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data User <a href="dashboard_admin.php">Dashboard</a></h3><br>
        <table class="table table-bordered mx-auto">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($user as $row):?>
                    <tr>
                        <th class="text-center"><?php echo $i;?></th>
                        <td class="text-center"><?php echo $row["id_user"]?></td>
                        <td><?php echo $row["nama_user"]?></td>
                        <td class="text-center">Rp <?php echo $row["saldo"]?></td>
                        <td class="text-center"><?php echo $row["role"]?></td>
                        <td class="text-center">
                            <a href="ubah_user.php?id=<?php echo $row["id_user"];?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="hapus_user.php?id=<?php echo $row["id_user"];?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
