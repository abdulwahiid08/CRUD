<?php
require '../functiondb.php';

// Cek Apakah tombol submit sudah dutekan atau belum
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil di tambhakan atau tidak
    if (Tambah($_POST) > 0) {
        echo "DATA BERHASIL DI INPUT";
        header('Location: ../index.php');
    } else {
        echo "DATA ADA YANG ERROR!";
    }
    // var_dump($_POST);

    // Ambil data dari tiap element dalam form
    // $judul = $_POST["judul"];
    // $gambar = $_POST["gambar"];
    // $waktu = $_POST["waktu"];
    // $gate = $_POST["gate"];
    // $harga = $_POST["harga"];

    // query Insert data atau memasukkan data
    // $query = "INSERT INTO data
    //             VALUES
    //         ('', '$judul','$gambar','$waktu', $gate, $harga)
    //         ";
    // $result = mysqli_query($connect, $query);

    // Mengecek Apakah Database berhasil diinput atau ada yang error
    // if (mysqli_affected_rows($connect) > 0) {
    //     echo "DATA BERHASIL DI INPUT";
    // } else {
    //     echo "DATA ADA YANG ERROR!";
    //     echo "<br>";
    //     echo mysqli_error($connect);
    // }  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar Film</title>
    <style>
        ul li {
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="tit">
        <h1>Tambah Daftar Film</h1>
    </div>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="judul">Judul Film : </label>
                <input type="text" name="judul" id="judul" placeholder="Input Judul Film" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" placeholder="Masukkan Gambar" required>
            </li>
            <li>
                <label for="waktu">Waktu : </label>
                <input type="time" name="waktu" id="waktu" required>
            </li>
            <li>
                <label for="gate">Gate : </label>
                <input type="number" name="gate" id="gate" required>
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" placeholder="Input Harga" required>
            </li>
            <li>
                <button type="submit" name="submit">TAMBAH FILM</button>
            </li>
        </ul>
    </form>

    <a href="../index.php">Kembali Ke Home</a>

</body>

</html>