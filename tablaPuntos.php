<!doctype html>

<!-- CABECERA-->
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/miestilo.css">
    <script src="js/all.js"></script>
  </head>
  <body class="imagen-fondo">

<!--MENU-->
<?php include("navbar.php");
?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">
 
<div class="row justify-content-center">
  <div class="col-9 py-5">
    <div class="text-center"><h2 class="h2">TABLA DE PUNTUACIONES POR EQUIPO</h2>
      
    </div>
    <hr>
    <table class="table table-bordered table-striped sobra1 bg-light" id="myTable">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white" onclick="sortTable(0, 'str')">Nombre de Equipo</td>
        <td class="text-white" onclick="sortTable(2, 'int')">Balon robados(BR)</td>
        <td class="text-white" onclick="sortTable(3, 'int')">Mayor asistencia de Jugadores(AJ)</td>
        <td class="text-white" onclick="sortTable(4, 'int')">Faltas por Jugador(FJ)</td>
        <td class="text-white" onclick="sortTable(5, 'int')">Punto Final(PF)</td>
        <td class="text-white" onclick="sortTable(5, 'int')">Partidos Jugados(Pj)</td>
        <td class="text-white" onclick="sortTable(5, 'int')">Partidos perdidos(PP)</td>
        <td class="text-white" onclick="sortTable(5, 'int')">Partidos ganados(PG)</td>
        <td class="text-white"></td>
      </tr>
      </tbody>

<script>
/**
 * Funcion para ordenar una tabla... tiene que recibir el numero de columna a
 * ordenar y el tipo de orden
 * @param int n
 * @param str type - ['str'|'int']
 */
function sortTable(n,type) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
 
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
 
  /*Make a loop that will continue until no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare, one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place, based on the direction, asc or desc:*/
      if (dir == "asc") {
        if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
# SELECT * FROM (SELECT *FROM schedule ORDER BY startHour ) AS tmp_table GROUP BY day
include("conexion.php");
$numer=1;


#SELECT * FROM resultadofinal ORDER BY puntoFinal DESC
$mostrar=" SELECT nombreE, sum(resultadoRobos) AS resultadoRobos, sum(faltasJugador) AS faltasJugador, sum(asistenciaJugador) AS asistenciaJugador, sum(puntoFinal) AS puntoFinal,sum(partidoJ) AS partidoJ,sum(partidoE) AS partidoE, sum(partidoP) AS partidoP, sum(partidoG) AS partidoG FROM resultadofinal GROUP BY nombreE ORDER BY puntoFinal DESC limit 100 " ;

$resultado=$link->query($mostrar);
while ($row=$resultado->fetch_assoc()) {
$nombreE            =$row['nombreE'];
$resultadoRobos     =$row['resultadoRobos'];
$faltasJugador      =$row['faltasJugador'];
$asistenciaJugador  =$row['asistenciaJugador'];
$puntoFinal         =$row['puntoFinal'];

$partidoE  =$row['partidoE'];
$partidoP  =$row['partidoP'];
$partidoG  =$row['partidoG'];
$partidoJ  =$row['partidoJ'];

//
//
    echo "<tr>";
    echo "<td>".$numer."</td>";
    echo "<td>".strtoupper($nombreE)."</td>";
    echo "<td>".$resultadoRobos."</td>";
    echo "<td>".$asistenciaJugador."</td>";
    echo "<td>".$faltasJugador."</td>";
    echo "<td>".$puntoFinal."</td>";
    echo "<td>".$partidoJ."</td>";
    echo "<td>".$partidoP."</td>";
    echo "<td>".$partidoG."</td>";
    echo "<td></td>";
    echo "</tr>";
    $numer++;
  }

?>      
      
    </table>
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->

</div>

</div>  
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>