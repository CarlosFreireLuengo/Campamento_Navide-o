    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        $carpeta = 'data';
        $carpetaLogs = $carpeta . '/logs';


        if (!is_dir($carpeta) && !is_dir($carpetaLogs)) {
            mkdir($carpeta);
            chmod($carpeta, 0755);
        }

        if (!is_dir($carpetaLogs)) {
            mkdir($carpetaLogs);
            chmod($carpetaLogs, 0755);
        }


        if ($_POST) {
            $nombre = $_POST['nombre'];
            $curso  = $_POST['curso'];
            $edad = $_POST['edad'];
            $menu = $_POST['menu'];

            
            $array_elfo = [
                "Nombre" => $nombre,
                "Curso" => $curso,
                "Edad" => $edad,
                "Menu " => $menu
            ];
            
            // Cargar JSON original
            $archivo = "data/elfos.json";
            $array_principal = [];
            if (file_exists($archivo)) {
                $array_principal = json_decode(file_get_contents($archivo), true);
            }

            array_push($array_principal, $array_elfo);

            // Meto todos los datos del array en el json.
            file_put_contents($archivo, json_encode($array_principal, JSON_PRETTY_PRINT));

            // Crear el archivo de registro.log y insertar datos
            $log =  date("Y-m-d H:i:s") . " - Elfo registrado: " . $nombre . "\n";
            file_put_contents($carpetaLogs . '/registro.log', $log, FILE_APPEND);
        }
        ?>
        <form method="POST">
            Nombre y apellidos: <input type="text" name="nombre" required><br>
            Curso: <input type="text" name="curso" required><br>
            Edad: <input type="number" name="edad" required><br>
            <select name="menu" id="alergia">
                <option value="" disabled selected>--Seleccione un menú--</option>
                <option value="Estandar">Estándar</option>
                <option value="Lactosa">Sin lactosa</option>
                <option value="Gluten">Sin gluten</option>
            </select>
            <button type="submit">Registrar elfo</button>
        </form>
        <br>
        <a href="index.html">Volver al inicio</a>
    </body>

    </html>