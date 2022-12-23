<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='1') {
?>
<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delegado</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoD">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container bg-light">
 
<div class="row">
  <div class="col-9 py-5">
    <div class="text-center"><h2>Jugadores Registrados</h2>
      
    </div>
    <hr>
    <table class="table table-bordered table-striped sobra1">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white">Nombre de Jugador</td>
        <td class="text-white">Edad</td>
        <td class="text-white">N° de Camiseta</td>
        <td class="text-white"></td>
      </tr>
      </tbody>
<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
include("../conexion.php");
$revisar = "SELECT * FROM dat_admin WHERE cargo='$cargo' AND contrasenia='$usuario' ";
$res   = $link->query($revisar);
while ($row=$res->fetch_assoc()) {
  $id_registros=$row['id_registros'];
}

$numer=1;
$mirar="SELECT * FROM equipo WHERE id_registros='$id_registros' ";
$result=$link->query($mirar);

if (mysqli_num_rows($result)>0) {
  $verEquipo="SELECT * FROM equipo WHERE id_registros='$id_registros' ";
  $resEquipo=$link->query($verEquipo);
while ($rog=$result->fetch_assoc()) {
  $id_equipo=$rog['id_equipo'];
}

$verJugadores="SELECT * FROM jugadores WHERE id_equipo='$id_equipo' ";
$resJugadores=$link->query($verJugadores);
while ($rox=$resJugadores->fetch_array()) {
    $nombJ  =$rox['nombJ'];
    $apJ    =$rox['apJ'];
    $amJ    =$rox['amJ'];
    $edadJ   =$rox['edadJ'];
    $numJ    =$rox['numJ'];

    echo "<tr>";
    echo "<td>".$numer."</td>";
    echo "<td>".strtoupper($apJ)." ".strtoupper($amJ)." ".strtoupper($nombJ)."</td>";
    echo "<td>".$edadJ."</td>";
    echo "<td>".$numJ."</td>";
    echo "<td></td>";
    echo "</tr>";
    $numer++;
  }


}else{
  echo "<tr>";
  echo "<td colspan='4'>No hay jugadores Registrados</td>";
  echo "</tr>";
}

/*
  
*/
?>      
      
    </table>
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->
<?php


$ress   = "SELECT * FROM equipo WHERE id_registros='$id_registros'";
$res1  = $link->query($ress);

if(mysqli_num_rows($res1)>0){

while ($row1=$res1->fetch_assoc()) {
  $nombreE  =$row1['nombreE'];
  $categoria=$row1['categoria'];
  $logo     =$row1['logo'];
  }

?>
<!--MUESTRA EL NOMBRE DEL EQUIPO CON SU RESPECTIVO LOGO-->
  <div class="col-3 py-5">
          <div class="card" >
            <img src="../images/<?php echo $logo;?>"  class="card-img-top" alt="...">
              <div class="card-body bg-danger">
                  <p class="text-center"><strong class="card-text text-white"> <?php echo $nombreE;?> </strong></p>
              </div>
          </div>
  </div>
  <!--FIN DE MUETRA DEL EQUIPO-->
<?php 
 }       
?>

</div>

</div> 
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}