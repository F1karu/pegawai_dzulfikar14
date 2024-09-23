<?php

include "koneksi.php";


if(isset($_GET['id_pegawai'])) {
    
    $id_pegawai = mysqli_real_escape_string($conn, $_GET['id_pegawai']);

    
    $query = "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'";

  
    if(mysqli_query($conn, $query)) {
       
        header("Location: tampilpegawai.php");
        exit(); 
    } else {
        echo "Gagal menghapus data pegawai: " . mysqli_error($conn);
    }
} else {
    
    echo "ID pegawai tidak ditemukan.";
}
?>