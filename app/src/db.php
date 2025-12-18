<?php
// Конфіг з env (замінимо пізніше на реальні значення)
$config = [
  'host' => getenv('DB_HOST') ?: 'db',
  'db'   => getenv('DB_NAME') ?: 'app',
  'user' => getenv('DB_USER') ?: 'app',
  'pass' => getenv('DB_PASS') ?: 'app',
  'charset' => 'utf8mb4',
];
// Підключення додамо на кроці з Docker
