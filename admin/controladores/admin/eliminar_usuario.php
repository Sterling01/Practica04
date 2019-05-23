<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
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
    $codigo = $_POST["codigo"];
    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Datos de usuario eliminados correctamemte!!!</p>";
        header('Refresh: 2; URL=../../../admin/vista/admin/admin_usuarios.php');
    }else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>
</html>