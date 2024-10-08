<?php
include_once "../../Modelo/conector/BaseDatos.php";
include_once "../../Utils/funciones.php";
include_once "../../Modelo/Persona.php";
include_once "../../Control/AbmPersona.php";
include_once "../../configuracion.php";


$datos = data_submitted();
if (isset($datos)) {
    $abmPersona = new AbmPersona();
    $salida = $abmPersona->modificarPersona($datos['nroDni'], $datos['apellido'], $datos['nombre'], $datos['fechaNac'], $datos['telefono'], $datos['direccion']);
    $mensaje = "";
    if ($salida) {
        $mensaje .= "La persona ha sido modificada con éxito.";
    } else {
        $mensaje .= "No se pudo modificar a la persona.";
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
    <?php echo "<p>$mensaje</p>";
     ?>
     
    <button class="btn btn-primary"><a href="../" class="btn btn-primary"> Volver</a></button>
      </main>
      <?php include_once("../Estructura/Footer.php"); ?>
</body>

</html>