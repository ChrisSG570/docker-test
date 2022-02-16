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
        <label for="">Introduce la nota de base de datos:</label>
        <input type="text" name="notabae"><br>
        <label for="">Introduce la nota de lenguaje de marcas:</label>
        <input type="text" name="notalnd"><br>
        <label for="">Introduce la nota de programacion</label>
        <input type="text" name="notaprogramacion"><br>
        <input type="submit" name="confirmar" value="Modificar notas">
    </form>
    <?php
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }

    if(isset($_POST["notabae"])&&isset($_POST["notalnd"])&&isset($_POST["notaprogramacion"])){
        $notabae = $_POST["notabae"];
        $notalnd = $_POST["notalnd"];
        $notaprogramacion = $_POST["notaprogramacion"];
    }

    if(isset($_POST["confirmar"])){
    $mysqli = new mysqli ("mysql", "root", "root", "examen_2122");
    if($mysqli -> connect_error){
        echo "Ha habido un problema con la conexión";
    }else{
        $sql = "UPDATE notas SET notabae = $notabae, notalnd = $notalnd, notaprogramacion = $notaprogramacion WHERE dni = '$dni'";
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

            echo "<h1>Datos cambiados</h1>";
        }
    }
}
    ?>
</body>
</html>