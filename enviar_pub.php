<?php
include "conexion.php";
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d G:i:s', time());
session_start();
$Mensaje=$_POST['Mensaje'];
$Fecha=$_POST['Fecha'];
$Archivo=$_POST['Archivo'];
$Autor=$_POST['Autor'];
$sql="SELECT Id_usu FROM Usuario WHERE nom_usu='$Autor' ";
$result= mysql_query($sql,$conexion);
echo mysql_error();
while ($row = mysql_fetch_row($result)){
	$Autor=$row[0];
}
$sql="INSERT INTO Publicacion(Pu_pub,Fe_pub,Ar_pub,Usu_pub) VALUES ('$Mensaje','$Fecha','$Archivo','$Autor')";
mysql_query($sql,$conexion);
echo mysql_error();
header('Location: muro.php');

//El manejo de archivos no funciona pero ya esta listo para subir a plataforma
?>