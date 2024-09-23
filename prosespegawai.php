<?php
if ($_POST) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $no_tlp = $_POST['no_tlp'];
    $id_jabatan = $_POST['id_jabatan'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $croppedImage = $_POST['cropped_data'];  // Data gambar yang sudah di-crop dalam format base64

    // Validasi input
    if (empty($nama)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='tambahpegawai.php';</script>";
    } elseif (empty($croppedImage)) {
        echo "<script>alert('Foto pegawai tidak boleh kosong');location.href='tambahpegawai.php';</script>";
    } else {
        include "koneksi.php";
        
        // Hash password menggunakan bcrypt
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Proses decoding base64 image
        $image_parts = explode(";base64,", $croppedImage);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];  // Mengambil ekstensi file (misal png)
        $image_base64 = base64_decode($image_parts[1]);

        // Buat nama file unik untuk gambar dan tentukan path penyimpanan
        $file_name = uniqid() . '.' . $image_type;
        $file_path = 'uploads/' . $file_name;

        // Simpan gambar hasil decoding ke direktori 'uploads'
        if (file_put_contents($file_path, $image_base64)) {
            // Jika gambar berhasil disimpan, simpan data pegawai ke database
            $insert = mysqli_query($conn, "INSERT INTO pegawai (nama, nik, alamat, kelamin, no_tlp, jabatan, email, username, password, foto) 
                VALUES ('$nama', '$nik', '$alamat', '$gender', '$no_tlp', '$id_jabatan', '$email', '$username', '$hashed_password', '$file_name')");

            // Cek apakah query berhasil dijalankan
            if ($insert) {
                echo "<script>alert('Sukses menambahkan pegawai');location.href='login.php';</script>";
            } else {
                // Jika gagal menyimpan ke database
                echo "<script>alert('Gagal menambahkan pegawai ke database');location.href='tambahpegawai.php';</script>";
            }
        } else {
            // Jika gagal menyimpan gambar ke direktori
            echo "<script>alert('Gagal menyimpan foto pegawai');location.href='tambahpegawai.php';</script>";
        }
    }
}
?>
o