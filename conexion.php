<?php
/*Datos de conexion a la base de datos*/
$db_host = "eduarmysql.mysql.database.azure.com";
$db_user = "eduar";
$db_pass = "Edwar20*";
$db_name = "optycolor";

//$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$mysqli = mysqli_init();
if (!$mysqli) {
  die("mysqli_init failed");
}

$mysqli -> ssl_set("key.pem", "cert.pem", "cacert.pem", NULL, NULL);

if (!$mysqli -> real_connect($db_host,$db_user,$db_pass,$db_name)) {
  die("Connect Error: " . mysqli_connect_error());
}

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>