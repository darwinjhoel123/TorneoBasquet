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
      include("conexion.php");
?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">
 
<div class="row justify-content-center">
  <div class="col-8 py-5">
    <div class="text-center"><h2 class="h2">Tabla de Jugadores</h2>
      
    </div>
    <hr>
    <table class="table table-bordered table-striped sombra1 bg-light" id="myTable">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white" onclick="sortTable(0, 'str')">Nombre Jugador</td>
        <td class="text-white" onclick="sortTable(1, 'int')">Numero de Equipo</td>
        <td class="text-white" onclick="sortTable(2, 'int')">Balon robados</td>
        <td class="text-white" onclick="sortTable(3, 'int')">Mayor asistencia del Jugador</td>
        <td class="text-white" onclick="sortTable(4, 'int')">Faltas del Jugador</td>
        <td class="text-white" onclick="sortTable(5, 'int')">Punto ingresados</td>
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
include("conexion.php");
#
 #ORDER BY id_torneo DESC Limit 1
$numero=1;
  $tabla = "SELECT * FROM jugador ORDER BY puntuacionTiro DESC ";
  $mostrarTabla =$link->query($tabla);
  while($ros=$mostrarTabla->fetch_array()){
    $id_jugador =$ros['id_jugador'];
    $id_equipo  =$ros['id_equipo'];
    $nombJ    =$ros['nombJ'];
    $robos      =$ros['robos'];
    $asistencia =$ros['asistencia'];
    $faltasJugador=$ros['faltasJugador'];
    $puntuacionTiro=$ros['puntuacionTiro'];

    $revisarT = "SELECT * FROM equipo WHERE id_equipo = '$id_equipo' ";
    $resT   = $link->query($revisarT);
    while ($ros=$resT->fetch_assoc()) {
        $nombreE   =$ros['nombreE'];  
      }
#

echo "<tr>
    <td>".$numero."<input type='hidden' name='id_jugador' class='corto' value='".$id_jugador."' ></td>
    <td>".$nombJ."</td>
    <td><input type='text' name='nombreE' class='excel' value='".$nombreE."' readonly></td>
    <td><input type='text' name='robos' class='excel' value='".$robos."' readonly></td>
    <td><input type='text' name='asistencia' class='excel' value='".$asistencia."' readonly></td>
    <td><input type='text' name='faltasJugador' class='excel' value='".$faltasJugador."' readonly></td>
    <td><input type='text' name='puntuacionTiro' class='excel' value='".$puntuacionTiro."' readonly></td>
  </tr>";
  $numero++;
}//cierra el while 


?>      
      
    </table>
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->

</div>
</div>  
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>