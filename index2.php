<?php
 require 'functionsDB.php';

 $data = query("SELECT * FROM mahasisw");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database to PHP</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
          <?php foreach ($data as $fetch) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
                </td>
                <td><img src=" <?= $fetch["gambar"]; ?> " alt="gambar.jpg" width="80px"></td>
                <td><?= $fetch["nim"]; ?></td>
                <td><?= $fetch["nama"]; ?></td>
                <td><?= $fetch["email"]; ?></td>
                <td><?= $fetch["jurusan"]; ?></td>
            </tr>
            <?php $i++;?>
        <?php } ?>

    </table>
</body>

</html>