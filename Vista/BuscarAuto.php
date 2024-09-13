<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Buscar Auto</title>
</head>
<body>

    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-5">
        <h1 class="mb-3">Buscar Auto</h1>
        <form id="buscarAutoForm" action="action/accionBuscarAuto.php" method="POST" class="w-50 needs-validation" novalidate>
            <label class="mb-1 form-label" for="patente">Ingrese la patente del auto a buscar:</label>
            <input type="text" name="patente" id="patente" class="form-control mb-3" required>
            <div class="invalid-feedback mb-3">
                Por favor ingrese una patente válida (formato XXX 123 o XX 123 XX).
            </div>
            <button type="submit" class="btn btn-primary">Buscar Dueño</button>
        </form>
    </main>

    <!-- Footer -->
    <?php include_once("Estructura/Footer.php"); ?>

    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/buscarAuto.js"></script>
</body>
</html>
