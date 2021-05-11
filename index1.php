<?php
// Koneksi ke database
// penulisannya ' mysqli_connect("namahost", "username databses", "password", "nama database");
$connect = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil data dari tabel mahasiswa di database
// syntax mysql ditulis kapital
$result = mysqli_query($connect, "SELECT * FROM mahasisw");
// Untuk mengecek error pada pemanggilan database
// if( !$result ){
//     echo mysqli_error($connect);
// }

// ambil data (fetch) mahasiswa dari object result
// Ada 4 cara mengambil (fetch) data nya
// 1. mysqli_fetch_row(); -> mengembalikan berbentuk Array Numerik (array angka)
// 2. mysqli_fetch_assoc(); -> mengembalikan array assosiative
// 3. mysqli_fetch_array(); -> Mengembalikan array numerik dan array assosiative // tidak disarankan menggunakan symtax ini, krna mengembalikan data nya 2 kali.
// 4. mysqli_fetch_object(); -> Mengembalikan nilai berupa object
// untuk menampilkan semua data gunakan Looping

//$fetch = mysqli_fetch_assoc($result);
// while($fetch = mysqli_fetch_assoc($result) ) {
//     var_dump($fetch);
// }




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
          <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
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