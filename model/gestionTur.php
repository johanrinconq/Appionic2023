<?php
class gestionTur
{
  
  public function validarUsuario($usuario, $clave)
  {
    $tipo = 0;
    require_once('conectarbdD.php');
    $consulta = conectarbdD::conexion()->query("SELECT FROM users WHERE usuario='$usuario' AND clave='$clave'");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $tipo = $fila['users'];
    } //cieraa while

    return $tipo;
  }
}//cierra la clase principal