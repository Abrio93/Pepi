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

function ver(){
    var url = "conexion.php";
    xmlhttp.open('POST',url, true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = respuestaServidorVer;
    xmlhttp.send("tabla");
}

function respuestaServidorVer() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            document.getElementById("tabla").innerHTML = xmlhttp.responseText;
        }else{
            alert (xmlhttp.statusText);
        }
    }
}

function ver_empleado(id_empleado){
    var url = "conexion.php";
    xmlhttp.open('POST',url, true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = respuestaServidorVerEmpleado;
    xmlhttp.send("ver=" + id_empleado);
}

function respuestaServidorVerEmpleado() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            document.getElementById("respuesta").innerHTML = "";
            document.getElementById("formulario").innerHTML = xmlhttp.responseText;
        }else{
            alert (xmlhttp.statusText);
        }
    }
}

function guardar(form){
    var id_empleado = form.id_empleado.value;
    var nombre = form.nombre.value;
    var departamento = form.departamento.value;
    var sueldo = form.sueldo.value;

    var url = "conexion.php";
    xmlhttp.open('POST',url, true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = respuestaServidorGuardar;
    xmlhttp.send("guardar=" + id_empleado + "&nombre=" + nombre + "&departamento=" + departamento + "&sueldo=" + sueldo);
    return false;
}

function respuestaServidorGuardar() {
    if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {
            document.getElementById("formulario").innerHTML = "";
            ver();
            document.getElementById("respuesta").innerHTML = "Se ha modificado el empleado correctamente";
        }else{
            alert (xmlhttp.statusText);
        }
    }
}