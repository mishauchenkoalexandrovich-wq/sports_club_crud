<?php
$host = 'db';        // ім'я сервісу з docker-compose.yml
$port = 3306;        // внутрішній порт MySQL у мережі Docker
$db   = 'app';       // назва бази з MYSQL_DATABASE
$user = 'root';      // або 'app', якщо хочеш підключатися не під root
$pass = 'root';      // або 'app', якщо використовуєш користувача app

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected to DB '$db'<br>";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
