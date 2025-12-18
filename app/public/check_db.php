<?php
require 'config.php';

$stmt = $pdo->query("SELECT DATABASE()");
echo "Current DB: " . $stmt->fetchColumn() . "<br>";

$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "📋 Tables in DB: " . implode(", ", $tables);
