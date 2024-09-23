<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reset_code = $_POST['reset_code'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'tabel_pegawai');
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek apakah kode reset valid
    $sql = "SELECT * FROM pegawai WHERE reset_code='$reset_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update password pengguna
        $sql = "UPDATE pegawai SET password='$new_password', reset_code=NULL WHERE reset_code='$reset_code'";
        if ($conn->query($sql) === TRUE) {
            echo "Kata sandi berhasil direset.";
            
        } else {
            echo "Gagal mengupdate kata sandi.";
        }
    } else {
        echo "Kode reset tidak valid.";
    }

    $conn->close();
}
?>
