<?php
// include 'conectaBD.php';
$conexion = new PDO('mysql:host=localhost;dbname=sugerencias;charset=utf8;','root','');
//toma el parametro q de la URL con la cadena de texto
// tecleada hasta el momento
    if(strlen($_GET['sugerencia']) >= 1){
        $query = "SELECT * FROM pais WHERE value like '".$_GET['sugerencia']."%'";
        $sentencia = $conexion->query($query);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        $json = json_encode($resultado);
        echo '{"results":'.$json.'}';
    }else{
        echo 'No hay sugerencias';
    }
?> 