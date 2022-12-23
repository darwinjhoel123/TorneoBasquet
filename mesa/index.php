<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
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

    <!--Categoria-->
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}