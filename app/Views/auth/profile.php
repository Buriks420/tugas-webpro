<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | MS-Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 1;
        }


        .form-floating > .form-control {
            border-radius: 12px;
            border: 2px solid #e7e5e4;
            padding-left: 45px;
        }

        .form-floating > .form-control:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.15);
        }

        .form-floating > label {
            padding-left: 45px !important;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #a8a29e;
            font-size: 20px;
            z-index: 5;
        }

        .btn-update {
            background: linear-gradient(135deg, #f97316, #ea580c);
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(234, 88, 12, 0.3);
            background: linear-gradient(135deg, #ea580c, #c2410c);
            color: white;
        }
    </style>
</head>
<body>
    <div class="profile-card p-5">
        <form action="/auth/updateProfile" method="post">
            <div class="profile-header text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #f97316, #ea580c); color: white; border-radius: 20px; font-size: 32px; box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4);">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h4 class="fw-bold mb-1"><?= esc($user['nama_lengkap']) ?></h4>
                <p class="text-muted small">Update your profile information</p>
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
        
        <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

            <div class="form-floating mb-4 position-relative">
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="First & Last Name" value="<?= esc($user['nama_lengkap']) ?>" required>
                <label for="nama_lengkap">First & Last Name</label>
                <i class="bi bi-person-badge input-icon"></i>
            </div>
            
            <div class="form-floating mb-4 position-relative">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?= esc($user['email']) ?>" required>
                <label for="email">Email Address</label>
                <i class="bi bi-envelope input-icon"></i>
            </div>
            
            <div class="form-floating mb-4 position-relative">
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                <label for="password">New Password (leave blank to keep)</label>
                <i class="bi bi-lock input-icon"></i>
            </div>
            
            <div class="form-floating mb-4 position-relative">
                <input type="password" name="pass_confirm" class="form-control" id="pass_confirm" placeholder="Confirm Password">
                <label for="pass_confirm">Confirm New Password</label>
                <i class="bi bi-lock-fill input-icon"></i>
            </div>

            <button type="submit" class="btn btn-update w-100 mb-3">
                <i class="bi bi-save me-2"></i>Save Changes
            </button>
        </form>
        
        <div class="text-center mt-3">
            <a href="/" class="text-decoration-none text-muted"><i class="bi bi-arrow-left me-1"></i>Back to Homepage</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
