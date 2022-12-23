<?php 
include("../conexion.php");

$nombreC	=$_POST['nombreC'];
$categoria	=$_POST['categoria'];
$fecha_ini	=$_POST['fecha_ini'];#Inicio de torneo 		=  01/12/2022
$fecha_fin	=$_POST['fecha_fin'];#Fin de torneo    		=  31/12/2022
$f_preinsc	=$_POST['f_preinsc'];#Inicio Preinscripción =  02/12/2022
$f_prefin	=$_POST['f_prefin']; #Fin pre Inscripción   =  04/12/2022
$f_inscrip	=$_POST['f_inscrip'];#Inicio inscripción    =  05/12/2022
$f_fin		=$_POST['f_fin']; 	 #Fin Inscripción       =  08/12/2022
$descripT	=$_POST['descripT'];
#Inicio Torneo
#   01/12/2022 < 31/12/2022 y 31/12/2022  > 08/12/2022
if($fecha_ini < $fecha_fin &&  $fecha_fin > $f_fin){
	#Pre inscripción	
	  #02/12/2022 < 04/12/2022 y 02/12/2022 < 05/12/2022 y  02/12/2022 < 08/12/2022
	if($f_preinsc < $f_prefin && $f_preinsc < $f_inscrip && $f_preinsc < $f_fin  ){
			
		if($f_inscrip < $f_fin && $f_inscrip > $f_preinsc && $f_inscrip > $f_prefin){
			
			$verificar="SELECT * FROM torneo WHERE nombreC='$nombreC' AND categoria='$categoria' ";
			$resultado=$link->query($verificar);
			if (mysqli_num_rows($resultado)>0) {
				echo "YA EXISTE UN TORNEO CON ESE NOMBRE:<strong> ".$nombreC."</strong> Y CATEGORIA : <strong>".$categoria."</strong> <a href='crearCampeonato.php'>  <<< REGRESAR </a>";
			}else{
				$crear="INSERT INTO torneo
				(nombreC,categoria,fecha_ini,fecha_fin,f_inscrip,f_fin,f_preinsc,f_prefin,descripT) VALUES 
				('$nombreC','$categoria','$fecha_ini','$fecha_fin','$f_inscrip','$f_fin','$f_preinsc','$f_prefin','$descripT')";
				if ($result=$link->query($crear)) {
					echo "Creado CORRECTAMENTE el TORNEO con el NOMBRE:<strong> ".$nombreC."</strong> Y CATEGORIA : <strong>".$categoria."</strong> <a href='index.php'>  <<< REGRESAR </a>";
				}else{
					echo "Error al craer el torneo con el NOMBRE:<strong> ".$nombreC."</strong> Y CATEGORIA : <strong>".$categoria."</strong> <a href='crearCampeonato.php'>  <<< REGRESAR </a>";}
				}

			}else{echo "Ingrese correctamente la fecha de la INSCRIPCIÓN <a href='crearCampeonato.php'>  <<< REGRESAR </a>";}
		}else{echo "Ingrese correctamente la fecha de la PREINSCRIPCIÓN <a href='crearCampeonato.php'>  <<< REGRESAR </a>";}

}else{echo "Ingrese correctamente la fecha del TORNEO <a href='crearCampeonato.php'>  <<< REGRESAR </a>";}
?>