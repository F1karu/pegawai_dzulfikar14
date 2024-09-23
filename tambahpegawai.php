<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>

    <style>
        body {
            background-color: #e9ecef;
            color: #495057;
        }
        .container {
            max-width: 700px;
            margin-top: 50px;
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
        .form-control, .form-select {
            border-radius: 10px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        #img-preview {
            display: none;
            max-width: 100%;
            margin-top: 20px;
            border-radius: 15px;
            max-height: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pegawai</h3>
            </div>
            <div class="card-body">
                <form action="prosespegawai.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_tlp" class="form-label">Telepon</label>
                        <input type="text" id="no_tlp" name="no_tlp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_jabatan" class="form-label">Jabatan</label>
                        <select id="id_jabatan" name="id_jabatan" class="form-select" required>
                            <option value="" disabled selected>Pilih Jabatan</option>
                            <?php 
                            include "koneksi.php";
                            $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                            while ($dt_jabatan = mysqli_fetch_array($qry_jabatan)) {
                                echo '<option value="'.$dt_jabatan['id_jabatan'].'">'.$dt_jabatan['nama_jabatan'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto" class="form-label">Foto Pegawai</label>
                        <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
                        
                        <!-- Preview gambar -->
                        <img id="img-preview" class="img-preview" style="display: none; max-width: 100%;">

                        <!-- Canvas untuk menampilkan hasil cropping -->
                        <canvas id="cropped_image" style="display: none;"></canvas>
                    </div>

                    <!-- Tombol untuk melakukan crop gambar -->
                    <button type="button" id="crop_button" class="btn btn-warning mt-3" style="display: none;">Konfirmasi Crop</button>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-success">Tambah Pegawai</button>
                    <input type="hidden" id="cropped_data" name="cropped_data">
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const fotoInput = document.getElementById('foto');         // Input file foto
    const imgPreview = document.getElementById('img-preview'); // Image preview element
    const canvas = document.getElementById('cropped_image');   // Canvas untuk hasil cropping
    const cropButton = document.getElementById('crop_button'); // Tombol konfirmasi crop
    let cropper;                                               // CropperJS instance

    // Event listener saat pengguna memilih file foto
    fotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                imgPreview.src = event.target.result;
                imgPreview.style.display = 'block';  // Tampilkan preview gambar

                // Inisialisasi CropperJS setelah gambar di-preview
                if (cropper) {
                    cropper.destroy(); // Hapus instance cropper sebelumnya jika ada
                }
                cropper = new Cropper(imgPreview, {
                    aspectRatio: 1,    // Rasio 1:1 seperti foto profil
                    viewMode: 1,
                    autoCropArea: 1
                });

                // Tampilkan tombol "Konfirmasi Crop"
                cropButton.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Function untuk memproses cropping saat tombol "Konfirmasi Crop" ditekan
    cropButton.addEventListener('click', function() {
        if (cropper) {
            // Crop gambar dan tampilkan hasilnya pada canvas
            const croppedCanvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300
            });

            // Convert hasil crop ke base64 dan tampilkan di canvas
            const croppedImage = croppedCanvas.toDataURL('image/png');
            canvas.style.display = 'block';
            canvas.getContext('2d').drawImage(croppedCanvas, 0, 0);

            // Tambahkan hasil cropped ke dalam input hidden agar bisa dikirim ke server
            document.getElementById('cropped_data').value = croppedImage;
        }
    });

    // Function untuk memproses cropping saat form dikirimkan
    function cropImage() {
        if (cropper) {
            // Crop gambar dan tampilkan hasilnya pada canvas
            const croppedCanvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300
            });

            // Convert hasil crop ke base64 dan tampilkan di canvas
            const croppedImage = croppedCanvas.toDataURL('image/png');
            canvas.style.display = 'block';
            canvas.getContext('2d').drawImage(croppedCanvas, 0, 0);

            // Tambahkan hasil cropped ke dalam input hidden agar bisa dikirim ke server
            document.getElementById('cropped_data').value = croppedImage;
        }
    }

    // Tambahkan event listener untuk crop gambar saat form disubmit
    document.querySelector('form').addEventListener('submit', function(e) {
        cropImage();
    });
</script>

</body>
</html>
