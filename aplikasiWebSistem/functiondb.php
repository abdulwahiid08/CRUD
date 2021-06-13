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
        $waktu = htmlspecialchars($data["waktu"]);
        $gate = htmlspecialchars($data["gate"]);
        $harga = htmlspecialchars( $data["harga"]);
        
        //Upload Gambar
        $gambar = upload();
        if (!$gambar) {
            return false;
        }

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

    // Membuat Fungsi Upload
    function upload() {
        // Menangkap foto
        $namaFile = $_FILES['gambar']['name'];
        // Menangkap Ukuran dari foto
        $sizeFile = $_FILES['gambar']['size'];
        // Menangkap Kesalahan atau Error dari Foto
        $errorFile = $_FILES['gambar']['error'];
        // Menangkap tempaa penyimpanan sementara
        $tmpName = $_FILES['gambar']['tmp_name'];

        // 1. Cek apakah foto di upload atau tidak
        // 4 menandakan bahwa itu pesan error
        if ($errorFile === 4) {
        //echo "File Belum di Upload";
        echo "<script>
                alert('File Belum di Upload')
            </script>";
            return false;
        }
        
        // 2. Cek Apakah yang diupload adalah Foto
        // Simpan Ke dalam bentuk Array
        $ekstensiFoto = ['jpg', 'jpeg', 'png'];
        
        // Mengambil nama ekstensi didalam variabel ekstensiFoto
        // fungsi explode berfungsi untuk memecah string
        $catchEkstensi = explode('.',$namaFile);
        
        //setelah string dipecah, php akan mengambil format foto.
        // strtolower berfungsi untuk membuat kata menjadi huruf kecil semua, dikarenakan data yang kita masukkan ke array menggunakan huruf kecil
        $ambilEkstensFoto = strtolower(end($catchEkstensi));
            if ( !in_array($ambilEkstensFoto, $ekstensiFoto) ){
                echo "<script>
                        alert('File Yang Anda Upload Bukan Foto')
                    </script>";
                return false;
            }

        // 3. Cek Jika ukurannya Terlalu besar 
        if ($sizeFile > 3000000) {
            echo "<script>
                    alert('Ukuran File Terlalu Besar')
                </script>";
            return false;
        }

        // Lolos pengecekan, gambar siap di upload
        // Menggunakan Fungsi move_uploaded_file(nama direktori file, 'folder yang dituju' . nama file yang ditangkap)
        // Untuk mencegah nama file yang sama, maka kita membuat sebuah uniq id pada file tersebut

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ambilEkstensFoto; 

        move_uploaded_file($tmpName, '../image/' . $namaFileBaru);

        return $namaFileBaru;
    }



    // Membuat fungsi Update
    function update($data) {
        global $connect;

    $id = $data["id"];    
    $judul = htmlspecialchars($data["judul"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $gate = htmlspecialchars($data["gate"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if($_FILES["gambar"]['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    
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