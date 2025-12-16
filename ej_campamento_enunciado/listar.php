<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de elfos</title>
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

    // Leer contenido y decodificar JSON
    $lista = json_decode(file_get_contents($archivo), true);

    echo "<h2>Listado de elfos</h2>";

    // Si no hay elfos en el JSON
    if (empty($lista)) {
        echo "No hay elfos registrados.";
    } else {
        echo "<ul>";
        foreach ($lista as $elfo) {
            echo "<li>";
            echo "Nombre: " . htmlspecialchars($elfo["nombre"]) . "<br>";
            echo "Especialidad: " . htmlspecialchars($elfo["especialidad"]) . "<br>";
            echo "Experiencia: " . htmlspecialchars($elfo["experiencia"]) . "<br>";
            echo "</li><br>";
        }
        echo "</ul>";
    }
    ?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>
</html>
