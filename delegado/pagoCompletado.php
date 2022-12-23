<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
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

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 p-3 bg-light rounded-2">
      <div class="mt-3 mb-3 text-center">
        <h1>Completación del pago</h1>
      </div>
  <hr>
<?php
include("../conexion.php");
$completo = 250; 
$habilitar = 1;
$dinero=350;

$mostrar="SELECT * FROM dat_admin WHERE contrasenia='$usuario'";
$resultado=$link->query($mostrar);
while ($row=$resultado->fetch_array()) {
  $pago  =$row['pago'];
} 
 
if($pago == $completo){
   ?> 
      <form action="reg_delegado.php" method="post" class="row g-3">
        <div class="col-5">
          <label for="inputCity" class="form-label">Escanee el codigo para pagar completo</label>
          <img src="imagenes/QR2.png" alt="codigoqr" width="40%" class="img-fluid">
          <a href="procesoPago.php" class="btn btn-primary">enviar</a>
        </div>
      </form>      
  <?php
      }else{?>
          <form action="reg_delegado.php" method="post" class="row g-3">
            <div class="col-5">
              <label for="inputCity" class="form-label">El pago fue Completado, Ahora puedes registrar tu equipo y jugador</label>
              
              <a href="procesoPago.php" class="btn btn-primary disabled">enviar</a>
            </div>
          </form>
 <?php     
}

?>     

</div>

    <!--Lista Fin-->
  </div>
</div> 
   <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}

// echo "<td> <a href='procesoHabilitar.php?nom=$nom&id_registros=$id_registros&pago=$pago' class='btn btn-success' > Habilitar </a></td>";