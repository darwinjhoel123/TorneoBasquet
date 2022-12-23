<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
include("../conexion.php");
#
$nom          = $_GET['nom'];
$id_registros = $_GET['id_registros'];
$pago         = $_GET['pago'];
$completo = 350; 
$habilitar = 1;

if($pago == $completo){
          $buscar = "SELECT * FROM dat_admin WHERE nom='$nom' ";
          $resulB = $link->query($buscar);
          if(mysqli_num_rows($resulB)>0){

            $insertar = "UPDATE dat_admin SET habilitado= '$habilitar' WHERE nom='$nom' ";
            if($resultado = $link->query($insertar)){

            echo "Insertado correctamente del pagos";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
            }else{echo "Error";}
          }
      }else{echo "Tiene que cancelar completamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";}








}else{
  echo "No eres juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}

?>