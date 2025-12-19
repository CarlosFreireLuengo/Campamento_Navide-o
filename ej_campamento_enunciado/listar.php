<!DOCTYPE html>
<html lang="es">
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
    echo "No hay elfos registrados.<br><br>";
    echo '<a href="index.html">Volver al inicio</a>';
    exit;
}

// Leer contenido y decodificar JSON
$lista = json_decode(file_get_contents($archivo), true);

echo "<h1>Listado de elfos</h1>";

// Si no hay elfos en el JSON
if (empty($lista)) {
    echo "No hay elfos registrados.";
} else {
    foreach ($lista as $elfo) {
        echo htmlspecialchars($elfo["Nombre"]) . " - ";
        echo htmlspecialchars($elfo["Edad"]) . " años, ";
        echo "Curso " . htmlspecialchars($elfo["Curso"]);
        echo "<br>";
    }
}
?>
<br><br>
<a href="index.html">Volver al inicio</a>
>>>>>>> listar
</body>
</html>
