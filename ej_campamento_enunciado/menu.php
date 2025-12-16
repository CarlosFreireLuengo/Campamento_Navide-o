<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de elfos</title>
</head>
<body>
<?php
    $archivo = "data/elfos.json";

    // Si el archivo no existe o está vacío
    if (!file_exists($archivo) || filesize($archivo) == 0) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    }

    // Leer y decodificar JSON
    $elfos = json_decode(file_get_contents($archivo), true);

    if (empty($elfos)) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    }

    // Contadores de menú
    $estandar = 0;
    $lactosa = 0;
    $gluten = 0;

    // Contar cada menú
    foreach ($elfos as $elfo) {
        if ($elfo["menu"] === "estandar") {
            $estandar++;
        } elseif ($elfo["menu"] === "sin_lactosa") {
            $lactosa++;
        } elseif ($elfo["menu"] === "sin_gluten") {
            $gluten++;
        }
    }

    echo "<h2>Menús de elfos:</h2>";
    echo "<h3>Menú estándar:</h3>$estandar<br>";
    echo "<h3>Menú sin lactosa:</h3>$lactosa<br>";
    echo "<h3>Menú sin gluten:</h3>$gluten<br>";
?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>
</html>
