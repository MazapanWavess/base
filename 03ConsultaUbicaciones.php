<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario_escolar");

// Comprobar si la conexión es correcta
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Número de resultados por página
$resultadosPorPagina = 10;

// Página actual (por defecto 1)
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el offset
$offset = ($pagina - 1) * $resultadosPorPagina;

// Consulta para contar el número total de registros
$totalResult = mysqli_query($conexion, "SELECT COUNT(*) as total FROM ubicaciones");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRegistros = $totalRow['total'];

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $resultadosPorPagina);

// Consulta para obtener los activos paginados
$result = mysqli_query($conexion, "SELECT * FROM ubicaciones LIMIT $resultadosPorPagina OFFSET $offset");

// Generar las filas de la tabla
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_ubicacion'] . "</td>";
        echo "<td>" . $row['descripcion_ubicacion'] . "</td>";
        echo "<td>" . $row['edificio'] . "</td>";
        echo "<td>" . $row['piso'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No se encontraron registros.</td></tr>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
