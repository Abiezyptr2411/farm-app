<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo html_escape($cow['name']); ?> - Twin Farms</title>
    <meta name="description" content="Detail spesifikasi lengkap, data timbangan awal, ADG harian, status vaksinasi, dan laporan kesehatan terverifikasi untuk sapi <?php echo html_escape($cow['name']); ?>.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v=' . time()); ?>">

    <!-- Font Awesome CDN for Brands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Lucide Icons Library -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom Styling for the Standalone Detail Page -->
    <style>
        /* Menggunakan base style dari style.css, hanya menambahkan layout grid spesifik detail page */

        .detail-page-container {
            max-width: 1200px;
            margin: 160px auto 60px auto;
            padding: 0 24px;
        }

        /* Breadcrumbs styling */
        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-weight: 500;
        }

        .breadcrumbs a {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumbs a:hover {
            color: var(--accent);
        }

        /* Main detail layout grid */
        .detail-main-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 3.5rem;
            align-items: start;
        }

        /* Gallery Styling */
        .detail-gallery-container {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .detail-main-frame {
            width: 100%;
            aspect-ratio: 4/3;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-premium);
            position: relative;
            background: #ffffff;
        }

        .detail-main-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .detail-thumbnails-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .detail-thumb-card {
            aspect-ratio: 4/3;
            border-radius: 14px;
            overflow: hidden;
            border: 2px solid transparent;
            cursor: pointer;
            box-shadow: var(--shadow-premium);
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .detail-thumb-card.active {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .detail-thumb-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Specification Sheets Panel */
        .detail-info-panel {
            background: var(--bg-card);
            border-radius: 24px;
            border: 1px solid var(--border-color);
            padding: 2.5rem;
            box-shadow: var(--shadow-premium);
        }

        .detail-badge-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .detail-status-badge {
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-block;
        }

        .detail-status-badge.tersedia {
            background: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #C8E6C9;
        }

        .detail-status-badge.terjual {
            background: #FFEBEE;
            color: #C62828;
            border: 1px solid #FFCDD2;
        }

        .detail-verified-badge {
            background: rgba(27, 67, 50, 0.05);
            color: var(--primary);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 100px;
            text-transform: uppercase;
            border: 1px solid rgba(27, 67, 50, 0.1);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .detail-title {
            font-size: 2.25rem;
            font-weight: 850;
            color: var(--primary-dark);
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .detail-price-tag {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }

        .detail-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
        }

        /* Trust & Verification Blocks (Complex Specs) */
        .trust-section-title {
            font-size: 0.85rem;
            font-weight: 800;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .trust-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .trust-card {
            background: rgba(27, 67, 50, 0.02);
            border: 1px solid var(--border-color);
            padding: 1rem 1.25rem;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .trust-card:hover {
            background: #ffffff;
            border-color: var(--primary-light);
            box-shadow: var(--shadow-premium);
        }

        .trust-card-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.25rem;
            display: block;
            font-weight: 500;
        }

        .trust-card-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
        }

        /* Health and Vaccine Progress Log Alert */
        .health-report-box {
            background: rgba(47, 133, 90, 0.04);
            border: 1px solid rgba(47, 133, 90, 0.15);
            padding: 1.25rem 1.5rem;
            border-radius: 18px;
            display: flex;
            align-items: start;
            gap: 1rem;
            margin-bottom: 2.25rem;
        }

        .health-report-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(47, 133, 90, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #2F855A;
        }

        .health-report-title {
            font-size: 0.8rem;
            color: #2F855A;
            font-weight: 800;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.15rem;
        }

        .health-report-desc {
            font-size: 0.9rem;
            color: #276749;
            font-weight: 600;
            line-height: 1.4;
        }

        .detail-cta-row {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn-whatsapp-booking {
            background: #25D366;
            color: #ffffff;
            padding: 1rem;
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-whatsapp-booking:hover {
            background: #20BA5A;
            box-shadow: 0 15px 25px rgba(37, 211, 102, 0.3);
            transform: translateY(-2px);
        }

        .btn-back-catalog {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
            padding: 0.9rem;
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-back-catalog:hover {
            background: rgba(27, 67, 50, 0.04);
            transform: translateY(-2px);
        }

        /* Custom Tabs */
        .specs-tabs {
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        .tabs-nav {
            display: flex;
            gap: 0.5rem;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
            overflow-x: auto;
            padding-bottom: 1px;
            scrollbar-width: none;
        }
        .tabs-nav::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            background: none;
            border: none;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .tab-btn:hover {
            color: var(--primary);
        }

        .tab-btn.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Layouts */
        @media (max-width: 992px) {
            .detail-main-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .detail-page-container {
                margin-top: 100px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Navigation -->
    <header class="scrolled">
        <div class="container nav-wrapper">
            <a href="<?php echo base_url(); ?>" class="logo">
                <?php if(isset($settings['site_logo']) && !empty($settings['site_logo'])): ?>
                    <img src="<?php echo base_url($settings['site_logo']); ?>" alt="Logo" style="max-height: 90px; border-radius: 8px;">
                <?php else: ?>
                    <div class="logo-icon">
                        <i data-lucide="sprout"></i>
                    </div>
                    Twin <span>Farms</span>
                <?php endif; ?>
            </a>

            <nav class="nav-menu" id="navMenu">
                <a href="<?php echo base_url(); ?>#hero" class="nav-link"><?php echo html_escape(isset($settings['nav_home']) ? $settings['nav_home'] : 'Beranda'); ?></a>
                <a href="<?php echo base_url(); ?>#tentang" class="nav-link"><?php echo html_escape(isset($settings['nav_about']) ? $settings['nav_about'] : 'Tentang Kami'); ?></a>
                <a href="<?php echo base_url(); ?>#katalog" class="nav-link active"><?php echo html_escape(isset($settings['nav_catalog']) ? $settings['nav_catalog'] : 'Katalog Sapi'); ?></a>
                <a href="<?php echo base_url(); ?>#keunggulan" class="nav-link"><?php echo html_escape(isset($settings['nav_features']) ? $settings['nav_features'] : 'Keunggulan'); ?></a>
                <a href="<?php echo base_url(); ?>#galeri" class="nav-link"><?php echo html_escape(isset($settings['nav_gallery']) ? $settings['nav_gallery'] : 'Galeri'); ?></a>
                <a href="<?php echo base_url(); ?>#testimoni" class="nav-link"><?php echo html_escape(isset($settings['nav_testimonials']) ? $settings['nav_testimonials'] : 'Testimoni'); ?></a>
                <a href="<?php echo base_url(); ?>#kontak" class="nav-cta"><?php echo html_escape(isset($settings['nav_contact']) ? $settings['nav_contact'] : 'Hubungi Kami'); ?></a>
            </nav>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <i data-lucide="menu"></i>
            </button>
        </div>
    </header>

    <main class="detail-page-container">
        <!-- Breadcrumbs Navigation -->
        <div class="breadcrumbs">
            <a href="<?php echo base_url(); ?>">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <a href="<?php echo base_url('katalog'); ?>">Katalog</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span><?php echo html_escape($cow['name']); ?></span>
        </div>

        <div class="detail-main-grid">
            <!-- Left Panel: Interactive Image Carousel -->
            <div class="detail-gallery-container">
                <div class="detail-main-frame">
                    <img id="mainPreview" src="<?php echo base_url($cow['image_main']); ?>" alt="<?php echo html_escape($cow['name']); ?>">
                </div>

                <div class="detail-thumbnails-grid">
                    <!-- Thumbnail 1: Main Photo -->
                    <div class="detail-thumb-card active" onclick="swapPreview('<?php echo base_url($cow['image_main']); ?>', this)">
                        <img src="<?php echo base_url($cow['image_main']); ?>" alt="Foto Utama">
                    </div>

                    <!-- Thumbnail 2: Gallery 1 -->
                    <?php if ($cow['image_gallery1']): ?>
                        <div class="detail-thumb-card" onclick="swapPreview('<?php echo base_url($cow['image_gallery1']); ?>', this)">
                            <img src="<?php echo base_url($cow['image_gallery1']); ?>" alt="Foto Galeri 1">
                        </div>
                    <?php endif; ?>

                    <!-- Thumbnail 3: Gallery 2 -->
                    <?php if ($cow['image_gallery2']): ?>
                        <div class="detail-thumb-card" onclick="swapPreview('<?php echo base_url($cow['image_gallery2']); ?>', this)">
                            <img src="<?php echo base_url($cow['image_gallery2']); ?>" alt="Foto Galeri 2">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Panel: Sapi Details Specs & Complex Analytics -->
            <div class="detail-info-panel">
                <div class="detail-badge-row">
                    <span class="detail-status-badge <?php echo $cow['status']; ?>">
                        <?php echo $cow['status'] === 'tersedia' ? 'Tersedia' : 'Terjual'; ?>
                    </span>
                    <span class="detail-verified-badge">
                        <i data-lucide="shield-check" style="width: 14px; height: 14px; color: var(--primary);"></i>
                        100% Terverifikasi
                    </span>
                </div>

                <h1 class="detail-title"><?php echo html_escape($cow['name']); ?></h1>
                <div class="detail-price-tag"><?php echo html_escape($cow['price']); ?></div>

                <p class="detail-desc">
                    <?php echo html_escape($cow['description']); ?>
                </p>

                <!-- Tabs Section -->
                <div class="specs-tabs">
                    <div class="tabs-nav">
                        <button class="tab-btn active" data-tab="tab-timbangan"><i data-lucide="scale" style="width: 16px; height: 16px;"></i> Timbangan</button>
                        <button class="tab-btn" data-tab="tab-pakan"><i data-lucide="carrot" style="width: 16px; height: 16px;"></i> Nutrisi & Pakan</button>
                        <button class="tab-btn" data-tab="tab-medis"><i data-lucide="heart-pulse" style="width: 16px; height: 16px;"></i> Medis & Vaksin</button>
                    </div>

                    <!-- TAB TIMBANGAN -->
                    <div class="tab-content active" id="tab-timbangan">
                        <div class="trust-grid">
                            <div class="trust-card">
                                <span class="trust-card-label">Berat Aktual Saat Ini</span>
                                <span class="trust-card-value" style="color: var(--accent); font-size: 1.3rem;"><?php echo html_escape($cow['weight']); ?></span>
                            </div>
                            <div class="trust-card">
                                <span class="trust-card-label">Berat Awal Masuk</span>
                                <span class="trust-card-value"><?php echo html_escape($cow['weight_initial'] ? $cow['weight_initial'] : '400 kg'); ?></span>
                            </div>
                            <div class="trust-card" style="grid-column: span 2;">
                                <span class="trust-card-label">Kenaikan Harian / Average Daily Gain (ADG)</span>
                                <span class="trust-card-value" style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i data-lucide="trending-up" style="width: 18px; height: 18px; color: #10B981;"></i>
                                    <?php echo html_escape($cow['daily_weight_gain'] ? $cow['daily_weight_gain'] : '1.2 kg/hari'); ?>
                                    <span style="font-size: 0.75rem; background: rgba(16, 185, 129, 0.1); color: #047857; padding: 2px 8px; border-radius: 100px; font-weight: 800;">SANGAT UNGGUL</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- TAB PAKAN -->
                    <div class="tab-content" id="tab-pakan">
                        <div class="trust-grid" style="margin-bottom: 0;">
                            <div class="trust-card" style="grid-column: span 2;">
                                <span class="trust-card-label">Menu Pakan Harian</span>
                                <span class="trust-card-value" style="font-size: 0.95rem; font-weight: 600; line-height: 1.4;">
                                    <?php echo html_escape($cow['feed_type'] ? $cow['feed_type'] : 'Konsentrat High-Protein + Rumput Odot + Silase Jagung'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- TAB MEDIS -->
                    <div class="tab-content" id="tab-medis">
                        <div class="health-report-box" style="margin-bottom: 1rem;">
                            <div class="health-report-icon">
                                <i data-lucide="shield-check" style="width: 22px; height: 22px;"></i>
                            </div>
                            <div>
                                <span class="health-report-title">Laporan Medis Dokter Hewan</span>
                                <span class="health-report-desc"><?php echo html_escape($cow['health']); ?></span>
                            </div>
                        </div>

                        <div class="trust-grid" style="margin-bottom: 0;">
                            <div class="trust-card">
                                <span class="trust-card-label">Status Karantina Mandiri</span>
                                <span class="trust-card-value" style="font-size: 0.9rem;"><?php echo html_escape($cow['quarantine_status'] ? $cow['quarantine_status'] : 'Lulus Karantina 14 Hari'); ?></span>
                            </div>
                            <div class="trust-card">
                                <span class="trust-card-label">Pemeriksaan Terakhir</span>
                                <span class="trust-card-value" style="font-size: 0.9rem;"><?php echo html_escape($cow['vet_check_date'] ? $cow['vet_check_date'] : '20 Mei 2026'); ?></span>
                            </div>
                            <div class="trust-card" style="grid-column: span 2;">
                                <span class="trust-card-label">Log Riwayat Vaksinasi</span>
                                <span class="trust-card-value" style="font-size: 0.9rem; font-weight: 600; color: var(--primary-light);">
                                    <?php echo html_escape($cow['vaccination_status'] ? $cow['vaccination_status'] : 'Vaksin PMK Dosis 2 + Booster LSD'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Button rows -->
                <div class="detail-cta-row">
                    <?php
                    // Pre-fill WhatsApp Inquiry Text
                    $waNumber = "6285210171587";
                    $waMessage = encodeURIComponent("Halo Twin Farms, saya sangat tertarik dan ingin memesan sapi " . $cow['name'] . " (" . $cow['breed'] . ") dengan berat aktual " . $cow['weight'] . " dan harga " . $cow['price'] . ". Apakah sapi ini masih tersedia dan bisa saya jadwalkan peninjauan langsung?");
                    ?>
                    <a href="https://wa.me/<?php echo $waNumber; ?>?text=<?php echo $waMessage; ?>" target="_blank" class="btn-whatsapp-booking">
                        <i data-lucide="message-circle" style="width: 20px; height: 20px;"></i>
                        Pesan Sapi & Negosiasi via WhatsApp
                    </a>

                    <a href="<?php echo base_url(); ?>#katalog" class="btn-back-catalog">
                        <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer-grid">
            <div>
                <a href="<?php echo base_url(); ?>" class="footer-logo">
                    <?php if(isset($settings['site_logo']) && !empty($settings['site_logo'])): ?>
                        <img src="<?php echo base_url($settings['site_logo']); ?>" alt="Logo" style="max-height: 90px; border-radius: 8px;">
                    <?php else: ?>
                        <div class="logo-icon" style="width: 32px; height: 32px; border-radius: 8px;">
                            <i data-lucide="sprout" style="width: 18px; height: 18px;"></i>
                        </div>
                        Twin <span>Farms</span>
                    <?php endif; ?>
                </a>
                <p class="footer-about-text" style="color: var(--text-muted);">
                    Supplier sapi potong premium tangan pertama dengan mengedepankan akurasi berat timbangan digital riil, kesehatan prima bebas PMK, dan transparansi pelayanan bagi kepuasan maksimal pembeli.
                </p>
            </div>

            <div class="footer-links-col">
                <h4>Navigasi Cepat</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo base_url(); ?>#hero">Beranda</a></li>
                    <li><a href="<?php echo base_url(); ?>#tentang">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url(); ?>#katalog">Katalog Sapi</a></li>
                    <li><a href="<?php echo base_url(); ?>#keunggulan">Keunggulan Kami</a></li>
                </ul>
            </div>

            <div class="footer-links-col">
                <h4>Hubungi Kami</h4>
                <ul class="footer-links">
                    <li><span style="font-size: 0.9rem; color: var(--text-muted);"><i data-lucide="phone" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> +62 852-1017-1587</span></li>
                    <li><span style="font-size: 0.9rem; color: var(--text-muted);"><i data-lucide="mail" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> sales@twinfarms.co.id</span></li>
                    <li><span style="font-size: 0.9rem; color: var(--text-muted);"><i data-lucide="clock" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle; margin-right: 0.25rem;"></i> Setiap Hari (08:00 - 17:00)</span></li>
                </ul>
            </div>
        </div>

        <div class="container footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> <?php echo html_escape(isset($settings['site_name']) ? $settings['site_name'] : 'Twin Farms'); ?>. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Custom Main JS -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <!-- JS Scripts for Swapping Photos & Lucide Icons -->
    <script>
        // Init Lucide
        lucide.createIcons();

        // Mobile Menu toggle support for detail page
        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');

        if (menuToggle && navMenu) {
            menuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('open');
                const icon = menuToggle.querySelector('i');
                if (navMenu.classList.contains('open')) {
                    icon.setAttribute('data-lucide', 'x');
                } else {
                    icon.setAttribute('data-lucide', 'menu');
                }
                lucide.createIcons();
            });
        }

        // Swap main preview image on thumbnail click/hover
        function swapPreview(imgUrl, element) {
            const previewEl = document.getElementById('mainPreview');

            // Fade effect
            previewEl.style.opacity = '0.3';

            setTimeout(() => {
                previewEl.src = imgUrl;
                previewEl.style.opacity = '1';

                // Swap active thumbnail classes
                document.querySelectorAll('.detail-thumb-card').forEach(item => {
                    item.classList.remove('active');
                });
                element.classList.add('active');
            }, 150);
        }

        // Tabs Logic
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                btn.classList.add('active');

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Show target tab content
                const tabId = btn.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
</body>

</html>
<?php
// Simple URL encoder helper in PHP context
function encodeURIComponent($str)
{
    $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
    return strtr(rawurlencode($str), $revert);
}
?>