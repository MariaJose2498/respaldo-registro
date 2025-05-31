<?php

use App\modelo\model;      //preguntar esto

$obj_model = new model();

if(isset($_POST['enviar'])){
  $obj_model->set_nombre($_POST['nombre']);
  $obj_model->set_descripcion($_POST['descripcion']);
  $obj_model->set_tipo($_POST['tipo']);
  $obj_model->set_estado($_POST['estado']);
 
 if($obj_model->registrar()) {
    $mensaje = "Activo registrado correctamente";
  } else {
    $mensaje = "Error al registrar el activo";
  }
}

if(isset($_POST['editar'])){
  $obj_model->set_nombre($_POST['nombre']);
  $obj_model->set_descripcion($_POST['descripcion']);
  $obj_model->set_tipo($_POST['tipo']);
  $obj_model->set_estado($_POST['estado']);

  if($obj_model->modificar($_POST['editar'])) {
    $mensaje = "Solicitud actualizada correctamente";
  } else {
    $mensaje = "Error al actualizar la solicitud";
  }
}


if(isset($_POST['eliminar'])){
  $obj_model->set_id_activo($_POST['eliminar']);
  if($obj_model->eliminar()) {
    $mensaje = "Activo eliminado correctamente";
  } else {
    $mensaje = "Error al eliminar el activo";
  }
}

if(isset($_POST['seleccion'])){
  $obj_model->set_id_activo($_POST['seleccion']);
  $editar_activo = $obj_model->buscar();
}

$activos = $obj_model->consultar();

require_once 'app/vista/view.php';