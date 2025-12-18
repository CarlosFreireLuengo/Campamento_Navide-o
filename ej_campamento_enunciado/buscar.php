<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        Buscar elfo por nombre: <input type="text" name="busca">
        <button type="submit" value="buscar" name="accion">Buscar</button>
    </form>
    <br><a href="index.html">Volver al inicio</a><br><br>
    <?php
$archivo = "data/elfos.json";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!file_exists($archivo)) {
        echo "<p>No hay elfos registrados.</p>";
        return;
    }

    $buscar = strtolower(trim($_POST['busca']));
    $elfos = json_decode(file_get_contents($archivo), true);

    // Si es un solo objeto, lo convertimos en array
    if (isset($elfos['nombre'])) {
        $elfos = [$elfos];
    }

    if (!is_array($elfos)) {
        echo "<p>Error leyendo el archivo de elfos.</p>";
        return;
    }

    $encontrado = false;

    foreach ($elfos as $elfo) {
        if (strtolower($elfo['nombre']) === $buscar) {
            echo "<h3>Elfo encontrado</h3>";
            echo "<p><strong>Nombre:</strong> {$elfo['nombre']}</p>";
            echo "<p><strong>Edad:</strong> {$elfo['edad']}</p>";
            echo "<p><strong>Curso:</strong> {$elfo['curso']}</p>";
            echo "<p><strong>Menú:</strong> {$elfo['menu']}</p>";
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "<p>No se encontró ningún elfo con ese nombre.</p>";
    }
}
?>

</body>

</html>