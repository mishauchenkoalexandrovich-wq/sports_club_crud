<?php
require_once __DIR__ . '/DB.php';

class MembersDAO {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE
    public function addMember($name, $age, $email) {
        $this->db->query(
            "INSERT INTO members (name, age, email) VALUES (?, ?, ?)",
            [$name, $age, $email]
        );
    }

    // READ
    public function getAllMembers() {
        return $this->db->query("SELECT * FROM members")->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateMember($id, $name, $age, $email) {
        $this->db->query(
            "UPDATE members SET name=?, age=?, email=? WHERE id=?",
            [$name, $age, $email, $id]
        );
    }

    // DELETE
    public function deleteMember($id) {
        $this->db->query("DELETE FROM members WHERE id=?", [$id]);
    }
}
