<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
include("../conexion.php");
#
$id_registros       =$_GET['id_registros'];
$id_equipo          =$_GET['id_equipo'];
$nombreE            =$_GET['nombreE'];
$resultadoRobos     =$_GET['resultadoRobos'];
$faltasJugador      =$_GET['faltasJugador'];
$asistenciaJugador  =$_GET['asistenciaJugador'];
$puntoFinal         =$_GET['puntoFinal'];

  $revisar = "SELECT * FROM dat_admin WHERE id_registros='$id_registros' ";
  $res   = $link->query($revisar);
  while ($row=$res->fetch_assoc()) {
  $nom=$row['nom'];
  }

  $revisarT = "SELECT * FROM torneo ";
  $resT   = $link->query($revisarT);
  while ($ros=$resT->fetch_assoc()) {
  $id_torneo=$ros['id_torneo'];  
  $nombreC=$ros['nombreC'];
  $categoria=$ros['categoria'];
  $fechaInicioT=$ros['fecha_ini'];
  }

    //echo $fechaInicioT;

$revisarF = "SELECT * FROM resultadofinal ";
  $resF   = $link->query($revisarF);
  while ($roA=$resF->fetch_assoc()) {
  $id_final=$roA['id_final'];
}    
  
  //echo "id torneo: ".$id_torneo." Nombre Torneo: ".$nombreC." nombre Equipo: ".$nombreE;

  //echo "nombre Torneo: ".$nombreC;

    $Revisar = "SELECT * FROM torneofinalizado ";
    $Res1     = $link->query($Revisar);
        if(mysqli_num_rows($Res1)>=0){
        $insertar = "INSERT INTO torneofinalizado (id_torneo,nombreTorneo,nombreE,resultadoRobos,faltasJugador,asistenciaJugador,puntoFinal,categoria,nombreDelegado) VALUES ('$id_torneo','$nombreC','$nombreE','$resultadoRobos','$faltasJugador','$asistenciaJugador','$puntoFinal','$categoria','$nom') ";
              
              //echo $id_torneo." Nombre Torneo".$nombreC." Nombre Equipo".$nombreE." Resultado Robos:".$resultadoRobos." faltas Jugador".$faltasJugador." Asistencia Jugador".$asistenciaJugador." Punto Final".$puntoFinal." Categoria".$categoria." Nombre Delegado".$nom;
              
                  if($result1 = $link->query($insertar)){

                    $borrarAdmin = "DELETE FROM dat_admin WHERE  cargo ='1' ";
                    $borrarAdmin2 = "DELETE FROM dat_admin WHERE cargo ='2' ";
                    $borrarEquipo = "TRUNCATE TABLE equipo";
                    $borrarJugador = "TRUNCATE TABLE jugador";
                    $borrarJugadores = "TRUNCATE TABLE jugadores";
                    $borrarMesa = "TRUNCATE TABLE mesa";
                    $borrarPartidos = "TRUNCATE TABLE partidos";
                    $borrarRegistros = "TRUNCATE TABLE registros";
                    $borrarResultadoFinal = "TRUNCATE TABLE resultadofinal";
                    $borrarTorneo = "TRUNCATE TABLE torneo";
        if(  $resultadoBorrarAdmin          = $link->query($borrarAdmin) && $resultadoBorrarAdmin2= $link->query($borrarAdmin2) && $resultadoBorrarEquipo         = $link->query($borrarEquipo) && $resultadoBorrarJugador = $link->query($borrarJugador)&& $resultadoBorrarJugadores      = $link->query($borrarJugadores)&& $resultadoBorrarMesa = $link->query($borrarMesa)&& $resultadoBorrarPartidos       = $link->query($borrarPartidos)&& $resultadoBorrarRegistros = $link->query($borrarRegistros)&& $resultadoBorrarResultadoFinal = $link->query($borrarResultadoFinal)&& $resultadoBorrarTorneo= $link->query($borrarTorneo) )
        {
                        echo "Exito al borrar" ; 
                }
                    echo "Torneo Finalizado correctamente ";
                    echo "<a href='historialTorneo.php'> Ir </a>" ;
                    

                  }else{echo "Error al terminar el torneo";}
    }
        

#
}else{
  echo "No eres juez de mesa y no puede estar en esta PAGINA";
  echo "<a href='../index.php'> << REGRESAR </a>";}

?>