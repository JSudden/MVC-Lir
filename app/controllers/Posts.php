<?php
class posts extends controller {

    public function __construct() {
        $this->postModel = $this->model('post');
        $this->commentModel = $this->model('comment');
  
    }
    public function readmore($id) {
        $blogpost = $this->postModel->getPost($id);
        $comments = $this->commentModel->getComment($id);
        $data = [
            "comments" => $comments,
            "post" => $blogpost         
        ];
        
        $this->view('posts/readmore', $data);
    }
    public function index() {
        $blogposts = $this->postModel->getPosts();
        //print_r($blogposts);
        //die("lol");
        $data = [
            "blog" =>  "Add posts",
            "blogposts" => $blogposts
        ];
        $this->view('posts/index', $data);
       
    }
    
   
    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
            ];
            
            if(!empty($_POST['title']) && !empty($_POST['content'])) {
            
                if($this->postModel->addPost($data)){ 
                    header("location:" . URLROOT3);
                }  else {
                    die("Something went wrong");
                }
            } else {
                $this->view("posts/add", $data);
                //header("location:posts/index.php");
                
            }
            
        } else {
            $this->view("posts/add");
            
        }
    }
}

?>