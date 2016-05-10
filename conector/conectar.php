<?php
function conectar($bbdd){
	$conexion=mysqli_connect('localhost','root') or die('No podemos conectar'. mysqli_error());
	mysqli_select_db($conexion,$bbdd) or die('problemas con la bbdd');
	return $conexion;
}
?>