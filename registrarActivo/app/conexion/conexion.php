<?php
namespace App\conexion;

require_once "app/Config/ConfigSystem.php";

use PDO;
use PDOException;

class conexion extends PDO {
  protected $conex;

  public function __construct() {

    try {
      // Primero conectamos sin especificar la base de datos
      $this->conex = new PDO( "mysql:host="._HOST_.";dbname="._DB_ , _USER_ , _PASS_ );
      $this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
    }

  }

}
?>