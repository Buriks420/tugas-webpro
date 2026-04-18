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
            background: linear-gradient(135deg, #0ea5e9 0%, #1e1b4b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin: 0;
        }

        /* Decorative Background Circles */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56,189,248,0.4) 0%, rgba(255,255,255,0) 70%);
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
            background: radial-gradient(circle, rgba(99,102,241,0.4) 0%, rgba(255,255,255,0) 70%);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 45px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header .icon-bg {
            background: linear-gradient(135deg, #0ea5e9, #4f46e5);
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
            transform: rotate(-10deg);
            transition: transform 0.3s ease;
        }
        
        .login-card:hover .icon-bg {
            transform: rotate(0deg);
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
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
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
            color: #0ea5e9;
        }

        .btn-login {
            background: linear-gradient(135deg, #0ea5e9, #4f46e5);
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
            box-shadow: 0 15px 25px rgba(79, 70, 229, 0.3);
            background: linear-gradient(135deg, #0284c7, #4338ca);
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
            color: #0ea5e9;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="icon-bg">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h3>Selamat Datang</h3>
            <p>Silakan login untuk mengelola sistem</p>
        </div>
        
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger rounded-3 border-0 bg-danger text-white shadow-sm pb-3 pt-3 text-center mb-4" style="font-size:0.95rem;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>
        
        <form action="/auth/login" method="post">
            <div class="position-relative mb-3">
                <i class="bi bi-person-fill input-icon"></i>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autocomplete="off">
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="position-relative mb-4">
                <i class="bi bi-lock-fill input-icon"></i>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login">
                LOGIN SEKARANG <i class="bi bi-arrow-right-short ms-1 fs-5 align-middle"></i>
            </button>
        </form>
        
        <div class="back-home">
            <a href="/"><i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>