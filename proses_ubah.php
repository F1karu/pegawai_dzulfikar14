<?php
include "koneksi.php"; // Menghubungkan ke file koneksi.php

// Periksa apakah data yang diperlukan telah disubmit melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $id_pegawai = $_POST['id_pegawai'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelamin = $_POST['kelamin'];
    $no_tlp = $_POST['no_tlp'];

    // Query untuk mengupdate data pegawai berdasarkan id_pegawai
    $query_update_pegawai = mysqli_query($conn, 
        "UPDATE pegawai SET 
        nik='$nik', 
        nama='$nama', 
        alamat='$alamat', 
        kelamin='$kelamin',
        no_tlp='$no_tlp' 
        WHERE id_pegawai = $id_pegawai");

    // Periksa apakah query berhasil dijalankan
    if ($query_update_pegawai) {
        // Jika berhasil, tampilkan pesan sukses
        echo "<script>alert('Sukses mengubah pegawai');location.href='tampilpegawai.php';</script>";
    } else {
        // Jika query gagal dijalankan, tampilkan pesan kesalahan
        echo "<script>alert('Gagal mengubah pegawai: " . mysqli_error($conn) . "');location.href='ubah.php?id_pegawai=$id_pegawai';</script>";
    }
} else {
    // Jika data tidak disubmit melalui metode POST, tampilkan pesan kesalahan
    echo "Metode yang digunakan tidak valid.";
}
?>
