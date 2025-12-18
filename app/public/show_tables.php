<?php
$host = 'db';
$db   = 'app';
$user = 'app';
$pass = 'app';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "📋 Tables in DB '$db': " . implode(", ", $tables);
