numero=parseInt(prompt("Introduce un número"));
document.write("<table border='1' bgcolor='#ffe377'><tr><th colspan='2'><h2>Tabla de multiplicar del "+numero+"</h2></th></tr>");
for(var num=0;num<=10;num++){
    document.write("<tr align='center'><td bgcolor='#ffe377'>"+numero+"*"+num+"</td><td bgcolor='#ffe377'>"+numero*num+"</td></tr>");
}
document.write("</table>");