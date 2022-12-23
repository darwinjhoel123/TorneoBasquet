<?php
require_once("sesion.class.php");
$sesion = new sesion();

$usuario=md5($_POST['usuario']);
$cargo 	=$_POST['cargo'];

    if(validarUsuario($usuario,$cargo) == true){      
      
      $sesion->set("cargo",$cargo);
      $sesion->set("usuario",$usuario) ;      
      
      if ($cargo =='1') {
      header("Location: delegado/index.php");
      }
      elseif ($cargo =='2') {
      header("Location: mesa/index.php");
      }
      elseif ($cargo =='3') {
      header("Location: admin/index.php");
      }
      //echo "ingresaste"; //desde aqui es el ELSE
      else{
        echo "error en la tabla";
      }
      //hasta aqui es el ELSE
    }else {
     echo "ERROR AL INGRESAR -- ";
     echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
    }
  
 function validarUsuario($usuario,$cargo)
  {
include("conexion.php");

    $consulta = "SELECT * FROM dat_admin WHERE contrasenia='$usuario' AND cargo='$cargo' ";
if($resultado = $link->query($consulta)){ 
    
    if($resultado->num_rows > 0)
    {
      $fila = $resultado->fetch_assoc();
      if( strcmp($usuario,$fila["contrasenia"]) == 0 )
        return true;            
      else          
        return false;
    }
    else
        return false;
  }
}
?>