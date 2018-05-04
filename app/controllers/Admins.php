<?php
class Admins extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
      }
      public function index() {
        $blogposts = $this->adminModel->getPosts();
        $data = [
            "blog" =>  "Add posts",
            "blogposts" => $blogposts
        ];
        $this->view('admins/index', $data);
      }
      public function delete($id) {
          $blogpost = $this->adminModel->deletePosts($id);
          header("location:" . URLROOT3);
      }
}
?>