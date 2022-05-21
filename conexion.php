<?php
/*Datos de conexion a la base de datos*/
$db_host = "51.81.90.175";
$db_user = "poliedro_app";
$db_pass = "1091658551edwar20";
$db_name = "poliedro_optycolor";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}

?>