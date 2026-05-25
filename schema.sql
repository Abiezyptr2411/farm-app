-- Twin Farms Database Schema

-- Drop tables if exist
DROP TABLE IF EXISTS cattle;
DROP TABLE IF EXISTS admins;

-- 1. Create Admins Table
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 2. Create Cattle Catalog Table
CREATE TABLE cattle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    breed VARCHAR(100) NOT NULL,
    weight VARCHAR(20) NOT NULL,
    age VARCHAR(20) NOT NULL,
    price VARCHAR(30) NOT NULL,
    status ENUM('tersedia', 'terjual') DEFAULT 'tersedia',
    health VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_main VARCHAR(255) NOT NULL,
    image_gallery1 VARCHAR(255) DEFAULT NULL,
    image_gallery2 VARCHAR(255) DEFAULT NULL,
    weight_initial VARCHAR(100) DEFAULT NULL,
    daily_weight_gain VARCHAR(100) DEFAULT NULL,
    feed_type VARCHAR(255) DEFAULT NULL,
    vaccination_status VARCHAR(255) DEFAULT NULL,
    quarantine_status VARCHAR(255) DEFAULT NULL,
    vet_check_date VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 3. Seed Default Administrator (username: admin, password: admin123)
INSERT INTO admins (username, password, name) VALUES 
('admin', '$2y$10$QXRS2yLoHzzVaezK2/FRtOEsQVEu80IVgDItoD57adheJtLv9BG2W', 'Administrator Twin Farms');

-- 4. Seed Dynamic Cattle Catalog (our 3 verified cattle assets)
INSERT INTO cattle (slug, name, breed, weight, age, price, status, health, location, description, image_main, image_gallery1, image_gallery2, weight_initial, daily_weight_gain, feed_type, vaccination_status, quarantine_status, vet_check_date) VALUES 
(
    'limousin-gold-lm-88', 
    'Limousin Gold LM-88', 
    'Limousin Crossbreed', 
    '540 kg', 
    '16 Bulan', 
    'Rp 29.500.000', 
    'tersedia', 
    'Sangat Sehat (Bebas PMK & Vaksinasi Lengkap)', 
    'Kandang A - Sukabumi', 
    'Sapi Limousin super pilihan dengan ketebalan karkas maksimal. Memiliki postur tubuh panjang, dada lebar, dan kaki-kaki kokoh. Sangat direkomendasikan untuk supplier daging premium maupun ibadah Qurban Anda.',
    'assets/images/limosi.jpg',
    'assets/images/ternak1.jpg',
    'assets/images/ternak2.jpg',
    '440 kg',
    '1.35 kg/hari',
    'Konsentrat Premium + Ampas Tahu + Silase Jagung',
    'Lengkap (Vaksin PMK Dosis 2 + Booster LSD)',
    'Lulus Karantina Mandiri 14 Hari',
    '22 Mei 2026'
),
(
    'simmental-prime-sm-10', 
    'Simmental Prime SM-10', 
    'Simmental Purebred', 
    '585 kg', 
    '18 Bulan', 
    'Rp 32.800.000', 
    'tersedia', 
    'Sehat Sempurna (Bebas PMK, Sertifikat Dokter)', 
    'Kandang B - Sukabumi', 
    'Simmental murni berbobot jumbo dengan perkembangan daging yang sangat baik. Memiliki sifat tenang, nafsu makan tinggi, dan karkas berkualitas prima dengan persentase hasil daging sangat memuaskan.',
    'assets/images/simental.webp',
    'assets/images/ternak2.jpg',
    'assets/images/ternak3.jpg',
    '460 kg',
    '1.45 kg/hari',
    'Konsentrat Tinggi Protein + Hijauan Odot + Mineral Block',
    'Lengkap (Vaksin PMK Dosis 2 + Booster LSD)',
    'Lulus Karantina Mandiri 14 Hari',
    '23 Mei 2026'
),
(
    'sapi-po-po-42', 
    'Sapi PO PO-42', 
    'Sapi PO / Ongole', 
    '490 kg', 
    '14 Bulan', 
    'Rp 26.500.000', 
    'tersedia', 
    'Sangat Sehat (Imun Kuat & Bebas Kutu)', 
    'Kandang A - Sukabumi', 
    'Sapi Peranakan Ongole (PO) pilihan lokal asli dengan ketahanan tubuh luar biasa. Memiliki punuk tebal padat khas sapi ongole, gelambir panjang, dan sangat adaptif dengan iklim tropis. Pilihan karkas padat berisi.',
    'assets/images/sapi_po.jpg',
    'assets/images/ternak3.jpg',
    'assets/images/ternak4.png',
    '410 kg',
    '1.15 kg/hari',
    'Konsentrat Lokal + Jerami Fermentasi + Ampas Singkong',
    'Lengkap (Vaksin PMK Dosis 2 + LSD)',
    'Lulus Karantina Mandiri 14 Hari',
    '20 Mei 2026'
);
