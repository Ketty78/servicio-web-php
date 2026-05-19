<?php


// RESPUESTA JSON
header("Content-Type: application/json");

// CONEXIÓN
include("conexion.php");

// VALIDAR MÉTODO POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // RECIBIR DATOS
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);

    
    if(
        empty($nombre) ||
        empty($email) ||
        empty($direccion) ||
        empty($telefono) ||
        empty($password)
    ){

        echo json_encode([
            "mensaje" => "Todos los campos son obligatorios"
        ]);

        exit();
    }

    

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        echo json_encode([
            "mensaje" => "Correo electrónico inválido"
        ]);

        exit();
    }

    

    $verificar = "SELECT * FROM usuarios
    WHERE email='$email'";

    $resultado_verificar = mysqli_query(
        $conexion,
        $verificar
    );

    if(mysqli_num_rows($resultado_verificar) > 0){

        echo json_encode([
            "mensaje" => "El usuario ya existe"
        ]);

        exit();
    }

    

    $password_segura = $password;

   

    $sql = "INSERT INTO usuarios
    (
        nombre,
        email,
        direccion,
        telefono,
        password
    )

    VALUES
    (
        '$nombre',
        '$email',
        '$direccion',
        '$telefono',
        '$password_segura'
    )";

    $resultado = mysqli_query(
        $conexion,
        $sql
    );

    

    if($resultado){

        echo json_encode([
            "mensaje" => "Usuario registrado correctamente"
        ]);

    }else{

        echo json_encode([
            "mensaje" => "Error al registrar usuario"
        ]);
    }

}else{

    echo json_encode([
        "mensaje" => "Acceso no permitido"
    ]);
}

?>