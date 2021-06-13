<?php
require '../functiondb.php';

// Ambil data dari URL
$new = $_GET["id"];

// Query Data Mahasiswa Berdasarkan id
$result = query("SELECT * FROM data WHERE id = $new")[0];


// Cek Apakah tombol submit sudah dutekan atau belum
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil di ubah atau tidak
    if (update($_POST) > 0) {
        echo "Data Berhasil Di Update";
        header('Location: ../index.php');
    } else {
        echo "Data Ada Yang ERROR!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Daftar Film</title>
    <style>
        ul li {
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="tit">
        <h1>Update Daftar Film</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

        <!-- Membuat sebuah inputan yang berisi id, untuk dikirm ke query function update -->
        <input type="hidden" name="id" value="<?= $result["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $result["gambar"] ?>">
        <ul>
            <li>
                <label for="judul">Judul Film : </label>
                <input type="text" name="judul" id="judul" placeholder="Input Judul Film" required value="<?= $result["judul"]; ?> ">
            </li>
            <li>

                <label for="gambar">Gambar : </label>
                <br>
                <img src="../image/<?= $result["gambar"]; ?>" alt="" width="50">
                <br>
                <input type="file" name="gambar" id="gambar" placeholder="Masukkan Gambar" required>
            </li>
            <li>
                <label for="waktu">Waktu : </label>
                <input type="time" name="waktu" id="waktu" required value="<?= $result["waktu"]; ?> ">
            </li>
            <li>
                <label for="gate">Gate : </label>
                <input type="number" name="gate" id="gate" required value="<?= $result["gate"]; ?> ">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" placeholder="Input Harga" required value="<?= $result["harga"]; ?> ">
            </li>
            <li>
                <button type="submit" name="submit">UPDATE</button>
            </li>
        </ul>
    </form>

    <a href="../index.php">Kembali Ke Home</a>

</body>

</html>