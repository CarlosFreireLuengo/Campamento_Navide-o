<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de elfos</title>
</head>

<body>
    <?php
    $archivo = "data/elfos.json";

    // Comprobar archivo
    if (!file_exists($archivo) || filesize($archivo) == 0) {
        echo "No hay elfos registrados.<br><br>";
        echo '<a href="index.html">Volver al inicio</a>';
        exit;
    }

    // Leer JSON
    $elfos = json_decode(file_get_contents($archivo), true);

    if (empty($elfos)) {
        echo "No hay elfos registrados.<br><br>";
        echo '<a href="index.html">Volver al inicio</a>';
        exit;
    }

    // Arrays para cada menú
    $menuEstandar = [];
    $menuLactosa  = [];
    $menuGluten   = [];

    // Clasificar elfos por menú
    foreach ($elfos as $elfo) {

        $nombre = $elfo["Nombre"] ?? "Sin nombre";

        // Si el menu existe, quiero que me pònga toda la información sobre los menús.
        if (isset($elfo["Menu "])) {

            $menu = strtolower(trim($elfo["Menu "]));

            switch ($menu) {
                case "estandar":
                    $menuEstandar[] = $nombre;
                    break;

                case "lactosa":
                    $menuLactosa[] = $nombre;
                    break;

                case "gluten":
                    $menuGluten[] = $nombre;
                    break;
            }
        }
    }



    // Función para mostrar listas
    function mostrarMenu($lista)
    {
        if (empty($lista)) {
            echo "Sin elfos";
        } else {
            foreach ($lista as $nombre) {
                echo "- " . htmlspecialchars($nombre) . "<br>";
            }
        }
    }

    echo "<h1>Menús de elfos:</h1>";

    echo "<h2>Menú estandar:</h2>";
    mostrarMenu($menuEstandar);

    echo "<br><h2>Menú sin lactosa:</h2>";
    mostrarMenu($menuLactosa);

    echo "<br><h2>Menú sin gluten:</h2>";
    mostrarMenu($menuGluten);
    ?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>

</html>