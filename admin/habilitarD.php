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
    <!--Categoria-->
<!--MOSTRAR DELEGADOS-->

<form action="reg_delegado.php" method="post" class="row g-3">
<div class="text-center" style="background: white;">
        <h1>LISTA DE DELEGADO</h1>
</div>
<div class="container bg-light"> 
<div class="row">
  <hr>
    <table class="table table-bordered table-striped sobra1">
      <tbody   style="background: #58514F;">
      <tr>
        <td class="text-white">N°</td>
        <td class="text-white">Nombre Completo</td>
        <td class="text-white">Carnet de Identidad</td>
        <td class="text-white">Celular</td>
        <td class="text-white">Equipo</td>
        <td class="text-white">Habilitación</td>
      </tr>
      </tbody>
<?php
#Toda esta conexion es para que muestre en la tabla del jugador que se registro hacia la tabla
include("../conexion.php");

$numer=1; //Recorrido de numero de lista
$mirarD="SELECT * FROM dat_admin WHERE cargo='1' ";
$resultD=$link->query($mirarD);
if (mysqli_num_rows($resultD)>0) {
  $verD="SELECT * FROM dat_admin WHERE cargo='1' ";
  $resD=$link->query($verD);
while ($rof=$resultD->fetch_assoc()) {
  $cargo=$rof['cargo'];
}

$verDelegado="SELECT * FROM dat_admin WHERE cargo='1' ";
$resDelegado=$link->query($verDelegado);
while ($rok=$resDelegado->fetch_array()) {
    $id_registros    =$rok['id_registros'];
    $nom             =$rok['nom'];
    $ap              =$rok['ap'];
    $am              =$rok['am'];
    $contrasenia     =$rok['contrasenia'];
    $correo          =$rok['correo'];
    $pago            =$rok['pago'];
    $habilitado      =$rok['habilitado'];
    
    $no=0;
    echo "<tr>";
    echo "<td>".$numer."</td>";
    echo "<td>".strtoupper($ap)." ".strtoupper($am)." ".strtoupper($nom)."</td>";
    echo "<td>".$contrasenia."</td>";
    echo "<td>".$correo."</td>";

          $verEquipo="SELECT * FROM equipo WHERE id_registros='$id_registros' ";
          $resEquipo=$link->query($verEquipo);
          while ($roc=$resEquipo->fetch_array()) {
              $nombreE  =$roc['nombreE'];
          }
    echo "<td>".$nombreE."</td>";
    if($habilitado == $no){
    echo "<td> <a href='procesoHabilitar.php?nom=$nom&id_registros=$id_registros&pago=$pago' class='btn btn-success' > Habilitar </a></td>";

}else{echo "<td> <a href='procesoHabilitar.php?nom=$nom&id_registros=$id_registros&pago=$pago' class='btn btn-success disabled'> Habilitar </a></td>";}
    echo "</tr>";
    $numer++;
  }

}else{
  echo "<tr>";
  echo "<td colspan='4'>No Hay DELEGADOS</td>";
  echo "</tr>";
}
?>  

      
    </table>
  </div>
<!--FIN TABLA PARA MOSTRAR JUGADOR-->

</div> 

</form>
<!--FIN DE MOSTRAR DELEGADOS-->
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<!--------------------------->
<?php 
}else{
  echo "No eres Juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";
}
?>