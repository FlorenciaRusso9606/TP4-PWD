<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Lista de Personas</title>
</head>

<body>
    <!-- Navbar -->
    <?php
    include_once("Estructura/Navbar.php");
    ?>

    <main class="container my-5">
    <h1 class='mb-3'>Listar Personas</h1>
        <?php
        include_once "../Modelo/conector/BaseDatos.php";
        include_once "../Modelo/Persona.php";
        include_once "../Control/AbmPersona.php";


        // Crea instancias de las clases de la capa de control
        $abmPersona = new AbmPersona();

        // Obtén la lista de personas desde la capa de control
        $arrayPersonas = $abmPersona->obtenerTodasLasPersonas();

        // Verifica si hay personas cargadas
        if (count($arrayPersonas) > 0) {
            $salida = "
        
        <table class='table'>
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Domicilio</th>th>DNI</th>
                <
            </tr>
        </thead>
        <tbody>";

            // Itera a través de la lista de personas y muestra los datos
            foreach ($arrayPersonas as $persona) {
                $salida .= "
            <tr>
                <td> {$persona->getNroDni()} </td>
                <td> {$persona->getApellido()} </td>
                <td> {$persona->getNombre()} </td>
                <td> {$persona->getFechaNac()} </td>
                <td> {$persona->getTelefono()} </td>
                <td> {$persona->getDomicilio()} </td>
            </tr>";
            }
            $salida .= "</tbody></table>";
        } else {
            $salida = "<p>No hay personas cargadas.</p>";
        }

        echo $salida;
        ?>
    </main>

    <?php
    include_once("Estructura/Footer.php");
    ?>
    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>