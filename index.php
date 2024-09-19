<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector Dinámico Con PHP, MySQL y JavaScript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    // Activar los errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('config/configBD.php');
    include('funciones.php');
    $paises = obtenerListaPaises($con);
    ?>

    <div class="container text-center mt-5">
        <h1 class="mb-5 fw-bold">Selector Dinámico con Relación de Países y sus Capitales
            <hr>
        </h1>

        <div class="row justify-content-center text-center mt-5">
            <div class="col-md-4">
                <label class="float-start fw-bold" for="pais">Lista de Países</label>
                <select name="pais" id="pais" class="form-select" onchange="pais(this.value)">
                    <option value="" selected>Seleccione el País</option>
                    <?php
                    foreach ($paises as $pais) {
                        echo '<option value="' . $pais['id_pais'] . '">' . $pais['nombre_pais'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label class="float-start fw-bold" for="Capital">Capital del País</label>
                <select name="capitalPais" id="capital_pais" class="form-select">
                    <option value=""> Select Capital </option>
                </select>
            </div>
            <div class="col-md-2">
                <p id="habitantes_pais"></p>
            </div>
        </div>
    </div>


    <script>
        function pais(id) {
            let dataString = `id=${id}`;
            let url = "buscar_capital.php";

            fetch(url, {
                    method: 'POST',
                    headers: {
                        //se utiliza en las solicitudes HTTP para indicar el tipo de datos que se está enviando en el cuerpo de la solicitud.
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: dataString
                })
                .then(response => response.text()) // Obtener la respuesta en formato de texto
                .then(data => {
                    document.querySelector('#capital_pais').innerHTML = data;
                    // Llama a la función para obtener el número de habitantes
                    return obtenerHabitantes(id);
                })
                .catch(error => console.error('Error:', error));
        }

        function obtenerHabitantes(id) {
            return fetch('funciones.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&action=obtenerHabitantes`
                })
                .then(response => response.text()) // Obtener la respuesta en formato de texto
                .then(habitantes => {
                    document.querySelector('#habitantes_pais').innerHTML = `
                        <span class='fw-bold'>Total de habitantes:</span>
                        <span class='fw-bold text-success' style='font-size: 30px;'> ${habitantes}</span>`;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>
