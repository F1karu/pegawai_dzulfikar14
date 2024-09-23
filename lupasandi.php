<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>
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

        .forgot-password-wrapper {
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
    <div class="forgot-password-wrapper">
        <h2>Lupa Kata Sandi</h2>
        <form action="proseslupa.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email Anda</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Kirim Kode Reset</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
