<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='1') {
include("../conexion.php");
#

$completo = 250; 
$habilitar = 1;
$dinero=350;

$mostrar="SELECT * FROM dat_admin WHERE contrasenia='$usuario'";
$resultado=$link->query($mostrar);
while ($row=$resultado->fetch_array()) {
  $pago  =$row['pago'];
}

if($pago == $completo){
          $buscar = "SELECT * FROM dat_admin WHERE contrasenia='$usuario' ";
          $resulB = $link->query($buscar);
          if(mysqli_num_rows($resulB)>0){
			
            $insertar = "UPDATE dat_admin SET pago= '$dinero' WHERE contrasenia='$usuario' ";
            if($resultado = $link->query($insertar)){

            echo "Insertado correctamente del pago ¡ya completaste el PAGO!";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
            }else{echo "Error";}
          }
  
      }else{echo "Tiene que cancelar completamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";}


//echo "Cargo: ".$cargo." Usuario: ".$usuario." Pago: ".$pago;

$mostrar1="SELECT * FROM dat_admin WHERE contrasenia='$usuario'";
$resultado1=$link->query($mostrar1);
while ($ros=$resultado1->fetch_array()) {
  $pago  =$ros['pago'];
}


$completo2=350;
if($pago == $completo2){
          $buscar1 = "SELECT * FROM dat_admin WHERE contrasenia='$usuario' ";
          $resulB1 = $link->query($buscar1);
          if(mysqli_num_rows($resulB1)>0){
			
  
      }else{echo "Tiene que cancelar completamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";}

//------------------------------
}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}
}
?>