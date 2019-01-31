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
function comprar(form){
    var zapato = form.zapato.value;
    var nombre = form.nombre.value;
    var apellidos = form.apellidos.value;
    var pais = form.pais.value;
    var provincia = form.provincia.value;
    var ciudad = form.ciudad.value;
    var calle = form.calle.value;
    var numero = form.numero.value;
    var metodo_pago = form.metodo_pago.value;

    var url = "pdf.php";

    xmlhttp.open('POST',url, true);

    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = respuestaServidor;

    xmlhttp.send(
        "zapato=" + zapato +
        "&nombre=" + nombre +
        "&apellidos=" + apellidos +
        "&pais=" + pais +
        "&provincia=" + provincia +
        "&ciudad=" + ciudad +
        "&calle=" + calle +
        "&numero=" + numero +
        "&metodo_pago=" + metodo_pago
        );
    return false;
}
// Creamos la función que hace de gestor de evento
function respuestaServidor() {
    // comprobamos si el estado es "completado"
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            // mandamos una alerta con el texto devuelto por el servidor
            generarPDF();
        }else{
            // mandamos una alerta con el mensaje de error
            alert (xmlhttp.statusText);
        }
    }
}

function generarPDF(){
    var archivoPDF = new PDF24Doc();
    archivoPDF.setCharset("UTF-8");
    archivoPDF.setFilename("PDF");
    archivoPDF.setPageSize(210, 297);
    var contenidoPDF = new PDF24Element();
    contenidoPDF.setTitle("Compra en Zapateria");
    contenidoPDF.setUrl("http://pdf24.org");
    contenidoPDF.setAuthor("Javier Manga");
    contenidoPDF.setDateTime("2010-04-15 8:00");
    contenidoPDF.setBody(xmlhttp.responseText);
    archivoPDF.addElement(contenidoPDF);
    archivoPDF.create();
}