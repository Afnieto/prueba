<?php
$conexion = mysql_connect("localhost","root","");
	if (!$conexion) {
		die("no e podido conectar ".mysql_error());
	}
mysql_select_db("swii",$conexion);
?>