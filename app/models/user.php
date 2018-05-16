<?php
    class user {
        private $db;
        public function __construct() {
            $this->db = new Database();
        }
        public function addUser($data){
            print_r($data);
            $this->db->query('INSERT INTO users (username, password) VALUES (:username, :password)');
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            
            if($this->db->execute()){
              return true;
            } else{
              return false;
            }
            
        }
    }
    
  
?>