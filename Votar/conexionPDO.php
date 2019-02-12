<?php

    if(isset($_POST['voto'])){
        $fichero = fopen('votaciones.php', 'a+');
        fwrite($fichero, $_POST['voto'].'<br />'.PHP_EOL);
        fclose($fp);
    }

?>