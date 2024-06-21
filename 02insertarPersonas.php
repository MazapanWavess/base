<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario_escolar");

// Comprobar si la conexión es correcta
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener los datos del formulario
$nombre=$_POST['nombre'];
$cargo=$_POST['cargo'];
$departamento=$_POST['departamento'];

// Insertar datos en la base de datos
mysqli_query($conexion, "INSERT INTO personas(nombre_completo, cargo, departamento)
                                    VALUES ('$nombre', '$cargo', '$departamento')");

// Cerrar la conexión
mysqli_close($conexion);

// Redireccionar a la página principal de activos
header("Location: 02personas.php");
exit();
?>
