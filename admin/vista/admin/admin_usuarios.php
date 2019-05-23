<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "U"){
        header("Location: ../../../admin/vista/usuario/usuario_index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" type="text/css" href="../../../public/estilos/admin.css">
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="admin_index.php">Inicio</a></li>
                <li><a href="" class="activo">Usuarios</a></li>
            </ul>
        </div>
        <div id="perfil">
            <?php  
                echo '<div id="img">';
                echo '<img src="../../../imagenes/'.$_SESSION['img_nombre'].'" width="75px" height="75px">';
                echo '</div>';
                echo '<p id="nombreUsuario">'.$_SESSION['usu_nombre'].' '.$_SESSION['usu_apellido'].'</p>';
            ?>
        </div>
        <p id="cerrar"><a href="../../../config/logout.php" id="btn">Cerrar Sesión</a></p>  
    </header>
    <div id="tituloIndex">
        <h1>Listado de Usuarios</h1>
    </div>
    <table>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
            <th>Cambiar Contraseña</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado!='S' and usu_rol!='A'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo " <td>" . $row['usu_cedula'] . "</td>";
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_direccion'] . "</td>";
                    echo " <td>" . $row['usu_telefono'] . "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                    echo " <td><a href='eliminar_usuario.php?codigo=".$row['usu_codigo']."'>Eliminar</a></td>";
                    echo " <td><a href='modificar_usuario.php?codigo=".$row['usu_codigo']."'>Modificar</a> </td>";
                    echo " <td><a href='cambiar_contrasena_usuario.php?codigo=".$row['usu_codigo']."'>Cambiar contraseña</a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>