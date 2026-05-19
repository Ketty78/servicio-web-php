<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Servicio Web PHP
    </title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="contenedor">

    <!-- PANEL IZQUIERDO -->

    <div class="panel">

        <h1>
            Sistema Web
        </h1>

        <p>
            Registro e inicio de sesión
            
        </p>

    </div>

    <!-- PANEL DERECHO -->

    <div class="formulario">

        <!-- REGISTRO -->

        <div class="card">

            <h2>
                Registro
            </h2>

            <form action="registro.php" method="POST">

                <input
                type="text"
                name="nombre"
                placeholder="Nombre completo">

                <input
                type="email"
                name="email"
                placeholder="Correo electrónico">

                <input
                type="text"
                name="direccion"
                placeholder="Dirección">

                <input
                type="text"
                name="telefono"
                placeholder="Teléfono">

                <input
                type="password"
                name="password"
                placeholder="Contraseña">

                <button type="submit">
                    Registrarse
                </button>

            </form>

        </div>

        <!-- LOGIN -->

        <div class="card">

            <h2>
                Iniciar Sesión
            </h2>

            <form action="login.php" method="POST">

                <input
                type="email"
                name="email"
                placeholder="Correo electrónico">

                <input
                type="password"
                name="password"
                placeholder="Contraseña">

                <button type="submit">
                    Ingresar
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>