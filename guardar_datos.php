<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "juan"; // Cambiar por tu nombre de usuario de MySQL
$password = "]WHtpmyxTpJ@(nW9"; // Cambiar por tu contraseña de MySQL
$dbname = "forms de registro"; // Cambiar por el nombre de tu base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Obtener los datos del formulario desde el cuerpo de la solicitud HTTP
$data = json_decode(file_get_contents('php://input'), true);

// Obtener los datos del formulario
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$email = $data['email'];
$password = $data['password'];
$fnac = $data['fnac'];
$numtel = $data['numtel'];
$lnac = $data['lnac'];
$genero = $data['genero'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO usuario (nombre, apellido, email, password, fnac, numtel, lnac, genero)
        VALUES ('$nombre', '$apellido', '$email', '$password', '$fnac', '$numtel', '$lnac', '$genero')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente en la base de datos.";
} else {
    echo "Error al guardar los datos en la base de datos: " . $conn->error;
}

// Cerrar conexión a la base de datos

// https://enchanting-rolypoly-632443.netlify.app/
$conn->close();
?>