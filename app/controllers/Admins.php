<?php
class Admins extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
        $this->postModel = $this->model('post');
      }
      public function index() {
        $blogpost = $this->postModel->getPosts();
    
        $data = [
            "post" => $blogpost         
        ];
        
        $this->view('admins/index', $data);
    }
      public function delete($id) {
          $blogpost = $this->postModel->deletePosts($id);
          header("location:" . URLROOT3);
      }
}
?>