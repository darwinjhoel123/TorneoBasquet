<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='1') {

include("../conexion.php");

$revisar = "SELECT * FROM dat_admin WHERE cargo='$cargo' AND contrasenia='$usuario' ";
$res 	 = $link->query($revisar);
while ($row=$res->fetch_assoc()) {
	$id_registros=$row['id_registros'];
}

#PARA QUE NO SUBAN CUAL QUIER TIPO DE IMAGEN AL FORMULARIO
$nombreE		=$_POST['nombreE'];
$categoria		=$_POST['categoria'];

$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$desordena  = str_shuffle($caracteres);
$keys		= substr($desordena, 1, 10);

$nombre 	=$_FILES['logo']['name'];
$type		=$_FILES['logo']['type'];
$guardar	=$_FILES['logo']['tmp_name'];
$tamano		=$_FILES['logo']['size'];

$info		= pathinfo($_FILES['logo']['name']);
$ext = $info['extension'];
$nombi =$keys."_logo.".$ext;


if(($nombre == !NULL) && ($_FILES['logo']['size']<=2000000)){

	if(($_FILES["logo"]["type"]=="image/gif")
	||	($_FILES["logo"]["type"] =="image/jpeg")
	||	($_FILES["logo"]["type"] == "image/jpg")
	||	($_FILES["logo"]["type"]=="image/png"))
	{

$guard = "SELECT * FROM equipo WHERE nombreE='$nombreE' ";
$rel = $link->query($guard);
if(mysqli_num_rows($rel)>0){
	echo "existe ese equipo en la Base de datos";
	  echo "<a href='index.php'> << REGRESAR </a>";
}else{
	
	if(move_uploaded_file($guardar, '../images/'.$nombi )){

		$save = "INSERT INTO equipo(nombreE,categoria,logo,id_registros) VALUES ('$nombreE','$categoria','$nombi','$id_registros')";
		$result = $link-> query($save);
		echo "guardado";
  echo "<a href='index.php'> << REGRESAR </a>";
		}else{
			echo "error2";
		}

	}
}
	else{
		echo "tiene que ser formato de imagen";
	}

}else{echo "La imagen es demasiado grande";}
#FIN DEL TIPO DE ARCHIVO PARA EL LOGOTIPO	

}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}
?>