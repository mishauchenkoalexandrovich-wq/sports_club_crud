<?php
class DB {
    private $pdo;
    public function __construct() {
        $dsn = "mysql:host=db;dbname=app;charset=utf8";
        $this->pdo = new PDO($dsn, "root", "root", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
