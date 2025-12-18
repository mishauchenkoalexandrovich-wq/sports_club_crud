<?php
require 'config.php';

try {
    // показати всі таблиці
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "📋 Tables in DB '$db': " . implode(", ", $tables) . "<br>";

    // підрахувати кількість записів у members
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM members");
$row = $stmt->fetch();
echo "👥 Members in DB: " . $row['total'];
} catch (PDOException $e) {
    echo "❌ SQL error: " . $e->getMessage();
}
