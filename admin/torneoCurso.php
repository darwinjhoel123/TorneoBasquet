<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
?>
<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoA">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">
 
<div class="row justify-content-center">
  <div class="col-9 py-5">
    <div class="text-center"><h2 style="background: white;">PARTIDO EN CURSO</h2>
      
    </div>

    <hr>
    <form action="procesoHistorial.php" method="post" class="row g-3">    
    <table class="table table-bordered table-striped sobra1 bg-light">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white">Nombre de Equipo</td>
        <td class="text-white">Balon robados</td>
        <td class="text-white">Mayor asistencia de Jugadores</td>
        <td class="text-white">Faltas por Jugador</td>
        <td class="text-white">Punto Final</td>
        <td class="text-white"></td>
      </tr>
      </tbody>
<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
include("../conexion.php");
$numer=1;
 
 
$mostrar="SELECT nombreE, sum(resultadoRobos) AS resultadoRobos, sum(faltasJugador) AS faltasJugador, sum(asistenciaJugador) AS asistenciaJugador, sum(puntoFinal) AS puntoFinal FROM resultadofinal GROUP BY nombreE ORDER BY puntoFinal DESC limit 100";
$resultado=$link->query($mostrar);
while ($row=$resultado->fetch_assoc()) {
$nombreE            =$row['nombreE'];
$resultadoRobos     =$row['resultadoRobos'];
$faltasJugador      =$row['faltasJugador'];
$asistenciaJugador  =$row['asistenciaJugador'];
$puntoFinal         =$row['puntoFinal'];

    echo "<tr>";
    echo "<td>".$numer."</td>";
    echo "<td>".strtoupper($nombreE)."</td>";
    echo "<td>".$resultadoRobos."</td>";
    echo "<td>".$asistenciaJugador."</td>";
    echo "<td>".$faltasJugador."</td>";
    echo "<td>".$puntoFinal."</td>";
    echo "<td></td>";
    echo "</tr>";
    
    $revisar = "SELECT * FROM equipo WHERE nombreE='$nombreE' ";
    $res   = $link->query($revisar);
                while ($row=$res->fetch_assoc()) {
                    $id_registros       =$row['id_registros'];
                    $id_equipo          =$row['id_equipo'];
                      }
if($numer == 1){
  echo "<td> <a href='procesoHistorial.php?nombreE=$nombreE&id_registros=$id_registros&id_equipo=$id_equipo&resultadoRobos=$resultadoRobos&faltasJugador=$faltasJugador&asistenciaJugador=$asistenciaJugador&puntoFinal=$puntoFinal' class='btn btn-success' > Finalizar Torneo </a></td>";
}           
      $numer++;      
                }


?>      
      
    </table>
<?php
?>    


</form>    
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->

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