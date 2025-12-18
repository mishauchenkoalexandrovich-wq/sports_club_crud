<?php
require_once __DIR__ . '/DB.php';

class SessionsDAO {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE
    public function addSession($title, $date, $trainer_id) {
        $this->db->query(
            "INSERT INTO sessions (title, date, trainer_id) VALUES (?, ?, ?)",
            [$title, $date, $trainer_id]
        );
    }

    // READ
    public function getAllSessions() {
        return $this->db->query(
            "SELECT s.id, s.title, s.date, t.name AS trainer_name
             FROM sessions s
             JOIN trainers t ON s.trainer_id = t.id"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateSession($id, $title, $date, $trainer_id) {
        $this->db->query(
            "UPDATE sessions SET title=?, date=?, trainer_id=? WHERE id=?",
            [$title, $date, $trainer_id, $id]
        );
    }

    // DELETE
    public function deleteSession($id) {
        $this->db->query("DELETE FROM sessions WHERE id=?", [$id]);
    }
}
