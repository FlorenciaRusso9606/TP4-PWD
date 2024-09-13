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
    <main class="container my-2">
        <h1 class="mb-3">Nueva Persona</h1>
        <form id="nuevaPersonaForm" action="Action/accionNuevaPersona.php" method="post" class="w-50 needs-validation" novalidate>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="nroDni">Ingrese el DNI de la persona</label>
                <input type="number" name="nroDni" id="nroDni" required minlength="0" class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese un DNI válido
            </div>
            </div>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="nombre">Ingrese el nombre</label>
                <input type="text" name="nombre" id="nombre" required class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese un nombre válido
            </div>
            </div>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="apellido">Ingrese el apellido</label>
                <input type="text" name="apellido" id="apellido" required class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese un apellido válido
            </div>
            </div>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="fechaNac">Ingrese la fecha de nacimiento</label>
                <input type="date" name="fechaNac" id="fechaNac" required class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese una fecha de nacimiento válida
            </div>
            </div>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="telefono">Ingrese el teléfono</label>
                <input type="number" name="telefono" id="telefono" required minlength="0" class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese un teléfono válido
            </div>
            </div>
            <div class="d-flex flex-column w-50">
                <label class="mb-1 form-label" for="domicilio">Ingrese el domicilio</label>
                <input type="text" name="domicilio" id="domicilio" required class="form-control mb-3">
                <div class="invalid-feedback mb-3">
                Por favor ingrese un domicilio válido
            </div>
            </div>
            <input type="submit" value="Cargar nueva Persona" class="btn btn-primary">
        </form>
    </main>
    <?php include_once("Estructura/Footer.php"); ?>

    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/nuevaPersona.js"></script>
</body>

</html>