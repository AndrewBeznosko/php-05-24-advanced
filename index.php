<?php
require_once __DIR__ . '/vendor/autoload.php';

$dsn = 'mysql:host=database;dbname=php_05_advanced';

try {
    $pdo = new PDO($dsn, 'root', 'secret');
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}