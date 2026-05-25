<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Twin Farms</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        :root {
            --primary: #1B4332;
            --primary-light: #2D6A4F;
            --primary-dark: #081C15;
            --accent: #D4AF37;
            --accent-light: #F4E8C1;
            --bg-natural: #F4F6F4;
            --text-main: #112217;
            --text-muted: #586B60;
            --white: #FFFFFF;
            --border-color: rgba(27, 67, 50, 0.08);
            --border-color-active: rgba(27, 67, 50, 0.2);
            --shadow-premium: 0 10px 30px -10px rgba(8, 28, 21, 0.08);
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --transition-fast: all 0.2s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-natural);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Ambient Premium Gradients */
        body::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -20%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(27, 67, 50, 0.12) 0%, rgba(244, 246, 244, 0) 70%);
            z-index: 0;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -20%;
            right: -20%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, rgba(244, 246, 244, 0) 70%);
            z-index: 0;
            pointer-events: none;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            padding: 1.5rem;
            position: relative;
            z-index: 10;
        }

        .login-card {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(8, 28, 21, 0.04), var(--shadow-premium);
            padding: 2.75rem 2.25rem;
            transition: var(--transition-smooth);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.25rem;
        }

        .logo-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: rgba(27, 67, 50, 0.05);
            border: 1px solid var(--border-color-active);
            border-radius: 18px;
            color: var(--primary);
            margin-bottom: 1.25rem;
        }

        .logo-box svg {
            width: 28px;
            height: 28px;
        }

        .login-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .login-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary-light);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: var(--text-muted);
            pointer-events: none;
            width: 18px;
            height: 18px;
            transition: var(--transition-fast);
        }

        .form-control {
            width: 100%;
            padding: 0.95rem 1rem 0.95rem 2.75rem;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            background-color: rgba(27, 67, 50, 0.01);
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text-main);
            outline: none;
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 4px rgba(27, 67, 50, 0.06);
        }

        .form-control:focus + .input-icon {
            color: var(--primary);
        }

        /* Buttons */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px -5px rgba(27, 67, 50, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: var(--transition-smooth);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -5px rgba(27, 67, 50, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: var(--transition-fast);
        }

        .btn-back-home:hover {
            color: var(--primary);
        }

        /* Alerts */
        .alert {
            padding: 0.9rem 1.1rem;
            border-radius: 14px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideDown 0.4s ease;
        }

        .alert-error {
            background-color: #FFF5F5;
            border: 1px solid rgba(229, 62, 62, 0.1);
            color: #C53030;
        }

        .alert-success {
            background-color: #F0FFF4;
            border: 1px solid rgba(72, 187, 120, 0.1);
            color: #2F855A;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-box">
                    <i data-lucide="shield-check"></i>
                </div>
                <h1 class="login-title">Twin Farms</h1>
                <p class="login-desc">Login Portal Administrator</p>
            </div>

            <!-- Flash Error Messages -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-error">
                    <i data-lucide="alert-circle" style="width: 18px; height: 18px; flex-shrink: 0;"></i>
                    <span><?php echo $this->session->flashdata('error'); ?></span>
                </div>
            <?php endif; ?>

            <!-- Flash Success Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i data-lucide="check-circle" style="width: 18px; height: 18px; flex-shrink: 0;"></i>
                    <span><?php echo $this->session->flashdata('success'); ?></span>
                </div>
            <?php endif; ?>

            <form action="<?php echo site_url('auth/login'); ?>" method="POST">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-wrapper">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username..." required autocomplete="off" autofocus>
                        <i data-lucide="user" class="input-icon"></i>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi..." required>
                        <i data-lucide="lock" class="input-icon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Masuk ke Dashboard</span>
                    <i data-lucide="arrow-right" style="width: 16px; height: 16px;"></i>
                </button>
            </form>

            <a href="<?php echo base_url(); ?>" class="btn-back-home">
                <i data-lucide="home" style="width: 14px; height: 14px;"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
