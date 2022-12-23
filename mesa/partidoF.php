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
<?php
  include ("../conexion.php");
            
?> 
    <!--Categoria-->

 <div class="container">
 <div class="row d-flex justify-content-center bg-light p-2">

      <div class="text-center">
        <h2>PARTIDO FINALIZADO</h2>
      </div>
      <hr>
<div class="col-md-6">
  <form action="estadistica.php" method="get" class="row g-3 ">
  <label for="inputPassword4" class="form-label">Seleccione Equipo:
     </label>
    <select name="id_equipoA" class="form-control"> 
<!--DENTRO DEL COL-MD-6-->  
            <?php 
            
            $mostrar ="SELECT * FROM equipo";
            $resultado=$link->query($mostrar);
        if (mysqli_num_rows($resultado)>0){
            $ver="SELECT * FROM equipo ORDER BY id_equipo ASC ";
            $result=$link->query($ver);
            while ($row=$result->fetch_array()) {
              $id_equipo  =$row['id_equipo'];
              $nombreE  =$row['nombreE'];
              $id_jugadas =$row['id_jugadas'];
            echo "<option value='".$id_equipo."'>".$nombreE."</option>";
            }    
          }else{
              echo "no hay equipos";
            }
            ?>
            </select>
<!---->
</form>
</div>
<div class="col-md-6" style="border-color: #1c1c1c;border-width: 1px;border-left-style: dotted;">
  <form action="estadistica.php" method="get" class="row g-3 ">
  <label for="inputPassword4" class="form-label">Seleccione Equipo:
     </label>
    <select name="id_equipoB" class="form-control"> 
<!--DENTRO DEL COL-MD-6-->  
            <?php 
            
            $mostrar ="SELECT * FROM equipo";
            $resultado=$link->query($mostrar);
        if (mysqli_num_rows($resultado)>0){
            $ver="SELECT * FROM equipo ORDER BY id_equipo ASC ";
            $result=$link->query($ver);
            while ($row=$result->fetch_array()) {
              $id_equipo  =$row['id_equipo'];
              $nombreE  =$row['nombreE'];
              $id_jugadas =$row['id_jugadas'];
            echo "<option value='".$id_equipo."'>".$nombreE."</option>";
            }
  
            
          }else{
              echo "no hay equipos";
            }
            ?>
            </select>
</form>
</div>

<!--cerramos el primer formulario-->
  <div class="col-12 text-center mt-3">
 <!-- Button trigger modal -->
<button type="submit" href="partidoFinalizado.php" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  INGRESAR PARA EL REGISTRO DE LOS PUNTAJES
</button>
<!-- Modal -->
  </div>
</div>

    <!--Lista Fin-->
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