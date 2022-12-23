<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maxibasquet</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/miestilo.css">
    <script src="js/all.js"></script>
  </head>
  <body class="imagen-fondo">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">
 <div class="row d-flex justify-content-center">
   <div class="col-md-5">
<form action="proceso.php" method="post" class="fondo2 borde1 p-3 text-white mt-5" >
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
<input type="password" name="usuario" class="form-control" placeholder="Tu password" required="" autofocus="">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
<!--ASIGNAMOS EL VALOR 1 para los cargos-->
<select name="cargo" class="form-select">
  <option value="1"> Delegados</option>
  <option value="2"> Mesa</option>
  <option value="3"> Admin</option>
</select>

<div class="mb-3 mt-3">
    <button type="submit" class="btn btn-success"> Ingresar </button>
</div>

</form>
   </div>
 </div> 
</div> 
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>