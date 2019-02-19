<?php

    $conexion = new PDO('mysql:host=localhost;dbname=sugerencias;charset=utf8;','root','');
    
    if(isset($_POST['sugerencia'])){
        $respuesta = '';
        if(strlen($_POST['sugerencia']) > 1){
            $query = "SELECT sugerencia FROM sugerencias WHERE sugerencia like '".$_POST['sugerencia']."%'";
            $sentencia = $conexion->query($query);
            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($resultado as $sugerencia){
                $respuesta = $respuesta.$sugerencia->sugerencia.'<br />';
            }
            echo $respuesta;
        }else{
            echo 'No hay sugerencias';
        }
    }

?>