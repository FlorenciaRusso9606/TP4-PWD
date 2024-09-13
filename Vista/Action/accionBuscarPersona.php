<?php
include_once "../../Modelo/conector/BaseDatos.php";
include_once "../../Utils/funciones.php";
include_once "../../Modelo/Persona.php";
include_once "../../Control/AbmPersona.php";
include_once "../../configuracion.php";

$datos = data_submitted();
if (isset($datos['nroDni'])) {
    $nroDni = $datos['nroDni'];
    $abmPersona = new AbmPersona();
    $objPersona = $abmPersona->encontrarPersona($nroDni);
} else {
    $objPersona = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Datos Persona</title>
</head>
<body>
    
     <?php include_once("../Estructura/Navbar.php"); ?>


     <main class="container my-5">
     <?php
    if ($objPersona !== null) {
        $salida = '
        <form action="ActualizarDatosPersona.php" method="post">
            <input type="number" name="nroDni" id="nroDni" value="' . $objPersona->getNroDni() . '" >
            <input type="text" name="nombre" id="nombre" value="' .$objPersona->getNombre() . '">
            <input type="text" name="apellido" id="apellido" value="' . $objPersona->getApellido() . '">
            <input type="date" name="fechaNac" id="fechaNac" value="' . $objPersona->getFechaNac() . '">
            <input type="number" name="telefono" id="telefono" value="' . $objPersona->getTelefono() . '">
            <input type="text" name="direccion" id="direccion" value="' . $objPersona->getDomicilio() . '">
            <input type="submit" value="Cambiar Datos Persona">
        </form>
        ';
        echo $salida;
    } else {
        echo "<p>No se encontró ninguna persona con el DNI proporcionado.</p>";
    }
    ?>
    </main>
    <button class="btn btn-primary"><a href="../BuscarPersona.php" class="btn btn-primary"> Volver</a></button>
    <?php include_once("../Estructura/Footer.php"); ?>
</body>
</html>
