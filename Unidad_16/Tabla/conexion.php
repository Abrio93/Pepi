<?php
    $conexion = new PDO('mysql:host=localhost;dbname=pepi;','root','');

    

    if(isset($_POST['tabla'])){
        $query = "SELECT * FROM empleados";
        $sentencia = $conexion->query($query);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

        echo "<br /><table class='table table-hover container'>";
            echo "<tr>";
                echo "<td>Id</td>";
                echo "<td>nombre</td>";
                echo "<td>Departamento</td>";
                echo "<td>Sueldo</td>";
            echo "</tr>";
        foreach($resultado as $empleado){
            echo "<tr>";
                echo "<td><a href='#' onclick='ver_empleado(".$empleado->idempleado.")'>".$empleado->idempleado."</a></td>";
                echo "<td>".$empleado->nombres."</td>";
                echo "<td>".$empleado->departamento."</td>";
                echo "<td>".$empleado->sueldo."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    if(isset($_POST['ver'])){
        $query = "SELECT * FROM empleados WHERE idempleado = ".$_POST['ver'];
        $sentencia = $conexion->query($query);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        $query = "SELECT DISTINCT departamento FROM empleados";
        $sentencia = $conexion->query($query);
        $resultado2 = $sentencia->fetchAll(PDO::FETCH_OBJ);

        echo '<form id="formulario_empleados" onsubmit="return guardar(this)">';
            echo '<div class="form-group">';
                echo '<label>nombres:</label>';
                echo '<input type="hidden" name="idempleado" value="'.$resultado->idempleado.'" />';
                echo '<input type="text" name="nombres" value="'.$resultado->nombres.'" />';
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
            echo '<input type="submit" value="Actualizar" />';
        echo '</form>';
    }

    if(isset($_POST['guardar'])){
        $query = "UPDATE empleados SET nombres = :nombres, departamento = :departamento, sueldo = :sueldo WHERE idempleado = :idempleado";
        $sentencia = $conexion->prepare($query);
        $sentencia->bindParam(':nombres', $_POST['nombres']);
        $sentencia->bindParam(':departamento', $_POST['departamento']);
        $sentencia->bindParam(':sueldo', $_POST['sueldo']);
        $sentencia->bindParam(':idempleado', $_POST['guardar']);
        $sentencia->execute();
    }

?>