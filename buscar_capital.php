<?php
include('config/configBD.php');

$idSelectPais = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
if ($idSelectPais > 0) {
    $capital = "SELECT nombre_capital FROM capitales WHERE id_pais = $idSelectPais";
    $ciudad = mysqli_query($con, $capital);
    
    // Verifica si la consulta devuelve resultados
    if (mysqli_num_rows($ciudad) > 0) {
        // Recorre y muestra las opciones
        while ($row = mysqli_fetch_assoc($ciudad)) {
            echo '<option value="' . htmlspecialchars($row['nombre_capital']) . '">' . htmlspecialchars($row['nombre_capital']) . '</option>';
        }
    } else {
        echo '<option value="">No se encontraron capitales</option>';
    }
} else {
    echo '<option value="">País no válido</option>';
}
?>
