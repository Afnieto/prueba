<html>
<head>
<script type="text/javascript">
function activar(parametro){
	document.getElementById(parametro).disabled = false;
	document.getElementById(parametro+1).disabled = false;
	document.getElementById(parametro+2).disabled = false;
}
</script>
</head>
<?php
include "conexion.php";
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d G:i:s ', time());
session_start();
$_SESSION['name']="Edward";
?>
//Tabla para publicacion nueva
<form action="enviar_pub.php" method="POST">
<table>
<input type="textarea" name="Mensaje" value="Ingrese su mensaje">
<br>
<input type="text" name="Fecha" value="<?php print_r($hoy);?>" readonly="readonly">
<input type="text" name="Autor" value="<?php print $_SESSION['name']; ?>" readonly="readonly">
<input type="file" name="Archivo" />
<input type="submit" name="Enviar" value="Publicar">
</table>
</form>
//Tabla para muestra de todas las publicaciones
<?php
$sql="SELECT Id_pub,Pu_pub,Fe_pub,Nom_usu FROM Publicacion join Usuario ON usu_pub=Id_usu ORDER BY Fe_pub DESC LIMIT 100";
$result= mysql_query($sql,$conexion);
echo mysql_error();
while ($row = mysql_fetch_row($result)){
	?>
		<form action="modificar_pub.php" method="POST">
		<input type="hidden" name="Id" value="<?php echo $row[0]; ?>">
		<table>
		<input type="textarea" id="<?php echo $row[0]*100; ?>" name="Mensaje" disabled="disabled" value="<?php echo $row[1]; ?>"  >
		<br>
		<input type="text" name="Fecha" readonly="readonly" value="<?php echo $row[2]; ?>">
		<input type="text" name="Autor" readonly="readonly" value="<?php  echo $row[3] ?>">
		<input type="file" id="<?php echo $row[0]*100+1; ?>" name="Archivo" />
		<?php
			if ($row[3] == $_SESSION['name'] ){
				?>
				<input type="button" name="Modificar" onClick="activar(<?php echo $row[0]*100; ?>)" value="Modificar">
				<input type="submit" name="Eliminar" value="Eliminar" onclick=this.form.action="eliminar_pub.php">
			<?php } ?>
		<input type="submit" id="<?php echo $row[0]*100+2; ?>" name="Enviar" disabled="disabled" value="Publicar">
		</table>	
		</form>
<?php } ?>
</html>
