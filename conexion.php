<?php
/*Datos de conexion a la base de datos*/
$db_host = "eduarmysql.mysql.database.azure.com";
$db_user = "eduar";
$db_pass = "Edwar20*";
$db_name = "optycolor";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>