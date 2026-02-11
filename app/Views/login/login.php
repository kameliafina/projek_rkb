<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | RKB</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* Abu-abu sangat muda */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #1e293b;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .header p {
            margin-top: 8px;
            font-size: 14px;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .captcha-box {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #1e293b; /* Warna gelap elegan */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover {
            background-color: #334155;
        }

        .footer {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="header">
        <h2>Radio Kota Batik</h2>
        <p>Masuk ke panel manajemen berita</p>
    </div>

    <form action="<?= base_url('/login/action') ?>" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="captcha-box">
            <div class="g-recaptcha" data-sitekey="6Lf4tgIsAAAAAHNL5K6oYApJ5tP9L_xfirCT_lIv"></div>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
    </form>

    <div class="footer">
        &copy; 2025 Radio Kota Batik Pekalongan
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(session()->getFlashdata('pesan')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('pesan') ?>',
                confirmButtonColor: '#1e293b'
            });
        <?php endif; ?>
    });
</script>

</body>
</html>