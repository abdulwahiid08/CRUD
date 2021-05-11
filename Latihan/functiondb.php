<?php 
    // Mengconect database dan melakukan query
    $connect = mysqli_connect("localhost", "root", "", "film");

    function query($data) {
        global $connect;

        $plate = mysqli_query($connect, $data);

        while ($row = mysqli_fetch_assoc($plate)) {
            $arr[] = $row;
        }
        return $arr;
    }
    
    // Membuat fungsi tambat atau create
    // Insert ke database atau menambahkan data 
    function Tambah($data) {
        global $connect;

        // Ambil data dari tiap element dalam form
        // htmlspecsialchars berfungsi untuk mengatasi user mengirim file yang jahat
        $judul = htmlspecialchars($data["judul"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $gate = htmlspecialchars($data["gate"]);
        $harga = htmlspecialchars( $data["harga"]);

// query Insert data atau memasukkan data
    $query = "INSERT INTO data
                    VALUES
                ('', '$judul','$gambar','$waktu', $gate, $harga) ";
     mysqli_query($connect, $query);

     // Mengembalikan nilai
     return mysqli_affected_rows($connect);
    }

    //Membuat fungsi Delete
    function delete($getId) {
        global $connect;

        mysqli_query($connect, "DELETE FROM data WHERE id = $getId");

        return mysqli_affected_rows($connect);
    }

    // Membuat fungso Update
    function update($data) {
        global $connect;

    $id = $data["id"];    
    $judul = htmlspecialchars($data["judul"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $gate = htmlspecialchars($data["gate"]);
    $harga = htmlspecialchars($data["harga"]);

    // query Insert data atau memasukkan data
    $query = "UPDATE data SET 
              judul = '$judul',
              gambar = '$gambar',
              waktu = '$waktu',
              gate = $gate,
              harga = $harga

              WHERE id = $id
              ";
    mysqli_query($connect, $query);

    // Mengembalikan nilai
    return mysqli_affected_rows($connect);
    }

    // Membuat Fungsi Searching atau cari
    function cari($data) {
        $query = "SELECT * FROM data
                    WHERE
                  judul LIKE '%$data%' OR
                  harga LIKE '%$data%'
                  ";
            // jika menggunkan = , maka kita mencari data harus sesuai dengan database
            //tapi jika menggunakan LIKE %...%, kita bisa mencari datanya walaupun tidak sesuai dengan database
            // % atau wildcard, berguna untuk memudahkan kita dalam mencari data jika data yang kita masukkan hanya sepenggal, seperti Abdul. maka dia akan mencari yang nama nya abdul.
                
        return query($query);                
    }




?>