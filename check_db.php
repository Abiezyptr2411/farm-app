<?php
$dsn = 'mysql:host=localhost;dbname=farm;charset=utf8';
try {
    $pdo = new PDO($dsn, 'root', 'Abieza666!');
    echo "ORDERS SCHEMA:\n";
    $q = $pdo->query('DESCRIBE orders');
    print_r($q->fetchAll(PDO::FETCH_ASSOC));
    
    echo "\nCATTLE SCHEMA:\n";
    $q2 = $pdo->query('DESCRIBE cattle');
    print_r($q2->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
