<?php
class Comments extends Controller {
    public function __construct() {
      $this->commentModel = $this->model('comment');
       
      }
      public function index() {
        $comments = $this->commentModel->getComment($id);
        $data = [
          "comment" => $comments,
        ];
        $this->view('posts/readmore', $data);
      }
      public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'content' => trim($_POST['content']),
                'blogpost_id' => trim($_POST['blogpost']),
            ];
            
          
            if(!empty($_POST['name']) && !empty($_POST['content'])) {
                      
                if($this->commentModel->addComment($data)){ 
                    header("location:" . URLROOT2 . "posts/readmore/$data[blogpost_id]");
                }  else {
                    die("Something went wrong");
                }
            } else {
                $this->view("posts/readmore", $data); 
            }
            
        } else {
            $this->view("posts/readmore");
            
        }
      }
    
}
?>