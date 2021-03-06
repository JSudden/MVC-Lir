<?php
  /*
   * App Core Class
   * Skapar URLer och laddar Core Controller.
   * URL FORMAT - /controller/method/params
   */

   class Core {
    // Default controller
    protected $currentController = 'Pages';
    // Default metod
    protected $currentMethod = 'index';
    // Default parameters
    protected $params = [];

    // Kör test funktion
    public function __construct() {

        
        // Hämta URL 
        $url = $this->getUrl();
        // Stor bokstav först. 
        $requstedController = ucwords($url[0]);

        // Kolla om kontroller finns
        if(file_exists("../app/controllers/$requstedController.php")) {

          // Sätt currentController till requestedController
          $this->currentController = $requstedController;

          // Ta bort controller ur array
          unset($url[0]);
        }
        require_once "../app/controllers/$this->currentController.php";

        //instansiera controller
        $this->currentController = new $this->currentController;

        //kolla om det finns en metod med samma namn
        // Som den metod som efterfrågas i vår ctroller
        if(isset($url[1])) {
          if(method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];

            //Ta bort metoden ur array
            unset($url[1]);
          }
        }

        //sätt params till dom värden som finns kvar i $url arrayen
        $this->params = $url ? array_values($url) : [];

        //anropa metoden i controllern med params som argument.
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Test funktion för att visa hur det fungerar
    public function getUrl() {
      if(isset($_GET['url'])) {
        // tar bort / i slutet av URLen
        $url = rtrim($_GET['url'], '/');
        // ser till så att värdet för URL är formaterad som en url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Bryter ut url till en array enligt följande [Controller, metod, paramter]
        $url = explode('/', $url);
        return $url;
      }
      
    }

   }
  ?>
 
