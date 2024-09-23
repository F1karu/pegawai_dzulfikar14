<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('assets/foto/green.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .reset-password-wrapper {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="reset-password-wrapper">
        <h2>Reset Kata Sandi</h2>
        <form action="prosesreset.php" method="post">
            <div class="mb-3">
                <label for="reset_code" class="form-label">Masukkan Kode Reset</label>
                <input type="text" name="reset_code" class="form-control" id="reset_code" placeholder="Kode Reset" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Kata Sandi Baru" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Reset Kata Sandi</button>
            </div>
        </form>
    </div>
</body>
</html>
