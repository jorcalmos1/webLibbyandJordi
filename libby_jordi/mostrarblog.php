<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mostrar blog</title>
    <style> 
    .blog {width:100%;background: lightyellow; border:2px,solid,#666;}
    </style>
</head>
<body>

    <a href="Formulario.php"><h2 style="color:green;">Entrada de contenido</h2></a>

<?php  $miconexion=mysqli_connect("ftp.byethost3.com", "b3_27437907","ClvrMstz1","b3_27437907_libbyandjordi");

   // $miconexion=mysqli_connect("localhost","root","","libby");


    if (!$miconexion){

	  echo "La conexión ha fallado" . mysqli_error();
	exit();
}

$miconsulta="SELECT * FROM BLOG ORDER BY FECHA DESC";

if($resultado=mysqli_query($miconexion,$miconsulta)){

       while($registro=mysqli_fetch_assoc($resultado)){?>
        <div class="blog"> 
   <?php
        echo "<h3>" . $registro['Titulo'] . "</h3>";
        echo "<h4>" . $registro['Fecha'] . "</h4>";
        echo "<div style='width:400px' border-radius='20px'>" . $registro['Comentario'] . " </div><br/><br/>";?>
         </div>
   <?php
        if($registro['imagen']!=""){
        	echo "<img src='imagenes/" . $registro ['imagen'] . "' width='50%' style='border-radius:20px';/>" ;
        }
        
            echo "<hr/>";


       }


}

?>	
	
</body>
</html>