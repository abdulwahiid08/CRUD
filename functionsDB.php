<?php
    // Koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "phpdasar");

    // Membuat function untuk memngambil data mahasiswa dari database

    function query($data) {
        // membuat variabel global scope $connect , karna variabel $connet berada diluar function
        global $connect;
        // mengambil data mahasiswa
        $result = mysqli_query($connect, $data);  
            // data yang ditampung di array, dilooping supaya data nya dikeluarkan dari array
            while($row = mysqli_fetch_assoc($result)) {
                // Membuat kotak penampung datanya
                $arr[] = $row;        
            }
        //var_dump($arr);
        return $arr;
        }

?>