<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario_escolar");

// Comprobar si la conexión es correcta
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener los datos del formulario
$descripcion=$_POST['descripcion'];
$edificio=$_POST['edificio'];
$piso=$_POST['piso'];

// Insertar datos en la base de datos
mysqli_query($conexion, "INSERT INTO ubicaciones(descripcion_ubicacion, edificio, piso)
                                    VALUES ('$descripcion', '$edificio', '$piso')");

// Cerrar la conexión
mysqli_close($conexion);

// Redireccionar a la página principal de activos
header("Location: 03ubicaciones.php");
exit();
?>
