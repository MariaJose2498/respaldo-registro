<?php

namespace App\modelo; //preguntar esto Diferencia entre el use y el namespace

use App\conexion\conexion;
use PDO;
use PDOException;

class model extends conexion {

  private $id_activo;
  private $nombre;
  private $descripcion;
  private $tipo;
  private $estado;

  function set_id_activo($valor){
    $this->id_activo = $valor;
  }
  function set_nombre($valor){
    $this->nombre = $valor;
  }
  function set_descripcion($valor){
    $this->descripcion = $valor;
  }
  function set_tipo($valor){
    $this->tipo = $valor;
  }
  function set_estado($valor){
    $this->estado = $valor;
  }

 
  function __construct(){
    parent::__construct();
  }

  function registrar(){

    try {
      $sql = "INSERT INTO activo(id_activo, nombre, descripcion, tipo, estado)
              VALUES (null, :nombre, :descripcion, :tipo_activo, :estado_de_activo)";
      $query = $this->conex->prepare($sql);
      $query->bindParam(':nombre', $this->nombre);
      $query->bindParam(':descripcion', $this->descripcion);
      $query->bindParam(':tipo_activo', $this->tipo);
      $query->bindParam(':estado_de_activo', $this->estado);
      return $query->execute();

    } catch (PDOException $e) {
      // return $e->getMessage(); // Descomenta para depuración
      return false;
    }

  }

  function consultar(){
    try {
      $sql = "SELECT * FROM activo";
      $query = $this->conex->prepare($sql);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return null;
    }
  }

function modificar($id){
  try {
    $sql = "UPDATE activo
            SET nombre = :nombre,
                descripcion = :descripcion,
                tipo = :tipo_activo,
                estado = :estado_de_activo
            WHERE id_activo = :id";
    $query = $this->conex->prepare($sql);
    $query->bindParam(':nombre', $this->nombre);
    $query->bindParam(':descripcion', $this->descripcion);
    $query->bindParam(':tipo_activo', $this->tipo);
    $query->bindParam(':estado_de_activo', $this->estado);
    $query->bindParam(':id', $id);
    return $query->execute();
  } catch (PDOException $e) {
    return false;
  }
}

  function buscar(){
    try {
      $sql = "SELECT * FROM activo WHERE id_activo = :id";
      $query = $this->conex->prepare($sql);
      $query->bindParam(':id', $this->id_activo);
      $query->execute();
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return null;
    }
  }

  function eliminar(){
    try {
      $sql = "DELETE FROM activo WHERE id_activo = :id";
      $query = $this->conex->prepare($sql);
      $query->bindParam(':id', $this->id_activo);
      return $query->execute();
    } catch (PDOException $e) {
      return false;
    }
  }

}