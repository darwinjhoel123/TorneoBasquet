<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='2') {
?>
<!doctype html>
<html lang="Es"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesa</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoM">

<!--MENU-->
<?php include("navbar.php");
#<!--FIN MENU-->
  include ("../conexion.php");

?> 
    <!--Categoria-->

 <div class="container">
 <div class="row d-flex justify-content-center bg-light p-2">
  <div>
    <a href="pcrear.php" class="btn btn-primary"> Nuevo +</a>  
  </div>
  
      <div class="text-center">

        <h2>Lista de Partidos </h2>
      </div>
      <hr>
<div class="col-md-8">
<table class="table table-bordered text-center">
  <tr class="fondo_tabla2">
    <td>N°</td>
    <td>LOCAL</td>
    <td></td>
    <td>VISITA</td>
    <td></td>
  </tr>
  
<?php
include("../conexion.php");
$numero=1;

$mostrar="SELECT * FROM partidos ";
$resultado=$link->query($mostrar);
while ($row=$resultado->fetch_array()) {
  $id_partidos  =$row['id_partidos'];
  $id_equipoA   =$row['id_equipoA'];
  $id_equipoB   =$row['id_equipoB'];

echo "<tr>";
echo "<td>".$numero."</td>";
echo "<td>";
if ($id_equipoA>0) {
  //echo "busca equipo A y el equipo B";
  $teamA="SELECT * FROM equipo WHERE id_equipo='$id_equipoA' ";
  $resultA=$link->query($teamA);
  while ($rox=$resultA->fetch_assoc()) {
    $nombreE  =$rox['nombreE'];
    $categoria=$rox['categoria'];
    $logo     =$rox['logo'];
echo $nombreE;
  }
}else{echo "no busca Nada A";}
//VERSUS
echo "</td>";
echo "<td> VS </td>";
echo "<td>";
//BUSCAMOS EL TEAM B
if ($id_equipoB>0) {
 $teamB= "SELECT * FROM equipo WHERE id_equipo='$id_equipoB' ";
$resultB=$link->query($teamB);
while ($roz=$resultB->fetch_assoc()) {
  $nombreEz   =$roz['nombreE'];
  $categoriaz =$roz['categoria']; 
  $logoz      =$roz['logo'];
echo $nombreEz;
} 
}else{echo "no busca Nada B";}

echo "</td>";
echo "<td> <a href='partidoFinalizado.php?id_partidos=$id_partidos&id_equipoA=$id_equipoA&nombreEA=$nombreE&id_equipoB=$id_equipoB&nombreEB=$nombreEz' class='btn btn-success'> Ir -> </a></td>";
echo "</tr>";
$numero++;


}

?>
</table>

</div>

</div>

    <!--Lista Fin-->
 </div>
 
    <!--Categoria-->
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php

}else{
  echo "No eres Juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}