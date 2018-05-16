<?php
    class Comment {
     private $db;

    public function __construct() {
    $this->db = new Database();
    }
     
    public function getComment($id) {
    $this->db->query("SELECT * FROM comments WHERE blogpost_id = :id");
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
    }
    public function addComment($data){
    $this->db->query('INSERT INTO comments (name, content, blogpost_id) VALUES (:name, :content,:blogpost)');
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':blogpost',$data['blogpost_id']);
    $this->db->bind(':content', $data['content']);
            
          
    if($this->db->execute()){
      return true;
     } else{
     return false;
      }
    }

}

?>