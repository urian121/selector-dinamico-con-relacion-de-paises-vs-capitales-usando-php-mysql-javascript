<?php

function obtenerListaPaises($con)
{
    $sqlpaises = "SELECT id_pais, nombre_pais FROM paises ORDER BY nombre_pais";
    $querypais = mysqli_query($con, $sqlpaises);

    // Inicializa un array vacío para almacenar los países
    $paises = array();
    if (mysqli_num_rows($querypais) > 0) {
        // Recorre los resultados y los almacena en el array
        while ($FilaPais = mysqli_fetch_assoc($querypais)) {
            $paises[] = $FilaPais;
        }
    }
    // Retorna la lista de países
    return $paises;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config/configBD.php');

    // Verifica la acción
    if (isset($_POST["action"]) && $_POST["action"] == "obtenerHabitantes") {
        $idPais = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($idPais > 0) {
            // Consulta para obtener el número de habitantes
            $query = "SELECT habitantes FROM poblacion_pais WHERE id_pais = $idPais";
            $result = mysqli_query($con, $query);

            // Obtiene el número de habitantes
            if ($row = mysqli_fetch_assoc($result)) {
                // Formatea la cantidad de habitantes con comas
                $habitantes = number_format($row['habitantes']);
                echo $habitantes;
            } else {
                echo 'No disponible';
            }
        } else {
            echo 'ID no válido';
        }
    } else {
        echo 'Acción no válida';
    }
}
