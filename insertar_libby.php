<?php
require "conexion_libby.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>	Insertar datos Libby&Jordi</title>
	<style>
		
		.div {font-size: 3em;
			  color:lightblue;
			  background-color: #123456;
			  width:100%;
			  text-align: center;}
		a {font-size: 2em;
		   color:green;
		   width:100%;
		   margin-left:450px;}	  
	</style>
</head>
<body>
	
	<div id="tabla">

	<?php
	    if(isset($_POST['nombre']))
		if(isset($_POST['email']))   
	    if(isset($_POST['comentarios'])){
	     $nombre= $_POST['nombre'];
	     $email = $_POST['email'];
		 $comentarios = $_POST['comentarios'];

			
		$sql="INSERT INTO datos (nombre, email, comentarios) VALUES ('$nombre','$email', '$comentarios')";


		if($conexion -> query($sql)===true){
			    
			     echo "<div class='div'> datos enviados correctamente</div>";
				 echo "<div class='div'> Inserción de:  $comentarios </div>"; 
				 echo "<div class='div'> Gracias por tu aportación</div>";
				 echo "<a href=index.html>Volver a página principal</a>";

			}else{
		die("Error al insertar datos" .$conexion -> error);}
	
	$conexion -> close();
	}
	?>	
	</div>	
</body>
</html>