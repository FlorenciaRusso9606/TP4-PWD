<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
    <title>Ver Autos</title>     
</head>
<body>
<?php 
    include_once("Estructura/Navbar.php");
?>

<main class="container my-5">
<h1 class='mb-3'>Lista Autos</h1>

    <?php
    // Incluye las clases de la capa de control
    include_once "../Modelo/conector/BaseDatos.php";
    include_once "../Control/AbmAuto.php";
    include_once "../Modelo/Auto.php";
    include_once "../Modelo/Persona.php";

    // Crea instancias de las clases de la capa de control
    $abmAuto = new AbmAuto();

    // Obtén la lista de autos desde la capa de control
    $arrayAutos = $abmAuto->obtenerTodosLosAutos();

    // Verifica si hay autos cargados
    if (count($arrayAutos) > 0) {
        $salida = "
       
        <table class='table'>
        <thead>
        <tr>
            <th>Patente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Dueño</th>
        </tr>
        </thead>";
        
        // Itera a través de la lista de autos y muestra los datos
        foreach ($arrayAutos as $auto) {
            $duenio =  $auto->getDuenio();
            $duenio->cargar();
            $salida.= "
            <tr>
                <td> {$auto->getPatente()} </td>
                <td> {$auto->getMarca()} </td>
                <td> {$auto->getModelo()} </td>
                <td> {$duenio->getNombre()}  {$duenio->getApellido()} </td>
            </tr>
            ";
        }
        
        $salida.= "</table>";
    } else {
        $salida = "<p>No hay autos cargados.</p>";
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