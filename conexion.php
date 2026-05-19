<?php
  $conexion = mysqli_connect("localhost","root","","tienda_virtual","3307");

  if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}


?>