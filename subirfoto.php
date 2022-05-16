<?php 
header("Location: index.php");
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

if (!empty($nombreImg) && ($_FILES['imagen']['size'] <= 200000)) 
{
 
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/img/';
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}

?>