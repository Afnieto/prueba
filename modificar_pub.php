<?php
include "conexion.php";
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d G:i:s', time());
session_start();

$Id=$_POST['Id'];
$Mensaje=$_POST['Mensaje'];
$Fecha=$hoy;
$Archivo=$_POST['Archivo'];
$sql="UPDATE Publicacion SET Pu_pub='$Mensaje', Fe_pub='$Fecha', Ar_pub='$Archivo' WHERE Id_pub='$Id'";
mysql_query($sql,$conexion);
echo mysql_error();
header('Location: muro.php');

//El manejo de archivos no funciona pero ya esta listo para subir a plataforma
?>