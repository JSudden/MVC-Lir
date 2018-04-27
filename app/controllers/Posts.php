<?php
class posts extends controller {

    public function __construct() {
        $this->postModel = $this->model('post');
  
    }           

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content'])
            ];

            if(empty($data['name_err'])) {
                //validate
                if($this->postModel->addPost($data)){
                    
                }else{
                    die("Something went wrong");
                }
            }else{
                $this->view("posts/add", $data);
            }
        } else{
            $this->view("posts/add");
        }
    }
}

?>