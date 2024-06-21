<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'inventario_escolar';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    $query = "SELECT * FROM activos WHERE $campo LIKE '%$valor%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . (isset($row['id_activo']) ? $row['id_activo'] : '') . "</td>";
            echo "<td>" . (isset($row['descripcion']) ? $row['descripcion'] : '') . "</td>";
            echo "<td>" . (isset($row['tipo_activo']) ? $row['tipo_activo'] : '') . "</td>";
            echo "<td>" . (isset($row['marca_modelo']) ? $row['marca_modelo'] : '') . "</td>";
            echo "<td>" . (isset($row['numero_serie']) ? $row['numero_serie'] : '') . "</td>";
            echo "<td>" . (isset($row['fecha_adquisicion']) ? $row['fecha_adquisicion'] : '') . "</td>";
            echo "<td>" . (isset($row['costo_adquisicion']) ? $row['costo_adquisicion'] : '') . "</td>";
            echo "<td>" . (isset($row['estado_actual']) ? $row['estado_actual'] : '') . "</td>";
            echo "<td>" . (isset($row['id_ubicacion']) ? $row['id_ubicacion'] : '') . "</td>";
            echo "<td>" . (isset($row['id_persona']) ? $row['id_persona'] : '') . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
    }
}

$conn->close();
?>
