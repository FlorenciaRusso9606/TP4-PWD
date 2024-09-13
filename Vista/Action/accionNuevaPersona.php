<?php

include_once "../../Utils/funciones.php";
include_once "../../Modelo/Persona.php";
include_once "../../Control/AbmPersona.php";
include_once "../../configuracion.php";


$datos = data_submitted();
if (isset($datos)) {
    $abmPersona = new AbmPersona();
    $salida = $abmPersona->cargarPersona($datos['nroDni'], $datos['apellido'], $datos['nombre'], $datos['fechaNac'], $datos['telefono'], $datos['domicilio']);
    $mensaje = "";
    if ($salida) {
        $mensaje .= "La persona ha sido registrada con éxito.";
    } else {
        $mensaje .= "La persona ya está registrada.";
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
    <button class="btn btn-primary"><a href="../NuevaPersona.php" class="btn btn-primary"> Volver</a></button>
    </main>
   
    <?php include_once("../Estructura/Footer.php"); ?>
</body>

</html>