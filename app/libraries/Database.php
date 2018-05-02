<?php
  /*
   * PDO Database Class
   * Kopplar upp mot databas
   * Skapar statements
   * Binder värden
   * Returnerar rader och resultat från databasen
   */

   class Database {
     private $host = DB_HOST;
     private $user = DB_USER;
     private $password = DB_PASS;
     private $database = DB_NAME;

     // Används för preparde statements
     private $dbhandler;
     private $stmt;
     private $error;

     public function __construct() {
      $dsn = "mysql:host=$this->host;dbname=$this->database";
      $options = array(
        PDO::ATTR_PERSISTENT => true, // Presistant connection
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Throw exception on error
      );

      // Skapa PDO instans
      try{
        $this->dbhandler = new PDO($dsn, $this->user, $this->password, $options);
      } catch(PDOException $error) {
        $this->error = $error->getmessage();
        echo $this->error;
      }
     }

     // Prepare statment med query.
     public function query($sql) {
       $this->stmt = $this->dbhandler->prepare($sql);
     }
     // Binder  PDO värden
     public function bind($param, $value, $type = null) {
       // Om type är null (default) kolla vilken type.
       if(is_null($type)) {
        switch(true){
          case is_int($value):
           $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value);
            $type = PDO::PARAM_NULL;
          break;
          default:
            $type = PDO::PARAM_STR;
        }
       }
       // Bind 
       $this->stmt->bindValue($param, $value, $type);
     }
     public function execute() {
       return $this->stmt->execute();
     }
     // Hämta resultat
     public function resultSet() {
       $this->execute();
       return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }

     // Hämta ett resultat
     public function single() {
       $this->execute();
       return $this->stmt->fetch(PDO::FETCH_OBJ);
     }

     // Hämta antalet rader
     public function rowCount() {
       return $this->stmt->rowCount();
     }
   } 
?>
