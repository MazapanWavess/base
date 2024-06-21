<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario_escolar");

// Comprobar si la conexión es correcta
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_ubicacion'];

    // Comprobar si el ID del activo no está vacío
    if (!empty($id)) {
        // Preparar la consulta de eliminación
        $query = "DELETE FROM ubicaciones WHERE id_ubicacion = ?";
        
        // Preparar la declaración
        if ($stmt = mysqli_prepare($conexion, $query)) {
            // Vincular el parámetro
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Ejecutar la declaración
            if (mysqli_stmt_execute($stmt)) {
                header("Location: 01activos.php");
                exit();
            } else {
                echo "Error al eliminar el activo: " . mysqli_stmt_error($stmt);
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
    } else {
        echo "El ID del activo no puede estar vacío.";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
