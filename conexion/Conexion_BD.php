<?php
    require_once "constantesLocal.php";

    //se instancia un objeto para la clase mysqli y se le envian parametro al metodo constructor
    $conexion = new mysqli(HOSTING, USUARIO, PASSWORD, NOMBRE_BD);

    mysqli_query($conexion,'SET NAMES "' . CHARSET . '"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

    //Si tenemos un posible error en la conexión lo mostramos
    if($conexion->connect_errno){
        printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
        exit();
}

//------------------------------------------------------------------------------
/*if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $query;
    }

    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        $row   = $query->fetch_assoc();

        return $row;
    }

    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));

        return htmlspecialchars($str);
    }
}*/
?>