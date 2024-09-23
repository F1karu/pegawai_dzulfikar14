<?php
    if($_POST){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";

            // Query untuk mendapatkan data pengguna berdasarkan username
            $qry_login = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '".$username."'");
            
            // Periksa apakah username ditemukan
            if(mysqli_num_rows($qry_login) > 0){
                $dt_login = mysqli_fetch_array($qry_login);

                // Verifikasi password dengan password_verify
                if(password_verify($password, $dt_login['password'])){
                    session_start();
                    $_SESSION['id_pegawai'] = $dt_login['id_pegawai'];
                    $_SESSION['nama'] = $dt_login['nama'];
                    $_SESSION['status_login'] = true;
                    header("location: home.php");
                } else {
                    echo "<script>alert('Password tidak benar');location.href='login.php';</script>";
                }
            } else {
                echo "<script>alert('Username tidak ditemukan');location.href='login.php';</script>";
            }
        }
    }
?>
