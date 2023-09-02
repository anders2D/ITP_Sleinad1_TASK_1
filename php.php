<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mi Página PHP</title>
</head>
<body>
    <header>
        <h1>Bienvenido a Mi Página PHP</h1>
    </header>
    
    <main>
        <?php
        // Conexión a la base de datos MySQL
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basededatos");

        // Verificar la conexión
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta SQL
        $sql = "SELECT nombre, email FROM usuarios";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Usuarios Registrados</h2>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>Nombre: " . $row["nombre"] . " - Email: " . $row["email"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay usuarios registrados.";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
        ?>
    </main>
    
    <footer>
        <p>Derechos de autor © 2023 Mi Página PHP</p>
    </footer>
</body>
</html>