<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="text-center">
         <h1>Factura</h1>
    </div>

     <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <h3 class="panel-title">Cabecera</h3> -->
					<hr>
                    <div class="row" style="background-color:green;">
                        
                        <div class="col-md-5" style="background-color:white;">
                            <div class="form-group">
                                <label for="cliente" class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?= $_POST['nombre']; ?> <?= $_POST['apellidos']; ?>" id="cliente" placeholder="cliente" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="background-color:white;">
                            <div class="form-group">
                              
                                <label for="fecha" class="col-sm-5 control-label">Fecha factura</label>
                                <div class="col-sm-7">
                                    <input class="form-control" id="fecha" placeholder="fecha factura" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 target" style="background-color:white;">
                            <div class="form-group">
                                <label for="id" class="col-sm-3 control-label">Id</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="id" type="text">
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <br>
                    <div class="row">
                        <div class="col-md-6"> 
                          <address>
                           <strong class="">BERNARDO GINARD PRATS</strong><br class="">
                            Carrer Ciutadella nº 26 A<br class="">
                            07008 Palma<br class="">
                            Illes Balears<br class="">                          
                           </address>
                        </div>
                   </div> <!-- row -->
				</div> <!-- panel heading -->
				<div class="panel-body">
				  <h3 class="panel-title">Detalle</h3>
				  
				  <table class="table table-condensed">
					<thead>
					  <tr>
						<th class="">Producto</th>
						<th class="">cantidad</th>
						<th class="">precio</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td class=""><?= $_POST['zapato']; ?></td>
						<td class="">1</td>
						<td class="">49,59</td>
					  </tr>
					</tbody>
				  </table>
				</div> <!-- panel body -->
				<div class="panel-footer">Piefactura
				</div>
             </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>    <!-- container -->
</body>
</html>