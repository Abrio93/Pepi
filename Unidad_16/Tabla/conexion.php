<?php
    $conexion = new PDO('mysql:host=localhost;dbname=datos;','root','');

    

    if(isset($_POST['tabla'])){
        $query = "SELECT * FROM empleados";
        $sentencia = $conexion->query($query);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

        echo "<br /><table class='table table-hover container'>";
            echo "<tr>";
                echo "<td>Id</td>";
                echo "<td>Nombre</td>";
                echo "<td>Departamento</td>";
                echo "<td>Sueldo</td>";
            echo "</tr>";
        foreach($resultado as $empleado){
            echo "<tr>";
                echo "<td><a href='#' onclick='ver_empleado(".$empleado->id_empleado.")'>".$empleado->id_empleado."</a></td>";
                echo "<td>".$empleado->nombre."</td>";
                echo "<td>".$empleado->departamento."</td>";
                echo "<td>".$empleado->sueldo."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    if(isset($_POST['ver'])){
        $query = "SELECT * FROM empleados WHERE id_empleado = ".$_POST['ver'];
        $sentencia = $conexion->query($query);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $query = "SELECT DISTINCT departamento FROM empleados";
        $sentencia = $conexion->query($query);
        $resultado2 = $sentencia->fetchAll(PDO::FETCH_OBJ);

        echo '<form id="formulario_empleados" onsubmit="return guardar(this)">';
            echo '<div class="form-group">';
                echo '<label>Nombre:</label>';
                echo '<input type="hidden" name="id_empleado" value="'.$resultado->id_empleado.'" />';
                echo '<input type="text" name="nombre" value="'.$resultado->nombre.'" />';
            echo '</div>';
            echo '<div class="form-group">';
                echo '<label>Departamento:</label>';
                echo '<select name="departamento">';
                foreach($resultado2 as $departamento){
                    if($departamento->departamento == $resultado->departamento){
                        echo '<option value="'.$departamento->departamento.'" selected>'.$departamento->departamento.'</option>';
                    }else{
                        echo '<option value="'.$departamento->departamento.'">'.$departamento->departamento.'</option>';
                    }
                }
                echo "</select>";
            echo '</div>';
            echo '<div class="form-group">';
                echo '<label>Sueldo:</label>';
                echo '<input type="number" name="sueldo" value="'.$resultado->sueldo.'" />';
            echo '</div>';
            echo '<input type="submit" value="Guardar" />';
        echo '</form>';
    }

    if(isset($_POST['guardar'])){
        $query = "UPDATE empleados SET nombre = :nombre, departamento = :departamento, sueldo = :sueldo WHERE id_empleado = :id_empleado";
        $sentencia = $conexion->prepare($query);
        $sentencia->bindParam(':nombre', $_POST['nombre']);
        $sentencia->bindParam(':departamento', $_POST['departamento']);
        $sentencia->bindParam(':sueldo', $_POST['sueldo']);
        $sentencia->bindParam(':id_empleado', $_POST['guardar']);
        $sentencia->execute();
    }

?>