<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='2') {

include("../conexion.php");
#

$id_partidos  =$_GET['id_partidos'];

$id_equipoA   =$_GET['id_equipoA'];
$nombreEA     =$_GET['nombreEA'];

$id_equipoB   =$_GET['id_equipoB'];
$nombreEB     =$_GET['nombreEz'];

//echo $id_partidos.$id_equipoA.$id_equipoB;    

$capturarA = "SELECT * FROM resultadofinal WHERE id_partidos = '$id_partidos' AND id_equipo='$id_equipoA'";
$resultadoE     = $link->query($capturarA);
    while ($row=$resultadoE->fetch_assoc()) {

          $id_partido   = $row['id_partidos'];
          $nombreEquipoA      = $row['nombreE'];
          $totalTiroA    = $row['puntoFinal'];
}

$capturarB = "SELECT * FROM resultadofinal WHERE id_partidos = '$id_partidos' AND id_equipo='$id_equipoB'";
$resultadoB     = $link->query($capturarB);
    while ($row=$resultadoB->fetch_assoc()) {

          $id_partido   = $row['id_partidos'];
          $id_equipo    = $row['id_equipo'];
          $nombreEquipoB      = $row['nombreE'];
          $totalTiroB    = $row['puntoFinal'];
}

//echo $totalTiroA."A";
//echo $totalTiroB."B";

if($totalTiroA > $totalTiroB){
    //Si el equipo A es el ganador tendrá 3 puntos y se le restara al equipo B 3 puntos
    $ganadorA = +3;
    $perdedorB = -3;
    $partidoCurso = +1;
    //echo $ganadorA."gane A";
    $GanadorA = "UPDATE resultadofinal set partidoG = '$ganadorA' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";

 $pjA= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";
    
    $pjB= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";

    
    $PerdedorB = "UPDATE resultadofinal set partidoP = '$perdedorB' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";
            if($resultado = $link->query($GanadorA) && $resultadoP = $link->query($PerdedorB) && $resultadoPJB = $link->query($pjA) && $resultadoPJA = $link->query($pjB)){
            echo "Insertado correctamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
            }else{echo "Error Ganador A y perdedor B";}

}else{ if($totalTiroB > $totalTiroA){
    //Si el equipo B es el ganador tendrá 3 puntos y se le restara al equipo A 3 puntos
    $ganadorB = 3;
    $perdedorA = -3;
    $partidoCurso = +1;
    //echo $ganadorB."gane B";
    
    $GanadorB = "UPDATE resultadofinal set partidoG = '$ganadorB' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";

    $pjA= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";
    
    $pjB= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";
    
    $PerdedorA = "UPDATE resultadofinal set partidoP = '$perdedorA' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";
            if($resultado = $link->query($GanadorB) && $resultadoP = $link->query($PerdedorA) && $resultadoPJ = $link->query($pjB)&& $resultadoPJA = $link->query($pjA)){
            echo "Insertado correctamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
            }else{echo "Error Ganador B y perdedor A";}
    
}else{ if($totalTiroB == $totalTiroA){
    $empateB = +1;
    $empateA = +1;
    $partidoCurso = +1;
    //echo $ganadorB."gane B";
    
    $pjA= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";
    
    $pjB= "UPDATE resultadofinal set partidoJ = '$partidoCurso' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";

    
    $GanadorB = "UPDATE resultadofinal set partidoG = '$empateB' WHERE id_equipo = '$id_equipoB' AND id_partidos='$id_partidos' ";
    
    $PerdedorA = "UPDATE resultadofinal set partidoP = '$empateA' WHERE id_equipo = '$id_equipoA' AND id_partidos='$id_partidos' ";
            if($resultado = $link->query($GanadorB) && $resultadoP = $link->query($PerdedorA) && $resultadoPJ = $link->query($pjB)&& $resultadoPJA = $link->query($pjA)){
            echo "Insertado correctamente";
            echo "<a href='javascript:window.history.go(-1)'> << REGRESAR </a>";
            }else{echo "Error Ganador B y perdedor A";}
    }
}
    
}//else fin

}else{
  echo "No eres juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}

?>


