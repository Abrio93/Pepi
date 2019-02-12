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
    <table width="100%">
        <tr>
            <td><img width="15%" src="logo.png" /></td>
            <td>
                <h1 style="text-align: right; margin-right: 2rem;">Zapatería Manga</h1>
                <p style="text-align: right; margin-right: 2rem;">C/ calle Nº 16</p>
                <p style="text-align: right; margin-right: 2rem;">21440 Lepe (Huelva)</p>
                <p style="text-align: right; margin-right: 2rem;">España</p>
                <p style="text-align: right; margin-right: 2rem;">NIF: 012458745-R</p>
                <p style="text-align: right; margin-right: 2rem;">infor@zapateriamanga.com</p>
            </td>
        </tr>
    </table>
    <hr />
    <p>Factura nº 3256</p>
    <p><?= $_POST['nombre'].' '.$_POST['apellidos'] ?></p>
    <p><?= 'C/ '.$_POST['calle'].' Nº'.$_POST['numero'] ?></p>
    <p><?= $_POST['cp'].' '.$_POST['ciudad'].' ('.$_POST['provincia'].')' ?></p>
    <p><?= $_POST['pais'] ?></p>
    <p><?= $_POST['correo'] ?></p>
    <table class="table" align="center">
        <tr>
            <td>#</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Importe</td>
        </tr>
        <tr>
            <td>1</td>
            <td><?= $_POST['zapato'] ?></td>
            <td>25€</td>
            <td>1</td>
            <td>25€</td>
        </tr>
    </table>
    <hr />
</body>
</html>