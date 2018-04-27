<?php
  /*
   * Base Controller
   * Laddar Views och Models
   */
  class Controller {
    // Laddar in och instansierar model
    public function model($model) {
      require_once "../app/models/$model.php";

      return new $model();
    }

    // Laddar in och instansierar view
    public function view($view, $data = []) {
      if(file_exists("../app/views/$view.php")) {
        require_once "../app/views/$view.php";
      } else {
        die("Kan inte hitta sidan.");
      }
    }
  }
  ?>

