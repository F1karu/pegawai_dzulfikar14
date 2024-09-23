<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: url('assets/foto/green.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .outer-wrapper {
            position: relative;
            padding: 5px; /* Space for the animated border */
            border-radius: 15px; /* Smooth outer corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Add box shadow */
        }

        .login-wrapper {
            position: relative;
            display: flex;
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
            overflow: hidden;
            background-color: white; /* Background for the content */
            z-index: 1;
        }

        .login-box {
            flex: 1;
            padding: 40px;
        }

        .login-left {
            color: black;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        }

        .login-right {
            background: linear-gradient(90deg, #00b09b, #96c93d);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: -4px 0 15px rgba(0, 0, 0, 0.1);
        }

        .login-right h2 {
            font-weight: bold;
        }

        .login-right p {
            margin: 20px 0;
        }

        .text-end {
            padding-right: 70px;
        }

        @property --angle {
            syntax: "<angle>";
            initial-value: 0deg;
            inherits: false;
        }

        .outer-wrapper::after, .outer-wrapper::before {
            content: '';
            position: absolute;
            height: calc(100% + 10px);
            width: calc(100%);
            background: conic-gradient(from var(--angle), transparent 70%, #98fb98);
            top: 50%;
            left: 50%;
            z-index: -1;
            border-radius: 10px;
            transform: translate(-50%, -50%);
            animation: 5s spin linear infinite;
        }

        .outer-wrapper::before {
            filter: blur(1rem);
        }

        @keyframes spin {
            from {
                --angle: 0deg;
            }
            to {
                --angle: 360deg;
            }
        }

        .social-icons a {
            color: black;
            font-size: 1.5rem;
            margin: 0 10px;
        }

        .social-icons a:hover {
            color: #00b09b;
        }

        button.btn-outline-light {
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
        }

        button.btn-outline-light:hover {
            background-color: white;
            color: #00b09b;
        }

        .stars {
            position: absolute;
            top: -20px;
            color: #00b09b;
            animation: animate 5s linear forwards;
            z-index: -2;
        }

        .stars::before {
            content: '\f02d';
            font-family: FontAwesome;
            text-shadow: 0 0 5px #98fb98, 0 0 20px #96c93d, 0 0 50px #00b09b;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(30deg);
                opacity: 0;
            }
        }

        .text-end {
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <script>
        function stars() {
            let e = document.createElement('div');
            e.setAttribute('class', 'stars');
            document.body.appendChild(e);
            e.style.left = Math.random() * innerWidth + 'px';

            let size = Math.random() * 12;
            let duration = Math.random() * 3;

            e.style.fontSize = 12 + size + 'px';
            e.style.animationDuration = 2 + duration + 's';

            setTimeout(function() {
                document.body.removeChild(e);
            }, 5000);
        }

        setInterval(function() {
            stars();
        }, 100);
    </script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="outer-wrapper">
                    <div class="login-wrapper">
                        <!-- Left Side (Sign In) -->
                        <div class="login-box login-left">
                            <div class="header text-center">
                                <h1>Sign in</h1>
                                <div class="social-icons my-3">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-google"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <p>atau gunakan akun anda</p>
                            </div>
                            <div class="login-form mt-3">
                                <form action="proses_login.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="text-end">
                                        <a href="lupasandi.php">Lupa kata sandi anda?</a>
                                    </div>
                                    <div class="text-center mt-3">
                                    <button type="submit" name="login" class="btn btn-success">SIGN IN</button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                        <!-- Right Side (Sign Up) -->
                        <div class="login-box login-right">
                            <h2>Halo, Teman!</h2>
                            <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
                            <a href="tambahpegawai.php" class="btn btn-outline-light">SIGN UP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
