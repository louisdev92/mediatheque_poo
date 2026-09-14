<?php

class ResourceRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM resources");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM resources WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO resources (title, type, status, borrower) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['title'],
            $data['type'],
            $data['status'],
            $data['borrower'] ?? null
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE resources SET title = ?, type = ?, status = ?, borrower = ? WHERE id = ?");
        return $stmt->execute([
            $data['title'],
            $data['type'],
            $data['status'],
            $data['borrower'] ?? null,
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM resources WHERE id = ?");
        return $stmt->execute([$id]);
    }
}