<?php 
include("../conexion.php");

$id_equipoA	=$_POST['id_equipoA'];
$id_equipoB	=$_POST['id_equipoB'];

if ($id_equipoA === $id_equipoB && $id_equipoB === $id_equipoA) {
	echo "No puede crearse un partido con el mismo equipo";
	echo "<a href='pcrear.php'> <<< Regresar </a>";
}else{
	$crear="INSERT INTO partidos (id_equipoA,id_equipoB) VALUES('$id_equipoA','$id_equipoB')";
	if($resultado=$link->query($crear)){
		echo " Insertado Correctamente";
		echo "<a href='partidos.php'> <<< Regresar </a>";
	}else{
		echo "Error al insertar Datos";
		echo "<a href='partidos.php'> <<< Regresar </a>";
	}

}

?>