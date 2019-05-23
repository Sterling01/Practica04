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
    <style type="text/css" rel="stylesheet">
    .error{
        color: red;
    }
    </style>
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="" class="activo">Inicio</a></li>
                <li><a href="admin_usuarios.php">Usuarios</a></li>
            </ul>
        </div>
         <div id="perfil">
            <?php  
                echo '<div id="img">';
                echo '<img src="../../../imagenes/'.$_SESSION['img_nombre'].'" width="75px" height="80px">';
                echo '</div>';
                echo '<p id="nombreUsuario">'.$_SESSION['usu_nombre'].' '.$_SESSION['usu_apellido'].'</p>';
            ?>
        </div>
        <p id="cerrar"><a href="../../../config/logout.php" id="btn">Cerrar Sesión</a></p>  
    </header>
    <div id="tituloIndex">
        <h1>Mensaje Electronicos</h1>
    </div>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th></th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM correo_usuario WHERE correo_eliminado!='S' ORDER BY correo_fecha_creacion DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo " <td>" . $row['correo_fecha_creacion'] . "</td>";
                    echo " <td>" . $row['correo_emisor'] ."</td>";
                    echo " <td>" . $row['correo_destinatario'] . "</td>";
                    echo " <td>" . $row['correo_asunto'] . "</td>";
                    echo " <td><a href='eliminar_correo.php?codigo=".$row['correo_codigo']."'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'><p class='error'> No existen correos en el sistema</p></td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>