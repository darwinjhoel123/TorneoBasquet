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
 <div class="container bg-light">
   <div class="row justify-content-center">
     <div class="col-md-12 p-3">
      <h3>formulario para crear partidos</h3>
<form action="pcrearx.php" method="post" class="row g-3 p-2">
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Selección del Equipo 1:</label>
    <select name="id_equipoA" class="form-select" required>
      <option value="">Elija...</option>
<?php
include("../conexion.php");
$ver="SELECT * FROM equipo ";
$resultado=$link->query($ver);
while ($row=$resultado->fetch_array()) {
  $id_equipo=$row['id_equipo'];
  $nombreE  =$row['nombreE'];
echo "<option value='".$id_equipo."'>".$nombreE."</option>";
}
?>
    </select>
  </div>
    <div class="col-6">
    <label for="inputAddress2" class="form-label">Selección del Equipo 2:</label>
   <select name="id_equipoB" class="form-select" required>
    <option value="">Elija...</option>
<?php

$verx="SELECT * FROM equipo ";
$resultadox=$link->query($verx);
while ($rowx=$resultadox->fetch_array()) {
  $id_equipox=$rowx['id_equipo'];
  $nombreEx  =$rowx['nombreE'];
echo "<option value='".$id_equipox."'>".$nombreEx."</option>";
}
?>
    </select>    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-success"> Crear Partido</button>
  </div>
</form>

     </div>
   </div>
 </div>

    <!--Categoria-->
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}