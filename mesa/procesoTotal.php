<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='2') {

include("../conexion.php");
#

$id_partidos = $_POST['id_partido'];
$id_equipo = $_POST['id_equipo'];
$resultadoRobos = $_POST['totalRobos'];
$asistenciaJugador = $_POST['totalAsistencia'];
$faltasJugador = $_POST['totalFalta'];
$puntoFinal = $_POST['totalTiro'];


$buscar = "SELECT * FROM equipo WHERE id_equipo='$id_equipo'";
$resulB = $link->query($buscar);

while ($row=$resulB->fetch_assoc()) {
  $nombreE=$row['nombreE'];
}

if(mysqli_num_rows($resulB)>0){ 

	$insertarF ="INSERT INTO resultadofinal(id_partidos,id_equipo,nombreE,resultadoRobos,faltasJugador,asistenciaJugador,puntoFinal,partidoJ,partidoP,partidoE,partidoG) VALUES('$id_partidos','$id_equipo','$nombreE','$resultadoRobos','$faltasJugador','$asistenciaJugador','$puntoFinal','0','0','0','0')";
		if($resultado = $link->query($insertarF)){
		    
		echo "CORRECTAMENTE --> ";
		echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
	}
}else{ echo "error final"; }


}else{
  echo "No eres juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}

?>
