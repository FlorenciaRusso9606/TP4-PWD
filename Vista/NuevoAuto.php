<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Nuevo Auto</title>
</head>
<body>
<?php include_once("Estructura/Navbar.php"); ?>
<main class="container my-5">
<h1 class="mb-3">Nuevo Auto</h1>
    <form id="nuevoAutoForm" action="Action/accionNuevoAuto.php" method="post" class="w-50 needs-validation" novalidate>
        <label class="mb-1 form-label" for="patente">Ingrese la patente del auto</label>
        <input type="text" name="patente" id="patente" required minlength="0" class="form-control mb-3">
        <label class="mb-1 form-label" for="marca">Ingrese la marca</label>
        <input type="text" name="marca" id="marca" required class="form-control mb-3">
        <label class="mb-1 form-label" for="modelo">Ingrese el modelo</label>
        <input type="text" name="modelo" id="modelo" required class="form-control mb-3">
        <label class="mb-1 form-label" for="nroDni">Ingrese el DNI del Dueño</label>
        <input type="number" name="nroDni" id="nroDni" required class="form-control mb-3">
        <input type="submit" value="Cargar Auto" class="btn btn-primary">
    </form>
</main>
 <!-- Footer -->
 <?php include_once("Estructura/Footer.php"); ?>

 <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/nuevoAuto.js"></script>
</body>
</html>
