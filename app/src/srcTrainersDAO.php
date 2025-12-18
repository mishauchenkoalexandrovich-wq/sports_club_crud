<?php
require_once __DIR__ . '/DB.php';

class TrainersDAO {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE
    public function addTrainer($name, $specialization) {
        $this->db->query(
            "INSERT INTO trainers (name, specialization) VALUES (?, ?)",
            [$name, $specialization]
        );
    }

    // READ
    public function getAllTrainers() {
        return $this->db->query("SELECT * FROM trainers")->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateTrainer($id, $name, $specialization) {
        $this->db->query(
            "UPDATE trainers SET name=?, specialization=? WHERE id=?",
            [$name, $specialization, $id]
        );
    }

    // DELETE
    public function deleteTrainer($id) {
        $this->db->query("DELETE FROM trainers WHERE id=?", [$id]);
    }
}
