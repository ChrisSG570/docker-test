<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="submit" name="boton1" value="Listar y modificar notas de alumnos">
        <input type="submit" name="boton2" value="Contar alumnos de una población">
        <input type="submit" name="salir>" value="Salir">
    </form>
    <?php
    
    if(isset($_POST["boton1"])){

    $mysqli = new mysqli("mysql", "root", "root", "examen_2122");

    if($mysqli-> connect_error){
        echo "Ha habido un problema con la conexión";
    }else{
        $sql = "SELECT * from datos_personales";
        $resultado = $mysqli -> query($sql);
        if($resultado){
            echo "<form action='' method='POST'>
            <input type='submit' name='menu' value='Menu principal'</input><br>
            <input type='submit' name='salir' value='Salir'</input>
            </form>";

            if(isset($_POST["menu"])){
            ("location: index.php");
            }
                
            if(isset($_POST["salir"])){
            ("location: www.google.com");
            }

            echo "<table><tr>
                <td> DNI </td>
                <td> Nombre </td>
                <td> Apellido1 </td>
                <td> Apellido2 </td>
                <td> Fecha de Nacimiento </td>
                <td> Poblacion </td>
                <td> Provincia </td>
                <td> Tutor </td>
                <td> Boletin de notas </td>
                <td> Modificar Notas </td></tr>";
            $fila = $resultado -> fetch_assoc();
            while($fila){
            echo "<tr>
            <td>{$fila["dni"]}</td>
            <td>{$fila["nombre"]}</td>
            <td>{$fila["apellido1"]}</td>
            <td>{$fila["apellido2"]}</td>
            <td>{$fila["fecha_nacimiento"]}</td>
            <td>{$fila["poblacion"]}</td>
            <td>{$fila["provincia"]}</td>
            <td>{$fila["tutor"]}</td>
            <td><a href='listarNotas.php?dni=".$fila["dni"].
            "'>Mostrar notas</a></td>
            <td><a href='modificarNotas.php?dni=".$fila["dni"].
            "'>Mostrar notas</a></td>
            </tr>";
            $fila = $resultado -> fetch_assoc();
            }
            echo "</table>";
        }else{
            echo "Error";
        }
    }
}
    ?>
</body>
</html>