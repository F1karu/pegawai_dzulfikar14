<?php
// Include file koneksi ke database
include "koneksi.php";

// Cek apakah parameter 'id' sudah ada di URL
if (isset($_GET['id_pegawai'])) {
    $id = $_GET['id_pegawai'];

    // Query untuk mendapatkan data pegawai berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id'");
    $data = mysqli_fetch_array($query);

    // Cek apakah data ditemukan
    if ($data) {
        // Simpan data ke variabel
        $nama = $data['nama'];
        $nik = $data['nik'];
        $alamat = $data['alamat'];
        $gender = ($data['kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
        $telepon = $data['no_tlp'];
        $jabatan = $data['jabatan'];
        $email = $data['email'];
        $foto = $data['foto'];
    } else {
        echo "Data pegawai tidak ditemukan!";
        exit;
    }
} else {
    echo "ID pegawai tidak diberikan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: #ffffff;
        }
        .card-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 20px;
        }
        .card-body {
            padding: 30px;
        }
        .card img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detail Pegawai</h3>
        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                <img src="uploads/<?= $foto ?>" alt="Foto Pegawai">
            </div>
            <h4 class="card-title"><?= $nama ?></h4>
            <p><strong>NIK:</strong> <?= $nik ?></p>
            <p><strong>Alamat:</strong> <?= $alamat ?></p>
            <p><strong>Gender:</strong> <?= $gender ?></p>
            <p><strong>Telepon:</strong> <?= $telepon ?></p>
            <p><strong>Jabatan:</strong> <?= $jabatan ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <a href="tampilpegawai.php" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
