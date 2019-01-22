function getXMLHTTPRequest(){
    var obj = false;
    try {
        obj = new XMLHttpRequest(); /* Navegador Firefox, Mozilla,etc*/
    }
    catch(err1) {
        try {
            obj = new ActiveXObject("Msxml2.XMLHTTP"); /* algunas versiones IE */
        }
        catch(err2) {
            try {
                obj = new ActiveXObject("Microsoft.XMLHTTP");/*otras versiones IE */
            }
            catch(err3) {
                obj = false;
            }
        }
    }
    return obj;
}
var xmlhttp = getXMLHTTPRequest();
function llamarServidor(){
    // se construye la dirección del script de servidor que queremos llamar
    var url = "ejem1script.php";
    // se abre la conexión con el servidor
    xmlhttp.open("GET", url);
    // Esta sentencia permite ejecutar la función gestor de evento cuando
    // la respuesta del servidor haya llegado
    xmlhttp.onreadystatechange = respuestaServidor;
    // y finalmente enviamos la petición
    xmlhttp.send(null);
}
// Creamos la función que hace de gestor de evento
function respuestaServidor() {
    // comprobamos si el estado es "completado"
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
        // mandamos una alerta con el texto devuelto por el servidor
        alert (xmlhttp.responseText);
        }else{
            // mandamos una alerta con el mensaje de error
            alert (xmlhttp.statusText);
        }
    }
} 