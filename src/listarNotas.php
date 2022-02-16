<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = null;
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }
 
    $mysqli = new mysqli("mysql", "root", "root", "examen_2122");
    if($mysqli -> connect_error){
        echo "Ha habido un problema con la conexión";
    }else{
        $sql = "SELECT notabae, notalnd, notaprogramacion from notas where dni = '$dni'";
        $resultado = $mysqli -> query($sql);
        if($resultado){
            echo "<form action='' method='POST'>
            <input type='submit' name='menu' value='Menu principal'</input><br>
            <input type='submit' name='salir' value='Salir'</input>
            </form>";

            if(isset($_POST["menu"])){
            header("location: index.php");
            }

            if(isset($_POST["salir"])){
            ("location: www.google.com");
            }

            echo "<table><tr>
                <td> Nota de Base de datos </td>
                <td> Nota de Lenguaje de marcas </td>
                <td> Nota de Programacion </td>
                </tr>";
            $fila = $resultado -> fetch_assoc();
            while($fila){
            echo "<tr>
            <td>{$fila["notabae"]}</td>
            <td>{$fila["notalnd"]}</td>
            <td>{$fila["notaprogramacion"]}</td>
            </tr>";
            $fila = $resultado -> fetch_assoc();
            }
            echo "</table>";
            }else{
                echo "Error";
            }
        }
    ?>
</body>
</html>