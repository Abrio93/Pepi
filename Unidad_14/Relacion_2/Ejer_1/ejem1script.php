<?php
    if(isset($_POST['nombre']) AND isset($_POST['puntuacion'])){
        if(!empty($_POST['nombre']) AND !empty($_POST['puntuacion'])){
            $archivo = fopen("datos.txt", "a+");
            fwrite($archivo, $_POST['nombre'].": ".$_POST['puntuacion']);
            fclose($archivo);
        }else{
            echo "La información ha llegado vacía";
        }
    }else{
        echo "No ha llegado la información";
    }
?> 