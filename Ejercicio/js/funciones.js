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

function llamarPOST(){
    var url = "";//CONEXIONPDO.PHP O CONEXIONMYSQL.PHP
    xmlhttp.open('POST',url, true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = respuestaServidorPOST;
    xmlhttp.send("nombre=Manga");
}

function llamarGET(){
    var url = "";
    xmlhttp.open("GET", url);
    xmlhttp.onreadystatechange = respuestaServidorGET;
    xmlhttp.send(null);
}

function respuestaServidorPOST() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            alert(xmlhttp.responseText);
        }else{
            alert(xmlhttp.statusText);
        }
    }
}
function respuestaServidorGET() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            alert (xmlhttp.responseText);
        }else{
            alert (xmlhttp.statusText);
        }
    }
} 