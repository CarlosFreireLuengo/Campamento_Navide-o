<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $archivo = "data/elfos.json";

    if (!file_exists($archivo) || filesize($archivo) == 0) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    }

    $lista = json_decode(file_get_contents($archivo), true);

    // Total alumnos
    $total = count($lista);

    // Media de edades
    $suma = 0;
    foreach ($lista as $elfo) {
        $suma += $elfo['Edad'];
    }
    $media = round($suma / $total, 2);

    // Listado de cursos
    $cursos = [];
    foreach ($lista as $elfo) {
        $cursos[] = $elfo['Curso'];
    }
    $cursos = array_unique($cursos);

    // Rellenar el contenido del reporte
    $contenido = "REPORTE DE ELFOS\n------------------\n";
    $contenido .= "Total: " . $total . " elfos\n";
    $contenido .= "Edad media: " . $media . "años\n";
    $contenido .= "Cursos: " . implode(", ", $cursos) . "\n";
    $contenido .= "Generado el: " . date("Y-m-d H:i:s") . "\n";

    // Guardar archivo
    file_put_contents("data/reporte.txt", $contenido);


    echo "Reporte generado correctamente"

    ?>
     <a href="index.html">Volver al inicio</a>
</body>

</html>