<?php


include("conexion.php");

// VARIABLES
$mensaje = "";
$tipo = "";

// VALIDAR ENVÍO
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // RECIBIR DATOS
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // VALIDAR CAMPOS
    if(empty($email) || empty($password)){

        $mensaje = "Todos los campos son obligatorios";
        $tipo = "error";

    }else{

        // BUSCAR USUARIO
        $sql = "SELECT * FROM usuarios
        WHERE email='$email'";

        $resultado = mysqli_query($conexion, $sql);

        // VALIDAR EXISTENCIA
        if(mysqli_num_rows($resultado) > 0){

            // OBTENER DATOS
            $fila = mysqli_fetch_assoc($resultado);

            // VALIDAR PASSWORD
            if($password == $fila['password']){

                $mensaje = "Autenticación satisfactoria. Bienvenido " . $fila['nombre'];

                $tipo = "success";

            }else{

                $mensaje = "Contraseña incorrecta";
                $tipo = "error";
            }

        }else{

            $mensaje = "Usuario no encontrado";
            $tipo = "error";
        }
    }

}else{

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Resultado Login
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="respuesta-container">

    <div class="respuesta-card <?php echo $tipo; ?>">

        <h1>
            Resultado del Login
        </h1>

        <p>
            <?php echo $mensaje; ?>
        </p>

        <a href="index.php">
            Volver al sistema
        </a>

    </div>

</div>

</body>
</html>


