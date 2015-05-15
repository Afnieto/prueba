<?php
include "conexion.php";
session_start();
$Id=$_POST['Id'];
$sql="DELETE FROM Publicacion WHERE Id_pub='$Id' ";
mysql_query($sql,$conexion);
echo mysql_error();
header('Location: muro.php');


//En este momento se considera a todos los usuarios como administradores ya que no se a puesto el condicional para esto
?>

