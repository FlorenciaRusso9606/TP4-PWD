<?php
include_once "../../Modelo/conector/BaseDatos.php";
include_once "../../Utils/funciones.php";
include_once "../../Modelo/Auto.php";
include_once "../../Control/AbmAuto.php";
include_once "../../Modelo/Persona.php";
include_once "../../configuracion.php";


$datos = data_submitted();
if (isset($datos['patente'])) {
    $patente = $datos['patente'];
    $abmAuto  = new AbmAuto();
$objAuto = $abmAuto->obtenerDatosAuto($patente);
$salida = "";
if ($objAuto !== null) {
    $duenio = $objAuto->getDuenio();
    $marca = $objAuto->getMarca();
    $modelo = $objAuto->getModelo();
    $salida .= "<table>
    <tr>
    <th>Patente</th>
    <th>Modelo</th>
    <th>Marca</th>
    </tr>
     <tr>
    <td>{$patente}</td>
    <td>{$modelo}</td>
    <td>{$marca}</td>
    </tr>
    ";
} else {
    $salida .= "<p>No se encontró ningún auto con la patente ingresada</p>";
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include_once("../Estructura/Navbar.php"); ?>


    <main class="container my-5">
        <?php
        echo "<table class='table'".$salida. "</table>";
        ?>
            <button class="btn btn-primary"><a href="../BuscarAuto.php" class="btn btn-primary"> Volver</a></button>
    </main>

    <!-- Footer -->

<?php include_once("../Estructura/Footer.php"); ?>
    

    <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>