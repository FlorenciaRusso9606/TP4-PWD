<?php

include_once "../../Utils/funciones.php";
include_once "../../Modelo/Persona.php";
include_once "../../Control/AbmPersona.php";
include_once "../../Modelo/Auto.php";
include_once "../../Control/AbmAuto.php";
include_once "../../configuracion.php";


$datos = data_submitted();
if (isset($datos)) {
    $abmPersona = new AbmPersona();
    $mensaje = "";
    $objPersona = $abmPersona->encontrarPersona($datos['nroDni']);
    if ($objPersona == null) {
        $mensaje .= "La Persona con el DNI {$datos['nroDni']} no está cargada. Para ingresar a la persona por favor diríjase a " . "../NuevaPersona.php";
    } else {
        $abmAuto = new AbmAuto();

        $salida = $abmAuto->cargarAuto($datos['patente'], $datos['marca'], $datos['modelo'], $datos['nroDni']);
        if ($salida) {
            $mensaje .= "Auto registrado con éxito.";
        } else {
            $mensaje .= "El auto ya está registrado.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php include_once("../Estructura/Navbar.php"); ?>


<main class="container my-5">
    <?php echo "<p>$mensaje</p>"; ?>
    
    <button class="btn btn-primary"><a href="../NuevoAuto.php" class="btn btn-primary"> Volver</a></button>
    </main>
    <?php include_once("../Estructura/Footer.php"); ?>
</body>

</html>