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
    <title>Modificar datos de persona </title>
</head>
<body>
    <?php 
        include '../../../config/conexionBD.php';
        $codigo=$_POST["codigo"];
        $contrasena=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;
    
        $sqlContrasena1="SELECT * FROM usuario where usu_codigo=$codigo";
        $result=$conn->query($sqlContrasena1);
        
        if($result->num_rows > 0){
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            
            $sqlContrasena2="UPDATE usuario ".
            "SET usu_password=MD5('$contrasena'),".
            "usu_fecha_modificacion='$fecha'".
            "WHERE usu_codigo=$codigo";
            
            if($conn->query($sqlContrasena2) === TRUE){
                echo "Contraseña actualizada";
                header('Refresh: 2; URL=../../../admin/vista/admin/admin_usuarios.php');
            }else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>"; 
            }
        }else {
        }
        $conn->close();
        ?>
</body>
</html>