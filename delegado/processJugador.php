<?php
include("../conexion.php");

#REGISTRO DE JUGADORES EN LA TABLA Y COMPARACION CON LOS IDES PARA QUE ESTE REGISTRADO POR EQUIPO	

$nombJ		=$_POST['nombJ'];
$apJ		=$_POST['apJ'];
$amJ		=$_POST['amJ'];
$paisJ		=$_POST['paisJ'];
$fechaNacimiento =$_POST['fechaNacimiento'];
$edadJ		=$_POST['edadJ'];
$id_equipo	=$_POST['id_equipo'];
$numJ		=$_POST['numJ'];
$ci			=$_POST['ci'];

#EQUIPO
$capturar = "SELECT * FROM equipo WHERE id_equipo = '$id_equipo' ";
    $resultadoE     = $link->query($capturar);
    while ($rol=$resultadoE->fetch_assoc()) {
      $nombreE = $rol['nombreE'];
      $categoria=$rol['categoria'];
    }
$categoriaF = $categoria + 4;
$categoriaM = 60;
#   30      >  20
if($edadJ>= $categoria ){
	if($categoria <= $edadJ && $edadJ <= $categoriaF){
		if($ci>0 && $edadJ>0){
			if($numJ>=0 && $numJ<100){
				$buscar = "SELECT * FROM jugadores WHERE ci='$ci' AND nombJ='$nombJ' ";
				$resulB = $link->query($buscar);
				if(mysqli_num_rows($resulB)>0){
					echo "Ese jugador Existe";
					echo "<a href='index.php'> << REGRESAR </a>";
				}else{
					$insertar = "INSERT INTO jugadores (nombJ,apJ,amJ,paisJ,fechaNacimiento,edadJ,id_equipo,numJ,ci) 
					VALUES ('$nombJ','$apJ','$amJ','$paisJ','$fechaNacimiento','$edadJ','$id_equipo','$numJ','$ci')";
					if($resultado = $link->query($insertar)){
						echo "Jugador Registrado CORRECTAMENTE --> ";
						echo "<a href='index.php'> << REGRESAR </a>";

					}else{echo "Error";}

				}
			}else{echo "El numero tiene que tener el rango de 00 a 99";
			  echo "<a href='javascript:window.history.go(-1)'> REGRESAR </a>";}

		}else{echo "Tienes que ingresar numeros mayores a 0 (Carnet)";
			  echo "<a href='javascript:window.history.go(-1)'> REGRESAR </a>";}
	}else{echo "La Edad no coincide con la categoria, es mayor de edad";
			  echo "<a href='javascript:window.history.go(-1)'> REGRESAR </a>";}

}else{echo "La Edad no coincide con la categoria, es menor de edad";
			  echo "<a href='javascript:window.history.go(-1)'> REGRESAR </a>";}








?>