<?php
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
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->

 <div class="container">
 <div class="row d-flex justify-content-center">
    <div class="col-md-6 p-1 bg-light rounded-2">
      <div class="text-center">
        <h2> Estadistica del Jugador</h2>
      </div>
      <hr>
<form action="procesoF.php" method="post" class="row g-3">

 <?php
include("../conexion.php");

$id_equipo  = $_GET['id_equipo'];
$id_partido = $_GET['id_partidos'];


$ver="SELECT * FROM equipo WHERE id_equipo='$id_equipo' ";
$resultado=$link->query($ver);
while ($row=$resultado->fetch_assoc()) {

            $nombreE    =$row['nombreE'];
}

 ?>

  <div class="col-6">
    <label for="inputAddress" class="form-label">Equipo: </label>
    <input type="text" name="resultadoA" class="form-control" value="<?php echo $nombreE;?>" readonly>
    <input type="hidden" name="id_equipo" value="<?php echo $id_equipo;?>">
    <input type="hidden" name="id_partido" value="<?php echo $id_partido;?>">

</div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Seleccione Jugador</label>
    <!--JUGADOR-->
	    <select name="id_jugador" class="form-control" readonly> 
	
	<?php
	        $mostrar ="SELECT * FROM jugadores WHERE id_equipo='$id_equipo'";
            $resultado=$link->query($mostrar);

            if (mysqli_num_rows($resultado)>0) {
              // si hay estonces hacemos la consulta
            $ver="SELECT * FROM jugadores WHERE id_equipo='$id_equipo' ORDER BY id_jugador ASC ";
            $result=$link->query($ver);
            while ($row=$result->fetch_array()) {
              $id_jugador  =$row['id_jugador'];
              $nombJ       =$row['nombJ'];
            echo "<option value='".$id_jugador."'>".$nombJ."</option>";
            }

            }else{
              echo "no hay Jugadores";
            }
            ?>
            </select>
<!--FIN JUGADOR-->
  </div>


  <div class="col-6">
    <label for="inputAddress2" class="form-label">Robos de balón</label>
    <input type="number" name="robos" class="form-control" pattern="[0-9]+"  required="" min="1" >
  </div>

 <div class="col-6">
    <label for="inputAddress2" class="form-label">Asistencia</label>
    <input type="number" name="asistencia" class="form-control" pattern="[0-9]+"  min="1" required="" >
  </div>
 


 <div class="col-6">
    <label for="inputAddress2" class="form-label">Faltas de Jugador</label>
    <input type="number" name="faltasJugador" class="form-control" pattern="[0-9]+" min="1" required="" >
  </div>


 <div class="col-6">
    <label for="inputAddress2" class="form-label">Puntuacion por Tiro</label>
    <input type="number" name="puntuacionTiro" class="form-control" pattern="[0-9]+" min="1" required="">
  </div>

  <div class="col-12">
<!-- Button trigger modal -->
<a href="partidos.php" class="btn btn-warning"> <<< REGRESAR </a>
<button type="submit" class="btn btn-primary"> Guardar estadistica </button>
<!-- Modal -->
  </div>

</form>

</div>

<!--COLUMNA 2-->
<div class="col-md-6 bg-light" style="border-color: blue;
  border-width: 5px;
  border-left-style: solid;">
<form action="procesoTotal.php" method="post">
<table class="table table-bordered table-hover table-striped">
	<tr>
		<td>N°</td>
		<td>Nombre del Jugador</td>
		<td>Robos</td>
		<td>Asistencia</td>
		<td>Faltas</td>
		<td>Tiros</td>
	</tr>

<?php
include("../conexion.php");

$id_equipo = $_GET['id_equipo'];
$numero=1;
	$tabla = "SELECT * FROM jugador WHERE id_equipo='$id_equipo' AND id_partido='$id_partido' ";
	$mostrarTabla =$link->query($tabla);
	while($ros=$mostrarTabla->fetch_array()){
		$id_jugador =$ros['id_jugador'];
		$nombJ		=$ros['nombJ'];
		$robos      =$ros['robos'];
		$asistencia =$ros['asistencia'];
		$faltasJugador=$ros['faltasJugador'];
		$puntuacionTiro=$ros['puntuacionTiro'];

echo "<tr>
		<td>".$numero."<input type='hidden' name='id_jugador' class='corto' value='".$id_jugador."' ></td>
		<td>".$nombJ."</td>
		<td><input type='text' name='robos' class='excel' value='".$robos."' readonly></td>
		<td><input type='text' name='asistencia' class='excel' value='".$asistencia."' readonly></td>
		<td><input type='text' name='faltasJugador' class='excel' value='".$faltasJugador."' readonly></td>
		<td><input type='text' name='puntuacionTiro' class='excel' value='".$puntuacionTiro."' readonly></td>
	</tr>";
	$numero++;
}//cierra el while 

$tablax = "SELECT * FROM jugador WHERE id_equipo='$id_equipo' AND id_partido='$id_partido' ";
	$mostrarTablax =$link->query($tablax);
		$totalRobos = 0;
		$totalAsistencia = 0;
		$totalFalta = 0;
		$totalTiro = 0;
	while($rosx=$mostrarTablax->fetch_array()){
		//$id_jugadorx =$rosx['id_jugador'];
		$robos     =$rosx['robos'];
		$asistencia =$rosx['asistencia'];
		$faltasJugador=$rosx['faltasJugador'];
		$puntuacionTiro=$rosx['puntuacionTiro'];

		$totalRobos = $totalRobos+$robos;
 		$totalAsistencia = $totalAsistencia+$asistencia;
		$totalFalta = $totalFalta + $faltasJugador;
		$totalTiro = $totalTiro+$puntuacionTiro;		

 }

 echo "<tr class='fondo5'>
		<td colspan='2' class='text-center'> SUMA TOTAL</td>
		<td><input type='text' name='resultadoRobos' class='excel2' value='".$totalRobos."'></td>
		<td><input type='text' name='faltasJugador' class='excel2' value='".$totalAsistencia."'></td>
		<td><input type='text' name='asistenciaJugador' class='excel2' value='".$totalFalta."'></td>
		<td><input type='text' name='puntoFinal' class='excel2' value='".$totalTiro."'></td>
		</tr>";
?>
    <input type="hidden" name="id_equipo" value="<?php echo $id_equipo;?>">
    <input type="hidden" name="id_partido" value="<?php echo $id_partido;?>">
    <input type="hidden" name="totalRobos" value="<?php echo $totalRobos;?>">
    <input type="hidden" name="totalAsistencia" value="<?php echo $totalAsistencia;?>">
    <input type="hidden" name="totalFalta" value="<?php echo $totalFalta;?>">
    <input type="hidden" name="totalTiro" value="<?php echo $totalTiro;?>">

</table>

<button type="submit" class="btn btn-success ">Total</button>

</form>
</div>
    <!--Lista Fin-->
  </div>
</div> 

    <!--Categoria-->
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}