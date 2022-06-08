<?php

$server		="ftp.byethost3.com";
$userAdmin	="b3_27437907";
$password	="ClvrMstz1";
$dbDb		="b3_27437907_libbyandjordi";

/*conexion local

$server		="localhost";
$userAdmin	="root";
$password	="";
$dbDb		="libby";*/





$conexion = new mysqli($server, $userAdmin, $password, $dbDb);

if ($conexion -> connect_errno) {
   die("ERRRORUM!!! conexión fallida: ".$conexion -> connect_error);
   exit;
}
 echo "Funciona!!!";