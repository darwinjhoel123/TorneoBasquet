<?php
#PARA INICIAR SESION Y ENLAZARSE CON OTRA CLASE Y SI ES EL CARGO QUE OCUPA O NO PARA DELEGADO
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
    <title>Administrador</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/miestilo.css">
    <script src="../js/all.js"></script>
  </head>
  <body class="imagen-fondoA">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Categoria-->
<div class="container bg-light">
 
<div class="abc">
  <div class="col-9 py-5">
    <div class="listaJ text-center"><h2>LISTA DE JUEZ DE  MESA</h2>
    </div>

  </div>
    <hr>
    <table class="table table-bordered table-striped sobra1">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white">Nombre Completo</td>
        <td class="text-white">Carnet de Identidad</td>
        <td class="text-white">Celular</td>
      </tr>
      </tbody>
<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
include("../conexion.php");
$revisar = "SELECT * FROM dat_admin WHERE cargo='$cargo' AND contrasenia='$usuario' ";
$res   = $link->query($revisar);
while ($row=$res->fetch_assoc()) {
  $id_registros=$row['id_registros'];
}

$numer=1; //Recorrido de numero de lista
$mirar="SELECT * FROM mesa ";
$result=$link->query($mirar);

if (mysqli_num_rows($result)>0) {
  $verJuez="SELECT * FROM mesa  ";

  $resJuez=$link->query($verJuez);
while ($rog=$result->fetch_assoc()) {
  $id_mesa=$rog['id_mesa'];
}

$verMesa="SELECT * FROM mesa";
$resMesa=$link->query($verMesa);
while ($rox=$resMesa->fetch_array()) {
    $nombreM =$rox['nombreM'];
    $apM     =$rox['apM'];
    $amM     =$rox['amM'];
    $ciM     =$rox['ciM'];
    $celM    =$rox['celM'];
    $email   =$rox['email'];
    echo "<tr>";
    echo "<td>".$numer."</td>";
    echo "<td>".strtoupper($apM)." ".strtoupper($amM)." ".strtoupper($nombreM)."</td>";
    echo "<td>".$ciM."</td>";
    echo "<td>".$celM."</td>";
    echo "</tr>";
    $numer++;
  }

}else{
  echo "<tr>";
  echo "<td colspan='4'>No hay juez de Mesa</td>";
  echo "</tr>";
}
?>  

      
    </table>
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->

</div> 
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<!--------------------------->
<?php 
}else{
  echo "No eres Administrador de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}
?>