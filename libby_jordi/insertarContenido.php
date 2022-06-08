<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insertar contenido</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	
</body>
</html>
<?php

 $miconexion=mysqli_connect("ftp.byethost3.com", "b3_27437907","ClvrMstz1","b3_27437907_libbyandjordi");

 // $miconexion=mysqli_connect("localhost","root","","libby");

if (!$miconexion){

	echo "La conexión ha fallado" . mysqli_error();
	exit();
}

if($_FILES['imagen']['error']){
   
   switch($_FILES['imagen']['error']){

      case 1://error exceso de tamaño del archivo en php.ini

       echo "El tamaño del archivo excede lo permitido por el servidor";

       break;

       case 2: // Error tamaño del archivo marcado desde formulario

        echo "El tamaño del archivo excede de 2 MB";

         break;

        case 3: // corrupcion del archivo

         echo "El envio de archivo se interrumpió";

          break;

        case 4: // no hay fichero enviado

          echo "No se ha enviado ningún archivo";

          break;
   }


}else {

    echo "Entrada subida correctamente <br/>";

    if((isset($_FILES['imagen']['name']) &&  ($_FILES['imagen']['error']==UPLOAD_ERR_OK))){
          
          $destino_de_ruta="imagenes/";

          move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_de_ruta . $_FILES['imagen']['name']);

          echo "El archivo " . $_FILES['imagen']['name'] . "  Se ha copiado en el directorio de imágenes";
    
    }else {
       echo "El archivo no se ha podido copiar en el directorio de imágenes";


    }

}
$eltitulo    =$_POST['campo_titulo'];
$lafecha     =date("Y-m-d H:i:s");
$elcomentario=$_POST['area_comentarios'];
$laimagen    =$_FILES['imagen']['name'];


$miconsulta="INSERT INTO BLOG (Titulo, Fecha, Comentario,imagen) VALUES ('" .$eltitulo. "','" . $lafecha . "','" . $elcomentario . "','" . $laimagen . "')";

$resultado=mysqli_query($miconexion, $miconsulta);

/*hay que cerrar siempre la conexión por seguridad*/

mysqli_close ($miconexion);

echo "<br/> Se ha agregado el comentario con éxito.<br/><br/>";


?>
<a href="Formulario.php">Añadir nueva entrada</a>
<a href="mostrarblog.php">Ver blog</a>
</body>
</html>
