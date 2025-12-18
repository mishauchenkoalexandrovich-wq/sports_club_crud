<?php
require_once __DIR__ . '/DB.php';

class MemberSessionsDAO {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE
    public function addMemberSession($member_id, $session_id) {
        $this->db->query(
            "INSERT INTO member_sessions (member_id, session_id) VALUES (?, ?)",
            [$member_id, $session_id]
        );
    }

    // READ
    public function getAllMemberSessions() {
        return $this->db->query(
            "SELECT ms.id, m.name AS member_name, s.title AS session_title, s.date
             FROM member_sessions ms
             JOIN members m ON ms.member_id = m.id
             JOIN sessions s ON ms.session_id = s.id"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    // DELETE
    public function deleteMemberSession($id) {
        $this->db->query("DELETE FROM member_sessions WHERE id=?", [$id]);
    }
}
