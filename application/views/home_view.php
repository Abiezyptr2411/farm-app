<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twin Farms - Supplier Sapi Potong Berkualitas & Terpercaya</title>
    <meta name="description" content="Penyedia sapi potong premium siap kirim langsung dari peternakan modern Twin Farms. Jaminan timbangan digital presisi dan sertifikat bebas PMK.">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v=' . time()); ?>">

    <!-- Font Awesome CDN for Brands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Lucide Icons Library -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Unified 2-Column Authentication Modal Design Specs -->
    <style>
        .auth-modal-left {
            background-image: linear-gradient(135deg, rgba(27, 85, 59, 0.92), rgba(15, 32, 23, 0.96)), url("<?php echo base_url(isset($settings['hero_image']) ? $settings['hero_image'] : 'assets/images/hero.jpg'); ?>");
            background-size: cover;
            background-position: center;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            color: #ffffff;
            position: relative;
        }

        .auth-modal-right {
            padding: 3rem;
            position: relative;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 768px) {
            #userAuthModal .modal-window {
                grid-template-columns: 1fr !important;
                max-width: 480px !important;
            }

            .auth-modal-left {
                display: none !important;
            }

            .auth-modal-right {
                padding: 2rem !important;
            }
        }
    </style>
</head>

<body>

    <!-- Header Navigation -->
    <header>
        <div class="container nav-wrapper">
            <a href="#" class="logo">
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
                <a href="#hero" class="nav-link"><?php echo html_escape(isset($settings['nav_home']) ? $settings['nav_home'] : 'Beranda'); ?></a>
                <a href="#tentang" class="nav-link"><?php echo html_escape(isset($settings['nav_about']) ? $settings['nav_about'] : 'Tentang Kami'); ?></a>
                <a href="#katalog" class="nav-link"><?php echo html_escape(isset($settings['nav_catalog']) ? $settings['nav_catalog'] : 'Katalog Sapi'); ?></a>
                <a href="#keunggulan" class="nav-link"><?php echo html_escape(isset($settings['nav_features']) ? $settings['nav_features'] : 'Keunggulan'); ?></a>
                <a href="#galeri" class="nav-link"><?php echo html_escape(isset($settings['nav_gallery']) ? $settings['nav_gallery'] : 'Galeri'); ?></a>
                <a href="#testimoni" class="nav-link"><?php echo html_escape(isset($settings['nav_testimonials']) ? $settings['nav_testimonials'] : 'Testimoni'); ?></a>



                <a href="#kontak" class="nav-cta"><?php echo html_escape(isset($settings['nav_contact']) ? $settings['nav_contact'] : 'Hubungi Kami'); ?></a>
            </nav>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <i data-lucide="menu"></i>
            </button>
        </div>
    </header>

    <!-- 1. Hero Section -->
    <section id="hero" class="hero-section">
        <div class="hero-bg">
            <img src="<?php echo base_url(isset($settings['hero_image']) ? $settings['hero_image'] : 'assets/images/hero.jpg'); ?>" alt="Peternakan Sapi Modern Twin Farms" class="hero-bg-img">
        </div>
        <div class="container hero-wrapper text-center">
            <div class="hero-badge">
                <i data-lucide="shield-check"></i>
                <span><?php echo html_escape(isset($settings['hero_badge']) ? $settings['hero_badge'] : 'Supplier Sapi Potong Premium'); ?></span>
            </div>
            <h1 class="hero-title">
                <?php echo html_escape(isset($settings['hero_title_1']) ? $settings['hero_title_1'] : 'Supplier Sapi Potong'); ?><br>
                <span><?php echo html_escape(isset($settings['hero_title_2']) ? $settings['hero_title_2'] : 'Berkualitas & Terpercaya'); ?></span>
            </h1>
            <p class="hero-desc">
                <?php echo html_escape(isset($settings['hero_desc']) ? $settings['hero_desc'] : 'Twin Farms menyediakan sapi potong unggulan (Limousin, Simmental, Brahman) yang sehat, bebas penyakit, dan siap menyuplai kebutuhan RPH, katering, bisnis kuliner, serta ibadah Qurban dengan timbangan digital riil transparan.'); ?>
            </p>
            <div class="hero-actions">
                <a href="#katalog" class="btn btn-primary">
                    Lihat Katalog <i data-lucide="arrow-right"></i>
                </a>
                <a href="#kontak" class="btn btn-secondary">
                    Hubungi Kami <i data-lucide="message-square"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 2. Tentang Twin Farms -->
    <section id="tentang" class="about-section section-padding">
        <div class="container">
            <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; text-align: left;"><?php echo html_escape(isset($settings['about_title']) ? $settings['about_title'] : 'Perjalanan Ternakita Farm'); ?></h2>
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--text-main); margin-bottom: 1.5rem; text-align: left;"><?php echo html_escape(isset($settings['about_subtitle']) ? $settings['about_subtitle'] : 'Menghubungkan Peternak Lokal dengan Kualitas Terbaik'); ?></h3>

            <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem; text-align: left;">
                <?php echo html_escape(isset($settings['about_p1']) ? $settings['about_p1'] : '"Ternakita Farm hadir bukan hanya sebagai penyedia hewan ternak, tetapi sebagai partner terpercaya yang mengutamakan kualitas, kesehatan ternak, dan kepuasan pelanggan di setiap prosesnya."'); ?>
            </p>

            <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem; text-align: left;">
                <?php echo html_escape(isset($settings['about_p2']) ? $settings['about_p2'] : 'Berawal dari kepedulian terhadap potensi peternakan lokal yang belum terkelola maksimal, Ternakita Farm dibangun dengan semangat menghadirkan sistem peternakan yang lebih modern, profesional, dan terpercaya. Dengan pengalaman di bidang peternakan serta jaringan peternak pilihan, Ternakita Farm fokus menyediakan sapi berkualitas unggul yang dirawat dengan standar kesehatan dan pakan terbaik.'); ?>
            </p>

            <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem; text-align: left;">
                <?php echo html_escape(isset($settings['about_p3']) ? $settings['about_p3'] : 'Kami percaya bahwa kualitas ternak dimulai dari proses pemeliharaan yang tepat. Karena itu, setiap sapi dipilih secara selektif, dipantau kesehatannya secara rutin, dan dipersiapkan dengan baik sebelum sampai ke tangan pelanggan.'); ?>
            </p>

            <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem; text-align: left;">
                <?php echo html_escape(isset($settings['about_p4']) ? $settings['about_p4'] : 'Melalui Ternakita Farm, kami ingin menciptakan ekosistem peternakan yang lebih maju &mdash; mendukung peternak lokal, menjaga kualitas produk ternak, serta memberikan pengalaman transaksi yang aman, nyaman, dan transparan bagi setiap pelanggan.'); ?>
            </p>
        </div>
    </section>

    <!-- 3. Katalog Sapi -->
    <section id="katalog" class="katalog-section section-padding container">
        <div class="section-header text-center">
            <span class="section-badge">Katalog Sapi Pilihan</span>
            <h2 class="section-title">Katalog Sapi Siap Potong & Kirim</h2>
            <p class="section-desc">Pilih sapi kualitas premium unggulan kami. Transaksi aman, akurat dengan timbangan digital rill, serta jaminan kesehatan dokter&nbsp;hewan.</p>
        </div>



        <!-- Catalog Grid -->
        <div class="katalog-grid">
            <?php if (!empty($cattle)): ?>
                <?php foreach ($cattle as $item): ?>
                    <!-- Card <?php echo $item['id']; ?> -->
                    <div class="katalog-card" data-status="<?php echo html_escape($item['status']); ?>">
                        <div class="katalog-img-wrapper">
                            <img src="<?php echo base_url(html_escape($item['image_main'])); ?>" alt="<?php echo html_escape($item['name']); ?>" class="katalog-img">
                            <span class="katalog-status-badge <?php echo ($item['status'] === 'tersedia' && isset($item['stock']) && $item['stock'] > 0) ? 'available' : 'sold'; ?>">
                                <?php echo ($item['status'] === 'tersedia' && isset($item['stock']) && $item['stock'] > 0) ? 'Tersedia' : 'Habis'; ?>
                            </span>
                        </div>
                        <div class="katalog-body">
                            <span class="katalog-tag"><?php echo html_escape($item['breed']); ?></span>
                            <h3 class="katalog-title"><?php echo html_escape($item['name']); ?></h3>
                            <div class="katalog-details-grid">
                                <div class="katalog-detail-item">
                                    <span>Berat Aktual</span>
                                    <h4><?php echo html_escape($item['weight']); ?></h4>
                                </div>
                                <div class="katalog-detail-item">
                                    <span>Umur Sapi</span>
                                    <h4><?php echo html_escape($item['age']); ?></h4>
                                </div>
                            </div>
                            <div class="katalog-footer">
                                <span class="katalog-price"><?php echo html_escape($item['price']); ?></span>
                                <a href="<?php echo site_url('katalog/' . html_escape($item['slug'])); ?>" class="btn-detail-link">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; color: var(--text-muted);">
                    <i data-lucide="info" style="width: 48px; height: 48px; margin-bottom: 1rem; color: var(--primary); display: block; margin-left: auto; margin-right: auto;"></i>
                    <p style="font-weight: 600;">Belum ada katalog sapi potong yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 3.5rem;">
            <a href="<?php echo site_url('katalog'); ?>" class="btn" style="background: var(--primary); color: #fff; padding: 14px 40px; border-radius: 100px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; box-shadow: 0 10px 20px rgba(27,67,50,0.15); transition: var(--transition-fast); font-size: 0.95rem;">
                Lihat Semua Sapi <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i>
            </a>
        </div>
    </section>

    <!-- Front-End Testimonial Form Modal Overlay -->
    <div class="modal-overlay" id="frontTestiModal">
        <div class="modal-window" style="max-width: 520px; padding: 2.5rem; background: #ffffff !important; box-shadow: 0 20px 50px rgba(0,0,0,0.15); border: 1px solid var(--border-color);">
            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i data-lucide="message-square-plus" style="color: var(--accent);"></i>
                Tulis Ulasan Anda
            </h3>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.75rem;">Bagikan ulasan jujur Anda mengenai kualitas sapi potong dan pelayanan di Twin Farms.</p>

            <form action="<?php echo site_url('home/submit_testimonial'); ?>" method="POST" id="frontTestiForm">
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div>
                        <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748 !important; margin-bottom: 0.5rem; display: block;">Nama Lengkap Anda *</label>
                        <input type="text" name="name" required placeholder="Contoh: H. Ahmad Kurniawan" style="width: 100%; padding: 0.85rem 1.15rem; border: 1.5px solid #cbd5e0 !important; border-radius: 12px; font-size: 0.9rem; outline: none; transition: var(--transition-smooth); background: #ffffff !important; color: #1a202c !important;" autocomplete="off">
                    </div>

                    <div>
                        <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748 !important; margin-bottom: 0.5rem; display: block;">Pekerjaan / Instansi / Kota *</label>
                        <input type="text" name="title" required placeholder="Contoh: Pengusaha Katering - Bandung" style="width: 100%; padding: 0.85rem 1.15rem; border: 1.5px solid #cbd5e0 !important; border-radius: 12px; font-size: 0.9rem; outline: none; transition: var(--transition-smooth); background: #ffffff !important; color: #1a202c !important;" autocomplete="off">
                    </div>

                    <div>
                        <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748 !important; margin-bottom: 0.5rem; display: block;">Bintang Ulasan *</label>
                        <select name="stars" required style="width: 100%; padding: 0.85rem 1.15rem; border: 1.5px solid #cbd5e0 !important; border-radius: 12px; font-size: 0.9rem; outline: none; transition: var(--transition-smooth); background: #ffffff !important; color: #1a202c !important; cursor: pointer;">
                            <option value="5" selected>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                            <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                            <option value="3">⭐⭐⭐ (3 Bintang)</option>
                            <option value="2">⭐⭐ (2 Bintang)</option>
                            <option value="1">⭐ (1 Bintang)</option>
                        </select>
                    </div>

                    <div>
                        <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748 !important; margin-bottom: 0.5rem; display: block;">Tulis Ulasan Anda *</label>
                        <textarea name="text" required placeholder="Ceritakan pengalaman Anda membeli sapi di Twin Farms (kesehatan sapi, bobot timbangan, layanan kirim dll)..." style="width: 100%; height: 110px; padding: 0.85rem 1.15rem; border: 1.5px solid #cbd5e0 !important; border-radius: 12px; font-size: 0.9rem; outline: none; transition: var(--transition-smooth); background: #ffffff !important; color: #1a202c !important; resize: none;"></textarea>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 0.85rem; margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1.25rem;">
                        <button type="button" class="btn" style="background: #edf2f7; color: #4a5568 !important; font-weight: 700; padding: 10px 20px; border-radius: 100px; border: none; cursor: pointer;" onclick="closeFrontTestiModal()">Batal</button>
                        <button type="submit" class="btn" style="background: var(--primary); color: #ffffff !important; font-weight: 700; padding: 10px 20px; border-radius: 100px; border: none; cursor: pointer;">Kirim Ulasan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- 5. Kenapa Pilih Kami -->
    <section id="keunggulan" class="feature-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge"><?php echo html_escape(isset($settings['feat_section_badge']) ? $settings['feat_section_badge'] : 'Keunggulan Twin Farms'); ?></span>
                <h2 class="section-title"><?php echo html_escape(isset($settings['feat_section_title']) ? $settings['feat_section_title'] : 'Mengapa Memilih Kami?'); ?></h2>
                <p class="section-desc"><?php echo html_escape(isset($settings['feat_section_desc']) ? $settings['feat_section_desc'] : 'Twin Farms memberikan standar pelayanan terpercaya demi menghadirkan sapi potong dengan kualitas dan transparansi transaksi terbaik.'); ?></p>
            </div>

            <div class="features-slider-wrapper">
                <div class="features-slider-track" id="featuresSliderTrack">
                    <!-- Feature 1 -->
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i data-lucide="heart"></i>
                        </div>
                        <h3><?php echo html_escape(isset($settings['feat1_title']) ? $settings['feat1_title'] : 'Sapi Sehat & Terawat'); ?></h3>
                        <p><?php echo html_escape(isset($settings['feat1_desc']) ? $settings['feat1_desc'] : 'Pemantauan dokter hewan berkala, karantina ketat, dan pemberian nutrisi pakan organik terstandarisasi memastikan sapi dalam kondisi prima.'); ?></p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i data-lucide="award"></i>
                        </div>
                        <h3><?php echo html_escape(isset($settings['feat2_title']) ? $settings['feat2_title'] : 'Kualitas Terjamin'); ?></h3>
                        <p><?php echo html_escape(isset($settings['feat2_desc']) ? $settings['feat2_desc'] : 'Kualitas karkas padat berisi dengan persentase daging tinggi (high yield ratio) berkat pemilihan genetik bakalan sapi unggulan pilihan.'); ?></p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i data-lucide="scale"></i>
                        </div>
                        <h3><?php echo html_escape(isset($settings['feat3_title']) ? $settings['feat3_title'] : 'Timbangan Transparan'); ?></h3>
                        <p><?php echo html_escape(isset($settings['feat3_desc']) ? $settings['feat3_desc'] : 'Pembelian berbasis berat timbangan digital riil yang disaksikan secara transparan demi keadilan dan kepuasan penuh pembeli.'); ?></p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i data-lucide="shield-check"></i>
                        </div>
                        <h3><?php echo html_escape(isset($settings['feat4_title']) ? $settings['feat4_title'] : 'Pelayanan Terpercaya'); ?></h3>
                        <p><?php echo html_escape(isset($settings['feat4_desc']) ? $settings['feat4_desc'] : 'Proses administrasi legal yang lengkap, dibekali sertifikat veteriner resmi dari Dinas Peternakan bebas penyakit PMK/LSD.'); ?></p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i data-lucide="coins"></i>
                        </div>
                        <h3><?php echo html_escape(isset($settings['feat5_title']) ? $settings['feat5_title'] : 'Harga Kompetitif'); ?></h3>
                        <p><?php echo html_escape(isset($settings['feat5_desc']) ? $settings['feat5_desc'] : 'Penawaran harga terbaik langsung dari peternak tangan pertama tanpa perantara yang mahal, ideal untuk RPH, kuliner, dan reseller.'); ?></p>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="slider-controls">
                    <button class="slider-btn prev" id="sliderPrevBtn" aria-label="Sebelumnya">
                        <i data-lucide="chevron-left"></i>
                    </button>
                    <div class="slider-dots" id="sliderDots"></div>
                    <button class="slider-btn next" id="sliderNextBtn" aria-label="Berikutnya">
                        <i data-lucide="chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Galeri Peternakan -->
    <section id="galeri" class="section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge"><?php echo html_escape(isset($settings['gallery_section_badge']) ? $settings['gallery_section_badge'] : 'Galeri Peternakan'); ?></span>
                <h2 class="section-title"><?php echo html_escape(isset($settings['gallery_section_title']) ? $settings['gallery_section_title'] : 'Galeri Peternakan Modern'); ?></h2>
                <p class="section-desc"><?php echo html_escape(isset($settings['gallery_section_desc']) ? $settings['gallery_section_desc'] : 'Dokumentasi nyata aktivitas harian, kebersihan fasilitas kandang modern, dan kondisi lingkungan asri di Twin Farms.'); ?></p>
            </div>

            <div class="gallery-grid">
                <?php if (!empty($gallery)): ?>
                    <?php foreach ($gallery as $item): ?>
                        <div class="gallery-card">
                            <img src="<?php echo base_url($item['image_path']); ?>" alt="<?php echo html_escape($item['label']); ?>" class="gallery-img">
                            <div class="gallery-overlay">
                                <span class="gallery-text"><?php echo html_escape($item['label']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: var(--text-muted);">
                        Belum ada foto galeri peternakan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 7. Testimoni Pembeli -->
    <section id="testimoni" class="testi-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge"><?php echo html_escape(isset($settings['testi_section_badge']) ? $settings['testi_section_badge'] : 'Ulasan Pembeli'); ?></span>
                <h2 class="section-title"><?php echo html_escape(isset($settings['testi_section_title']) ? $settings['testi_section_title'] : 'Apa Kata Pembeli Sapi Kami?'); ?></h2>
                <p class="section-desc"><?php echo html_escape(isset($settings['testi_section_desc']) ? $settings['testi_section_desc'] : 'Testimoni nyata dari para pengusaha RPH, pemilik bisnis katering, serta panitia Qurban yang telah mempercayakan suplai sapinya kepada kami.'); ?></p>
            </div>

            <?php if ($this->session->flashdata('success_testi')): ?>
                <div style="background: rgba(72, 187, 120, 0.08); border: 1px solid rgba(72, 187, 120, 0.2); padding: 1.15rem 1.5rem; border-radius: 100px; margin-bottom: 2.5rem; color: #276749; text-align: center; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 0.5rem; animation: slideUp 0.4s ease-out; font-size: 0.9rem;">
                    <i data-lucide="check-circle" style="width: 18px; height: 18px; color: #48BB78;"></i>
                    <span><?php echo $this->session->flashdata('success_testi'); ?></span>
                </div>
            <?php endif; ?>

            <div class="testi-grid">
                <?php if (!empty($testimonials)): ?>
                    <?php foreach ($testimonials as $t): ?>
                        <div class="testi-card">
                            <div class="testi-stars">
                                <?php for ($stars = 1; $stars <= 5; $stars++): ?>
                                    <i data-lucide="star" style="<?php echo ($stars <= $t['stars']) ? 'fill: var(--accent); color: var(--accent);' : 'color: var(--border-color);'; ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="testi-text">
                                "<?php echo html_escape($t['text']); ?>"
                            </p>
                            <div class="testi-profile">
                                <div class="testi-avatar-placeholder"><?php echo html_escape($t['avatar_char']); ?></div>
                                <div class="testi-info">
                                    <h4><?php echo html_escape($t['name']); ?></h4>
                                    <p><?php echo html_escape($t['title']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: var(--text-muted);">
                        Belum ada testimoni pembeli.
                    </div>
                <?php endif; ?>
            </div>

            <div style="display: flex; justify-content: center; margin-top: 3.5rem;">
                <button class="btn" style="background: var(--primary); color: #ffffff !important; font-weight: 700; padding: 14px 36px; border-radius: 100px; display: flex; align-items: center; justify-content: center; transition: var(--transition-smooth); cursor: pointer; border: none;" onclick="openFrontTestiModal()">
                    <span>Berikan Ulasan</span>
                </button>
            </div>
        </div>
    </section>

    <!-- 8. Kontak & Hubungi Kami -->
    <section id="kontak" class="contact-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-badge"><?php echo html_escape(isset($settings['contact_section_badge']) ? $settings['contact_section_badge'] : 'Hubungi Kontak Kami'); ?></span>
                <h2 class="section-title"><?php echo html_escape(isset($settings['contact_section_title']) ? $settings['contact_section_title'] : 'Hubungi Kami & Kunjungi Kandang'); ?></h2>
                <p class="section-desc"><?php echo html_escape(isset($settings['contact_section_desc']) ? $settings['contact_section_desc'] : 'Hubungi marketing kami untuk pemesanan kustom sapi potong skala besar atau jadwalkan waktu kunjungan survei kandang Anda.'); ?></p>
            </div>

            <div class="contact-grid">
                <!-- Left: Channels -->
                <div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary);"><?php echo html_escape(isset($settings['contact_channels_title']) ? $settings['contact_channels_title'] : 'Saluran Komunikasi Resmi'); ?></h3>
                    <p style="color: var(--text-muted); margin-bottom: 2rem;"><?php echo html_escape(isset($settings['contact_channels_desc']) ? $settings['contact_channels_desc'] : 'Silakan hubungi kami melalui salah satu saluran berikut atau ikuti media sosial kami untuk update stok sapi terbaru setiap harinya.'); ?></p>

                    <div class="contact-channels">
                        <!-- Channel 1: WA -->
                        <a href="https://wa.me/<?php echo html_escape(isset($settings['contact_wa_link']) ? $settings['contact_wa_link'] : '6285210171587'); ?>" target="_blank" class="contact-channel-card">
                            <div class="contact-channel-icon" style="color: #25D366; background: rgba(37, 211, 102, 0.08);">
                                <i data-lucide="message-square"></i>
                            </div>
                            <div class="contact-channel-text">
                                <h4><?php echo html_escape(isset($settings['contact_wa_label']) ? $settings['contact_wa_label'] : 'WhatsApp Official'); ?></h4>
                                <p style="color: #25D366; font-weight: 700;"><?php echo html_escape(isset($settings['contact_wa_number']) ? $settings['contact_wa_number'] : '+62 852-1017-1587'); ?></p>
                            </div>
                        </a>

                        <!-- Channel 2: Physical Address -->
                        <div class="contact-channel-card">
                            <div class="contact-channel-icon">
                                <i data-lucide="map-pin"></i>
                            </div>
                            <div class="contact-channel-text">
                                <h4><?php echo html_escape(isset($settings['contact_address_label']) ? $settings['contact_address_label'] : 'Alamat Peternakan'); ?></h4>
                                <p><?php echo html_escape(isset($settings['contact_address_text']) ? $settings['contact_address_text'] : 'Jl. Peternakan Raya No. 88, Caringin, Sukabumi, Jawa Barat 14320'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="social-grid">
                        <a href="<?php echo html_escape(isset($settings['contact_ig_link']) ? $settings['contact_ig_link'] : 'https://instagram.com/twinfarms'); ?>" target="_blank" class="social-card">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="<?php echo html_escape(isset($settings['contact_tiktok_link']) ? $settings['contact_tiktok_link'] : 'https://tiktok.com/@twinfarms'); ?>" target="_blank" class="social-card">
                            <i class="fab fa-tiktok"></i>
                            <span>TikTok</span>
                        </a>
                        <a href="<?php echo html_escape(isset($settings['contact_yt_link']) ? $settings['contact_yt_link'] : 'https://youtube.com/@twinfarms'); ?>" target="_blank" class="social-card">
                            <i class="fab fa-youtube"></i>
                            <span>YouTube</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Map visual grayscale -->
                <div class="map-frame-wrapper">
                    <iframe
                        src="<?php echo isset($settings['contact_maps_url']) ? $settings['contact_maps_url'] : 'https://maps.google.com/maps?q=Caringin,%20Sukabumi,%20Jawa%20Barat&t=&z=14&ie=UTF8&iwloc=&output=embed'; ?>"
                        width="100%"
                        height="420"
                        style="border:0; display:block; filter: grayscale(0.1) contrast(1.02); image-rendering: -webkit-optimize-contrast;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Footer Minimalis Modern -->
    <footer>
        <div class="container footer-grid">
            <div>
                <a href="#" class="footer-logo">
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
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#katalog">Katalog Sapi</a></li>
                    <li><a href="#keunggulan">Keunggulan Kami</a></li>

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

    <!-- User Authentication Modal (Premium Glassmorphic Overlay) -->
    <div class="modal-overlay" id="userAuthModal">
        <div class="modal-window" style="max-width: 900px; width: calc(100% - 2rem); display: grid; grid-template-columns: 1fr 1fr; padding: 0; background: #ffffff !important; box-shadow: 0 20px 50px rgba(0,0,0,0.15); border: 1px solid var(--border-color); border-radius: 24px; overflow: hidden; height: auto; min-height: 560px;">

            <!-- Left Side: Dynamic Branding Image Overlay -->
            <div class="auth-modal-left">
                <div class="brand-logo" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.25);">
                    <i data-lucide="sprout" style="width: 24px; height: 24px; color: #fff;"></i>
                </div>
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 2rem; font-weight: 800; line-height: 1.2; margin-bottom: 0.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.15); color: #fff;">
                    Twin <span style="color: var(--accent);">Farms</span>
                </h3>
                <p style="font-size: 0.95rem; color: rgba(255, 255, 255, 0.85); margin-bottom: 2rem; font-weight: 500;">
                    Selamat datang di Peternakan Sapi Modern Dua Saudara.
                </p>
                <div style="display: flex; flex-direction: column; gap: 1rem; width: 100%;">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i data-lucide="check-circle" style="color: var(--accent); width: 20px; height: 20px; flex-shrink: 0;"></i>
                        <span style="font-size: 0.9rem; font-weight: 600;">Timbangan Digital Riil & Transparan</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i data-lucide="check-circle" style="color: var(--accent); width: 20px; height: 20px; flex-shrink: 0;"></i>
                        <span style="font-size: 0.9rem; font-weight: 600;">Sapi Sehat Bebas Penyakit & PMK</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i data-lucide="check-circle" style="color: var(--accent); width: 20px; height: 20px; flex-shrink: 0;"></i>
                        <span style="font-size: 0.9rem; font-weight: 600;">Jaminan Transaksi Aman & Amanah</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: Forms -->
            <div class="auth-modal-right">
                <button class="modal-close-btn" onclick="closeUserAuthModal()" aria-label="Close auth page" style="top: 1.5rem; right: 1.5rem; border: none; background: none; cursor: pointer; color: var(--primary);">
                    <i data-lucide="x"></i>
                </button>

                <!-- Auth Tabs -->
                <div style="display: flex; border-bottom: 2px solid var(--border-color); margin-bottom: 2rem;">
                    <button type="button" id="tabLoginBtn" onclick="switchAuthTab('login')" class="active" style="flex: 1; padding: 10px; font-weight: 700; font-size: 1rem; border: none; background: none; cursor: pointer; color: var(--primary); border-bottom: 3px solid transparent; transition: var(--transition-fast);">Masuk Akun</button>
                    <button type="button" id="tabRegisterBtn" onclick="switchAuthTab('register')" style="flex: 1; padding: 10px; font-weight: 700; font-size: 1rem; border: none; background: none; cursor: pointer; color: var(--primary); border-bottom: 3px solid transparent; transition: var(--transition-fast);">Daftar Baru</button>
                </div>

                <!-- Login Form -->
                <form action="<?php echo site_url('auth/user_login'); ?>" method="POST" id="userLoginForm">
                    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem; display: block;">Username *</label>
                            <input type="text" name="username" required placeholder="Masukkan username Anda" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--border-color); font-size: 0.9rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem; display: block;">Password *</label>
                            <input type="password" name="password" required placeholder="Masukkan password Anda" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--border-color); font-size: 0.9rem;">
                        </div>
                        <button type="submit" class="btn" style="background: var(--primary); color: #fff; width: 100%; padding: 14px; border-radius: 100px; font-weight: 700; border: none; cursor: pointer; margin-top: 0.5rem;">Masuk</button>
                    </div>
                </form>

                <!-- Register Form -->
                <form action="<?php echo site_url('auth/user_register'); ?>" method="POST" id="userRegisterForm" style="display: none;">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.4rem; display: block;">Nama Lengkap *</label>
                            <input type="text" name="name" required placeholder="Masukkan nama lengkap Anda" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.4rem; display: block;">Username *</label>
                            <input type="text" name="username" required placeholder="Pilih username" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.4rem; display: block;">Password *</label>
                            <input type="password" name="password" required placeholder="Pilih password kuat" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.4rem; display: block;">Nomor WhatsApp / HP *</label>
                            <input type="text" name="phone" required placeholder="Contoh: 08123456789" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-color); font-size: 0.85rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #2d3748; margin-bottom: 0.4rem; display: block;">Alamat Lengkap *</label>
                            <textarea name="address" required placeholder="Tulis alamat rumah untuk keperluan koordinasi pengiriman" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-color); font-size: 0.85rem; height: 60px; resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn" style="background: var(--accent); color: #fff; width: 100%; padding: 12px; border-radius: 100px; font-weight: 700; border: none; cursor: pointer; margin-top: 0.25rem;">Daftar Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- My Orders Modal (Premium Glassmorphic Table Overlay) -->
    <div class="modal-overlay" id="myOrdersModal">
        <div class="modal-window" style="max-width: 820px; padding: 2.5rem; background: #ffffff !important; box-shadow: 0 20px 50px rgba(0,0,0,0.15); border: 1px solid var(--border-color); border-radius: 20px;">
            <button class="modal-close-btn" onclick="closeMyOrdersModal()" aria-label="Close orders page" style="top: 1.5rem; right: 1.5rem;">
                <i data-lucide="x"></i>
            </button>

            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem; margin-top: 0;">
                <i data-lucide="clipboard-list" style="color: var(--accent);"></i>
                Daftar Pemesanan Sapi Anda
            </h3>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.75rem;">Pantau status pemesanan sapi, timbangan, dan rencana pengambilan kandang Anda.</p>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.85rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border-color); background: rgba(27, 67, 50, 0.03);">
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">No. Order</th>
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">Nama Sapi</th>
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">Harga Sapi</th>
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">Rencana Ambil</th>
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">Catatan</th>
                            <th style="padding: 12px; color: var(--primary); font-weight: 700;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user_orders)): ?>
                            <?php foreach ($user_orders as $idx => $order): ?>
                                <tr style="border-bottom: 1px solid var(--border-color); transition: var(--transition-fast);">
                                    <td style="padding: 12px; font-weight: 700; color: var(--primary);">#ORD-<?php echo $order['id']; ?></td>
                                    <td style="padding: 12px;">
                                        <div style="font-weight: 700; color: var(--primary);"><?php echo html_escape($order['cattle_name']); ?></div>
                                        <div style="font-size: 0.75rem; color: var(--text-muted);"><?php echo html_escape($order['cattle_breed']); ?></div>
                                    </td>
                                    <td style="padding: 12px; font-weight: 700; color: var(--accent);"><?php echo html_escape($order['cattle_price']); ?></td>
                                    <td style="padding: 12px; font-weight: 600;"><?php echo date('d M Y', strtotime($order['pickup_date'])); ?></td>
                                    <td style="padding: 12px; color: var(--text-muted); max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $order['notes'] ? html_escape($order['notes']) : '-'; ?></td>
                                    <td style="padding: 12px;">
                                        <?php
                                        $st = $order['status'];
                                        if ($st === 'pending') {
                                            echo '<span style="background: #FFFBEB; color: #D97706; padding: 4px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; border: 1px solid #FDE68A;">Menunggu Konfirmasi</span>';
                                        } else if ($st === 'dikonfirmasi') {
                                            echo '<span style="background: #EFF6FF; color: #2563EB; padding: 4px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; border: 1px solid #BFDBFE;">Disetujui Kandang</span>';
                                        } else if ($st === 'selesai') {
                                            echo '<span style="background: #ECFDF5; color: #059669; padding: 4px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; border: 1px solid #A7F3D0;">Sapi Selesai Diambil</span>';
                                        } else {
                                            echo '<span style="background: #FEF2F2; color: #DC2626; padding: 4px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; border: 1px solid #FECACA;">Dibatalkan</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="padding: 30px; text-align: center; color: var(--text-muted);">
                                    <i data-lucide="shopping-bag" style="width: 32px; height: 32px; color: var(--text-muted); margin-bottom: 0.5rem; display: inline-block;"></i>
                                    <div>Belum ada pesanan aktif. Amankan sapi pilihan Anda langsung di menu detail katalog!</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Initialize Lucide Icons & Global Configs -->
    <script>
        const BASE_URL = "<?php echo base_url(); ?>";
        const CATTLE_DATA = <?php echo json_encode($cattle); ?>;
        lucide.createIcons();

        // Front Testimonial Controllers
        const frontTestiModal = document.getElementById('frontTestiModal');

        function openFrontTestiModal() {
            frontTestiModal.style.display = 'flex';
            frontTestiModal.offsetHeight;
            frontTestiModal.classList.add('open');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeFrontTestiModal() {
            frontTestiModal.classList.remove('open');
            setTimeout(() => {
                frontTestiModal.style.display = 'none';
                document.body.style.overflow = '';
                document.getElementById('frontTestiForm').reset();
            }, 300);
        }

        // User Authentication Modal Toggle
        const userAuthModal = document.getElementById('userAuthModal');

        function openUserAuthModal() {
            switchAuthTab('login');
            userAuthModal.style.display = 'flex';
            userAuthModal.offsetHeight;
            userAuthModal.classList.add('open');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeUserAuthModal() {
            userAuthModal.classList.remove('open');
            setTimeout(() => {
                userAuthModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }

        function switchAuthTab(tab) {
            const loginForm = document.getElementById('userLoginForm');
            const registerForm = document.getElementById('userRegisterForm');
            const tabLogin = document.getElementById('tabLoginBtn');
            const tabRegister = document.getElementById('tabRegisterBtn');

            if (tab === 'login') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                tabLogin.style.borderBottomColor = 'var(--accent)';
                tabRegister.style.borderBottomColor = 'transparent';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                tabLogin.style.borderBottomColor = 'transparent';
                tabRegister.style.borderBottomColor = 'var(--accent)';
            }
        }

        function switchToAuthModal() {
            const detailModal = document.getElementById('detailModal');
            detailModal.classList.remove('open');
            setTimeout(() => {
                detailModal.style.display = 'none';
                openUserAuthModal();
            }, 300);
        }

        function closeDetailModal() {
            const detailModal = document.getElementById('detailModal');
            detailModal.classList.remove('open');
            setTimeout(() => {
                detailModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }

        // My Orders Modal Toggle
        const myOrdersModal = document.getElementById('myOrdersModal');

        function openMyOrdersModal() {
            myOrdersModal.style.display = 'flex';
            myOrdersModal.offsetHeight;
            myOrdersModal.classList.add('open');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeMyOrdersModal() {
            myOrdersModal.classList.remove('open');
            setTimeout(() => {
                myOrdersModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }



        // Auto Open Auth Modal if window hash is #masuk
        if (window.location.hash === '#masuk') {
            setTimeout(openUserAuthModal, 500);
        }
    </script>

    <!-- Custom JavaScript Logic -->
    <script src="<?php echo base_url('assets/js/main.js?v=' . time()); ?>"></script>

    <!-- CodeIgniter Flashdata Dynamic Toast Notification Hooks -->
    <?php if ($this->session->flashdata('success_user')): ?>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                window.createNotification("<?php echo $this->session->flashdata('success_user'); ?>", 'success');
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error_user')): ?>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                window.createNotification("<?php echo $this->session->flashdata('error_user'); ?>", 'error');
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success_order')): ?>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                window.createNotification("<?php echo $this->session->flashdata('success_order'); ?>", 'success');
            });
        </script>
    <?php endif; ?>
</body>

</html>