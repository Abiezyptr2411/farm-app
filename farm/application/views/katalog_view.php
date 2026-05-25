<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Sapi Lengkap - <?php echo html_escape(isset($settings['site_name']) ? $settings['site_name'] : 'Twin Farms'); ?></title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Katalog lengkap sapi potong premium siap kirim dari Twin Farms. Timbangan jujur riil, bebas PMK, sehat terawat.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v=' . time()); ?>">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        .catalog-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2.5rem;
            align-items: start;
            margin-bottom: 5rem;
        }
        
        .filter-sidebar {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            padding: 1.75rem;
            border-radius: 16px;
            box-shadow: var(--shadow-premium);
            position: sticky;
            top: 100px;
        }
        
        .filter-group {
            margin-bottom: 1.75rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .filter-group:last-of-type {
            border-bottom: none;
            margin-bottom: 1.25rem;
            padding-bottom: 0;
        }
        
        .filter-checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0.25rem 0;
            transition: var(--transition-fast);
        }
        
        .filter-checkbox-label:hover {
            color: var(--primary);
            transform: translateX(2px);
        }
        
        @media (max-width: 992px) {
            .catalog-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .filter-sidebar {
                position: relative;
                top: 0;
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

    <!-- Clean Header (No Hero Banner) -->
    <div class="container" style="margin-top: 160px; margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border-color);">
        <span class="section-badge" style="background: rgba(45, 106, 79, 0.06); border: 1px solid rgba(45, 106, 79, 0.15); color: var(--primary-light); margin-bottom: 0.5rem;">Twin Farms Catalog</span>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-top: 0.25rem; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Katalog Sapi Siap Potong & Kirim</h1>
        <p style="font-size: 1rem; color: var(--text-muted); max-width: 750px; font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.5;">Pilih langsung sapi kualitas premium unggulan kami. Transaksi aman, akurat dengan timbangan digital riil, serta jaminan kesehatan lengkap.</p>
    </div>

    <!-- Main Catalog Grid Layout with Sidebar -->
    <main class="container">
        <div class="catalog-layout">
            
            <!-- Left: Sidebar Filter -->
            <aside class="filter-sidebar">
                <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.15rem; font-weight: 700; color: var(--primary); margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 0.75rem;">
                    <i data-lucide="sliders-horizontal" style="width: 18px; height: 18px; color: var(--accent);"></i> Filter Pencarian
                </h3>
                
                <!-- Filter Status -->
                <div class="filter-group">
                    <h4 style="font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Status</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.35rem;">
                        <label class="filter-checkbox-label">
                            <input type="radio" name="statusFilter" value="all" checked style="accent-color: var(--primary); width: 15px; height: 15px;"> Semua Status
                        </label>
                        <label class="filter-checkbox-label">
                            <input type="radio" name="statusFilter" value="tersedia" style="accent-color: var(--primary); width: 15px; height: 15px;"> Tersedia
                        </label>
                        <label class="filter-checkbox-label">
                            <input type="radio" name="statusFilter" value="sold" style="accent-color: var(--primary); width: 15px; height: 15px;"> Terjual (Sold)
                        </label>
                    </div>
                </div>

                <!-- Filter Breed -->
                <div class="filter-group">
                    <h4 style="font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Jenis / Breed</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.35rem;">
                        <label class="filter-checkbox-label">
                            <input type="radio" name="breedFilter" value="all" checked style="accent-color: var(--primary); width: 15px; height: 15px;"> Semua Jenis
                        </label>
                        <?php if (!empty($breeds)): ?>
                            <?php foreach ($breeds as $b): ?>
                                <label class="filter-checkbox-label">
                                    <input type="radio" name="breedFilter" value="<?php echo html_escape($b['name']); ?>" style="accent-color: var(--primary); width: 15px; height: 15px;"> <?php echo html_escape($b['name']); ?>
                                </label>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <button id="resetFilters" style="width: 100%; border: 1px solid var(--border-color); background: var(--accent-light); color: var(--primary); padding: 11px; border-radius: 100px; font-weight: 700; font-size: 0.85rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem; transition: var(--transition-fast); margin-top: 1rem;">
                    <i data-lucide="rotate-ccw" style="width: 14px; height: 14px;"></i> Reset Filter
                </button>
            </aside>

            <!-- Right: Data Cards Grid -->
            <section class="katalog-grid" style="margin-top: 0; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
                <?php if (!empty($cattle)): ?>
                    <?php foreach ($cattle as $item): ?>
                        <!-- Card <?php echo $item['id']; ?> -->
                        <div class="katalog-card" data-status="<?php echo ($item['status'] === 'tersedia' && isset($item['stock']) && $item['stock'] > 0) ? 'tersedia' : 'sold'; ?>" data-breed="<?php echo html_escape($item['breed']); ?>">
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
                    <div style="grid-column: 1 / -1; text-align: center; padding: 6rem 2rem; color: var(--text-muted);">
                        <i data-lucide="info" style="width: 48px; height: 48px; margin-bottom: 1rem; color: var(--primary); display: block; margin-left: auto; margin-right: auto;"></i>
                        <p style="font-weight: 600;">Belum ada katalog sapi potong yang tersedia.</p>
                    </div>
                <?php endif; ?>
            </section>

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

    <!-- Inject Cattle Data JSON for JS popup handlers -->
    <script>
        const cattleData = <?php echo json_encode(array_map(function($item) {
            return [
                'id' => 'cow-' . $item['id'],
                'slug' => $item['slug'],
                'name' => $item['name'],
                'breed' => $item['breed'],
                'weight' => $item['weight'],
                'age' => $item['age'],
                'price' => $item['price'],
                'status' => $item['status'],
                'health' => $item['health'],
                'location' => $item['location'],
                'description' => $item['description'],
                'image_main' => base_url($item['image_main']),
                'image_gallery1' => $item['image_gallery1'] ? base_url($item['image_gallery1']) : null,
                'image_gallery2' => $item['image_gallery2'] ? base_url($item['image_gallery2']) : null,
            ];
        }, $cattle)); ?>;
        
        const BASE_URL = "<?php echo base_url(); ?>";
    </script>

    <!-- Custom Main JS -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <script>
        // Init Lucide
        lucide.createIcons();

        // Custom filter handling logic
        const statusRadios = document.querySelectorAll('input[name="statusFilter"]');
        const breedRadios = document.querySelectorAll('input[name="breedFilter"]');
        const cattleCards = document.querySelectorAll('.katalog-card');
        const resetBtn = document.getElementById('resetFilters');

        function applyFilters() {
            const selectedStatus = document.querySelector('input[name="statusFilter"]:checked').value;
            const selectedBreed = document.querySelector('input[name="breedFilter"]:checked').value;
            
            let visibleCount = 0;

            cattleCards.forEach(card => {
                const cardStatus = card.dataset.status;
                const cardBreed = card.dataset.breed;

                const statusMatch = selectedStatus === 'all' || cardStatus === selectedStatus;
                const breedMatch = selectedBreed === 'all' || cardBreed === selectedBreed;

                if (statusMatch && breedMatch) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const grid = document.querySelector('.katalog-grid');
            let noDataMsg = document.getElementById('noDataMessage');

            if (visibleCount === 0) {
                if (!noDataMsg) {
                    noDataMsg = document.createElement('div');
                    noDataMsg.id = 'noDataMessage';
                    noDataMsg.style.cssText = 'grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; color: var(--text-muted);';
                    noDataMsg.innerHTML = `
                        <i data-lucide="info" style="width: 48px; height: 48px; margin-bottom: 1rem; color: var(--primary); display: block; margin-left: auto; margin-right: auto;"></i>
                        <p style="font-weight: 600;">Tidak ada sapi yang cocok dengan kriteria filter.</p>
                    `;
                    grid.appendChild(noDataMsg);
                    lucide.createIcons();
                }
            } else {
                if (noDataMsg) noDataMsg.remove();
            }
        }

        statusRadios.forEach(radio => radio.addEventListener('change', applyFilters));
        breedRadios.forEach(radio => radio.addEventListener('change', applyFilters));

        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                document.querySelector('input[name="statusFilter"][value="all"]').checked = true;
                document.querySelector('input[name="breedFilter"][value="all"]').checked = true;
                applyFilters();
            });
        }

        function closeDetailModal() {
            const detailModal = document.getElementById('detailModal');
            detailModal.classList.remove('open');
            setTimeout(() => {
                detailModal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }
    </script>
</body>
</html>
