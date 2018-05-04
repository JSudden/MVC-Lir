<?php
  // Placeholder file för Models mappen. Models filer har storbokstav först eftersom det är klasser och skrivs i Singular form.
  // T.ex Post, User, etc.
  class post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getPost($id) {
      $this->db->query('SELECT * FROM blogposts where id = :id');
      $this->db->bind(':id', $id);
      return $this->db->single();
    }
    public function getPosts() {
      $this->db->query("SELECT * FROM blogposts");
      return $this->db->resultSet();
    }
    public function addComment($data){
      $this->db->query('INSERT INTO comments (name, content) VALUES (:name, :content');
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':content', $data['content']);
    }
    public function addPost($data){

      $this->db->query('INSERT INTO blogposts (title, content) VALUES (:title, :content)');
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':content', $data['content']);
      
      if($this->db->execute()){
        return true;
      } else{
        return false;
      }
    }
}

?>