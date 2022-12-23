<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");

if ($cargo=='1') {
?>
<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delegado</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoD">

<!--MENU pantalla del Delegado-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Registro del Equipo-->

<?php 
  include("../conexion.php");
  $revisar = "SELECT * FROM dat_admin WHERE cargo='$cargo' AND contrasenia='$usuario' ";
  $res   = $link->query($revisar);
  while ($row=$res->fetch_assoc()) {
  $id_registros=$row['id_registros'];
}
    $rev = "SELECT * FROM equipo WHERE id_registros = '$id_registros'";
    $res1     = $link->query($rev);
        if(mysqli_num_rows($res1)>0){

        ?>
<div class="container">
 <div class="row d-flex justify-content-center">
    <div class="col-md-10 p-3 bg-light rounded-2">
      <div class="text-center">
        <h2>Formulario de Nuevo Jugador</h2>
      </div>
      <hr>
<form action="processJugador.php" method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre del Jugador</label>
    <input type="text" name="nombJ" class="form-control" id="inputEmail4" pattern="[a-zA-Z]+" required="">
  </div> 
  <div class="col-md-6"> 
    <label for="inputPassword4" class="form-label">Apellido Paterno</label>
    <input type="text" name="apJ" class="form-control" id="inputPassword4" pattern="[a-zA-Z]+" required="">
  </div>
  <div class="col-6"> 
    <label for="inputAddress" class="form-label">Apellido Materno</label>
    <input type="text" name="amJ" class="form-control" id="inputAddress" pattern="[a-zA-Z]+" required="">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">País</label>
    <input type="text" name="paisJ" class="form-control" id="inputAddress2" pattern="[a-zA-Z]+" required="">
  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha de Nacimiento</label>
    <input type="date" min="1930-01-01"  class="form-control" name="fechaNacimiento" id="fechaNacimientoA" onchange="Anos();"   value="@fechaNacimiento.ToString('dd/MM/yyyy')" required/>
  </div>

<script type="text/javascript">

 $(function () {/// para poner datepicker
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#fechaNacimientoA").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+100'
        });
    });

    function Anos() { ///calcular años
        var FechaNacimiento = document.getElementById('fechaNacimientoA').value;
        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date();
        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();
        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);
        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
        document.getElementById('edada').value = edad;
        //$("#EDADA").val(edad);
    }


</script>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Edad</label>
    <input type="number" id="edada" name="edadJ" class="form-control" id="total" value="@edadJ" readonly  />
  </div>

<?php
    $capturar = "SELECT * FROM equipo WHERE id_registros = '$id_registros'";
    $resultadoE     = $link->query($capturar);
    while ($rol=$resultadoE->fetch_assoc()) {
      $nombreE = $rol['nombreE'];
      $categoria=$rol['categoria'];
      $id_equipo=$rol['id_equipo'];
    }
?>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Equipo</label>
    <input type="text" name="equipo" class="form-control" value="<?php echo $nombreE;?>" readonly >
    <input type="hidden" name="id_equipo" value="<?php echo $id_equipo;?>" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Categoría</label>
    <input type="text" name="categoria" class="form-control" value="<?php echo $categoria;?>" readonly>
  </div>
<?php

?>
<div class="col-md-6">
    <label for="inputCity" class="form-label">Numero de Carnet Identidad</label>
    <input type="number" name="ci" class="form-control" pattern="[0-9]+"
required="" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label"> Numero de jugador </label>
    <input type="number" name="numJ" class="form-control" id="inputCity" pattern="[0-9]+" maxlength="2" minlength="1" required="">
  </div>

  <div class="col-12">
 <!-- Button trigger modal -->
<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Jugador
</button>

<?php
}else{echo"no existe Equipo";}
?>


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
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}