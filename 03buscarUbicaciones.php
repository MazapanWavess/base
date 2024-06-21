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

    $query = "SELECT * FROM ubicaciones WHERE $campo LIKE '%$valor%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . (isset($row['id_ubicacion']) ? $row['id_ubicacion'] : '') . "</td>";
            echo "<td>" . (isset($row['descripcion_ubicacion']) ? $row['descripcion_ubicacion'] : '') . "</td>";
            echo "<td>" . (isset($row['edificio']) ? $row['edificio'] : '') . "</td>";
            echo "<td>" . (isset($row['piso']) ? $row['piso'] : '') . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
    }
}

$conn->close();
?>
