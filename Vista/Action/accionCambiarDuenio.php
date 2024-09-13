<?php

include_once "../../Utils/funciones.php";
include_once "../../Modelo/Persona.php";
include_once "../../Modelo/Auto.php";
include_once "../../Control/AbmPersona.php";
include_once "../../Control/AbmAuto.php";
include_once "../../configuracion.php";

$datos = data_submitted();
$mensaje = ""; 
if (isset($datos['patente']) && isset($datos['nroDni'])) {
    $abmPersona = new AbmPersona();
    $abmAuto = new AbmAuto();
    $objPersona = $abmPersona->encontrarPersona($datos['nroDni']);
    $objAuto = $abmAuto->obtenerDatosAuto($datos['patente']);
    if ($objPersona == null) {
        $mensaje .= "La Persona con el DNI {$datos['nroDni']} no está cargada. <a href='../NuevaPersona.php'>Cargar persona</a>";
    }else if ($objAuto == null) {
            $mensaje .= "El auto con la patente " . $datos['patente'] . " no está cargado.";
        } else {
            $dniNuevoDuenio = $datos['nroDni'];
            $abmAuto->modificarDuenioAuto($datos['patente'], $dniNuevoDuenio);
            $mensaje .= "Dueño actualizado correctamente.";
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
<?php

    echo $mensaje;
    ?>
</body>

</html>