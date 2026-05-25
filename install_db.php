<?php
define('BASEPATH', TRUE);
define('ENVIRONMENT', 'development');
// Load database configurations directly
require_once('application/config/database.php');
$db_config = $db['default'];

try {
    $dsn = "mysql:host=" . $db_config['hostname'] . ";dbname=" . $db_config['database'] . ";charset=" . $db_config['char_set'];
    $pdo = new PDO($dsn, $db_config['username'], $db_config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "Connected successfully to DB: " . $db_config['database'] . "\n";

    // 1. Create users table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        address TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    echo "Table 'users' verified/created.\n";

    // 2. Create gallery table
    $pdo->exec("CREATE TABLE IF NOT EXISTS gallery (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image_path VARCHAR(255) NOT NULL,
        label VARCHAR(100) NOT NULL,
        is_active TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    echo "Table 'gallery' verified/created.\n";

    // Seed default gallery images if table is empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM gallery");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("INSERT INTO gallery (image_path, label, is_active) VALUES 
        ('assets/images/ternak1.jpg', 'Kandang Modern Bersih', 1),
        ('assets/images/ternak2.jpg', 'Sapi Potong Unggulan', 1),
        ('assets/images/ternak3.jpg', 'Pemberian Pakan Organik', 1),
        ('assets/images/ternak4.png', 'Lingkungan Pasture Sehat', 1)");
        echo "Default gallery items seeded.\n";
    }

    // 3. Create orders table
    $pdo->exec("CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        cattle_id INT NOT NULL,
        pickup_date DATE NOT NULL,
        notes TEXT DEFAULT NULL,
        status ENUM('pending', 'dikonfirmasi', 'selesai', 'dibatalkan') DEFAULT 'pending',
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (cattle_id) REFERENCES cattle(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    echo "Table 'orders' verified/created.\n";

    // 4. Alter cattle table to add is_active column
    try {
        $pdo->exec("ALTER TABLE cattle ADD COLUMN is_active TINYINT(1) DEFAULT 1;");
        echo "Column 'is_active' added to 'cattle' table.\n";
    } catch (PDOException $e) {
        // Column might already exist, ignore
        echo "Column 'is_active' already exists or update skipped.\n";
    }

    echo "Database setup completed successfully!\n";
} catch (PDOException $e) {
    die("Database setup failed: " . $e->getMessage() . "\n");
}
