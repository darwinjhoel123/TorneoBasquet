<?php 
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
#-----------------------
include("../conexion.php");

$mostrar="SELECT * FROM torneo ";
$resultado=$link->query($mostrar);
if (mysqli_num_rows($resultado)>0) {

$ver="SELECT * FROM torneo ORDER BY id_torneo DESC Limit 1";
$result=$link->query($ver);
while ($row=$result->fetch_assoc()) {
$f_inscrip  =$row['f_inscrip'];
$f_fin      =$row['f_fin'];
}
//----------------VERFICACIÓN DEL PAGO
$mostrarPago="SELECT * FROM dat_admin ";
$resultadoPago=$link->query($mostrarPago);
if (mysqli_num_rows($resultadoPago)>0) {

$verPago="SELECT * FROM dat_admin WHERE contrasenia='$usuario' AND cargo='$cargo'";
$resultPago=$link->query($verPago);
  while ($rol=$resultPago->fetch_assoc()) {
    $pago  =$rol['pago'];
    $habilitado =$rol['habilitado'];
  }
#-----------------------

if ($cargo=='1') {
?>
<!doctype html>
<html lang="Es">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoD">

<!--MENU pantalla del Delegado){ -->
<?php include("navbar.php");
$completado = 350;
$habilitar = 1;
if($pago == $completado){
  if($habilitado == $habilitar){
  $hoy = date('Y-m-d');
  if($f_inscrip <= $hoy && $hoy <= $f_fin){
?>
<!--FIN MENU--> 
    <!--Registro del Equipo-->

<div class="container">
 <div class="row d-flex justify-content-center">
    <div class="col-md-10 p-3 bg-light rounded-2">

<?php
include("../conexion.php");
$revisar = "SELECT * FROM dat_admin WHERE cargo='$cargo' AND contrasenia='$usuario' ";
$res   = $link->query($revisar);
while ($row=$res->fetch_assoc()) {
  $id_registros=$row['id_registros'];
}

$revisar1 = "SELECT * FROM equipo WHERE id_registros = '$id_registros'";
$res1     = $link->query($revisar1);
if(mysqli_num_rows($res1)>0){

echo "<div class='text-center alert alert-danger' role='alert'>
  YA TIENES UN EQUIPO REGISTRADO !!!
</div>";
}else{


?>
        <div class="mt-3 mb-3 text-center">
        <h1>Formulario de Registro de Equipo</h1>
      </div>
  <hr>   
<form class="row g-3" action="process.php" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label class="form-label">Nombre del Equipo</label>
    <input type="text" name="nombreE" class="form-control" id="inputEmail4" pattern="[a-zA-Z]+" required="">
  </div>
<?php
  $capturar = "SELECT * FROM torneo ORDER BY id_torneo DESC Limit 1";
    $resultadoE     = $link->query($capturar);
    while ($rol=$resultadoE->fetch_assoc()) {
      $categoria=$rol['categoria'];
    }
?>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Categoria</label>
    <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>" readonly required="" >
  </div>
   <div class="col-md-6">
    <label class="form-label">Logo del equipo</label>
    <input type="file" name="logo" class="form-control" required="">
  </div> 
  <div class="col-12">
 <button type="submit" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content.">Registrar</button>
  </div>
</form>

<?php
}
} else {echo "No estas en el rango de la inscripción";}
}else {echo "El administrador tiene que habilitarte para inscribir los equipo";}

} else {echo "Tienes que cancelar completo, aún te falta.";
        echo " Dinero depositado: ".$pago;}
?>
</div>

    <!--Lista Fin-->
  </div>
</div>
<!--FIN DE INSCRIPCIÓN --> 
 <?php
}
 ?> 
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
  }
}else{
  echo "No eres Delegado y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}