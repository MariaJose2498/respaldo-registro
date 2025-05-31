<?php

require_once 'vendor/autoload.php';
require_once 'app/controlador/controller.php';

$pagina = 'controller';

if(isset($_GET['pagina'])) {
  $pagina = $_GET['pagina'];
}
if(is_file(("app/controlador/$pagina.php"))) {
  require_once "app/controlador/$pagina.php";
} else {
  echo 'Error 404: pagina no encontrada';
}

?>