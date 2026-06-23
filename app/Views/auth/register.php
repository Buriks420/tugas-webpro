<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistem Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f97316 0%, #431407 100%);
            background-attachment: fixed;
            min-height: 100vh;
            padding: 50px 0;
            position: relative;
            overflow-x: hidden;
            margin: 0;
        }

        /* Decorative Background Circles */
        body::before, body::after {
            content: '';
            position: fixed;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.4) 0%, rgba(255,255,255,0) 70%);
            z-index: 0;
            pointer-events: none;
        }

        body::before {
            top: -150px;
            left: -150px;
        }

        body::after {
            bottom: -150px;
            right: -150px;
            background: radial-gradient(circle, rgba(234,88,12,0.4) 0%, rgba(255,255,255,0) 70%);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 45px 40px;
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header .icon-bg {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4);
            transition: transform 0.3s ease;
        }

        .login-header h3 {
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .form-floating > .form-control {
            border-radius: 14px;
            border: 2px solid #e2e8f0;
            padding-left: 50px;
            height: calc(3.5rem + 2px);
            font-weight: 500;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .form-floating > .form-control:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.15);
        }

        .form-floating > label {
            padding-left: 50px;
            color: #94a3b8;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 18px;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1.2rem;
            z-index: 4;
            transition: color 0.2s ease;
        }
        
        .form-control:focus ~ .input-icon,
        .form-control:focus-within + .input-icon,
        .position-relative:focus-within .input-icon {
            color: #f97316;
        }

        .btn-login {
            background: linear-gradient(135deg, #f97316, #ea580c);
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(234, 88, 12, 0.3);
            background: linear-gradient(135deg, #ea580c, #c2410c);
        }
        
        .back-home {
            text-align: center;
            margin-top: 25px;
        }
        
        .back-home a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .back-home a:hover {
            color: #f97316;
        }
    </style>
</head>
<body>
        <div class="login-card p-5" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="login-header text-center">
                <div class="icon-bg">
                    <i class="bi bi-person-plus"></i>
                </div>
                <h4 class="fw-bold mb-1">DAFTAR</h4>
                <p class="text-muted small">Buat akun Anda untuk mulai menyewa</p>
            </div>

            <?php if(session()->getFlashdata('validation')):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0 ps-3">
                    <?php foreach (session()->getFlashdata('validation') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>

            <form action="/auth/processRegister" method="post">
                <div class="form-floating mb-4 position-relative">
                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>" required>
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <i class="bi bi-person-badge input-icon"></i>
                </div>

                <div class="form-floating mb-4 position-relative">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= old('username') ?>" required>
                    <label for="username">Username</label>
                    <i class="bi bi-person input-icon"></i>
                </div>
                
                <div class="form-floating mb-4 position-relative">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Alamat Email" value="<?= old('email') ?>" required>
                    <label for="email">Alamat Email</label>
                    <i class="bi bi-envelope input-icon"></i>
                </div>
                
                <div class="form-floating mb-4 position-relative">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi" required>
                    <label for="password">Kata Sandi</label>
                    <i class="bi bi-lock input-icon"></i>
                </div>
                
                <div class="form-floating mb-4 position-relative">
                    <input type="password" name="pass_confirm" class="form-control" id="pass_confirm" placeholder="Konfirmasi Kata Sandi" required>
                    <label for="pass_confirm">Konfirmasi Kata Sandi</label>
                    <i class="bi bi-lock-fill input-icon"></i>
                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">
                    <i class="bi bi-person-plus-fill me-2"></i>Buat Akun
                </button>
            </form>
            
            <div class="text-center mt-3 back-home">
                <p class="mb-1 text-muted small">Sudah punya akun? <a href="/auth" class="fw-bold">Masuk di Sini</a></p>
                <a href="/"><i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>