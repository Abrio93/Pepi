<?php
/*
 * ejem3script.php Se incluye un retardo
 * para simular actividad en el servidor
 */
header('Content-Type: text/xml');
sleep(3);
echo "<?xml version=\"1.0\" ?><etiqueta1>Usuario Validado</etiqueta1>";
?> 