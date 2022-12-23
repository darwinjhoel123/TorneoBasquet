<?php 
#-*CONEXION PARA LA BASE DE DATOS XAMPP*-
$servername = "localhost";
$database = "id19827256_maxibasquet";
$username = "id19827256_administrador_2022";
$password = "Orellanamejia123_";
// Create connection
$link = new mysqli($servername,$username,$password,$database) or die("Error ".mysql_error($link));
?>