<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "DESIS";

// Conectarse a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    echo json_encode(array("codigo" => 500, "mensaje" => "Error ConexiónMySQL"));
    die("Conexión fallida: " . mysqli_connect_error());
}
//verifico que tipo de peticion se realizo
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Realizar la consulta a la tabla REGION
    $sql = "SELECT idREGION, nombreREGION FROM REGION";
    $resultRegion = mysqli_query($conn, $sql);

    // Obtener los datos de la consulta y convertirlos a un array
    $regiones = array();
    while ($fila = mysqli_fetch_assoc($resultRegion)) {
        $regiones[] = $fila;
    }
    // Realizar la consulta a la tabla COMUNA
    $sql = "SELECT idCOMUNA, nombreCOMUNA, idREGION FROM COMUNA";
    $resultComuna = mysqli_query($conn, $sql);

    // Obtener los datos de la consulta y convertirlos a un array
    $comunas = array();
    while ($fila = mysqli_fetch_assoc($resultComuna)) {
        $comunas[] = $fila;
    }

    // Realizar la consulta a la tabla CANDIDATO
    $sql = "SELECT idCANDIDATO, nombreCANDIDATO FROM CANDIDATO";
    $resultCandidato = mysqli_query($conn, $sql);

    // Obtener los datos de la consulta y convertirlos a un array
    $candidatos = array();
    while ($fila = mysqli_fetch_assoc($resultCandidato)) {
        $candidatos[] = $fila;
    }

    // Realizar la consulta a la tabla CANDIDATO
    $sql = "SELECT idOPCION_ENTERAR, nombreOPCION FROM OPCION_ENTERAR";
    $resultOPCION = mysqli_query($conn, $sql);

    // Obtener los datos de la consulta y convertirlos a un array
    $opciones = array();
    while ($fila = mysqli_fetch_assoc($resultOPCION)) {
        $opciones[] = $fila;
    }
    // Cerrar la conexión
    mysqli_close($conn);

    // Establecer la cabecera HTTP para indicar que la respuesta es de tipo JSON
    header('Content-Type: application/json');
    //creo un diccionario para guardar los arreglos
    $data = array(
        "regiones" => $regiones,
        "comunas" => $comunas,
        "candidatos" => $candidatos,
        "opciones" => $opciones
    );
    echo json_encode($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nombreApellido = $_POST['nombre'];
        $alias = $_POST['alias'];
        $rut = $_POST['rut'];
        $email = $_POST['email'];
        $region = $_POST['region'];
        $comuna = $_POST['comuna'];
        $candidato = $_POST['candidato'];
        $como_se_entero = $_POST['opciones'];
        if (existeRut($rut)){
            echo json_encode(array("codigo" => 406, "mensaje" => "El votante ya ha votado"));
            return null;
        }else{
            mysqli_query($conn, "INSERT INTO `votante`(`nombreVOTANTE`, `rutVOTANTE`, `aliasVOTANTE`) VALUES ('$nombreApellido','$rut','$alias')");
            $last_id = mysqli_insert_id($conn);
            mysqli_query($conn, "INSERT INTO `formulario`(`idCOMUNA`, `idCANDIDATO`, `idVOTANTE`) VALUES ('$comuna','$candidato','$last_id')");
            $last_id = mysqli_insert_id($conn);
            foreach($como_se_entero as $opcion){
                mysqli_query($conn, "INSERT INTO `form_opcion`(`idFORMULARIO`, `idOPCION_ENTERAR`) VALUES ('$last_id','$opcion')");
            }
            
        }
        
        echo json_encode(array("codigo" => 200, "mensaje" => "Se envio su votación correctamente"));
    } catch (Exception $e) {
        echo json_encode(array("codigo" => 400, "mensaje" => "Se ha producido un error: " . $e->getMessage()));
    }


} else {
    // Manejar error si la solicitud no es una petición permitida

    echo json_encode(array("codigo" => 405, "mensaje" => "Método no permitido"));
}

//funcion que verifica que el rut no ha sido ingresado anteriormente
function existeRut($rut)
{
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "DESIS";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT rutVOTANTE FROM VOTANTE";
    $result = mysqli_query($conn, $sql);

    // Obtener los datos de la consulta y convertirlos a un array
    $votantes = array();
    while ($fila = mysqli_fetch_assoc($result)) {
        $votantes[] = $fila;
    }
    if($votantes){
        foreach ($votantes as $v){
        if($v['rutVOTANTE'] == $rut){
            return true;
        }
        else{
            return false;
        }
    }
    }else{
        return false;
    }
    
}
?>