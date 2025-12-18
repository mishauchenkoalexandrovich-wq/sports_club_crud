<?php
$host = 'db';        // ім'я сервісу з docker-compose.yml
$db   = 'app';       // назва бази
$user = 'app';       // користувач
$pass = 'app';       // пароль
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "✅ Connected to MySQL successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}

