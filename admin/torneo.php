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
<div class="container">
<div class="mt-2">
<?php
include("../conexion.php");

$buscar="SELECT * FROM torneo ORDER BY id_torneo DESC Limit 1";
$resultado=$link->query($buscar);
while ($row=$resultado->fetch_assoc()) {
$id_torneo  =$row['id_torneo'];
$nombreC    =$row['nombreC'];
$categoria  =$row['categoria'];
$fecha_ini  =$row['fecha_ini'];
$fecha_fin  =$row['fecha_fin'];
$f_inscrip  =$row['f_inscrip'];
$f_fin      =$row['f_fin'];
$f_preinsc  =$row['f_preinsc'];
$f_prefin   =$row['f_prefin'];
$descripT   =$row['descripT'];
}

$mostrar="SELECT * FROM torneo ";
$resultado=$link->query($mostrar);
if (mysqli_num_rows($resultado)>0) {
?>
 
  <a href="crearCampeonato.php" class="btn btn-success btn btn-danger disabled"> Crear Torneo</a>
<?php
}else{
?>
  <a href="crearCampeonato.php" class="btn btn-success "> Crear Torneo</a> 
<?php
}
?>
</div>
<form action="torneo_cambios.php" method="post" class="row g-3 mt-2 text-center p-2 my-2" style="box-shadow: #1c1c1c 2px 5px 10px;">


  <div class="col-md-12">
    <p class="titulo"> Plantilla del Torneo</p>
  </div>
<hr>
<?php 


    $rev = "SELECT * FROM torneo";
    $res1     = $link->query($rev);
        if(mysqli_num_rows($res1)>0){






?>
  <div class="col-md-2">
    <label for="validationServer01" class="letra form-label">Id Torneo</label>
    <input type="text" name="id_torneo" class="form-control" value="<?php echo $id_torneo;?>" readonly>
  </div>

  <div class="col-md-5">
    <label for="validationServer01" class="letra form-label">Nombre del Torneo</label>
    <input type="text" name="nombreC" class="form-control" value="<?php echo $nombreC;?>" >
  </div>

  <div class="col-md-5">
    <label for="validationServer01" class="letra form-label">Categoría</label>
    <select name="categoria" class="form-select" id="" required>
        <option value="<?php echo $categoria;?>"><?php echo "+".$categoria;?></option>
        <option value="30">+30</option>
        <option value="35">+35</option>
        <option value="40">+40</option>
        <option value="45">+45</option>
        <option value="50">+50</option>
        <option value="55">+55</option>
        <option value="60">+60</option>
      </select>
  </div> 
  
<script type="text/javascript">
  function changedInit(event){
    const fechaSeleccionada = new Date(event.target.value);
    const nuevaFecha        = new Date(fechaSeleccionada.setDate(fechaSeleccionada.getDate()+1)).toISOString().slice(0,10);
    const fin = document.getElementById("fin");
    fin.value = nuevaFecha;
  }

   function eventoFecha(event){
    const fechaSeleccionadA = new Date(event.target.value);
    const nuevaFechA        = new Date(fechaSeleccionadA.setDate(fechaSeleccionadA.getDate()+1)).toISOString().slice(0,10);
    const fiN = document.getElementById("fiN");
    fiN.value = nuevaFechA;
  }
</script>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Inicio Torneo</label>
    <input input type="date" name="fecha_ini" id="inicio" class="form-control"  onchange="changedInit(event)" required="" value="<?php echo $fecha_ini;?>">
  </div>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Final Torneo</label>
    <input type="date" name="fecha_fin" class="form-control" value="<?php echo $fecha_fin;?>">
  </div>
<?php
if($f_prefin >= $f_preinsc){
?>
<div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Inicio Pre-Inscripción</label>
    <input type="date" name="f_preinsc" id="fin" class="form-control" required="" readonly value="<?php echo $f_preinsc;?>">
  </div>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Final Pre-Inscripción</label>
    <input type="date" name="f_prefin" class="form-control" id="Inicio" onchange="eventoFecha(event)"required=""  value="<?php echo $f_prefin;?>">
  </div>

<?php

  }else{

?>
<div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Inicio Pre-Inscripción</label>
    <input type="date" name="f_preinsc" class="form-control" value="">
  </div>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Final Pre-Inscripción</label>
    <input type="date" name="f_prefin" class="form-control" value="">
  </div>

<?php 
}  
?>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Inicio Inscripción</label>
    <input type="date" name="f_inscrip" class="form-control" id="fiN" required="" readonly value="<?php echo $f_inscrip;?>">
  </div>

  <div class="col-md-3">
    <label for="validationServer01" class="letra form-label">Fecha Final Inscripción</label>
    <input type="date" name="f_fin" class="form-control" value="<?php echo $f_fin;?>">
  </div>

<div class="col-md-6">
    <label for="validationServer01" class="letra form-label">Descripción del Torneo</label>
    <textarea name="descripT" class="form-control" cols="30" rows="5"><?php echo $descripT;?></textarea>
</div>

<div class="col-md-12">
  <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>
</div>

<?php 
}else{echo"no existe Torneo";}
?>
 </form> 
  </div>


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