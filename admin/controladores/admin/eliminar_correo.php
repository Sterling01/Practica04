<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "U"){
        header("Location: ../../../admin/vista/usuario/usuario_index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona</title>
</head>
<body>
    <?php
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE correo_usuario SET correo_eliminado = 'S', correo_fecha_modificacion = '$fecha' WHERE correo_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado el correo correctamemte!!!</p>";
        header('Refresh: 2; URL=../../../admin/vista/admin/admin_index.php');
    }else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='../../vista/admin/admin_index.php'>Regresar</a>";
    $conn->close();
    ?>
</body>
</html>