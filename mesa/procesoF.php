<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='2') {

include("../conexion.php");
#
$id_partido	=$_POST['id_partido'];
$id_partid		=$_POST['id_partido'];
$id_jugador		=$_POST['id_jugador'];
$robos			=$_POST['robos'];
$asistencia		=$_POST['asistencia'];
$faltasJugador	=$_POST['faltasJugador'];
$puntuacionTiro =$_POST['puntuacionTiro'];
$id_equipo		=$_POST['id_equipo'];

$buscar = "SELECT * FROM jugadores WHERE id_jugador='$id_jugador'";
$resulB = $link->query($buscar);

while ($row=$resulB->fetch_assoc()) {
  $nombJ=$row['nombJ'];
  $id_jugador=$row['id_jugador'];
} 

if(mysqli_num_rows($resulB)>0){	
	$insertar = "INSERT INTO jugador(id_partido,id_equipo,id_jugador,nombJ,robos,asistencia,faltasJugador,puntuacionTiro) 
	VALUES ('$id_partido','$id_equipo','$id_jugador','$nombJ','$robos','$asistencia','$faltasJugador','$puntuacionTiro')";


	if($resultado = $link->query($insertar)){
		echo "Jugador Registrado CORRECTAMENTE --> ";
		echo "<a href='estadistica.php?id_equipo=$id_equipo&id_partidos=$id_partido'> << REGRESAR </a>";
	}else{echo "error al insertar" ;}
}

}else{
  echo "No eres juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}

?>
