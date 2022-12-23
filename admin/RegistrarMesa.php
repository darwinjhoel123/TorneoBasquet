<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
?>
<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMINISTRADOR</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoA">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Registro del Equipo-->

<div class="container">
 <div class="row d-flex justify-content-center">
    <div class="col-md-10 p-3 bg-light rounded-2">
      <div class="text-center">
        <h2>Formulario de Nuevo Juez de mesa</h2>
      </div>
      <hr>
<form action="processMesa.php" method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombreM" class="form-control">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Apellido Paterno</label>
    <input type="text" name="apM" class="form-control" pattern="[a-zA-Z]+" required="">
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Apeliido Materno</label>
    <input type="text" name="amM" class="form-control" pattern="[a-zA-Z]+" required="">
  </div>
   <div class="col-6">
    <label for="inputAddress" class="form-label">Correo ELectonico </label>
    <input type="text" name="email" class="form-control" id="inputAddress">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Carnet de Identidad</label>
    <input type="text" name="ciM" class="form-control" maxlength="8" minlength="8"
pattern="[0-9]+" required="">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Celular</label>
    <input type="text" name="celM" class="form-control" maxlength="8" minlength="8"
pattern="[0-9]+" required="">
  </div>
  <div class="col-12">
 <!-- Button trigger modal -->
<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>
<!-- Modal -->

  </div>
</form>
</div>

    <!--Lista Fin-->
  </div>
</div> 
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Administrador y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}