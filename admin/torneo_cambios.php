<?php 
include("../conexion.php");
$id_torneo	=$_POST['id_torneo'];
$nombreC	=$_POST['nombreC'];
$categoria	=$_POST['categoria'];
$fecha_ini	=$_POST['fecha_ini'];
$fecha_fin	=$_POST['fecha_fin'];
$f_inscrip	=$_POST['f_inscrip'];
$f_fin		=$_POST['f_fin'];
$f_preinsc	=$_POST['f_preinsc'];
$f_prefin	=$_POST['f_prefin'];
$descripT	=$_POST['descripT'];

$cambios ="UPDATE torneo SET nombreC='$nombreC',categoria='$categoria', fecha_ini='$fecha_ini', fecha_fin='$fecha_fin', f_inscrip='$f_inscrip', f_fin = '$f_fin', f_preinsc = '$f_preinsc', f_prefin = '$f_prefin', descripT = '$descripT' WHERE id_torneo ='$id_torneo' ";

	if ($result=$link->query($cambios)) {
		echo "modificado CORRECTAMENTE el TORNEO con el NOMBRE:<strong> ".$nombreC."</strong> Y CATEGORIA : <strong>".$categoria."</strong> <a href='index.php'>  <<< REGRESAR </a>";
	}else{
		echo "Error al modificar el torneo con el NOMBRE:<strong> ".$nombreC."</strong> Y CATEGORIA : <strong>".$categoria."</strong> <a href='crearCampeonato.php'>  <<< REGRESAR </a>";
	}



?>