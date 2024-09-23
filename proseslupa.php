<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'tabel_pegawai');
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek apakah email ada di database
    $sql = "SELECT * FROM pegawai WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Buat kode reset acak
        $reset_code = rand(100000, 999999);  // Kode reset berupa 6 angka
        
        // Simpan kode reset ke database
        $sql = "UPDATE pegawai SET reset_code='$reset_code' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            // Kirim kode reset melalui email
            $subject = "Kode Reset Kata Sandi Anda";
            $message = "Kode reset kata sandi Anda adalah: $reset_code. Gunakan kode ini untuk mereset kata sandi Anda.";
            $headers = "From: fikarunihbos@gmail.com";

            if (mail($email, $subject, $message, $headers)) {
                echo "Kode reset telah dikirim ke email Anda.";
            } else {
                echo "Gagal mengirim email.";
            }
        } else {
            echo "Gagal menyimpan kode reset ke database.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }

    $conn->close();
}
?>
