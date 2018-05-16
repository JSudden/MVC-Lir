<?php 
    class users extends Controller {

    public function __construct() {
        $this->userModel = $this->model('user');
    }
    public function index() {
        $data = [
          "title" => "asd",
        ];
        $this->view('pages/index', $data);
      }
    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
            ];
           
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
            
                if($this->userModel->addUser($data)){ 
                    header("location:" . URLROOT3);
                }  else {
                    die("Something went wrong");
                }
            } 
            
        } 
    }
    
}

?>