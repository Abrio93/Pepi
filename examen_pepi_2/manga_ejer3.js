function direccion(){
    this.direccion = Array("https://www.google.es","https://www.hotmail.es","https://www.yahoo.com" );
    this.titulo = Array("Google", "Hotmail", "Yahoo");
    this.retornarr = retornar;
}

    function retornar(pagina){
        for(var i = 0; i < this.direccion.length; i++){
            if(this.titulo[i] == pagina){
                return "<a href=" + this.direccion[i] + ">" + this.titulo[i] + "</a><br />";
            }
        }
    }
