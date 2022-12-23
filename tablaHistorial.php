<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
?>
<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondo">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">

<div class="row justify-content-center">
  <div class="col-9 py-5">
    <div class="text-center"><h2 style="color: white;" >HISTORIAL DEL TORNEO </h2>
      
    </div>

    <hr>
    <form action="procesoHistorial.php" method="post" class="row g-3">    
    <table class="table table-bordered table-striped sobra1 bg-light">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white">Nombre Torneo</td>
        <td class="text-white">Categoría</td>
        <td class="text-white">Nombre Equipo</td>
        <td class="text-white">Resultado de robos de Balón</td>
        <td class="text-white">Faltas por Jugador</td>
        <td class="text-white">Asistencia por jugador</td>
        <td class="text-white">Puntos por jugador</td>
      </tr>
      </tbody>
<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
include("conexion.php");
$numer=1;
# 
$consultar = "SELECT * FROM torneofinalizado";
  if($resultado = $link->query($consultar)){
    if(mysqli_num_rows($resultado)>0){
    #AUN FALTA BORRAR LOS DATOS DE LA TABLA
  $revisarT = "SELECT * FROM torneo ORDER BY id_torneo DESC Limit 1";
  $resT   = $link->query($revisarT);
  while ($rol=$resT->fetch_assoc()) {
  $id_torneo=$rol['id_torneo'];
  $nombreC=$rol['nombreC'];
  $categoria=$rol['categoria'];
  }
      $mostrar="SELECT * FROM torneofinalizado ";
          $resultado=$link->query($mostrar);
          while ($row=$resultado->fetch_assoc()) {
          $nombreTorneo       =$row['nombreTorneo'];
          $nombreE            =$row['nombreE'];
          $categoria          =$row['categoria'];
          $resultadoRobos     =$row['resultadoRobos'];
          $faltasJugador      =$row['faltasJugador'];
          $asistenciaJugador  =$row['asistenciaJugador'];
          $puntoFinal         =$row['puntoFinal'];
          
              echo "<tr>";
              echo "<td>".$numer."</td>";
              echo "<td>".$nombreTorneo."</td>";
              echo "<td>".$categoria."</td>";
              echo "<td>".strtoupper($nombreE)."</td>";
              echo "<td>".$resultadoRobos."</td>";
              echo "<td>".$asistenciaJugador."</td>";
              echo "<td>".$faltasJugador."</td>";
              echo "<td>".$puntoFinal."</td>";
              echo "<td></td>";
              echo "</tr>";
              $numer++;
              $revisar = "SELECT * FROM equipo WHERE nombreE='$nombreE' ";
              $res   = $link->query($revisar);
                          while ($row=$res->fetch_assoc()) {
                              $id_registros       =$row['id_registros'];
                              $id_equipo          =$row['id_equipo'];
                                }
                                 
                          

  }  
      
    }else{
      echo "No existe ningun torneo pasado registrado aun";
      echo "<a href='index.php'> REGRESAR </a>";

    }
  }
  else
    {echo "Error en la consulta";}
#


      
      
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
