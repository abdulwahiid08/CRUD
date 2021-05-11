<?php 
    require '../functiondb.php';

    $getId = $_GET["id"];

    if (delete($getId) > 0) {
        echo "Data Berhasil Dihapus";
        header('Location: ../index.php');
    } else {
        echo "Data Gagal Dihapus";
    }


?>