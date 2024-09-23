<!DOCTYPE html>
<html>
<head>
    <title>Ubah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<?php
include "koneksi.php"; 

if(isset($_GET['id_pegawai']) && is_numeric($_GET['id_pegawai'])) {
    
    $id_pegawai = $_GET['id_pegawai'];

    $query_get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai");
    $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
    
    if(mysqli_num_rows($query_get_pegawai) > 0) {
        $data_pegawai = mysqli_fetch_assoc($query_get_pegawai);
?>

<body>
    <div class="container mt-5">
        <h3 class="mb-4">Ubah Data Pegawai</h3>
        <form method="post" action="proses_ubah.php" class="row g-3">
            <input type="hidden" name="id_pegawai" value="<?=$id_pegawai?>">

            <div class="col-md-6">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" name="nik" class="form-control" id="nik" value="<?=$data_pegawai['nik']?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama Pegawai:</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?=$data_pegawai['nama']?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?=$data_pegawai['alamat']?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="kelamin" class="form-label">Kelamin:</label>
                <select name="kelamin" class="form-select" id="kelamin" required>
                    <option value="L" <?=($data_pegawai['kelamin'] == 'L') ? 'selected' : ''?>>Laki-laki</option>
                    <option value="P" <?=($data_pegawai['kelamin'] == 'P') ? 'selected' : ''?>>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="no_tlp" class="form-label">Telepon:</label>
                <input type="text" name="no_tlp" class="form-control" id="no_tlp" value="<?=$data_pegawai['no_tlp']?>" required>
            </div>
            
            <div class="col-md-6">
                <label for="id_jabatan" class="form-label">Jabatan:</label>
                <select name="id_jabatan" class="form-select" id="id_jabatan" required>
                    <?php
                    while($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                        echo '<option value="'.$data_jabatan['id_jabatan'].'" '.($data_jabatan['id_jabatan'] == $data_pegawai['id_jabatan'] ? 'selected' : '').'>'.$data_jabatan['nama_jabatan'].'</option>'; 
                    }
                    ?>
                </select>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="tampilpegawai.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
    } else {
        echo "<div class='alert alert-danger'>Data pegawai tidak ditemukan.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID pegawai tidak valid.</div>";
}
?>
