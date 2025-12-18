<?php
require 'config.php';

$sql = "INSERT INTO members (name, age, email) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['Петро Іваненко', 28, 'petro@example.com']);

echo "✅ New member added!";
