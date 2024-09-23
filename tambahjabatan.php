<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 2rem;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-primary:focus, .btn-primary:active {
            box-shadow: none;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: 600;
        }
        .card {
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h3 class="card-title">Tambah Jabatan</h3>
            <form action="prosesjabatan.php" method="post">
                <div class="form-group">
                    <label for="nama_jabatan" class="form-label">Nama jabatan</label>
                    <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input type="text" id="gaji" name="gaji" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tunjangan" class="form-label">tunjangan</label>
                    <input type="text" id="tunjangan" name="tunjangan" class="form-control" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Tambah jabatan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
