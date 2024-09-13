<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>
    <main class="container my-5">
        <h1 class="mb-3">Buscar Persona</h1>
        <form id="buscarPersonaForm" action="Action/accionBuscarPersona.php" class="w-50" class="w-50 needs-validation" novalidate method="POST">
            <label class="mb-1 form-label" for="nroDni">Ingrese el DNI de la persona a buscar:</label>
            <input type="text" name="nroDni" id="nroDni" class="form-control mb-3">
            <div class="invalid-feedback mb-3">
                Por favor ingrese un DNI Válido.
            </div>
            <input type="submit" value="Buscar Persona" class="btn btn-primary">
        </form>
    </main>
    <!-- Footer -->
    <?php include_once("Estructura/Footer.php"); ?>

    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/buscarPersona.js"></script>
</body>

</html>