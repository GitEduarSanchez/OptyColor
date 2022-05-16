<?php
function insertar($tabla,$datos)
{
   $campos=array_keys($datos);
   $sql="call sp_insert_".$tabla."('".implode($datos)."')";
   
   return $sql;
}


?>

 
<script>
        var contArchivos = 1;

function anadirArchivo() { 
       //Sumamos a la variable el número de archivos.
       contArchivos=contArchivos+1;
       
       //Agregamos el componente de tipo input
       var div = document.createElement("div");
       var input = document.createElement("input");
       var a = document.createElement("a");
       
       
       //Añadimos los atributos de div
       div.id ='archivo'+contArchivos;
       div.class='col-md-8';
       
       
       //Añadimos los atributos de input
       input.type = 'file';
       input.name = 'miarchivo[]';
       
       //Añadimos los atributos del enlace a eliminar
        a.href = "#";
        a.id = 'archivo'+contArchivos;
        a.onclick = function() {
            borrarArchivo(a.id);
        }
        a.text ="X Eliminar archivo";
       
       //Agreamos el input y enlace en el div
       document.getElementById("archivos").appendChild(div);	
       document.getElementById(a.id).appendChild(input);		  
       document.getElementById(a.id).appendChild(a);	
}

function borrarArchivo(id){
    //Restamos el número de archivos
    contArchivos=contArchivos-1;
    
    var archivo = document.getElementById(id);	
    // Si existe el campo a eliminar...
    if (archivo){
        divPadre = archivo.parentNode;
        divPadre.removeChild(archivo);
    }
}


</script>