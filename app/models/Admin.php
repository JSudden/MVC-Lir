<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }
        public function getPosts() {
            $this->db->query("SELECT * FROM blogposts");
            return $this->db->resultSet();
          }
          public function deletePosts($id) {
            $this->db->query('DELETE FROM blogposts WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->execute();
          }
    }
?>