<?php
// Mostrar todos los errores (útil para depuración)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir archivo de conexión a la base de datos
include("conexion.php");

// Verificar que la solicitud sea POST y que el botón de registro haya sido presionado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrarse'])) {
    // Imprimir datos POST para depuración
    print_r($_POST);

    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    if (empty($nombre) || empty($apellido) || empty($edad) || empty($correo) || empty($direccion) || empty($telefono)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    $query = "INSERT INTO personas (nombre, apellido, edad, correo, direccion, telefono) VALUES ('$nombre', '$apellido', '$edad', '$correo', '$direccion', '$telefono')";

   
    if (mysqli_query($conn, $query)) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error en la consulta: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "No se ha recibido el formulario.";
}
?>
