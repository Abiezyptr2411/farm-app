<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Twin Farms</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons Library -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        :root {
            --primary: #0F172A;
            --primary-light: #334155;
            --primary-dark: #020617;
            --accent: #2563EB;
            --accent-light: #DBEAFE;
            --bg-natural: #F8FAFC;
            --bg-card: #FFFFFF;
            --text-main: #0F172A;
            --text-muted: #64748B;
            --border-color: #E2E8F0;
            --border-color-active: #CBD5E1;
            --shadow-premium: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.025);
            --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.04);
            --white: #FFFFFF;
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
            overflow-x: hidden;
        }

        /* Admin Dashboard Container */
        .admin-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* 1. Sidebar Design */
        .sidebar {
            width: 280px;
            background-color: var(--bg-card);
            border-right: 1px solid var(--border-color);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            color: var(--primary-dark);
            text-decoration: none;
            margin-bottom: 2rem;
            width: 100%;
        }

        .sidebar-brand i {
            width: 28px;
            height: 28px;
            color: var(--accent);
        }

        .sidebar-brand h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        /* Sidebar Profile Card - Hidden since we have header now */
        .sidebar-profile {
            display: none;
        }

        /* Sidebar Navigation links */
        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex: 1;
        }

        .nav-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.85rem 1rem;
            border-radius: 10px;
            border: none;
            background: transparent;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
            transition: var(--transition-fast);
        }

        .nav-item i {
            width: 20px;
            height: 20px;
            color: var(--text-muted);
        }

        .nav-item:hover {
            color: var(--primary-dark);
            background: var(--bg-natural);
        }

        .nav-item:hover i {
            color: var(--primary-dark);
        }

        .nav-item.active {
            color: var(--accent);
            background: var(--accent-light);
            font-weight: 700;
        }

        .nav-item.active i {
            color: var(--accent);
        }

        /* Sidebar Footer */
        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-color);
            padding-top: 1rem;
        }

        .nav-logout {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.85rem 1rem;
            border-radius: 10px;
            color: #DC2626;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: var(--transition-fast);
        }

        .nav-logout:hover {
            background: #FEF2F2;
        }

        .nav-logout i {
            width: 20px;
            height: 20px;
        }

        /* 2. Main Workspace Layout */
        .main-workspace {
            margin-left: 280px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: var(--bg-natural);
        }

        .top-header {
            height: 70px;
            background: var(--bg-card);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .header-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary-dark);
            font-family: 'Outfit', sans-serif;
        }

        .header-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .header-profile-info {
            text-align: right;
        }
        
        .header-profile-info h4 {
            font-size: 0.85rem;
            color: var(--primary-dark);
            margin: 0;
            font-weight: 700;
        }
        
        .header-profile-info p {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin: 0;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        .avatar-small {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--accent-light);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
        }

        .workspace-content {
            padding: 2rem;
            width: 100%;
        }

        .section-panel {
            display: none;
            animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .section-panel.active {
            display: block;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Welcome Banner Card */
        .welcome-section {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .welcome-text h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.25rem;
        }

        .welcome-text p {
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        /* Stats Grid Dashboard */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 1.5rem 1.75rem;
            box-shadow: var(--shadow-premium);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info h4 {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-info h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
        }

        /* Table Card Layout */
        .table-card {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            box-shadow: var(--shadow-premium);
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .table-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-header h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: var(--bg-natural);
            padding: 1.15rem 1.5rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #F8FAFC; /* Slate 50 */
        }

        .cow-thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            border: 1px solid var(--border-color);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-available {
            background: #E6FFFA;
            color: #047A55;
            border: 1px solid rgba(4, 122, 85, 0.1);
        }

        .badge-sold {
            background: #FFF5F5;
            color: #C53030;
            border: 1px solid rgba(197, 48, 48, 0.1);
        }

        .actions-cell {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-muted);
            transition: var(--transition-fast);
        }

        .action-btn:hover {
            color: var(--primary);
            border-color: var(--primary-light);
            background: var(--bg-natural);
        }

        .action-btn.delete:hover {
            color: #E53E3E;
            border-color: rgba(229, 62, 62, 0.3);
            background: #FFF5F5;
        }

        .action-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Interactive Modals */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 500;
            padding: 1.5rem;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-window {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            width: 100%;
            max-width: 680px;
            max-height: 90vh;
            overflow: hidden;
            box-shadow: var(--shadow-hover);
            animation: modalFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .modal-window form {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
            overflow: hidden;
        }

        .modal-header {
            padding: 1.75rem 2.25rem 1.25rem 2.25rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
        }

        .modal-close {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-fast);
        }

        .modal-close:hover {
            background: rgba(51, 65, 85, 0.05);
            color: var(--primary);
        }

        .modal-scrollable-body {
            padding: 2rem 2.25rem;
            overflow-y: auto;
            flex: 1;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.95) translateY(12px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* ==================== FORM WIZARD STYLES ==================== */
        .wizard-header-stepper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
            background: rgba(51, 65, 85, 0.02);
            padding: 1rem 1.5rem;
            border-radius: 16px;
            border: 1px solid var(--border-color);
        }

        .wizard-step-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            font-size: 0.8rem;
            font-weight: 700;
            transition: var(--transition-smooth);
        }

        .wizard-step-indicator .indicator-num {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--bg-natural);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.75rem;
            color: var(--text-muted);
            transition: var(--transition-smooth);
        }

        .wizard-step-indicator.active {
            color: var(--primary);
        }

        .wizard-step-indicator.active .indicator-num {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--white);
            box-shadow: 0 0 0 4px rgba(51, 65, 85, 0.12);
        }

        .wizard-step-indicator.completed {
            color: var(--primary-light);
        }

        .wizard-step-indicator.completed .indicator-num {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary-dark);
        }

        .wizard-divider-line {
            flex: 1;
            height: 2px;
            background-color: var(--border-color);
            margin: 0 0.75rem;
        }

        /* Step Contents container */
        .wizard-step-content {
            display: none;
            animation: wizardSlide 0.35s ease;
        }

        .wizard-step-content.active {
            display: block;
        }

        @keyframes wizardSlide {
            from { opacity: 0; transform: translateX(10px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Form Layout Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary-light);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background-color: rgba(51, 65, 85, 0.01);
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text-main);
            outline: none;
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(51, 65, 85, 0.05);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-section-title {
            grid-column: span 2;
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            border-bottom: 1px dashed var(--border-color);
            padding-bottom: 0.5rem;
            margin-top: 1rem;
        }

        .wizard-footer-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0;
            padding: 1.25rem 2.25rem 1.5rem 2.25rem;
            border-top: 1px solid var(--border-color);
            background: var(--white);
        }

        /* Buttons styles (Symmetric and Aligned) */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0 1.5rem;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: var(--white);
            border: 1px solid transparent;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 16px -4px rgba(51, 65, 85, 0.2);
            transition: var(--transition-smooth);
            text-decoration: none;
            height: 48px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -4px rgba(51, 65, 85, 0.3);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0 1.5rem;
            border-radius: 14px;
            background: var(--bg-natural);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            height: 48px;
        }

        .btn-secondary:hover {
            background: rgba(51, 65, 85, 0.05);
            color: var(--primary);
        }

        /* Config Sub-tabs */
        .config-tabs-nav {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.5rem;
        }

        .config-tab-btn {
            padding: 0.75rem 1.25rem;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
            cursor: pointer;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition-fast);
        }

        .config-tab-btn:hover {
            color: var(--primary);
            background: rgba(51, 65, 85, 0.04);
        }

        .config-tab-btn.active {
            color: var(--primary);
            background: rgba(51, 65, 85, 0.06);
        }

        .config-tab-content {
            display: none;
            animation: fadeIn 0.35s ease;
        }

        .config-tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Alerts info box */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 16px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 2rem;
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
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="admin-container">
        
        <!-- ==================== LEFT SIDEBAR NAVIGATION ==================== -->
        <aside class="sidebar">
            <a href="<?php echo base_url('admin'); ?>" class="sidebar-brand">
                <?php if(isset($settings['site_logo']) && !empty($settings['site_logo'])): ?>
                    <img src="<?php echo base_url($settings['site_logo']); ?>" alt="Logo" style="max-height: 85px; width: auto; object-fit: contain;">
                <?php else: ?>
                    <i data-lucide="shield-check"></i>
                    <h1>Twin Farms</h1>
                <?php endif; ?>
            </a>

            <div class="sidebar-profile">
                <div class="avatar-large">
                    <?php echo strtoupper(substr($this->session->userdata('admin_username'), 0, 2)); ?>
                </div>
                <div class="profile-details">
                    <h4><?php echo $this->session->userdata('admin_name'); ?></h4>
                    <p>Administrator</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <button class="nav-item active" id="nav-ringkasan" onclick="switchNav('ringkasan-panel', 'nav-ringkasan')">
                    <i data-lucide="trending-up"></i>
                    <span>Ringkasan Data</span>
                </button>
                <button class="nav-item" id="nav-sapi" onclick="switchNav('sapi-panel', 'nav-sapi')">
                    <i data-lucide="database"></i>
                    <span>Kelola Katalog Sapi</span>
                </button>
                <button class="nav-item" id="nav-kandang" onclick="switchNav('kandang-panel', 'nav-kandang')">
                    <i data-lucide="home"></i>
                    <span>Kelola Kandang</span>
                </button>
                <button class="nav-item" id="nav-pesanan" onclick="switchNav('pesanan-panel', 'nav-pesanan')">
                    <i data-lucide="shopping-cart"></i>
                    <span>Kelola Pesanan</span>
                </button>

                <!-- Premium Sidebar Section Divider -->
                <div style="height: 1px; background: var(--border-color); margin: 1rem 0.5rem 0.75rem 0.5rem;"></div>
                <div style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; padding: 0 0.5rem 0.25rem 0.5rem; opacity: 0.7;">Konfigurasi Web</div>

                <button class="nav-item" id="nav-landing" onclick="switchNav('landing-panel', 'nav-landing')">
                    <i data-lucide="sliders-horizontal"></i>
                    <span>Landing Page Config</span>
                </button>
                <button class="nav-item" id="nav-testi" onclick="switchNav('testi-panel', 'nav-testi')">
                    <i data-lucide="message-square"></i>
                    <span>Kelola Testimoni</span>
                </button>
            </nav>

            <div class="sidebar-footer">
                <a href="<?php echo site_url('auth/logout'); ?>" class="nav-logout">
                    <i data-lucide="log-out"></i>
                    <span>Keluar Akun</span>
                </a>
            </div>
        </aside>

        <!-- ==================== RIGHT SIDE MAIN CONTENT AREA ==================== -->
        <main class="main-workspace">
            <!-- Top Header -->
            <header class="top-header">
                <div class="header-title" id="dynamic-header-title">Ringkasan Data</div>
                <div class="header-profile">
                    <div class="header-profile-info">
                        <h4><?php echo $this->session->userdata('admin_name'); ?></h4>
                        <p>Administrator</p>
                    </div>
                    <div class="avatar-small">
                        <?php echo strtoupper(substr($this->session->userdata('admin_username'), 0, 2)); ?>
                    </div>
                </div>
            </header>

            <div class="workspace-content">

                <!-- System Flash Alerts -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-error">
                        <i data-lucide="alert-circle" style="width: 20px; height: 20px; flex-shrink: 0;"></i>
                        <span><?php echo $this->session->flashdata('error'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <i data-lucide="check-circle" style="width: 20px; height: 20px; flex-shrink: 0;"></i>
                        <span><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>

                <!-- SECTION 1: RINGKASAN DATA (DASHBOARD METRICS) -->
                <section class="section-panel active" id="ringkasan-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Ringkasan Data Peternakan</h2>
                            <p>Pantau performa total stok, sisa kapasitas, dan sapi terjual secara real-time.</p>
                        </div>
                    </div>

                    <?php 
                        $total_cows = count($cattle);
                        $available_cows = 0;
                        $sold_cows = 0;
                        foreach ($cattle as $c) {
                            if ($c['status'] === 'tersedia') $available_cows++;
                            else $sold_cows++;
                        }
                    ?>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-info">
                                <h4>Total Stok Sapi</h4>
                                <h3><?php echo $total_cows; ?></h3>
                            </div>
                            <div class="stat-icon" style="background: rgba(51, 65, 85, 0.05); color: var(--primary);">
                                <i data-lucide="boxes"></i>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-info">
                                <h4>Status Tersedia</h4>
                                <h3><?php echo $available_cows; ?></h3>
                            </div>
                            <div class="stat-icon" style="background: rgba(72, 187, 120, 0.1); color: #2F855A;">
                                <i data-lucide="check-circle"></i>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-info">
                                <h4>Total Terjual</h4>
                                <h3><?php echo $sold_cows; ?></h3>
                            </div>
                            <div class="stat-icon" style="background: rgba(229, 62, 62, 0.1); color: #C53030;">
                                <i data-lucide="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Add Chart.js via CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <?php 
                        // Delivery Option counters
                        $pickup_count = 0;
                        $delivery_count = 0;
                        if (!empty($orders)) {
                            foreach ($orders as $ord) {
                                if (isset($ord['delivery_status']) && $ord['delivery_status'] === 'diantar') {
                                    $delivery_count++;
                                } else {
                                    $pickup_count++;
                                }
                            }
                        }
                        
                        // Order status counters
                        $pending_orders = 0;
                        $dikonfirmasi_orders = 0;
                        $selesai_orders = 0;
                        $dibatalkan_orders = 0;
                        if (!empty($orders)) {
                            foreach ($orders as $ord) {
                                if ($ord['status'] === 'pending') $pending_orders++;
                                elseif ($ord['status'] === 'dikonfirmasi') $dikonfirmasi_orders++;
                                elseif ($ord['status'] === 'selesai') $selesai_orders++;
                                elseif ($ord['status'] === 'dibatalkan') $dibatalkan_orders++;
                            }
                        }
                    ?>

                    <!-- Interactive Charts Panel -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
                        
                        <!-- Left Chart: Status & Ketersediaan Sapi -->
                        <div class="table-card" style="padding: 2rem; background: var(--white); border: 1px solid var(--border-color); border-radius: 20px; box-shadow: var(--shadow-premium); display: flex; flex-direction: column;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; color: var(--primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.75rem;">
                                <i data-lucide="bar-chart-3" style="width: 18px; height: 18px; color: var(--accent);"></i>
                                Ketersediaan Katalog Sapi
                            </h3>
                            <div style="position: relative; width: 100%; height: 260px;">
                                <canvas id="cattleStatusChart"></canvas>
                            </div>
                        </div>

                        <!-- Right Chart: Opsi Pengiriman Pelanggan -->
                        <div class="table-card" style="padding: 2rem; background: var(--white); border: 1px solid var(--border-color); border-radius: 20px; box-shadow: var(--shadow-premium); display: flex; flex-direction: column;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; color: var(--primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.75rem;">
                                <i data-lucide="pie-chart" style="width: 18px; height: 18px; color: var(--accent);"></i>
                                Metode Pengiriman Pesanan
                            </h3>
                            <div style="position: relative; width: 100%; height: 260px;">
                                <canvas id="deliveryDistributionChart"></canvas>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Bottom Chart: Tren Status Pemesanan Masuk -->
                    <div class="table-card" style="padding: 2rem; background: var(--white); border: 1px solid var(--border-color); border-radius: 20px; box-shadow: var(--shadow-premium); margin-top: 2rem; margin-bottom: 1.5rem;">
                        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; color: var(--primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.75rem;">
                            <i data-lucide="trending-up" style="width: 18px; height: 18px; color: var(--accent);"></i>
                            Status & Progres Transaksi Pemesanan
                        </h3>
                        <div style="position: relative; width: 100%; height: 280px;">
                            <canvas id="orderStatusChart"></canvas>
                        </div>
                    </div>

                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // 1. Cattle Status Chart
                        const ctxCattle = document.getElementById('cattleStatusChart').getContext('2d');
                        new Chart(ctxCattle, {
                            type: 'bar',
                            data: {
                                labels: ['Tersedia', 'Terjual'],
                                datasets: [{
                                    label: 'Jumlah Sapi',
                                    data: [<?php echo $available_cows; ?>, <?php echo $sold_cows; ?>],
                                    backgroundColor: [
                                        'rgba(37, 99, 235, 0.85)', // Green
                                        'rgba(197, 48, 48, 0.85)'  // Red
                                    ],
                                    borderColor: [
                                        '#2f855a',
                                        '#c53030'
                                    ],
                                    borderWidth: 1.5,
                                    borderRadius: 8,
                                    barThickness: 50
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: { stepSize: 1, color: '#6b7280', font: { family: 'Outfit' } },
                                        grid: { color: 'rgba(0,0,0,0.04)' }
                                    },
                                    x: {
                                        ticks: { color: '#4b5563', font: { family: 'Outfit', weight: 'bold' } },
                                        grid: { display: false }
                                    }
                                }
                            }
                        });

                        // 2. Delivery Distribution Chart
                        const ctxDelivery = document.getElementById('deliveryDistributionChart').getContext('2d');
                        new Chart(ctxDelivery, {
                            type: 'doughnut',
                            data: {
                                labels: ['Ambil Sendiri', 'Diantar'],
                                datasets: [{
                                    data: [<?php echo $pickup_count; ?>, <?php echo $delivery_count; ?>],
                                    backgroundColor: [
                                        'rgba(107, 114, 128, 0.85)', // Gray
                                        'rgba(29, 78, 216, 0.85)'   // Blue
                                    ],
                                    borderColor: [
                                        '#4b5563',
                                        '#1d4ed8'
                                    ],
                                    borderWidth: 2,
                                    hoverOffset: 4
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: { color: '#4b5563', font: { family: 'Outfit', size: 12 } }
                                    }
                                },
                                cutout: '65%'
                            }
                        });

                        // 3. Order Status Chart
                        const ctxOrder = document.getElementById('orderStatusChart').getContext('2d');
                        new Chart(ctxOrder, {
                            type: 'bar',
                            data: {
                                labels: ['Menunggu (Pending)', 'Disetujui (Confirmed)', 'Selesai (Completed)', 'Batal (Cancelled)'],
                                datasets: [{
                                    label: 'Jumlah Transaksi',
                                    data: [
                                        <?php echo $pending_orders; ?>,
                                        <?php echo $dikonfirmasi_orders; ?>,
                                        <?php echo $selesai_orders; ?>,
                                        <?php echo $dibatalkan_orders; ?>
                                    ],
                                    backgroundColor: [
                                        'rgba(217, 119, 6, 0.8)',  // Amber
                                        'rgba(37, 99, 235, 0.8)',  // Blue
                                        'rgba(5, 150, 105, 0.8)',  // Emerald
                                        'rgba(220, 38, 38, 0.8)'   // Red
                                    ],
                                    borderColor: [
                                        '#d97706',
                                        '#2563eb',
                                        '#059669',
                                        '#dc2626'
                                    ],
                                    borderWidth: 1.5,
                                    borderRadius: 6,
                                    barThickness: 45
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: { stepSize: 1, color: '#6b7280', font: { family: 'Outfit' } },
                                        grid: { color: 'rgba(0,0,0,0.04)' }
                                    },
                                    x: {
                                        ticks: { color: '#4b5563', font: { family: 'Outfit', size: 11 } },
                                        grid: { display: false }
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </section>

                <!-- SECTION 2: KELOLA KATALOG SAPI -->
                <section class="section-panel" id="sapi-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Kelola Katalog Sapi</h2>
                            <p>Ubah harga, deskripsi fisik, status vaksin, ketersediaan kandang, dan gambar sapi potong.</p>
                        </div>
                        
                        <button class="btn-primary" onclick="openAddWizard()">
                            <i data-lucide="plus"></i>
                            <span>Tambah Sapi Baru</span>
                        </button>
                    </div>

                    <div class="table-card">
                        <!-- Premium Live Search & Filters Bar -->
                        <div style="display: flex; gap: 1rem; padding: 1.5rem 2rem; border-bottom: 1px solid var(--border-color); flex-wrap: wrap; background: rgba(51, 65, 85, 0.02); align-items: center;">
                            <div style="flex: 1; min-width: 250px; position: relative;">
                                <i data-lucide="search" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--text-muted);"></i>
                                <input type="text" id="cattle-search" placeholder="Cari nama sapi, jenis/ras, atau harga..." style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.75rem; border: 1.5px solid var(--border-color); border-radius: 10px; font-size: 0.9rem; outline: none; background: #ffffff; transition: border-color 0.2s;" autocomplete="off">
                            </div>
                            
                            <div style="width: 180px;">
                                <select id="cattle-filter-breed" style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid var(--border-color); border-radius: 10px; font-size: 0.9rem; outline: none; background: #ffffff; cursor: pointer; color: var(--text-main);">
                                    <option value="">Semua Jenis Sapi</option>
                                    <?php if (!empty($breeds)): ?>
                                        <?php foreach ($breeds as $b): ?>
                                            <option value="<?php echo html_escape($b['name']); ?>"><?php echo html_escape($b['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            
                            <div style="width: 160px;">
                                <select id="cattle-filter-status" style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid var(--border-color); border-radius: 10px; font-size: 0.9rem; outline: none; background: #ffffff; cursor: pointer; color: var(--text-main);">
                                    <option value="">Semua Status</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="terjual">Terjual</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-header" style="border-bottom: none; padding-bottom: 0;">
                            <h3>Daftar Sapi dalam Katalog</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama Sapi</th>
                                        <th>Ras / Jenis</th>
                                        <th>Berat</th>
                                        <th>Umur</th>
                                        <th>Harga</th>
                                        <th>Ketersediaan</th>
                                        <th>Visibilitas</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="cattle-table-body">
                                    <?php if (!empty($cattle)): ?>
                                        <?php foreach ($cattle as $item): ?>
                                            <tr class="cattle-row" data-name="<?php echo html_escape(strtolower($item['name'])); ?>" data-breed="<?php echo html_escape(strtolower($item['breed'])); ?>" data-price="<?php echo html_escape(strtolower($item['price'])); ?>" data-status="<?php echo html_escape(strtolower($item['status'])); ?>">
                                                <td>
                                                    <img src="<?php echo base_url($item['image_main']); ?>" alt="<?php echo $item['name']; ?>" class="cow-thumbnail">
                                                </td>
                                                <td style="font-weight: 700; color: var(--primary-dark);">
                                                    <?php echo html_escape($item['name']); ?>
                                                </td>
                                                <td><?php echo html_escape($item['breed']); ?></td>
                                                <td style="font-weight: 600;"><?php echo html_escape($item['weight']); ?></td>
                                                <td><?php echo html_escape($item['age']); ?></td>
                                                <td style="font-weight: 700; color: var(--primary);"><?php echo html_escape($item['price']); ?></td>
                                                <td>
                                                    <span class="badge <?php echo $item['status'] === 'tersedia' ? 'badge-available' : 'badge-sold'; ?>">
                                                        <?php echo $item['status'] === 'tersedia' ? 'Tersedia' : 'Terjual'; ?><?php if ($item['status'] === 'tersedia' && isset($item['stock']) && $item['stock'] > 0) echo ' (' . html_escape($item['stock']) . ')'; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if (isset($item['is_active']) && $item['is_active'] == 1): ?>
                                                        <span class="badge" style="background: rgba(37, 99, 235, 0.08); color: #2f855a; border: 1px solid rgba(37, 99, 235, 0.2);">Aktif</span>
                                                    <?php else: ?>
                                                        <span class="badge" style="background: rgba(113, 128, 150, 0.08); color: #4a5568; border: 1px solid rgba(113, 128, 150, 0.2);">Nonaktif</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="actions-cell" style="justify-content: center;">
                                                        <a href="<?php echo site_url('admin/toggle_cattle_status/' . $item['id']); ?>" class="action-btn" title="<?php echo (isset($item['is_active']) && $item['is_active'] == 1) ? 'Nonaktifkan Sapi' : 'Aktifkan Sapi'; ?>" style="color: <?php echo (isset($item['is_active']) && $item['is_active'] == 1) ? '#e53e3e' : '#2b6cb0'; ?>;">
                                                            <i data-lucide="<?php echo (isset($item['is_active']) && $item['is_active'] == 1) ? 'eye-off' : 'eye'; ?>"></i>
                                                        </a>
                                                        <button class="action-btn" onclick="openEditWizard(<?php echo html_escape(json_encode($item)); ?>)" title="Ubah Data">
                                                            <i data-lucide="edit-3"></i>
                                                        </button>
                                                        <a href="<?php echo site_url('admin/delete/' . $item['id']); ?>" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus sapi <?php echo $item['name']; ?> dari katalog?')" title="Hapus Sapi">
                                                            <i data-lucide="trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr id="cattle-empty-row">
                                            <td colspan="9" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                                Belum ada data sapi potong dalam database. Silakan tambah baru.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Sleek Pagination Bar -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 2rem; border-top: 1px solid var(--border-color); flex-wrap: wrap; gap: 1rem; background: rgba(51, 65, 85, 0.01);">
                            <div style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;" id="pagination-info">
                                Menampilkan <strong style="color: var(--primary);" id="pagination-count-showing">0</strong> dari <strong id="pagination-count-total">0</strong> ekor sapi
                            </div>
                            
                            <div style="display: flex; gap: 0.5rem; align-items: center;" id="pagination-controls">
                                <!-- Dynamic pagination triggers -->
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 3: LANDING PAGE CONFIG -->
                <section class="section-panel" id="landing-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Konfigurasi Landing Page</h2>
                            <p>Ubah nama website, teks link navbar navigasi, gambar hero banner, dan judul banner secara dinamis.</p>
                        </div>
                    </div>

                    <div class="table-card" style="padding: 2.25rem;">
                        <form action="<?php echo site_url('admin/save_settings'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <!-- Sub-tabs Navigation -->
                            <div class="config-tabs-nav">
                                <button type="button" class="config-tab-btn active" id="btn-config-identity" onclick="switchConfigTab('config-identity', 'btn-config-identity')">
                                    <i data-lucide="info" style="width: 16px; height: 16px;"></i>
                                    <span>Identitas & Logo</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-navbar" onclick="switchConfigTab('config-navbar', 'btn-config-navbar')">
                                    <i data-lucide="menu" style="width: 16px; height: 16px;"></i>
                                    <span>Menu Navigasi</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-hero" onclick="switchConfigTab('config-hero', 'btn-config-hero')">
                                    <i data-lucide="image" style="width: 16px; height: 16px;"></i>
                                    <span>Konten Hero Section</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-about" onclick="switchConfigTab('config-about', 'btn-config-about')">
                                    <i data-lucide="book-open" style="width: 16px; height: 16px;"></i>
                                    <span>Tentang Kami</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-features" onclick="switchConfigTab('config-features', 'btn-config-features')">
                                    <i data-lucide="sliders" style="width: 16px; height: 16px;"></i>
                                    <span>Keunggulan Kami</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-gallery" onclick="switchConfigTab('config-gallery', 'btn-config-gallery')">
                                    <i data-lucide="images" style="width: 16px; height: 16px;"></i>
                                    <span>Galeri Peternakan</span>
                                </button>
                                <button type="button" class="config-tab-btn" id="btn-config-contact" onclick="switchConfigTab('config-contact', 'btn-config-contact')">
                                    <i data-lucide="phone-call" style="width: 16px; height: 16px;"></i>
                                    <span>Hubungi & Kunjungi</span>
                                </button>
                            </div>

                            <!-- SUB-TAB 1: IDENTITAS & LOGO -->
                            <div class="config-tab-content active" id="config-identity">
                                <div class="form-grid">
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="info" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Identitas & Logo Situs
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label class="form-label">Upload Logo Website *</label>
                                        <input type="file" name="site_logo" class="form-control" accept="image/*">
                                        <span style="font-size: 0.75rem; color: var(--text-muted);">Akan tampil di bagian Header Navigasi kiri dan Footer.</span>
                                        
                                        <?php if(isset($settings['site_logo']) && !empty($settings['site_logo'])): ?>
                                        <div style="margin-top: 10px;">
                                            <p style="font-size: 0.8rem; font-weight: 600; margin-bottom: 5px;">Logo Saat Ini:</p>
                                            <img src="<?php echo base_url($settings['site_logo']); ?>" alt="Current Logo" style="max-height: 50px; background: #e2e8f0; padding: 5px; border-radius: 8px;">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 2: MENU NAVIGASI NAVBAR -->
                            <div class="config-tab-content" id="config-navbar">
                                <div class="form-grid">
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="menu" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Judul Menu Navigasi (Navbar)
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">Menu 1: Beranda / Home *</label>
                                        <input type="text" name="nav_home" class="form-control" value="<?php echo html_escape(isset($settings['nav_home']) ? $settings['nav_home'] : 'Beranda'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Menu 2: Tentang Kami *</label>
                                        <input type="text" name="nav_about" class="form-control" value="<?php echo html_escape(isset($settings['nav_about']) ? $settings['nav_about'] : 'Tentang Kami'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Menu 3: Katalog Sapi *</label>
                                        <input type="text" name="nav_catalog" class="form-control" value="<?php echo html_escape(isset($settings['nav_catalog']) ? $settings['nav_catalog'] : 'Katalog Sapi'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Menu 4: Keunggulan Kami *</label>
                                        <input type="text" name="nav_features" class="form-control" value="<?php echo html_escape(isset($settings['nav_features']) ? $settings['nav_features'] : 'Keunggulan'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Menu 5: Galeri *</label>
                                        <input type="text" name="nav_gallery" class="form-control" value="<?php echo html_escape(isset($settings['nav_gallery']) ? $settings['nav_gallery'] : 'Galeri'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Menu 6: Testimoni *</label>
                                        <input type="text" name="nav_testimonials" class="form-control" value="<?php echo html_escape(isset($settings['nav_testimonials']) ? $settings['nav_testimonials'] : 'Testimoni'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tombol Kontak: Hubungi Kami *</label>
                                        <input type="text" name="nav_contact" class="form-control" value="<?php echo html_escape(isset($settings['nav_contact']) ? $settings['nav_contact'] : 'Hubungi Kami'); ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 3: KONTEN HERO SECTION -->
                            <div class="config-tab-content" id="config-hero">
                                <div class="form-grid">
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="image" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Konten Hero Section
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label class="form-label">Teks Badge Hero *</label>
                                        <input type="text" name="hero_badge" class="form-control" value="<?php echo html_escape(isset($settings['hero_badge']) ? $settings['hero_badge'] : 'Supplier Sapi Potong Premium'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Utama Line 1 *</label>
                                        <input type="text" name="hero_title_1" class="form-control" value="<?php echo html_escape(isset($settings['hero_title_1']) ? $settings['hero_title_1'] : 'Supplier Sapi Potong'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Utama Line 2 (Teks Emas) *</label>
                                        <input type="text" name="hero_title_2" class="form-control" value="<?php echo html_escape(isset($settings['hero_title_2']) ? $settings['hero_title_2'] : 'Berkualitas & Terpercaya'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Deskripsi Lengkap Banner *</label>
                                        <textarea name="hero_desc" class="form-control" required><?php echo html_escape(isset($settings['hero_desc']) ? $settings['hero_desc'] : ''); ?></textarea>
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Unggah Foto Hero Baru (Optimal: 1920x1080px)</label>
                                        <input type="file" name="hero_image" class="form-control" accept="image/*">
                                        
                                        <!-- Display current hero thumbnail -->
                                        <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.75rem;">
                                            <img src="<?php echo base_url(isset($settings['hero_image']) ? $settings['hero_image'] : 'assets/images/hero.jpg'); ?>" style="width: 140px; height: 80px; border-radius: 12px; object-fit: cover; border: 1px solid var(--border-color);" alt="Current Hero Background">
                                            <div>
                                                <h5 style="font-size: 0.8rem; font-weight: 700; color: var(--primary-light);">Gambar Latar Saat Ini</h5>
                                                <p style="font-size: 0.75rem; color: var(--text-muted);">Format optimal: JPG, PNG, atau WEBP berukuran resolusi tinggi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 4: TENTANG KAMI -->
                            <div class="config-tab-content" id="config-about">
                                <div class="form-grid">
                                    
                                    <!-- Header & Konten Tentang Kami -->
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="book-open" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Konten Tentang Kami
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Judul Tentang Kami *</label>
                                        <input type="text" name="about_title" class="form-control" value="<?php echo html_escape(isset($settings['about_title']) ? $settings['about_title'] : 'Perjalanan Ternakita Farm'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Sub Judul *</label>
                                        <input type="text" name="about_subtitle" class="form-control" value="<?php echo html_escape(isset($settings['about_subtitle']) ? $settings['about_subtitle'] : 'Menghubungkan Peternak Lokal dengan Kualitas Terbaik'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Paragraf 1 (Kutipan/Visi Utama) *</label>
                                        <textarea name="about_p1" class="form-control" required><?php echo html_escape(isset($settings['about_p1']) ? $settings['about_p1'] : '"Ternakita Farm hadir bukan hanya sebagai penyedia hewan ternak, tetapi sebagai partner terpercaya yang mengutamakan kualitas, kesehatan ternak, dan kepuasan pelanggan di setiap prosesnya."'); ?></textarea>
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Paragraf 2 (Sejarah/Latar Belakang) *</label>
                                        <textarea name="about_p2" class="form-control" required><?php echo html_escape(isset($settings['about_p2']) ? $settings['about_p2'] : 'Berawal dari kepedulian terhadap potensi peternakan lokal yang belum terkelola maksimal, Ternakita Farm dibangun dengan semangat menghadirkan sistem peternakan yang lebih modern, profesional, dan terpercaya. Dengan pengalaman di bidang peternakan serta jaringan peternak pilihan, Ternakita Farm fokus menyediakan sapi berkualitas unggul yang dirawat dengan standar kesehatan dan pakan terbaik.'); ?></textarea>
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Paragraf 3 (Standar Kualitas) *</label>
                                        <textarea name="about_p3" class="form-control" required><?php echo html_escape(isset($settings['about_p3']) ? $settings['about_p3'] : 'Kami percaya bahwa kualitas ternak dimulai dari proses pemeliharaan yang tepat. Karena itu, setiap sapi dipilih secara selektif, dipantau kesehatannya secara rutin, dan dipersiapkan dengan baik sebelum sampai ke tangan pelanggan.'); ?></textarea>
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Paragraf 4 (Tujuan Kedepan) *</label>
                                        <textarea name="about_p4" class="form-control" required><?php echo html_escape(isset($settings['about_p4']) ? $settings['about_p4'] : 'Melalui Ternakita Farm, kami ingin menciptakan ekosistem peternakan yang lebih maju — mendukung peternak lokal, menjaga kualitas produk ternak, serta memberikan pengalaman transaksi yang aman, nyaman, dan transparan bagi setiap pelanggan.'); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 5: KEUNGGULAN KAMI -->
                            <div class="config-tab-content" id="config-features">
                                <div class="form-grid">
                                    
                                    <!-- A. Header Keunggulan -->
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="info" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> A. Header Keunggulan
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tagline Section Badge *</label>
                                        <input type="text" name="feat_section_badge" class="form-control" value="<?php echo html_escape(isset($settings['feat_section_badge']) ? $settings['feat_section_badge'] : 'Keunggulan Twin Farms'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Utama Section *</label>
                                        <input type="text" name="feat_section_title" class="form-control" value="<?php echo html_escape(isset($settings['feat_section_title']) ? $settings['feat_section_title'] : 'Mengapa Memilih Kami?'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Deskripsi Ringkasan Section *</label>
                                        <textarea name="feat_section_desc" class="form-control" required><?php echo html_escape(isset($settings['feat_section_desc']) ? $settings['feat_section_desc'] : 'Twin Farms memberikan standar pelayanan terpercaya demi menghadirkan sapi potong dengan kualitas dan transparansi transaksi terbaik.'); ?></textarea>
                                    </div>

                                    <!-- B. Item Keunggulan -->
                                    <div class="form-section-title">
                                        <i data-lucide="check-square" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> B. Butir Keunggulan Kami
                                    </div>

                                    <!-- Feature 1 -->
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 1: Judul *</label>
                                        <input type="text" name="feat1_title" class="form-control" value="<?php echo html_escape(isset($settings['feat1_title']) ? $settings['feat1_title'] : 'Sapi Sehat & Terawat'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 1: Keterangan *</label>
                                        <input type="text" name="feat1_desc" class="form-control" value="<?php echo html_escape(isset($settings['feat1_desc']) ? $settings['feat1_desc'] : 'Pemantauan dokter hewan berkala, karantina ketat, dan pemberian nutrisi pakan organik terstandarisasi memastikan sapi dalam kondisi prima.'); ?>" required autocomplete="off">
                                    </div>

                                    <!-- Feature 2 -->
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 2: Judul *</label>
                                        <input type="text" name="feat2_title" class="form-control" value="<?php echo html_escape(isset($settings['feat2_title']) ? $settings['feat2_title'] : 'Kualitas Terjamin'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 2: Keterangan *</label>
                                        <input type="text" name="feat2_desc" class="form-control" value="<?php echo html_escape(isset($settings['feat2_desc']) ? $settings['feat2_desc'] : 'Kualitas karkas padat berisi dengan persentase daging tinggi (high yield ratio) berkat pemilihan genetik bakalan sapi unggulan pilihan.'); ?>" required autocomplete="off">
                                    </div>

                                    <!-- Feature 3 -->
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 3: Judul *</label>
                                        <input type="text" name="feat3_title" class="form-control" value="<?php echo html_escape(isset($settings['feat3_title']) ? $settings['feat3_title'] : 'Timbangan Transparan'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 3: Keterangan *</label>
                                        <input type="text" name="feat3_desc" class="form-control" value="<?php echo html_escape(isset($settings['feat3_desc']) ? $settings['feat3_desc'] : 'Pembelian berbasis berat timbangan digital riil yang disaksikan secara transparan demi keadilan dan kepuasan penuh pembeli.'); ?>" required autocomplete="off">
                                    </div>

                                    <!-- Feature 4 -->
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 4: Judul *</label>
                                        <input type="text" name="feat4_title" class="form-control" value="<?php echo html_escape(isset($settings['feat4_title']) ? $settings['feat4_title'] : 'Pelayanan Terpercaya'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 4: Keterangan *</label>
                                        <input type="text" name="feat4_desc" class="form-control" value="<?php echo html_escape(isset($settings['feat4_desc']) ? $settings['feat4_desc'] : 'Proses administrasi legal yang lengkap, dibekali sertifikat veteriner resmi dari Dinas Peternakan bebas penyakit PMK/LSD.'); ?>" required autocomplete="off">
                                    </div>

                                    <!-- Feature 5 -->
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 5: Judul *</label>
                                        <input type="text" name="feat5_title" class="form-control" value="<?php echo html_escape(isset($settings['feat5_title']) ? $settings['feat5_title'] : 'Harga Kompetitif'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Keunggulan 5: Keterangan *</label>
                                        <input type="text" name="feat5_desc" class="form-control" value="<?php echo html_escape(isset($settings['feat5_desc']) ? $settings['feat5_desc'] : 'Penawaran harga terbaik langsung dari peternak tangan pertama tanpa perantara yang mahal, ideal untuk RPH, kuliner, dan reseller.'); ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 6: GALERI PETERNAKAN -->
                            <div class="config-tab-content" id="config-gallery">
                                <div class="form-grid">
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="images" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Konten Galeri Peternakan
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tagline Section Badge *</label>
                                        <input type="text" name="gallery_section_badge" class="form-control" value="<?php echo html_escape(isset($settings['gallery_section_badge']) ? $settings['gallery_section_badge'] : 'Galeri Peternakan'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Utama Section *</label>
                                        <input type="text" name="gallery_section_title" class="form-control" value="<?php echo html_escape(isset($settings['gallery_section_title']) ? $settings['gallery_section_title'] : 'Galeri Peternakan Modern'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Deskripsi Ringkasan Section *</label>
                                        <textarea name="gallery_section_desc" class="form-control" required><?php echo html_escape(isset($settings['gallery_section_desc']) ? $settings['gallery_section_desc'] : 'Dokumentasi nyata aktivitas harian, kebersihan fasilitas kandang modern, dan kondisi lingkungan asri di Twin Farms.'); ?></textarea>
                                    </div>

                                    <div class="form-section-title">
                                        <i data-lucide="tag" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Keterangan & Foto Galeri Peternakan
                                    </div>

                                    <!-- Foto 1 -->
                                    <div class="form-group">
                                        <label class="form-label">Label Foto Galeri 1 *</label>
                                        <input type="text" name="gallery_img1_label" class="form-control" value="<?php echo html_escape(isset($settings['gallery_img1_label']) ? $settings['gallery_img1_label'] : 'Kandang Modern Bersih'); ?>" required autocomplete="off">
                                        
                                        <label class="form-label" style="margin-top: 0.75rem;">Ganti Foto Galeri 1</label>
                                        <input type="file" name="gallery_img1" class="form-control" accept="image/*">
                                        
                                        <!-- Thumbnail -->
                                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem;">
                                            <img src="<?php echo base_url(isset($settings['gallery_img1']) ? $settings['gallery_img1'] : 'assets/images/ternak1.jpg'); ?>" style="width: 100px; height: 60px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-color);" alt="Gallery 1 Thumbnail">
                                            <span style="font-size: 0.75rem; color: var(--text-muted);">Gambar saat ini</span>
                                        </div>
                                    </div>

                                    <!-- Foto 2 -->
                                    <div class="form-group">
                                        <label class="form-label">Label Foto Galeri 2 *</label>
                                        <input type="text" name="gallery_img2_label" class="form-control" value="<?php echo html_escape(isset($settings['gallery_img2_label']) ? $settings['gallery_img2_label'] : 'Sapi Potong Unggulan'); ?>" required autocomplete="off">
                                        
                                        <label class="form-label" style="margin-top: 0.75rem;">Ganti Foto Galeri 2</label>
                                        <input type="file" name="gallery_img2" class="form-control" accept="image/*">
                                        
                                        <!-- Thumbnail -->
                                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem;">
                                            <img src="<?php echo base_url(isset($settings['gallery_img2']) ? $settings['gallery_img2'] : 'assets/images/ternak2.jpg'); ?>" style="width: 100px; height: 60px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-color);" alt="Gallery 2 Thumbnail">
                                            <span style="font-size: 0.75rem; color: var(--text-muted);">Gambar saat ini</span>
                                        </div>
                                    </div>

                                    <!-- Foto 3 -->
                                    <div class="form-group">
                                        <label class="form-label">Label Foto Galeri 3 *</label>
                                        <input type="text" name="gallery_img3_label" class="form-control" value="<?php echo html_escape(isset($settings['gallery_img3_label']) ? $settings['gallery_img3_label'] : 'Pemberian Pakan Organik'); ?>" required autocomplete="off">
                                        
                                        <label class="form-label" style="margin-top: 0.75rem;">Ganti Foto Galeri 3</label>
                                        <input type="file" name="gallery_img3" class="form-control" accept="image/*">
                                        
                                        <!-- Thumbnail -->
                                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem;">
                                            <img src="<?php echo base_url(isset($settings['gallery_img3']) ? $settings['gallery_img3'] : 'assets/images/ternak3.jpg'); ?>" style="width: 100px; height: 60px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-color);" alt="Gallery 3 Thumbnail">
                                            <span style="font-size: 0.75rem; color: var(--text-muted);">Gambar saat ini</span>
                                        </div>
                                    </div>

                                    <!-- Foto 4 -->
                                    <div class="form-group">
                                        <label class="form-label">Label Foto Galeri 4 *</label>
                                        <input type="text" name="gallery_img4_label" class="form-control" value="<?php echo html_escape(isset($settings['gallery_img4_label']) ? $settings['gallery_img4_label'] : 'Lingkungan Pasture Sehat'); ?>" required autocomplete="off">
                                        
                                        <label class="form-label" style="margin-top: 0.75rem;">Ganti Foto Galeri 4</label>
                                        <input type="file" name="gallery_img4" class="form-control" accept="image/*">
                                        
                                        <!-- Thumbnail -->
                                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem;">
                                            <img src="<?php echo base_url(isset($settings['gallery_img4']) ? $settings['gallery_img4'] : 'assets/images/ternak4.png'); ?>" style="width: 100px; height: 60px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-color);" alt="Gallery 4 Thumbnail">
                                            <span style="font-size: 0.75rem; color: var(--text-muted);">Gambar saat ini</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SUB-TAB 7: HUBUNGI KAMI & KUNJUNGI KANDANG -->
                            <div class="config-tab-content" id="config-contact">
                                <div class="form-grid">
                                    
                                    <!-- A. Header Section -->
                                    <div class="form-section-title" style="margin-top: 0;">
                                        <i data-lucide="info" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> A. Header Section Kontak
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tagline Section Badge *</label>
                                        <input type="text" name="contact_section_badge" class="form-control" value="<?php echo html_escape(isset($settings['contact_section_badge']) ? $settings['contact_section_badge'] : 'Hubungi Kontak Kami'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Utama Section *</label>
                                        <input type="text" name="contact_section_title" class="form-control" value="<?php echo html_escape(isset($settings['contact_section_title']) ? $settings['contact_section_title'] : 'Hubungi Kami & Kunjungi Kandang'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Deskripsi Ringkasan Section *</label>
                                        <textarea name="contact_section_desc" class="form-control" required><?php echo html_escape(isset($settings['contact_section_desc']) ? $settings['contact_section_desc'] : 'Hubungi marketing kami untuk pemesanan kustom sapi potong skala besar atau jadwalkan waktu kunjungan survei kandang Anda.'); ?></textarea>
                                    </div>

                                    <!-- B. Detail Kontak & Saluran -->
                                    <div class="form-section-title">
                                        <i data-lucide="message-square" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> B. Saluran Komunikasi Resmi
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Judul Komunikasi *</label>
                                        <input type="text" name="contact_channels_title" class="form-control" value="<?php echo html_escape(isset($settings['contact_channels_title']) ? $settings['contact_channels_title'] : 'Saluran Komunikasi Resmi'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Keterangan Komunikasi *</label>
                                        <input type="text" name="contact_channels_desc" class="form-control" value="<?php echo html_escape(isset($settings['contact_channels_desc']) ? $settings['contact_channels_desc'] : 'Silakan hubungi kami melalui salah satu saluran berikut atau ikuti media sosial kami untuk update stok sapi terbaru setiap harinya.'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">WhatsApp: Label *</label>
                                        <input type="text" name="contact_wa_label" class="form-control" value="<?php echo html_escape(isset($settings['contact_wa_label']) ? $settings['contact_wa_label'] : 'WhatsApp Official'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">WhatsApp: Nomor Tampilan *</label>
                                        <input type="text" name="contact_wa_number" class="form-control" value="<?php echo html_escape(isset($settings['contact_wa_number']) ? $settings['contact_wa_number'] : '+62 852-1017-1587'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">WhatsApp: Link / Nomor Murni (Hanya angka tanpa +/spasi/tanda hubung) *</label>
                                        <input type="text" name="contact_wa_link" class="form-control" value="<?php echo html_escape(isset($settings['contact_wa_link']) ? $settings['contact_wa_link'] : '6285210171587'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Alamat: Label *</label>
                                        <input type="text" name="contact_address_label" class="form-control" value="<?php echo html_escape(isset($settings['contact_address_label']) ? $settings['contact_address_label'] : 'Alamat Peternakan'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Alamat: Teks Lengkap Alamat Fisik *</label>
                                        <input type="text" name="contact_address_text" class="form-control" value="<?php echo html_escape(isset($settings['contact_address_text']) ? $settings['contact_address_text'] : 'Jl. Peternakan Raya No. 88, Caringin, Sukabumi, Jawa Barat 14320'); ?>" required autocomplete="off">
                                    </div>

                                    <!-- C. Media Sosial & Maps -->
                                    <div class="form-section-title">
                                        <i data-lucide="map" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> C. Media Sosial & Peta Lokasi
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link Instagram *</label>
                                        <input type="text" name="contact_ig_link" class="form-control" value="<?php echo html_escape(isset($settings['contact_ig_link']) ? $settings['contact_ig_link'] : 'https://instagram.com/twinfarms'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link TikTok *</label>
                                        <input type="text" name="contact_tiktok_link" class="form-control" value="<?php echo html_escape(isset($settings['contact_tiktok_link']) ? $settings['contact_tiktok_link'] : 'https://tiktok.com/@twinfarms'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link YouTube *</label>
                                        <input type="text" name="contact_yt_link" class="form-control" value="<?php echo html_escape(isset($settings['contact_yt_link']) ? $settings['contact_yt_link'] : 'https://youtube.com/@twinfarms'); ?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">Google Maps Embed URL *</label>
                                        <input type="text" name="contact_maps_url" class="form-control" value="<?php echo html_escape(isset($settings['contact_maps_url']) ? $settings['contact_maps_url'] : 'https://maps.google.com/maps?q=Caringin,%20Sukabumi,%20Jawa%20Barat&t=&z=14&ie=UTF8&iwloc=&output=embed'); ?>" required autocomplete="off">
                                        <span style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem; display: block;">Masukkan URL embed Google Maps (src dari tag iframe Google Maps).</span>
                                    </div>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2.5rem; border-top: 1px solid var(--border-color); padding-top: 1.5rem;">
                                <button type="submit" class="btn-primary" style="padding: 0 2rem; height: 48px;">
                                    <i data-lucide="save"></i>
                                    <span>Simpan Perubahan Landing Page</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <!-- SECTION 4: KELOLA TESTIMONI PEMBELI -->
                <section class="section-panel" id="testi-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Kelola Testimoni Pembeli</h2>
                            <p>Pantau seluruh ulasan jujur dan rating bintang yang dikirimkan langsung oleh pelanggan Anda melalui landing page.</p>
                        </div>
                    </div>


                    <!-- Testimonial Items List -->
                    <div class="table-card">
                        <div class="table-header">
                            <h3>Daftar Testimoni Pelanggan</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 80px; text-align: center;">Profil</th>
                                        <th style="width: 200px;">Nama Pelanggan</th>
                                        <th style="width: 250px;">Jabatan / Perusahaan</th>
                                        <th style="width: 120px; text-align: center;">Rating</th>
                                        <th>Isi Testimoni</th>
                                        <th style="width: 100px; text-align: center;">Moderasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($testimonials)): ?>
                                        <?php foreach ($testimonials as $t): ?>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <div class="avatar-large" style="width: 42px; height: 42px; font-size: 0.95rem; margin: 0 auto; background: rgba(51, 65, 85, 0.08); color: var(--primary);">
                                                        <?php echo html_escape($t['avatar_char']); ?>
                                                    </div>
                                                </td>
                                                <td><strong style="color: var(--primary);"><?php echo html_escape($t['name']); ?></strong></td>
                                                <td><span style="font-size: 0.85rem; color: var(--text-muted);"><?php echo html_escape($t['title']); ?></span></td>
                                                <td style="text-align: center;">
                                                    <div style="display: flex; justify-content: center; gap: 0.15rem; color: var(--accent);">
                                                        <?php for ($stars = 1; $stars <= 5; $stars++): ?>
                                                            <i data-lucide="star" style="width: 14px; height: 14px; <?php echo ($stars <= $t['stars']) ? 'fill: var(--accent);' : 'color: var(--border-color);'; ?>"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5; max-width: 450px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?php echo html_escape($t['text']); ?>">
                                                        "<?php echo html_escape($t['text']); ?>"
                                                    </p>
                                                </td>
                                                <td style="text-align: center;">
                                                    <div style="display: flex; justify-content: center;">
                                                        <a href="<?php echo site_url('admin/delete_testimonial/' . $t['id']); ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni dari <?php echo html_escape($t['name']); ?>?')" title="Hapus Testimoni">
                                                            <i data-lucide="trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                                Belum ada data testimoni yang dikirimkan oleh pembeli.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- SECTION 5: KELOLA GALERI PETERNAKAN -->
                <section class="section-panel" id="galeri-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Kelola Galeri Peternakan</h2>
                            <p>Unggah foto aktivitas peternakan, atur deskripsi label gambar, serta aktifkan/nonaktifkan penampilannya di landing page.</p>
                        </div>
                        
                        <button class="btn-primary" onclick="openAddGalleryModal()">
                            <i data-lucide="plus"></i>
                            <span>Tambah Foto Galeri</span>
                        </button>
                    </div>

                    <div class="table-card">
                        <div class="table-header">
                            <h3>Daftar Foto Galeri</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">Foto Preview</th>
                                        <th>Label / Deskripsi</th>
                                        <th style="width: 150px; text-align: center;">Status Tampil</th>
                                        <th style="width: 150px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($gallery)): ?>
                                        <?php foreach ($gallery as $g): ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo base_url($g['image_path']); ?>" alt="<?php echo html_escape($g['label']); ?>" style="width: 100px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border-color);">
                                                </td>
                                                <td><strong style="color: var(--primary-dark);"><?php echo html_escape($g['label']); ?></strong></td>
                                                <td style="text-align: center;">
                                                    <?php if (isset($g['is_active']) && $g['is_active'] == 1): ?>
                                                        <span class="badge" style="background: rgba(37, 99, 235, 0.08); color: #2f855a; border: 1px solid rgba(37, 99, 235, 0.2);">Aktif</span>
                                                    <?php else: ?>
                                                        <span class="badge" style="background: rgba(113, 128, 150, 0.08); color: #4a5568; border: 1px solid rgba(113, 128, 150, 0.2);">Nonaktif</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="actions-cell" style="justify-content: center;">
                                                        <a href="<?php echo site_url('admin/toggle_gallery_status/' . $g['id']); ?>" class="action-btn" title="<?php echo (isset($g['is_active']) && $g['is_active'] == 1) ? 'Nonaktifkan Foto' : 'Aktifkan Foto'; ?>" style="color: <?php echo (isset($g['is_active']) && $g['is_active'] == 1) ? '#e53e3e' : '#2b6cb0'; ?>;">
                                                            <i data-lucide="<?php echo (isset($g['is_active']) && $g['is_active'] == 1) ? 'eye-off' : 'eye'; ?>"></i>
                                                        </a>
                                                        <button class="action-btn" onclick="openEditGalleryModal(<?php echo html_escape(json_encode($g)); ?>)" title="Ubah Label/Foto">
                                                            <i data-lucide="edit-3"></i>
                                                        </button>
                                                        <a href="<?php echo site_url('admin/delete_gallery/' . $g['id']); ?>" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini dari galeri?')" title="Hapus Foto">
                                                            <i data-lucide="trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                                Belum ada foto dalam galeri peternakan. Silakan unggah foto perdana Anda!
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- SECTION 6: KELOLA PESANAN -->
                <section class="section-panel" id="pesanan-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Kelola Pesanan</h2>
                            <p>Pantau seluruh pemesanan sapi potong oleh client secara real-time dan kelola status persetujuan agenda pengambilan.</p>
                        </div>
                        
                        <button class="btn-primary" onclick="openAddOrderModal()">
                            <i data-lucide="plus"></i>
                            <span>Tambah Pesanan Baru</span>
                        </button>
                    </div>

                    <!-- Search & Filter Area for Orders -->
                    <div class="filter-card" style="margin-bottom: 2rem; padding: 1.5rem; background: var(--white); border: 1px solid var(--border-color); border-radius: 20px; box-shadow: var(--shadow-premium);">
                        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 1.25rem;">
                            <!-- Search -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label" style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted);"><i data-lucide="search" style="width: 12px; height: 12px;"></i> Cari Pesanan</label>
                                <input type="text" id="order-search" class="form-control" placeholder="Cari No. Order, nama pembeli, nomor WhatsApp, atau nama sapi..." autocomplete="off">
                            </div>
                            <!-- Status Filter -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label" style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted);"><i data-lucide="filter" style="width: 12px; height: 12px;"></i> Filter Status</label>
                                <select id="order-filter-status" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="pending">Menunggu</option>
                                    <option value="dikonfirmasi">Disetujui</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="dibatalkan">Batal</option>
                                </select>
                            </div>
                            <!-- Cattle Filter -->
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label" style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted);"><i data-lucide="cow" style="width: 12px; height: 12px; display: inline-block; vertical-align: middle;"></i> Sapi Dipesan</label>
                                <select id="order-filter-cattle" class="form-control">
                                    <option value="">Semua Sapi</option>
                                    <?php if (!empty($cattle)): ?>
                                        <?php foreach ($cattle as $cw): ?>
                                            <option value="<?php echo html_escape($cw['name']); ?>"><?php echo html_escape($cw['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-card">
                        <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding: 1.25rem 1.5rem;">
                            <h3>Daftar Pemesanan Masuk</h3>
                            <div style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">
                                Menampilkan <span id="order-pagination-count-showing" style="color: var(--primary); font-weight: 700;">0</span> dari <span id="order-pagination-count-total" style="color: var(--primary); font-weight: 700;">0</span> pesanan
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 110px; text-align: center;">No. Order</th>
                                        <th>Detail Pembeli</th>
                                        <th>Sapi Dipesan</th>
                                        <th>Harga</th>
                                        <th>Rencana Ambil</th>
                                        <th>Catatan</th>
                                        <th style="text-align: center; width: 110px;">Status</th>
                                                                                 <th style="text-align: center; width: 130px;">Opsi Pengiriman</th>
                                        <th style="text-align: center; width: 140px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="order-table-body">
                                    <?php if (!empty($orders)): ?>
                                        <?php foreach ($orders as $ord): ?>
                                            <tr class="order-row" 
                                                data-id="<?php echo $ord['id']; ?>"
                                                data-user-id="<?php echo $ord['user_id']; ?>"
                                                data-cattle-id="<?php echo $ord['cattle_id']; ?>"
                                                data-user-name="<?php echo html_escape(strtolower($ord['user_name'])); ?>"
                                                data-user-phone="<?php echo html_escape(strtolower($ord['user_phone'])); ?>"
                                                data-user-address="<?php echo html_escape(strtolower($ord['user_address'])); ?>"
                                                data-cattle-name="<?php echo html_escape(strtolower($ord['cattle_name'])); ?>"
                                                data-cattle-price="<?php echo html_escape(strtolower($ord['cattle_price'])); ?>"
                                                data-status="<?php echo $ord['status']; ?>"
                                                data-delivery-status="<?php echo $ord['delivery_status']; ?>"
                                                data-pickup-date="<?php echo $ord['pickup_date']; ?>"
                                                data-notes="<?php echo html_escape(strtolower($ord['notes'])); ?>">
                                                <td style="font-weight: 700; color: var(--primary); text-align: center;">#ORD-<?php echo $ord['id']; ?></td>
                                                <td>
                                                    <div style="font-weight: 700; color: var(--primary-dark);"><?php echo html_escape($ord['user_name']); ?></div>
                                                    <div style="font-size: 0.8rem; color: var(--accent); font-weight: 600;"><i data-lucide="phone" style="width: 12px; height: 12px; display: inline-block; vertical-align: middle;"></i> <?php echo html_escape($ord['user_phone']); ?></div>
                                                    <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?php echo html_escape($ord['user_address']); ?>"><?php echo html_escape($ord['user_address']); ?></div>
                                                </td>
                                                <td>
                                                    <strong style="color: var(--primary-dark);"><?php echo html_escape($ord['cattle_name']); ?></strong>
                                                </td>
                                                <td style="font-weight: 700; color: var(--accent);"><?php echo html_escape($ord['cattle_price']); ?></td>
                                                <td style="font-weight: 600;"><?php echo date('d M Y', strtotime($ord['pickup_date'])); ?></td>
                                                <td style="color: var(--text-muted); font-size: 0.8rem; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?php echo html_escape($ord['notes']); ?>">
                                                    <?php echo $ord['notes'] ? html_escape($ord['notes']) : '-'; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <div style="cursor: pointer;" onclick='openUpdateOrderStatusModal(<?php echo json_encode($ord); ?>)' title="Klik untuk Ubah Status Cepat">
                                                        <?php 
                                                            $st = $ord['status'];
                                                            if ($st === 'pending') {
                                                                echo '<span class="badge" style="background: #FFFBEB; color: #D97706; border: 1px solid #FDE68A;">Menunggu</span>';
                                                            } else if ($st === 'dikonfirmasi') {
                                                                echo '<span class="badge" style="background: #EFF6FF; color: #2563EB; border: 1px solid #BFDBFE;">Disetujui</span>';
                                                            } else if ($st === 'selesai') {
                                                                echo '<span class="badge" style="background: #ECFDF5; color: #059669; border: 1px solid #A7F3D0;">Selesai</span>';
                                                            } else {
                                                                echo '<span class="badge" style="background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA;">Batal</span>';
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td style="text-align: center;">
                                                    <div style="cursor: pointer;" onclick='openUpdateOrderStatusModal(<?php echo json_encode($ord); ?>)' title="Klik untuk Ubah Status Cepat">
                                                        <?php 
                                                            $dst = $ord['delivery_status'];
                                                            if ($dst === 'diantar') {
                                                                echo '<span class="badge" style="background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE;"><i data-lucide="truck" style="width: 12px; height: 12px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Diantar</span>';
                                                            } else {
                                                                echo '<span class="badge" style="background: #F3F4F6; color: #4B5563; border: 1px solid #E5E7EB;"><i data-lucide="store" style="width: 12px; height: 12px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Ambil Sendiri</span>';
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="actions-cell" style="justify-content: center; gap: 0.5rem;">
                                                        <button class="action-btn" onclick='openUpdateOrderStatusModal(<?php echo json_encode($ord); ?>)' title="Ubah Status Cepat" style="color: var(--accent);">
                                                            <i data-lucide="check-square"></i>
                                                        </button>
                                                        <button class="action-btn" onclick='openEditOrderModal(<?php echo json_encode($ord); ?>)' title="Ubah Detail Pesanan" style="color: var(--primary-light);">
                                                            <i data-lucide="edit-3"></i>
                                                        </button>
                                                        <a href="<?php echo site_url('admin/delete_order/' . $ord['id']); ?>" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data pemesanan #ORD-<?php echo $ord['id']; ?>?')" title="Hapus Data Pesanan">
                                                            <i data-lucide="trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr id="order-empty-row">
                                            <td colspan="9" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                                Belum ada data pemesanan sapi masuk dari pelanggan.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Footer Controls -->
                        <div style="display: flex; justify-content: flex-end; align-items: center; padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color); background: rgba(27,67,50,0.01);">
                            <div id="order-pagination-controls" style="display: flex; gap: 0.35rem;"></div>
                        </div>
                    </div>
                </section>

                <!-- SECTION 7: KELOLA KANDANG (BARNS CRUD) -->
                <section class="section-panel" id="kandang-panel">
                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Kelola Data Kandang</h2>
                            <p>Tambahkan lokasi kandang baru, ubah nama, atau hapus lokasi kandang yang sudah tidak aktif secara real-time.</p>
                        </div>
                        
                        <button class="btn-primary" onclick="openAddBarnModal()">
                            <i data-lucide="plus"></i>
                            <span>Tambah Kandang Baru</span>
                        </button>
                    </div>

                    <div class="table-card">
                        <div class="table-header">
                            <h3>Daftar Lokasi Kandang</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 100px; text-align: center;">ID</th>
                                        <th>Nama Kandang</th>
                                        <th style="width: 250px;">Tanggal Ditambahkan</th>
                                        <th style="width: 200px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($barns)): ?>
                                        <?php foreach ($barns as $b): ?>
                                            <tr>
                                                <td style="text-align: center; font-weight: 700; color: var(--primary);">#KND-<?php echo $b['id']; ?></td>
                                                <td><strong style="color: var(--primary-dark);"><?php echo html_escape($b['name']); ?></strong></td>
                                                <td><span style="font-size: 0.85rem; color: var(--text-muted);"><?php echo date('d M Y, H:i', strtotime($b['created_at'])); ?></span></td>
                                                <td>
                                                    <div class="actions-cell" style="justify-content: center;">
                                                        <button class="action-btn" onclick='openEditBarnModal(<?php echo json_encode($b); ?>)' title="Ubah Nama Kandang" style="color: var(--primary-light);">
                                                            <i data-lucide="edit-3"></i>
                                                        </button>
                                                        <a href="<?php echo site_url('admin/delete_barn/' . $b['id']); ?>" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus Kandang <?php echo html_escape($b['name']); ?>? Sapi yang menggunakan kandang ini harus disesuaikan kembali.')" title="Hapus Kandang">
                                                            <i data-lucide="trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                                Belum ada data lokasi kandang. Silakan tambahkan kandang perdana Anda!
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>
        </main>

    </div>

    <!-- ==================== WIZARD MODAL 1: TAMBAH SAPI BARU ==================== -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-window">
            <div class="modal-header">
                <h3>Tambah Sapi Baru</h3>
                <button class="modal-close" onclick="closeAddWizard()"><i data-lucide="x"></i></button>
            </div>
            
            <form action="<?php echo site_url('admin/add'); ?>" method="POST" enctype="multipart/form-data" id="addWizardForm">
                <div class="modal-scrollable-body">
                    
                    <!-- Wizard Stepper Indicators -->
                    <div class="wizard-header-stepper">
                        <div class="wizard-step-indicator active" id="add-indicator-1">
                            <div class="indicator-num">1</div>
                            <span>Info Dasar</span>
                        </div>
                        <div class="wizard-divider-line"></div>
                        <div class="wizard-step-indicator" id="add-indicator-2">
                            <div class="indicator-num">2</div>
                            <span>Spesifikasi</span>
                        </div>
                        <div class="wizard-divider-line"></div>
                        <div class="wizard-step-indicator" id="add-indicator-3">
                            <div class="indicator-num">3</div>
                            <span>Media & Teks</span>
                        </div>
                    </div>

                    <!-- STEP 1: INFORMASI DASAR -->
                    <div class="wizard-step-content active" id="add-step-1">
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="database" style="width: 14px; height: 14px;"></i> Nama Sapi *</label>
                                <input type="text" name="name" class="form-control" placeholder="Contoh: Limousin Gold LM-88" required autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="paw-print" style="width: 14px; height: 14px;"></i> Jenis / Ras Sapi *</label>
                                <select name="breed" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Sapi</option>
                                    <?php if (!empty($breeds)): ?>
                                        <?php foreach ($breeds as $b): ?>
                                            <option value="<?php echo html_escape($b['name']); ?>"><?php echo html_escape($b['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="calendar" style="width: 14px; height: 14px;"></i> Umur Ternak *</label>
                                <input type="text" name="age" class="form-control" placeholder="Contoh: 16 Bulan" required autocomplete="off">
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="activity" style="width: 14px; height: 14px;"></i> Kondisi Kesehatan *</label>
                                <input type="text" name="health" class="form-control" value="Sangat Sehat (Bebas PMK & Vaksinasi Lengkap)" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: SPESIFIKASI & LOKASI -->
                    <div class="wizard-step-content" id="add-step-2">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="trending-up" style="width: 14px; height: 14px;"></i> Berat Aktual Sapi *</label>
                                <input type="text" name="weight" class="form-control" placeholder="Contoh: 540 kg" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="scale" style="width: 14px; height: 14px;"></i> Berat Timbangan Awal *</label>
                                <input type="text" name="weight_initial" class="form-control" placeholder="Contoh: 420 kg" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="gauge" style="width: 14px; height: 14px;"></i> Kenaikan Harian (ADG) *</label>
                                <input type="text" name="daily_weight_gain" class="form-control" placeholder="Contoh: 1.35 kg/hari" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="carrot" style="width: 14px; height: 14px;"></i> Jenis Pakan Harian *</label>
                                <select name="feed_type" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Pakan</option>
                                    <option value="Konsentrat Premium + Ampas Tahu + Silase Jagung">Konsentrat Premium + Ampas Tahu + Silase Jagung</option>
                                    <option value="Konsentrat Tinggi Protein + Hijauan Odot + Mineral Block">Konsentrat Tinggi Protein + Hijauan Odot + Mineral Block</option>
                                    <option value="Konsentrat Lokal + Jerami Fermentasi + Ampas Singkong">Konsentrat Lokal + Jerami Fermentasi + Ampas Singkong</option>
                                    <option value="Konsentrat Standar + Rumput Gajah">Konsentrat Standar + Rumput Gajah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="shield-alert" style="width: 14px; height: 14px;"></i> Status Vaksinasi *</label>
                                <select name="vaccination_status" class="form-control" required>
                                    <option value="" disabled selected>Pilih Status Vaksinasi</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 2 + Booster LSD)">Lengkap (Vaksin PMK Dosis 2 + Booster LSD)</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 2 + LSD)">Lengkap (Vaksin PMK Dosis 2 + LSD)</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 1)">Lengkap (Vaksin PMK Dosis 1)</option>
                                    <option value="Belum Divaksin">Belum Divaksin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="home" style="width: 14px; height: 14px;"></i> Status Karantina *</label>
                                <select name="quarantine_status" class="form-control" required>
                                    <option value="" disabled selected>Pilih Status Karantina</option>
                                    <option value="Lulus Karantina Mandiri 14 Hari">Lulus Karantina Mandiri 14 Hari</option>
                                    <option value="Lulus Karantina Mandiri 7 Hari">Lulus Karantina Mandiri 7 Hari</option>
                                    <option value="Sedang Masa Karantina">Sedang Masa Karantina</option>
                                    <option value="Bebas Karantina">Bebas Karantina</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="calendar" style="width: 14px; height: 14px;"></i> Tanggal Cek Medis *</label>
                                <input type="text" name="vet_check_date" class="form-control" placeholder="Contoh: 23 Mei 2026" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="banknote" style="width: 14px; height: 14px;"></i> Harga Penawaran *</label>
                                <input type="text" name="price" class="form-control" placeholder="Contoh: Rp 29.500.000" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="check-circle" style="width: 14px; height: 14px;"></i> Status Sapi *</label>
                                <select name="status" class="form-control">
                                    <option value="tersedia" selected>Tersedia (Ready)</option>
                                    <option value="terjual">Terjual (Sold Out)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="boxes" style="width: 14px; height: 14px;"></i> Jumlah Stok Sapi *</label>
                                <input type="number" name="stock" class="form-control" value="1" min="0" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="map-pin" style="width: 14px; height: 14px;"></i> Lokasi Kandang *</label>
                                <select name="location" class="form-control" required>
                                    <option value="" disabled selected>Pilih Lokasi Kandang</option>
                                    <?php if (!empty($barns)): ?>
                                        <?php foreach ($barns as $b): ?>
                                            <option value="<?php echo html_escape($b['name']); ?>"><?php echo html_escape($b['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: MEDIA & DESKRIPSI -->
                    <div class="wizard-step-content" id="add-step-3">
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="info" style="width: 14px; height: 14px;"></i> Deskripsi Sapi *</label>
                                <textarea name="description" class="form-control" placeholder="Masukkan deskripsi postur, karkas daging, pemberian pakan..." required></textarea>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Utama Sapi * (Optimal: 800x800)</label>
                                <input type="file" name="image_main" class="form-control" required accept="image/*">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Galeri 1 (Opsional)</label>
                                <input type="file" name="image_gallery1" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Galeri 2 (Opsional)</label>
                                <input type="file" name="image_gallery2" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation controls footer (Perfectly Symmetric Alignment) -->
                <div class="wizard-footer-nav">
                    <div class="wizard-actions-left" style="display: flex; gap: 0.75rem;">
                        <button type="button" class="btn-secondary" id="add-cancel-btn" onclick="closeAddWizard()">
                            <i data-lucide="x" style="width: 16px; height: 16px;"></i> <span>Batal</span>
                        </button>
                        <button type="button" class="btn-secondary" id="add-prev-btn" onclick="prevAddStep()" style="display: none;">
                            <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i> <span>Kembali</span>
                        </button>
                    </div>
                    
                    <div class="wizard-actions-right" style="display: flex; gap: 0.75rem;">
                        <button type="button" class="btn-primary" id="add-next-btn" onclick="nextAddStep()">
                            <span>Lanjut</span> <i data-lucide="arrow-right" style="width: 16px; height: 16px;"></i>
                        </button>
                        <button type="submit" class="btn-primary" id="add-submit-btn" style="display: none;">
                            <i data-lucide="save" style="width: 16px; height: 16px;"></i> <span>Simpan Sapi</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== WIZARD MODAL 2: UBAH DATA SAPI ==================== -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-window">
            <div class="modal-header">
                <h3>Ubah Data Sapi</h3>
                <button class="modal-close" onclick="closeEditWizard()"><i data-lucide="x"></i></button>
            </div>
            
            <form id="editWizardForm" action="" method="POST" enctype="multipart/form-data">
                <div class="modal-scrollable-body">
                    
                    <!-- Wizard Stepper Indicators -->
                    <div class="wizard-header-stepper">
                        <div class="wizard-step-indicator active" id="edit-indicator-1">
                            <div class="indicator-num">1</div>
                            <span>Info Dasar</span>
                        </div>
                        <div class="wizard-divider-line"></div>
                        <div class="wizard-step-indicator" id="edit-indicator-2">
                            <div class="indicator-num">2</div>
                            <span>Spesifikasi</span>
                        </div>
                        <div class="wizard-divider-line"></div>
                        <div class="wizard-step-indicator" id="edit-indicator-3">
                            <div class="indicator-num">3</div>
                            <span>Media & Teks</span>
                        </div>
                    </div>

                    <!-- STEP 1: INFORMASI DASAR -->
                    <div class="wizard-step-content active" id="edit-step-1">
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="database" style="width: 14px; height: 14px;"></i> Nama Sapi *</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="paw-print" style="width: 14px; height: 14px;"></i> Jenis / Ras Sapi *</label>
                                <select name="breed" id="edit_breed" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Sapi</option>
                                    <?php if (!empty($breeds)): ?>
                                        <?php foreach ($breeds as $b): ?>
                                            <option value="<?php echo html_escape($b['name']); ?>"><?php echo html_escape($b['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="calendar" style="width: 14px; height: 14px;"></i> Umur Ternak *</label>
                                <input type="text" name="age" id="edit_age" class="form-control" required autocomplete="off">
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="activity" style="width: 14px; height: 14px;"></i> Kondisi Kesehatan *</label>
                                <input type="text" name="health" id="edit_health" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: SPESIFIKASI & LOKASI -->
                    <div class="wizard-step-content" id="edit-step-2">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="trending-up" style="width: 14px; height: 14px;"></i> Berat Aktual Sapi *</label>
                                <input type="text" name="weight" id="edit_weight" class="form-control" placeholder="Contoh: 540 kg" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="scale" style="width: 14px; height: 14px;"></i> Berat Timbangan Awal *</label>
                                <input type="text" name="weight_initial" id="edit_weight_initial" class="form-control" placeholder="Contoh: 420 kg" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="gauge" style="width: 14px; height: 14px;"></i> Kenaikan Harian (ADG) *</label>
                                <input type="text" name="daily_weight_gain" id="edit_daily_weight_gain" class="form-control" placeholder="Contoh: 1.35 kg/hari" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="carrot" style="width: 14px; height: 14px;"></i> Jenis Pakan Harian *</label>
                                <select name="feed_type" id="edit_feed_type" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Pakan</option>
                                    <option value="Konsentrat Premium + Ampas Tahu + Silase Jagung">Konsentrat Premium + Ampas Tahu + Silase Jagung</option>
                                    <option value="Konsentrat Tinggi Protein + Hijauan Odot + Mineral Block">Konsentrat Tinggi Protein + Hijauan Odot + Mineral Block</option>
                                    <option value="Konsentrat Lokal + Jerami Fermentasi + Ampas Singkong">Konsentrat Lokal + Jerami Fermentasi + Ampas Singkong</option>
                                    <option value="Konsentrat Standar + Rumput Gajah">Konsentrat Standar + Rumput Gajah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="shield-alert" style="width: 14px; height: 14px;"></i> Status Vaksinasi *</label>
                                <select name="vaccination_status" id="edit_vaccination_status" class="form-control" required>
                                    <option value="" disabled>Pilih Status Vaksinasi</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 2 + Booster LSD)">Lengkap (Vaksin PMK Dosis 2 + Booster LSD)</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 2 + LSD)">Lengkap (Vaksin PMK Dosis 2 + LSD)</option>
                                    <option value="Lengkap (Vaksin PMK Dosis 1)">Lengkap (Vaksin PMK Dosis 1)</option>
                                    <option value="Belum Divaksin">Belum Divaksin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="home" style="width: 14px; height: 14px;"></i> Status Karantina *</label>
                                <select name="quarantine_status" id="edit_quarantine_status" class="form-control" required>
                                    <option value="" disabled>Pilih Status Karantina</option>
                                    <option value="Lulus Karantina Mandiri 14 Hari">Lulus Karantina Mandiri 14 Hari</option>
                                    <option value="Lulus Karantina Mandiri 7 Hari">Lulus Karantina Mandiri 7 Hari</option>
                                    <option value="Sedang Masa Karantina">Sedang Masa Karantina</option>
                                    <option value="Bebas Karantina">Bebas Karantina</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="calendar" style="width: 14px; height: 14px;"></i> Tanggal Cek Medis *</label>
                                <input type="text" name="vet_check_date" id="edit_vet_check_date" class="form-control" placeholder="Contoh: 23 Mei 2026" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="banknote" style="width: 14px; height: 14px;"></i> Harga Penawaran *</label>
                                <input type="text" name="price" id="edit_price" class="form-control" placeholder="Contoh: Rp 29.500.000" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="check-circle" style="width: 14px; height: 14px;"></i> Status Sapi *</label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="tersedia">Tersedia (Ready)</option>
                                    <option value="terjual">Terjual (Sold Out)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><i data-lucide="boxes" style="width: 14px; height: 14px;"></i> Jumlah Stok Sapi *</label>
                                <input type="number" name="stock" id="edit_stock" class="form-control" min="0" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="map-pin" style="width: 14px; height: 14px;"></i> Lokasi Kandang *</label>
                                <select name="location" id="edit_location" class="form-control" required>
                                    <option value="" disabled>Pilih Lokasi Kandang</option>
                                    <?php if (!empty($barns)): ?>
                                        <?php foreach ($barns as $b): ?>
                                            <option value="<?php echo html_escape($b['name']); ?>"><?php echo html_escape($b['name']); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: MEDIA & DESKRIPSI -->
                    <div class="wizard-step-content" id="edit-step-3">
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="info" style="width: 14px; height: 14px;"></i> Deskripsi Sapi *</label>
                                <textarea name="description" id="edit_description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Utama Baru (Kosongkan jika tidak ingin diubah)</label>
                                <input type="file" name="image_main" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Galeri 1 Baru (Kosongkan jika tetap)</label>
                                <input type="file" name="image_gallery1" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i data-lucide="image" style="width: 14px; height: 14px;"></i> Foto Galeri 2 Baru (Kosongkan jika tetap)</label>
                                <input type="file" name="image_gallery2" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation controls footer (Symmetric Alignment) -->
                <div class="wizard-footer-nav">
                    <div class="wizard-actions-left" style="display: flex; gap: 0.75rem;">
                        <button type="button" class="btn-secondary" id="edit-cancel-btn" onclick="closeEditWizard()">
                            <i data-lucide="x" style="width: 16px; height: 16px;"></i> <span>Batal</span>
                        </button>
                        <button type="button" class="btn-secondary" id="edit-prev-btn" onclick="prevEditStep()" style="display: none;">
                            <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i> <span>Kembali</span>
                        </button>
                    </div>
                    
                    <div class="wizard-actions-right" style="display: flex; gap: 0.75rem;">
                        <button type="button" class="btn-primary" id="edit-next-btn" onclick="nextEditStep()">
                            <span>Lanjut</span> <i data-lucide="arrow-right" style="width: 16px; height: 16px;"></i>
                        </button>
                        <button type="submit" class="btn-primary" id="edit-submit-btn" style="display: none;">
                            <i data-lucide="save" style="width: 16px; height: 16px;"></i> <span>Perbarui Sapi</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 3: TAMBAH FOTO GALERI ==================== -->
    <div class="modal-overlay" id="addGalleryModal">
        <div class="modal-window" style="max-width: 520px;">
            <div class="modal-header">
                <h3>Tambah Foto Galeri</h3>
                <button class="modal-close" onclick="closeAddGalleryModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/add_gallery'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Deskripsi / Label Foto *</label>
                            <input type="text" name="label" class="form-control" placeholder="Contoh: Pemberian Pakan Organik" required autocomplete="off" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">File Foto (Rekomendasi Landscape) *</label>
                            <input type="file" name="image_path" class="form-control" accept="image/*" required style="width: 100%; padding: 8px 12px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeAddGalleryModal()">Batal</button>
                    <button type="submit" class="btn-primary">Unggah Foto</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 4: UBAH FOTO GALERI ==================== -->
    <div class="modal-overlay" id="editGalleryModal">
        <div class="modal-window" style="max-width: 520px;">
            <div class="modal-header">
                <h3>Ubah Foto Galeri</h3>
                <button class="modal-close" onclick="closeEditGalleryModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/edit_gallery'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_gallery_id">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Deskripsi / Label Foto *</label>
                            <input type="text" name="label" id="edit_gallery_label" class="form-control" required autocomplete="off" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Ganti File Foto (Pilih Hanya Jika Ingin Mengganti)</label>
                            <input type="file" name="image_path" class="form-control" accept="image/*" style="width: 100%; padding: 8px 12px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeEditGalleryModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>    <!-- ==================== MODAL 5: TAMBAH PESANAN BARU ==================== -->
    <div class="modal-overlay" id="addOrderModal">
        <div class="modal-window" style="max-width: 620px;">
            <div class="modal-header">
                <h3>Tambah Pesanan Baru</h3>
                <button class="modal-close" onclick="closeAddOrderModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/add_order'); ?>" method="POST" style="display: flex; flex-direction: column; height: 100%; overflow: hidden;">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    
                    <!-- Unified Premium Layout with Visual Dividers -->
                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        
                        <!-- SECTION 1: PROFIL & KONTAK PEMBELI -->
                        <div>
                            <!-- Visual Section Header -->
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
                                <div style="background: rgba(27,67,50,0.08); color: var(--primary); padding: 0.5rem; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i data-lucide="user" style="width: 18px; height: 18px;"></i>
                                </div>
                                <div style="flex-grow: 1;">
                                    <h4 style="margin: 0; color: var(--primary-dark); font-size: 0.95rem; font-weight: 800; letter-spacing: 0.03em; text-transform: uppercase;">1. Profil & Kontak Pembeli</h4>
                                    <p style="margin: 0; font-size: 0.75rem; color: var(--text-muted);">Isi detail profil pembeli untuk pencatatan invoice & WhatsApp otomatis</p>
                                </div>
                            </div>

                            <!-- Input Grid -->
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; background: rgba(27,67,50,0.015); border: 1px solid var(--border-color); padding: 1.25rem; border-radius: 12px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Nama Lengkap Pembeli *</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="Contoh: Budi Santoso" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;" autocomplete="off">
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">No. WhatsApp Aktif *</label>
                                    <input type="text" name="user_phone" class="form-control" placeholder="Contoh: 081234567890" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;" autocomplete="off">
                                </div>
                                <div class="form-group" style="grid-column: span 2; margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Alamat Pengiriman / Domisili</label>
                                    <input type="text" name="user_address" class="form-control" placeholder="Contoh: Sukabumi, Jawa Barat (Bisa dikosongi jika ambil sendiri)" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: DETAIL TRANSAKSI & JADWAL -->
                        <div>
                            <!-- Visual Section Header -->
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
                                <div style="background: rgba(220,131,71,0.08); color: var(--accent); padding: 0.5rem; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i data-lucide="shopping-bag" style="width: 18px; height: 18px;"></i>
                                </div>
                                <div style="flex-grow: 1;">
                                    <h4 style="margin: 0; color: var(--primary-dark); font-size: 0.95rem; font-weight: 800; letter-spacing: 0.03em; text-transform: uppercase;">2. Detail Sapi & Rencana Penjemputan</h4>
                                    <p style="margin: 0; font-size: 0.75rem; color: var(--text-muted);">Pilih komoditas sapi potong dan tentukan status persetujuan kandang</p>
                                </div>
                            </div>

                            <!-- Input Grid -->
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; background: rgba(220,131,71,0.015); border: 1px solid var(--border-color); padding: 1.25rem; border-radius: 12px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Pilih Sapi Dari Katalog *</label>
                                    <select name="cattle_id" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                                        <option value="">-- Pilih Sapi --</option>
                                        <?php if (!empty($cattle)): ?>
                                            <?php foreach ($cattle as $cow): ?>
                                                <option value="<?php echo $cow['id']; ?>"><?php echo html_escape($cow['name']); ?> (<?php echo html_escape($cow['price']); ?>)</option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Rencana Ambil Sapi *</label>
                                    <input type="date" name="pickup_date" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                                </div>
                                <div class="form-group" style="grid-column: span 2; margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Catatan Tambahan & Keterangan</label>
                                    <textarea name="notes" rows="2" class="form-control" placeholder="Catatan opsional (Contoh: Titip pakan dulu 3 hari, atau DP 50% sudah diterima)" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem; font-family: inherit; resize: vertical;"></textarea>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Status Awal Pesanan *</label>
                                    <select name="status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                                        <option value="pending">Menunggu Konfirmasi (Pending)</option>
                                        <option value="dikonfirmasi">Disetujui Kandang (Confirmed)</option>
                                        <option value="selesai">Selesai Diambil (Completed)</option>
                                        <option value="dibatalkan">Batal (Cancelled)</option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" style="font-weight: 700; color: var(--primary); font-size: 0.8rem; margin-bottom: 0.4rem;">Opsi Pengiriman *</label>
                                    <select name="delivery_status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                                        <option value="ambil_sendiri">Ambil Sendiri (Self Pickup)</option>
                                        <option value="diantar">Diantar ke Alamat (Delivery)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeAddOrderModal()">Batal</button>
                    <button type="submit" class="btn-primary">Buat Pesanan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 5B: UBAH DETAIL PESANAN ==================== -->
    <div class="modal-overlay" id="editOrderModal">
        <div class="modal-window" style="max-width: 550px;">
            <div class="modal-header">
                <h3>Ubah Detail Pesanan</h3>
                <button class="modal-close" onclick="closeEditOrderModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/edit_order'); ?>" method="POST" style="display: flex; flex-direction: column; height: 100%; overflow: hidden;">
                <input type="hidden" name="id" id="edit_order_id">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                        
                        <!-- Buyer Select (Always existing for edits) -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Pilih Akun Pembeli *</label>
                            <select name="user_id" id="edit_order_user_id" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $usr): ?>
                                        <option value="<?php echo $usr['id']; ?>"><?php echo html_escape($usr['name']); ?> (<?php echo html_escape($usr['phone']); ?>)</option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Cattle Choice -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Pilih Sapi Dari Katalog *</label>
                            <select name="cattle_id" id="edit_order_cattle_id" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <?php if (!empty($cattle)): ?>
                                    <?php foreach ($cattle as $cow): ?>
                                        <option value="<?php echo $cow['id']; ?>"><?php echo html_escape($cow['name']); ?> (<?php echo html_escape($cow['price']); ?>)</option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Pickup Date -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Rencana Tanggal Pengambilan *</label>
                            <input type="date" name="pickup_date" id="edit_order_pickup_date" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>

                        <!-- Notes -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Catatan Khusus</label>
                            <textarea name="notes" id="edit_order_notes" rows="2" class="form-control" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-family: inherit; resize: vertical;"></textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Status Pesanan *</label>
                            <select name="status" id="edit_order_status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <option value="pending">Menunggu Konfirmasi</option>
                                <option value="dikonfirmasi">Disetujui</option>
                                <option value="selesai">Selesai</option>
                                <option value="dibatalkan">Batal</option>
                            </select>
                        </div>

                        <!-- Delivery Status -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Opsi Pengiriman *</label>
                            <select name="delivery_status" id="edit_order_delivery_status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <option value="ambil_sendiri">Ambil Sendiri</option>
                                <option value="diantar">Diantar</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeEditOrderModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 5C: UBAH STATUS PESANAN (QUICK UPDATE) ==================== -->
    <div class="modal-overlay" id="updateOrderStatusModal">
        <div class="modal-window" style="max-width: 480px;">
            <div class="modal-header">
                <h3>Ubah Status Pesanan</h3>
                <button class="modal-close" onclick="closeUpdateOrderStatusModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/update_order_status'); ?>" method="POST" style="display: flex; flex-direction: column; height: 100%; overflow: hidden;">
                <input type="hidden" name="id" id="update_order_id">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        
                        <!-- Order quick details summary -->
                        <div style="background: rgba(27,67,50,0.02); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-color); display: flex; flex-direction: column; gap: 0.6rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600;">No. Order:</span>
                                <span id="update_order_number" style="font-size: 0.85rem; font-weight: 800; color: var(--primary);"></span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600;">Nama Pembeli:</span>
                                <span id="update_order_user" style="font-size: 0.85rem; font-weight: 700; color: var(--primary-dark);"></span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600;">Sapi Dipesan:</span>
                                <span id="update_order_cattle" style="font-size: 0.85rem; font-weight: 700; color: var(--accent);"></span>
                            </div>
                        </div>

                        <!-- Status Selector -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Pilih Status Baru *</label>
                            <select name="status" id="update_order_status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.9rem;">
                                <option value="pending">Menunggu Konfirmasi (Pending)</option>
                                <option value="dikonfirmasi">Disetujui Kandang (Confirmed)</option>
                                <option value="selesai">Selesai Diambil (Completed)</option>
                                <option value="dibatalkan">Batal (Cancelled)</option>
                            </select>
                        </div>

                        <!-- Delivery Status Selector -->
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Opsi Pengiriman Baru *</label>
                            <select name="delivery_status" id="update_order_delivery_status" class="form-control" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.9rem;">
                                <option value="ambil_sendiri">Ambil Sendiri (Self Pickup)</option>
                                <option value="diantar">Diantar (Delivery)</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeUpdateOrderStatusModal()">Batal</button>
                    <button type="submit" class="btn-primary">Perbarui Status</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 6: TAMBAH KANDANG BARU ==================== -->
    <div class="modal-overlay" id="addBarnModal">
        <div class="modal-window" style="max-width: 520px;">
            <div class="modal-header">
                <h3>Tambah Kandang Baru</h3>
                <button class="modal-close" onclick="closeAddBarnModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/add_barn'); ?>" method="POST">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Nama Lokasi Kandang *</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Kandang D - Sukabumi" required autocomplete="off" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeAddBarnModal()">Batal</button>
                    <button type="submit" class="btn-primary">Tambah Kandang</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 7: UBAH DATA KANDANG ==================== -->
    <div class="modal-overlay" id="editBarnModal">
        <div class="modal-window" style="max-width: 520px;">
            <div class="modal-header">
                <h3>Ubah Data Kandang</h3>
                <button class="modal-close" onclick="closeEditBarnModal()"><i data-lucide="x"></i></button>
            </div>
            <form action="<?php echo site_url('admin/edit_barn'); ?>" method="POST">
                <input type="hidden" name="id" id="edit_barn_id">
                <div class="modal-scrollable-body" style="padding: 2rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 700; color: var(--primary);">Nama Lokasi Kandang *</label>
                            <input type="text" name="name" id="edit_barn_name" class="form-control" required autocomplete="off" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 1.5rem 2rem; background: var(--bg-cream-light); border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 1rem;">
                    <button type="button" class="btn-primary" style="background: #e0e0e0; color: #333;" onclick="closeEditBarnModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script controllers for Sidebar Tab and Dynamic Form Wizard -->
    <script>
        // Init Lucide Icons globally
        lucide.createIcons();

        // Switch Sidebar Panels
        function switchNav(panelId, btnId) {
            // Remove active classes
            document.querySelectorAll('.nav-item').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.section-panel').forEach(panel => panel.classList.remove('active'));
            
            // Set active
            const activeBtn = document.getElementById(btnId);
            activeBtn.classList.add('active');
            document.getElementById(panelId).classList.add('active');
            
            // Update Header Title
            const headerTitle = document.getElementById('dynamic-header-title');
            if (headerTitle) {
                const btnText = activeBtn.querySelector('span').innerText;
                headerTitle.innerText = btnText;
            }
            
            // Re-render Lucide icons just in case to guarantee 100% displays
            lucide.createIcons();
        }

        // Switch Config Sub-panels
        function switchConfigTab(tabId, btnId) {
            // Hide all subcontent panels
            document.querySelectorAll('.config-tab-content').forEach(panel => panel.classList.remove('active'));
            // Remove active classes from buttons
            document.querySelectorAll('.config-tab-btn').forEach(btn => btn.classList.remove('active'));
            
            // Set active
            document.getElementById(tabId).classList.add('active');
            document.getElementById(btnId).classList.add('active');
            
            lucide.createIcons();
        }

        // ==================== WIZARD 1: TAMBAH SAPI BARU ====================
        let currentAddStep = 1;
        
        function openAddWizard() {
            currentAddStep = 1;
            document.getElementById('addWizardForm').reset();
            showAddStep(1);
            document.getElementById('addModal').classList.add('open');
            lucide.createIcons();
        }

        function closeAddWizard() {
            document.getElementById('addModal').classList.remove('open');
        }

        function showAddStep(stepNum) {
            currentAddStep = stepNum;
            // Hide all step contents
            document.querySelectorAll('#addModal .wizard-step-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('#addModal .wizard-step-indicator').forEach(el => el.classList.remove('active', 'completed'));
            
            // Show active step content
            document.getElementById(`add-step-${stepNum}`).classList.add('active');
            
            // Handle stepper styles
            for (let i = 1; i <= 3; i++) {
                let ind = document.getElementById(`add-indicator-${i}`);
                if (i < stepNum) ind.classList.add('completed');
                if (i === stepNum) ind.classList.add('active');
            }

            // Button controls
            document.getElementById('add-prev-btn').style.display = stepNum === 1 ? 'none' : 'inline-flex';
            document.getElementById('add-next-btn').style.display = stepNum === 3 ? 'none' : 'inline-flex';
            document.getElementById('add-submit-btn').style.display = stepNum === 3 ? 'inline-flex' : 'none';
            
            lucide.createIcons();
        }

        function nextAddStep() {
            // Basic required check for Step 1
            if (currentAddStep === 1) {
                const name = document.querySelector('#addWizardForm [name="name"]').value;
                const breed = document.querySelector('#addWizardForm [name="breed"]').value;
                const age = document.querySelector('#addWizardForm [name="age"]').value;
                if (!name || !breed || !age) {
                    alert('Harap isi semua kolom bertanda bintang (*) sebelum melanjutkan!');
                    return;
                }
            }
            // Basic required check for Step 2
            if (currentAddStep === 2) {
                const weight = document.querySelector('#addWizardForm [name="weight"]').value;
                const price = document.querySelector('#addWizardForm [name="price"]').value;
                const location = document.querySelector('#addWizardForm [name="location"]').value;
                if (!weight || !price || !location) {
                    alert('Harap isi semua spesifikasi bertanda bintang (*) sebelum melanjutkan!');
                    return;
                }
            }

            if (currentAddStep < 3) {
                showAddStep(currentAddStep + 1);
            }
        }

        function prevAddStep() {
            if (currentAddStep > 1) {
                showAddStep(currentAddStep - 1);
            }
        }


        // ==================== WIZARD 2: UBAH DATA SAPI ====================
        let currentEditStep = 1;
        const editModal = document.getElementById('editModal');
        const editForm = document.getElementById('editWizardForm');
        
        // Form items reference for edit
        const edit_name = document.getElementById('edit_name');
        const edit_breed = document.getElementById('edit_breed');
        const edit_weight = document.getElementById('edit_weight');
        const edit_age = document.getElementById('edit_age');
        const edit_price = document.getElementById('edit_price');
        const edit_status = document.getElementById('edit_status');
        const edit_health = document.getElementById('edit_health');
        const edit_location = document.getElementById('edit_location');
        const edit_description = document.getElementById('edit_description');
        const edit_stock = document.getElementById('edit_stock');

        function openEditWizard(cow) {
            currentEditStep = 1;
            
            // Populate values
            edit_name.value = cow.name;
            edit_breed.value = cow.breed;
            edit_weight.value = cow.weight;
            edit_age.value = cow.age;
            edit_price.value = cow.price;
            edit_status.value = cow.status;
            edit_health.value = cow.health;
            edit_location.value = cow.location;
            edit_description.value = cow.description;
            edit_stock.value = cow.stock !== undefined && cow.stock !== null ? cow.stock : '1';

            // New trust columns
            document.getElementById('edit_weight_initial').value = cow.weight_initial || '';
            document.getElementById('edit_daily_weight_gain').value = cow.daily_weight_gain || '';
            document.getElementById('edit_feed_type').value = cow.feed_type || '';
            document.getElementById('edit_vaccination_status').value = cow.vaccination_status || '';
            document.getElementById('edit_quarantine_status').value = cow.quarantine_status || '';
            document.getElementById('edit_vet_check_date').value = cow.vet_check_date || '';
            
            // Dynamic form action destination
            editForm.action = "<?php echo site_url('admin/edit/'); ?>" + cow.id;
            
            showEditStep(1);
            editModal.classList.add('open');
            lucide.createIcons();
        }

        function closeEditWizard() {
            editModal.classList.remove('open');
            editForm.action = "";
        }

        function showEditStep(stepNum) {
            currentEditStep = stepNum;
            // Hide all step contents
            document.querySelectorAll('#editModal .wizard-step-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('#editModal .wizard-step-indicator').forEach(el => el.classList.remove('active', 'completed'));
            
            // Show active step content
            document.getElementById(`edit-step-${stepNum}`).classList.add('active');
            
            // Handle stepper indicators
            for (let i = 1; i <= 3; i++) {
                let ind = document.getElementById(`edit-indicator-${i}`);
                if (i < stepNum) ind.classList.add('completed');
                if (i === stepNum) ind.classList.add('active');
            }

            // Button controls
            document.getElementById('edit-prev-btn').style.display = stepNum === 1 ? 'none' : 'inline-flex';
            document.getElementById('edit-next-btn').style.display = stepNum === 3 ? 'none' : 'inline-flex';
            document.getElementById('edit-submit-btn').style.display = stepNum === 3 ? 'inline-flex' : 'none';
            
            lucide.createIcons();
        }

        function nextEditStep() {
            // Step validation
            if (currentEditStep === 1) {
                if (!edit_name.value || !edit_breed.value || !edit_age.value) {
                    alert('Harap isi semua kolom bertanda bintang (*) sebelum melanjutkan!');
                    return;
                }
            }
            if (currentEditStep === 2) {
                if (!edit_weight.value || !edit_price.value || !edit_location.value) {
                    alert('Harap isi semua spesifikasi bertanda bintang (*) sebelum melanjutkan!');
                    return;
                }
            }

            if (currentEditStep < 3) {
                showEditStep(currentEditStep + 1);
            }
        }

        function prevEditStep() {
            if (currentEditStep > 1) {
                showEditStep(currentEditStep - 1);
            }
        }

        // CATTLE TABLE FILTER & PAGINATION SYSTEM
        const ITEMS_PER_PAGE = 5;
        let currentCattlePage = 1;
        let filteredRows = [];

        function filterAndPaginateCattle() {
            const searchInput = document.getElementById('cattle-search');
            const breedFilter = document.getElementById('cattle-filter-breed');
            const statusFilter = document.getElementById('cattle-filter-status');
            
            if (!searchInput || !breedFilter || !statusFilter) return;

            const searchVal = searchInput.value.toLowerCase().trim();
            const breedVal = breedFilter.value.toLowerCase();
            const statusVal = statusFilter.value.toLowerCase();
            
            const rows = document.querySelectorAll('.cattle-row');
            const emptyRow = document.getElementById('cattle-empty-row');
            filteredRows = [];
            
            rows.forEach(row => {
                const name = row.dataset.name || '';
                const breed = row.dataset.breed || '';
                const price = row.dataset.price || '';
                const status = row.dataset.status || '';
                
                const matchesSearch = name.includes(searchVal) || breed.includes(searchVal) || price.includes(searchVal);
                const matchesBreed = !breedVal || breed.includes(breedVal);
                const matchesStatus = !statusVal || status === statusVal;
                
                if (matchesSearch && matchesBreed && matchesStatus) {
                    filteredRows.push(row);
                    row.style.display = ''; // temporary display
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show/Hide Empty Row State
            if (emptyRow) {
                emptyRow.style.display = filteredRows.length === 0 ? '' : 'none';
            }
            
            // Paginate
            const totalItems = filteredRows.length;
            const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE) || 1;
            
            if (currentCattlePage > totalPages) {
                currentCattlePage = totalPages;
            }
            
            const startIndex = (currentCattlePage - 1) * ITEMS_PER_PAGE;
            const endIndex = startIndex + ITEMS_PER_PAGE;
            
            // Hide all filtered rows that are not in the current page range
            filteredRows.forEach((row, idx) => {
                if (idx >= startIndex && idx < endIndex) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update pagination info
            document.getElementById('pagination-count-total').textContent = rows.length;
            const showingText = totalItems === 0 
                ? '0' 
                : `${startIndex + 1}-${Math.min(endIndex, totalItems)} dari ${totalItems}`;
            document.getElementById('pagination-count-showing').textContent = showingText;
            
            // Render pagination buttons
            const controls = document.getElementById('pagination-controls');
            controls.innerHTML = '';
            
            if (totalPages > 1) {
                // Prev Button
                const prevBtn = document.createElement('button');
                prevBtn.style.width = '34px';
                prevBtn.style.height = '34px';
                prevBtn.style.borderRadius = '8px';
                prevBtn.style.display = 'inline-flex';
                prevBtn.style.alignItems = 'center';
                prevBtn.style.justifyContent = 'center';
                prevBtn.style.background = 'var(--bg-natural)';
                prevBtn.style.border = '1px solid var(--border-color)';
                prevBtn.disabled = currentCattlePage === 1;
                prevBtn.style.opacity = currentCattlePage === 1 ? '0.5' : '1';
                prevBtn.style.cursor = currentCattlePage === 1 ? 'not-allowed' : 'pointer';
                prevBtn.innerHTML = '<i data-lucide="chevron-left" style="width: 16px; height: 16px; color: var(--primary);"></i>';
                prevBtn.onclick = (e) => {
                    e.preventDefault();
                    if (currentCattlePage > 1) {
                        currentCattlePage--;
                        filterAndPaginateCattle();
                    }
                };
                controls.appendChild(prevBtn);
                
                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.style.width = '34px';
                    pageBtn.style.height = '34px';
                    pageBtn.style.borderRadius = '8px';
                    pageBtn.style.display = 'inline-flex';
                    pageBtn.style.alignItems = 'center';
                    pageBtn.style.justifyContent = 'center';
                    pageBtn.style.fontSize = '0.85rem';
                    pageBtn.style.fontWeight = '700';
                    pageBtn.style.cursor = 'pointer';
                    
                    if (i === currentCattlePage) {
                        pageBtn.style.background = 'var(--primary)';
                        pageBtn.style.color = '#ffffff';
                        pageBtn.style.border = 'none';
                    } else {
                        pageBtn.style.background = 'var(--bg-natural)';
                        pageBtn.style.color = 'var(--text-main)';
                        pageBtn.style.border = '1px solid var(--border-color)';
                    }
                    
                    pageBtn.textContent = i;
                    pageBtn.onclick = (e) => {
                        e.preventDefault();
                        currentCattlePage = i;
                        filterAndPaginateCattle();
                    };
                    controls.appendChild(pageBtn);
                }
                
                // Next Button
                const nextBtn = document.createElement('button');
                nextBtn.style.width = '34px';
                nextBtn.style.height = '34px';
                nextBtn.style.borderRadius = '8px';
                nextBtn.style.display = 'inline-flex';
                nextBtn.style.alignItems = 'center';
                nextBtn.style.justifyContent = 'center';
                nextBtn.style.background = 'var(--bg-natural)';
                nextBtn.style.border = '1px solid var(--border-color)';
                nextBtn.disabled = currentCattlePage === totalPages;
                nextBtn.style.opacity = currentCattlePage === totalPages ? '0.5' : '1';
                nextBtn.style.cursor = currentCattlePage === totalPages ? 'not-allowed' : 'pointer';
                nextBtn.innerHTML = '<i data-lucide="chevron-right" style="width: 16px; height: 16px; color: var(--primary);"></i>';
                nextBtn.onclick = (e) => {
                    e.preventDefault();
                    if (currentCattlePage < totalPages) {
                        currentCattlePage++;
                        filterAndPaginateCattle();
                    }
                };
                controls.appendChild(nextBtn);
            }
            
            lucide.createIcons();
        }

        // ==================== NEW DYNAMIC MODAL CONTROLLERS ====================
        // Gallery Modals
        function openAddGalleryModal() {
            document.getElementById('addGalleryModal').classList.add('open');
            lucide.createIcons();
        }
        function closeAddGalleryModal() {
            document.getElementById('addGalleryModal').classList.remove('open');
        }
        function openEditGalleryModal(item) {
            document.getElementById('edit_gallery_id').value = item.id;
            document.getElementById('edit_gallery_label').value = item.label;
            document.getElementById('editGalleryModal').classList.add('open');
            lucide.createIcons();
        }
        function closeEditGalleryModal() {
            document.getElementById('editGalleryModal').classList.remove('open');
        }

        // Order Modals
        function toggleOrderUserMode() {
            const mode = document.getElementById('add_order_user_mode').value;
            const existingGroup = document.getElementById('add_order_existing_user_group');
            const newGroup = document.getElementById('add_order_new_user_group');
            
            if (mode === 'existing') {
                if (existingGroup) existingGroup.style.display = 'block';
                if (newGroup) newGroup.style.display = 'none';
            } else {
                if (existingGroup) existingGroup.style.display = 'none';
                if (newGroup) newGroup.style.display = 'flex';
            }
        }
        function openAddOrderModal() {
            document.getElementById('addOrderModal').classList.add('open');
            lucide.createIcons();
        }
        function closeAddOrderModal() {
            document.getElementById('addOrderModal').classList.remove('open');
        }
        function openEditOrderModal(order) {
            document.getElementById('edit_order_id').value = order.id;
            document.getElementById('edit_order_user_id').value = order.user_id;
            document.getElementById('edit_order_cattle_id').value = order.cattle_id;
            document.getElementById('edit_order_pickup_date').value = order.pickup_date;
            document.getElementById('edit_order_notes').value = order.notes;
            document.getElementById('edit_order_status').value = order.status;
            document.getElementById('edit_order_delivery_status').value = order.delivery_status;
            document.getElementById('editOrderModal').classList.add('open');
            lucide.createIcons();
        }
        function closeEditOrderModal() {
            document.getElementById('editOrderModal').classList.remove('open');
        }
        function openUpdateOrderStatusModal(order) {
            document.getElementById('update_order_id').value = order.id;
            document.getElementById('update_order_number').textContent = '#ORD-' + order.id;
            document.getElementById('update_order_user').textContent = order.user_name;
            document.getElementById('update_order_cattle').textContent = order.cattle_name;
            document.getElementById('update_order_status').value = order.status;
            document.getElementById('update_order_delivery_status').value = order.delivery_status;
            document.getElementById('updateOrderStatusModal').classList.add('open');
            lucide.createIcons();
        }
        function closeUpdateOrderStatusModal() {
            document.getElementById('updateOrderStatusModal').classList.remove('open');
        }

        // Barn Modals
        function openAddBarnModal() {
            document.getElementById('addBarnModal').classList.add('open');
            lucide.createIcons();
        }
        function closeAddBarnModal() {
            document.getElementById('addBarnModal').classList.remove('open');
        }
        function openEditBarnModal(barn) {
            document.getElementById('edit_barn_id').value = barn.id;
            document.getElementById('edit_barn_name').value = barn.name;
            document.getElementById('editBarnModal').classList.add('open');
            lucide.createIcons();
        }
        function closeEditBarnModal() {
            document.getElementById('editBarnModal').classList.remove('open');
        }

        // ORDERS TABLE FILTER & PAGINATION SYSTEM
        const ORDERS_PER_PAGE = 5;
        let currentOrderPage = 1;
        let filteredOrderRows = [];

        function filterAndPaginateOrders() {
            const searchInput = document.getElementById('order-search');
            const statusFilter = document.getElementById('order-filter-status');
            const cattleFilter = document.getElementById('order-filter-cattle');
            
            if (!searchInput || !statusFilter || !cattleFilter) return;

            const searchVal = searchInput.value.toLowerCase().trim();
            const statusVal = statusFilter.value.toLowerCase();
            const cattleVal = cattleFilter.value.toLowerCase();
            
            const rows = document.querySelectorAll('.order-row');
            const emptyRow = document.getElementById('order-empty-row');
            filteredOrderRows = [];
            
            rows.forEach(row => {
                const id = row.dataset.id || '';
                const uName = row.dataset.userName || '';
                const uPhone = row.dataset.userPhone || '';
                const uAddress = row.dataset.userAddress || '';
                const cName = row.dataset.cattleName || '';
                const cPrice = row.dataset.cattlePrice || '';
                const status = row.dataset.status || '';
                const notes = row.dataset.notes || '';
                
                const matchesSearch = id.includes(searchVal) || uName.includes(searchVal) || uPhone.includes(searchVal) || uAddress.includes(searchVal) || cName.includes(searchVal) || cPrice.includes(searchVal) || notes.includes(searchVal);
                const matchesStatus = !statusVal || status === statusVal;
                const matchesCattle = !cattleVal || cName.includes(cattleVal);
                
                if (matchesSearch && matchesStatus && matchesCattle) {
                    filteredOrderRows.push(row);
                    row.style.display = ''; // temporary display
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show/Hide Empty Row State
            if (emptyRow) {
                emptyRow.style.display = filteredOrderRows.length === 0 ? '' : 'none';
            }
            
            // Paginate
            const totalItems = filteredOrderRows.length;
            const totalPages = Math.ceil(totalItems / ORDERS_PER_PAGE) || 1;
            
            if (currentOrderPage > totalPages) {
                currentOrderPage = totalPages;
            }
            
            const startIndex = (currentOrderPage - 1) * ORDERS_PER_PAGE;
            const endIndex = startIndex + ORDERS_PER_PAGE;
            
            // Hide all filtered rows that are not in the current page range
            filteredOrderRows.forEach((row, idx) => {
                if (idx >= startIndex && idx < endIndex) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update pagination info
            const countTotal = document.getElementById('order-pagination-count-total');
            if (countTotal) countTotal.textContent = rows.length;
            
            const countShowing = document.getElementById('order-pagination-count-showing');
            if (countShowing) {
                const showingText = totalItems === 0 
                    ? '0' 
                    : `${startIndex + 1}-${Math.min(endIndex, totalItems)} dari ${totalItems}`;
                countShowing.textContent = showingText;
            }
            
            // Render pagination buttons
            const controls = document.getElementById('order-pagination-controls');
            if (controls) {
                controls.innerHTML = '';
                
                if (totalPages > 1) {
                    // Prev Button
                    const prevBtn = document.createElement('button');
                    prevBtn.style.width = '34px';
                    prevBtn.style.height = '34px';
                    prevBtn.style.borderRadius = '8px';
                    prevBtn.style.display = 'inline-flex';
                    prevBtn.style.alignItems = 'center';
                    prevBtn.style.justifyContent = 'center';
                    prevBtn.style.background = 'var(--bg-natural)';
                    prevBtn.style.border = '1px solid var(--border-color)';
                    prevBtn.disabled = currentOrderPage === 1;
                    prevBtn.style.opacity = currentOrderPage === 1 ? '0.5' : '1';
                    prevBtn.style.cursor = currentOrderPage === 1 ? 'not-allowed' : 'pointer';
                    prevBtn.innerHTML = '<i data-lucide="chevron-left" style="width: 16px; height: 16px; color: var(--primary);"></i>';
                    prevBtn.onclick = (e) => {
                        e.preventDefault();
                        if (currentOrderPage > 1) {
                            currentOrderPage--;
                            filterAndPaginateOrders();
                        }
                    };
                    controls.appendChild(prevBtn);
                    
                    // Page numbers
                    for (let i = 1; i <= totalPages; i++) {
                        const pageBtn = document.createElement('button');
                        pageBtn.style.width = '34px';
                        pageBtn.style.height = '34px';
                        pageBtn.style.borderRadius = '8px';
                        pageBtn.style.display = 'inline-flex';
                        pageBtn.style.alignItems = 'center';
                        pageBtn.style.justifyContent = 'center';
                        pageBtn.style.fontSize = '0.85rem';
                        pageBtn.style.fontWeight = '700';
                        pageBtn.style.cursor = 'pointer';
                        
                        if (i === currentOrderPage) {
                            pageBtn.style.background = 'var(--primary)';
                            pageBtn.style.color = '#ffffff';
                            pageBtn.style.border = 'none';
                        } else {
                            pageBtn.style.background = 'var(--bg-natural)';
                            pageBtn.style.color = 'var(--text-main)';
                            pageBtn.style.border = '1px solid var(--border-color)';
                        }
                        
                        pageBtn.textContent = i;
                        pageBtn.onclick = (e) => {
                            e.preventDefault();
                            currentOrderPage = i;
                            filterAndPaginateOrders();
                        };
                        controls.appendChild(pageBtn);
                    }
                    
                    // Next Button
                    const nextBtn = document.createElement('button');
                    nextBtn.style.width = '34px';
                    nextBtn.style.height = '34px';
                    nextBtn.style.borderRadius = '8px';
                    nextBtn.style.display = 'inline-flex';
                    nextBtn.style.alignItems = 'center';
                    nextBtn.style.justifyContent = 'center';
                    nextBtn.style.background = 'var(--bg-natural)';
                    nextBtn.style.border = '1px solid var(--border-color)';
                    nextBtn.disabled = currentOrderPage === totalPages;
                    nextBtn.style.opacity = currentOrderPage === totalPages ? '0.5' : '1';
                    nextBtn.style.cursor = currentOrderPage === totalPages ? 'not-allowed' : 'pointer';
                    nextBtn.innerHTML = '<i data-lucide="chevron-right" style="width: 16px; height: 16px; color: var(--primary);"></i>';
                    nextBtn.onclick = (e) => {
                        e.preventDefault();
                        if (currentOrderPage < totalPages) {
                            currentOrderPage++;
                            filterAndPaginateOrders();
                        }
                    };
                    controls.appendChild(nextBtn);
                }
            }
            
            lucide.createIcons();
        }

        // Initialize listeners
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('cattle-search');
            const breedFilter = document.getElementById('cattle-filter-breed');
            const statusFilter = document.getElementById('cattle-filter-status');

            if (searchInput) searchInput.addEventListener('input', () => { currentCattlePage = 1; filterAndPaginateCattle(); });
            if (breedFilter) breedFilter.addEventListener('change', () => { currentCattlePage = 1; filterAndPaginateCattle(); });
            if (statusFilter) statusFilter.addEventListener('change', () => { currentCattlePage = 1; filterAndPaginateCattle(); });

            filterAndPaginateCattle();

            // Order listeners
            const orderSearch = document.getElementById('order-search');
            const orderStatus = document.getElementById('order-filter-status');
            const orderCattle = document.getElementById('order-filter-cattle');

            if (orderSearch) orderSearch.addEventListener('input', () => { currentOrderPage = 1; filterAndPaginateOrders(); });
            if (orderStatus) orderStatus.addEventListener('change', () => { currentOrderPage = 1; filterAndPaginateOrders(); });
            if (orderCattle) orderCattle.addEventListener('change', () => { currentOrderPage = 1; filterAndPaginateOrders(); });

            filterAndPaginateOrders();
        });
    </script>
</body>

</html>
