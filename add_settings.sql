-- Add settings table to Twin Farms Database

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(50) NOT NULL UNIQUE,
    `value` TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO settings (`key`, `value`) VALUES
('site_name', 'Twin Farms'),
('nav_home', 'Beranda'),
('nav_about', 'Tentang Kami'),
('nav_catalog', 'Katalog Sapi'),
('nav_features', 'Keunggulan'),
('nav_gallery', 'Galeri'),
('nav_testimonials', 'Testimoni'),
('nav_contact', 'Hubungi Kami'),
('hero_badge', 'Supplier Sapi Potong Premium'),
('hero_title_1', 'Supplier Sapi Potong'),
('hero_title_2', 'Berkualitas & Terpercaya'),
('hero_desc', 'Twin Farms menyediakan sapi potong unggulan (Limousin, Simmental, Brahman) yang sehat, bebas penyakit, dan siap menyuplai kebutuhan RPH, katering, bisnis kuliner, serta ibadah Qurban dengan timbangan digital riil transparan.'),
('hero_image', 'assets/images/hero.jpg')
ON DUPLICATE KEY UPDATE `value`=VALUES(`value`);
