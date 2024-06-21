<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Escolar</title>
    <link rel="stylesheet" href="inventario.css">
    <link rel="stylesheet" href="tablas.css">
    <link rel="stylesheet" href="modal.css">

</head>
<body>
    <header>
        <div class="container">
            <p class="logo">INVENTARIO ESCOLAR</p>
            <nav>
                <a href="01activos.php"> Activos </a>
                <a href="02personas.php"> Personas </a>
                <a href="03ubicaciones.php"> Ubicaciones </a>
            </nav>
        </div>
    </header>

    <section id="activos">
        <div class="container">
            <h2> PERSONAS </h2>
        </div>
    </section>

    <section id="activos-boton">
        <div class="container">
        <button class="boton-agregar" onclick="mostrarModalAgregar()"> AGREGAR ACTIVO </button>
        <div class="boton-grupo">
                <button class="boton-buscar" onclick="mostrarModalBuscar()"> BUSCAR </button>
                <button class="boton-eliminar" onclick="mostrarModalEliminar()"> ELIMINAR </button>
            </div>
        </div>
    </section>

    <section id="tabla_activos">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CARGO</th>
                        <th>DEPARTAMENTO</th>
                    </tr>
                </thead>
                <tbody id="tabla_body">
                    <?php include '02ConsultaPersonas.php'; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="atras-adelante">
        <!-- Botones de paginación -->
        <div class="container">
            <button onclick="paginar(false)" class="boton-atras">Anterior</button>
            <p id="num-paginas"></p>
            <button onclick="paginar(true)" class="boton-atras">Siguiente</button>
        </div>
    </section>

    <section id="descripcion_columnas">
    <div class="container">
        <h3>Acerca de los Datos:</h3>
        <ul>
            <li><strong>ID:</strong> Identificador único para cada persona en el sistema.</li>
            <li><strong>NOMBRE:</strong> Nombre completo de la persona.</li>
            <li><strong>CARGO:</strong> Cargo o posición que ocupa la persona en la escuela.</li>
            <li><strong>DEPARTAMENTO:</strong> Departamento al que pertenece la persona en la escuela, por ejemplo, administración, mantenimiento, docencia, etc.</li>
        </ul>
    </div>
    </section>

    <div id="modal-agregar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <?php include '02insertarPersonas.html'; ?>
        </div>
    </div>

    <div id="modal-eliminar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <?php include '02EliminarPersonas.html'; ?>
        </div>
    </div>    

    <div id="modal-buscar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <?php include '02BuscarPersonas.html'; ?>
        </div>
    </div>

    <script>
        var paginaActual = 1;
        var totalPaginas = <?php echo $totalPaginas; ?>; // Agregar la variable totalPaginas

        function paginar(siguiente) {
            if (siguiente) {
                paginaActual++;
            } else {
                paginaActual--;
            }

            if (paginaActual < 1) {
                paginaActual = 1;
            }

            if (paginaActual > totalPaginas) {
                paginaActual = totalPaginas;
            }
            // Actualizar la tabla con los nuevos datos
            fetch('02ConsultaPersonas.php?pagina=' + paginaActual)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('tabla_body').innerHTML = data;
                    document.getElementById('num-paginas').innerHTML = 'Página ' + paginaActual + ' de ' + totalPaginas;
                });
        }

        // Cargar datos al cargar la página
        paginar(false); // Carga la primera página al abrir la página


        function mostrarModalAgregar() {
            document.getElementById('modal-agregar').style.display = "block";
        }

        function mostrarModalEliminar() {
            document.getElementById('modal-eliminar').style.display = "block";
        }

        function mostrarModalBuscar() {
            document.getElementById('modal-buscar').style.display = "block";
        }

        function cerrarModal() {
            document.getElementById('modal-agregar').style.display = "none";
            document.getElementById('modal-eliminar').style.display = "none";
            document.getElementById('modal-buscar').style.display = "none";
        }

        function buscarActivos() {
            var campo = document.getElementById('campo').value;
            var valor = document.getElementById('valor').value;

            fetch('01buscaractivos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'campo=' + campo + '&valor=' + encodeURIComponent(valor),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('tabla_body_busqueda').innerHTML = data;
            });

            return false; // Para evitar que el formulario se envíe de la manera tradicional
        }

        // Cerrar el modal cuando se haga clic fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById('modal-agregar');
            var modalEliminar = document.getElementById('modal-eliminar');
            var modalBuscar = document.getElementById('modal-buscar'); 
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modalEliminar) {
                modalEliminar.style.display = "none";
            }
            if (event.target == modalBuscar) { 
                modalBuscar.style.display = "none";
            }
        }
    </script>
</body>
</html>
