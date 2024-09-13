<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cambiar Dueño</title>
</head>

<body>
    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-5">
        <form id="cambioDuenioForm" method="post" action="Action/accionCambiarDuenio.php" class="needs-validation" novalidate>
            <h1 class="mb-3">Cambio de Dueño de Auto</h1>

            <div class="mb-3">
                <label class="mb-1 form-label" for="patente">Ingrese la patente</label>
                <input type="text" id="patente" name="patente" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese una patente válida (formato XXX 123 o XX 123 XX).
                </div>
            </div>

            <div class="mb-3">
                <label class="mb-1 form-label" for="nroDni">Ingrese el DNI del nuevo dueño</label>
                <input type="text" id="nroDni" name="nroDni" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese un DNI válido.
                </div>
            </div>

            <input type="submit" value="Cambiar Dueño" class="btn btn-primary">
        </form>
    </main>
    
    <!-- Footer -->
    <?php include_once("Estructura/Footer.php"); ?>
    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/cambiarDuenio.js"></script> 
</body>

</html>
