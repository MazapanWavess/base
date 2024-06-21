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
$tipos=$_POST['tipos'];
$marca=$_POST['marca'];
$serie=$_POST['serie'];
$fecha=$_POST['fecha'];
$costo=$_POST['costo'];
$estado=$_POST['estado'];
$ubicacion=$_POST['ubicacion'];

// Insertar datos en la base de datos
mysqli_query($conexion, "INSERT INTO activos(descripcion, tipo_activo, marca_modelo, numero_serie, fecha_adquisicion, costo_adquisicion, estado_actual, id_ubicacion) 
                                    VALUES ('$descripcion', '$tipos', '$marca', '$serie', '$fecha', '$costo', '$estado', '$ubicacion')");

// Cerrar la conexión
mysqli_close($conexion);

// Redireccionar a la página principal de activos
header("Location: 01activos.php");
exit();
?>
