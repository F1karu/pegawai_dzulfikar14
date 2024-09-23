<?php
if($_POST) {
    $nama_jabatan=$_POST['nama_jabatan'];
    $gaji=$_POST['gaji'];
    $tunjangan=$_POST['tunjangan'];
    if(empty($nama_jabatan)) {
    echo "<script>alert('nama jabatan tidak boleh kosong');location.href='tambahjabatan.php';</script>";

} elseif(empty($gaji)) {
    echo "<script>alert('gaji tidak boleh kosong');location.href='tambahjabatan.php';</script>";
} else {
    include "koneksi.php";
    $insert=mysqli_query($conn, "insert into jabatan (nama_jabatan, gaji, tunjangan) value ('".$nama_jabatan."','".$gaji."','".$tunjangan."')");
    if($insert) {
        echo "<script>alert('Sukses menambahkan jabatan');location.href='tambahjabatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan jabatan');location.href='tambahjabatan.php';</script>";
        }
    }
}
?>