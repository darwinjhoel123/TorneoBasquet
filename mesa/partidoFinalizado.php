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
<?php
#<!--FIN MENU-->
  include ("../conexion.php");
$id_partidos  =$_GET['id_partidos'];

$id_equipoA   =$_GET['id_equipoA'];
$nombreEA     =$_GET['nombreEA'];

$id_equipoB   =$_GET['id_equipoB'];
$nombreEB     =$_GET['nombreEB'];

?> 
    <!--Categoria-->
 <div class="container">
 <?php include("navbar.php");?>
 <div class="row d-flex justify-content-center bg-light p-2">
 
      <div class="text-center">
        <h2>RESULTADO FINAL  </h2>
      </div>
      <hr> 

<div class="col-md-6">
  <form action="#" method="get" class="row g-3 ">
  <label for="inputPassword4" class="form-label">EQUIPO A:
     </label>
<input type="text" name="nombreEA" value="<?php echo $nombreEA;?>" class="form-control" readonly>
<?php 
echo "<a href='estadistica.php?id_partidos=$id_partidos&id_equipo=$id_equipoA&nombreE=$nombreEA' class='btn btn-success'>Ir </a>";
?>
<!--INICIO DE MOSTRAR RESULTADO-->
<?php
  
$capturar = "SELECT * FROM resultadofinal WHERE id_partidos = '$id_partidos' AND id_equipo='$id_equipoA'";
$resultadoE     = $link->query($capturar);
    while ($row=$resultadoE->fetch_assoc()) {

          $id_partido   = $row['id_partidos'];
          $id_equipo    = $row['id_equipo'];
          $nombreE      = $row['nombreE'];
          $totalRobos   = $row['resultadoRobos'];
          $asistenciaJugador = $row['asistenciaJugador'];
          $totalFalta   = $row['faltasJugador'];
          $totalTiroA    = $row['puntoFinal'];

?>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Resultado de robos A: </label>
    <input type="text" name="resultadoA" class="form-control" value="<?php echo $totalRobos ;?>" readonly>
  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Faltas por jugador A:</label>
    <input type="number" name="faltasA" class="form-control" value="<?php echo $totalFalta ;?>"  readonly>
  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">(A)Asistencia por jugador: </label>
    <input type="number" name="asistenciaA" class="form-control"  value="<?php echo $asistenciaJugador ;?>"  readonly>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Puntos logrados por jugador A:</label>
    <input type="number" name="puntosA" class="form-control"  value="<?php echo $totalTiroA ;?>"  readonly>
  </div>
<?php 
    
  }
  #TERMINA EL EQUIPO B
?>
</form>
</div>

<!----FIN -->
<div class="col-md-6" style="border-color: #1c1c1c;border-width: 1px;border-left-style: dotted;">
  <form action="#" method="get" class="row g-3 ">
  <label for="inputPassword4" class="form-label">EQUIPO B:
     </label>
<input type="text" name="nombreEB" value="<?php echo $nombreEB;?>" class="form-control" readonly>
<?php 
echo "<a href='estadistica.php?id_partidos=$id_partidos&id_equipo=$id_equipoB&nombreE=$nombreEB' class='btn btn-success'>Ir </a>";
?>
<?php
$capturar = "SELECT * FROM resultadofinal WHERE id_partidos = '$id_partidos' AND id_equipo='$id_equipoB'";
$resultadoE     = $link->query($capturar);
    while ($row=$resultadoE->fetch_assoc()) {

          $id_partido   = $row['id_partidos'];
          $id_equipo    = $row['id_equipo'];
          $nombreE      = $row['nombreE'];
          $totalRobos   = $row['resultadoRobos'];
          $asistenciaJugador = $row['asistenciaJugador'];
          $totalFalta   = $row['faltasJugador'];
          $totalTiroB    = $row['puntoFinal'];

?>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Resultado de robos B:</label>
    <input type="text" name="resultadoB" class="form-control" value="<?php echo $totalRobos ;?>"  readonly>
  </div>



 <div class="col-6">
    <label for="inputAddress2" class="form-label">Faltas por jugador B:</label>
    <input type="number" name="faltasB" class="form-control" value="<?php echo $totalFalta ;?>" readonly>
  </div>



 <div class="col-6">
    <label for="inputAddress2" class="form-label">(B)Asistencia por jugador: </label>
    <input type="number" name="asistenciaB" class="form-control" value="<?php echo $asistenciaJugador ;?>" readonly>
  </div>


 <div class="col-6">
    <label for="inputAddress2" class="form-label">Puntos logrados por jugador B:</label>
    <input type="number" name="puntosB" class="form-control" value="<?php echo $totalTiroB ;?>" readonly>
  </div>

<?php
  }
?>
</form>
</div>

<!--cerramos el primer formulario-->
  <div class="col-12 text-center mt-3">
 <!-- Button trigger modal -->
<a href="partidos.php" class="btn btn-warning"> <<< REGRESAR </a>

<div class="col-10">
    <label for="inputAddress2" class="form-label">Diferencia de puntos de Equipos A y Equipo B:</label>
    <input type="number" name="puntosB" class="form-control" value="<?php $total = $totalTiroA-$totalTiroB; echo $total ;?>" readonly>
  </div>
<?php 
 echo "<a href='procesoPartido.php?id_partidos=$id_partidos&id_equipoA=$id_equipoA&nombreEA=$nombreE&id_equipoB=$id_equipoB&nombreEB=$nombreEz' class='btn btn-success'> GUARDAR PUNTUACIÓN FINAL </a>";
?>

<!-- Modal -->
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