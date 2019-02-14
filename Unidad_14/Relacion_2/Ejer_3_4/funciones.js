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
    var url = "email.xml";
    xmlhttp.open('GET',url, true);
    xmlhttp.responseType = 'document';
    xmlhttp.overrideMimeType('text/xml');
    xmlhttp.onreadystatechange = respuestaServidor;
    xmlhttp.send(null);
}

function respuestaServidor() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            var de = xmlhttp.responseXML.documentElement.childNodes[1].innerHTML;
            var para = xmlhttp.responseXML.documentElement.childNodes[3].innerHTML;
            var entete = xmlhttp.responseXML.documentElement.childNodes[5].innerHTML;
            var mensaje = xmlhttp.responseXML.documentElement.childNodes[7].innerHTML;
            document.getElementById('respuesta').append('De: ' + de);
        }else{
            alert (xmlhttp.statusText);
        }
    }
} 