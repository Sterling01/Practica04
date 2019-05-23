<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql="SELECT u.usu_codigo, u.usu_rol, u.usu_nombres, u.usu_apellidos, u.usu_correo, i.img_nombre FROM usuario u, imagen_usuario i WHERE u.usu_correo='$usuario' and u.usu_password=MD5('$contrasena') and u.usu_cedula=i.img_usu_codigo";
    $result = $conn->query($sql);
    //Obtiene una fila de la consulta como un arreglo
    $row= mysqli_fetch_array($result);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        //En la variable global SESSION se almacenan variables del usuario conectado
        $_SESSION['usu_codigo']= $row['usu_codigo'];
        $_SESSION['usu_rol'] = $row['usu_rol'];
        $_SESSION['usu_nombre']= $row['usu_nombres'];
        $_SESSION['usu_apellido']= $row['usu_apellidos'];
        $_SESSION['usu_correo']= $row['usu_correo'];
        $_SESSION['img_nombre']= $row['img_nombre'];
        //Si la fila del usuario en la columna usu_rol es U se accede como usuario sino accedera como administrador.
        if ($row['usu_rol'] == "U"){
            header("Location: ../../admin/vista/usuario/usuario_index.php");
        }else{
            header("Location: ../../admin/vista/admin/admin_index.php");
        }
    }else {
        header("Location: ../vista/login.html");
    }
    $conn->close();
?>