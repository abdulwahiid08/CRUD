<?php
    require_once 'functiondb.php';

    $result = query("SELECT * FROM data");

    // Tombol Cari Ditekan
    if( isset($_POST["cari"]) ) {
        $result = cari($_POST["keyword"]);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film</title>
</head>

<body style="text-align: center;">
    <div class="title">
        <h1>Daftar Film Hari Ini</h1>
    </div>

    <!-- Membuat form Searching -->
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" placeholder="Pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <table border="1" cellspacing="0" cellpadding="10" style="margin-left:300px;">
        <tr>
            <th>No</th>
            <th>Judul Film</th>
            <th>Gambar</th>
            <th>Waktu</th>
            <th>Gate</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($result as $rst) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $rst["judul"]; ?></td>
                <td><img src="image/<?= $rst["gambar"]; ?>" alt="" width="100"></td>
                <td><?= $rst["waktu"]; ?></td>
                <td><?= $rst["gate"]; ?></td>
                <td><?= $rst["harga"]; ?></td>
                <td>
                    <a href="CRUD/update.php?id=<?= $rst["id"]; ?>" onclick="return confirm ('Yakin Mau Diubah ?')">Ubah</a> |
                    <a href="CRUD/delete.php?id=<?= $rst["id"]; ?>" onclick="return confirm('Yakin Mau Dihapus ?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </table>
    <br>
    <div class="insert" style="text-align: center;">
        <a href="CRUD/insert.php">+ Tambah Data Film</a>
    </div>
</body>

</html>