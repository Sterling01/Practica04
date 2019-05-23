<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../public/estilos/usuario.css">
</head>
<body>
    <header>
        <div id="navHeader">
            <ul>
                <li><a href="usuario_index.php" >Inicio</a></li>
                <li><a href="nuevo_mensaje.php">Nuevo Mensaje</a></li>
                <li><a href="correos_enviados.php">Mensajes Enviados</a></li>
                <li><a href="" class="activo">Mi Cuenta</a></li>
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
        <h1>Cuenta Personal</h1>
    </div>
    <table>
        <?php
        include '../../../config/conexionBD.php';
        $codigo=$_SESSION['usu_codigo'];
        $sql = "SELECT * FROM usuario WHERE usu_codigo='$codigo'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($result->num_rows > 0) {
            echo '<div id="cuenta">';
                echo '<div id="cargar_usuario">';  
                    echo '<p>Nombre: '.$row['usu_nombres'].'</p>';
                echo '</div>';
                
                echo '<div id="cargar_usuario">';  
                    echo '<p>Apellidos: '.$row['usu_apellidos'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Cedula: '.$row['usu_cedula'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Fecha de Nacimiento: '.$row['usu_fecha_nacimiento'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Correo: '.$row['usu_correo'].'</p>';
                echo '</div>';
            
                echo '<div id="cargar_usuario">';  
                    echo '<p>Direccion: '.$row['usu_direccion'].'</p>';
                echo '</div>';
            
                echo '<div id="modificar">';  
                    echo '<a href="modificar_cuenta.php">Modificar Cuenta</a>';
                    echo '<a href="cambiar_contrasena.php">Cambiar Contrasena</a>';
                echo '</div>';
            
            echo '</div>';
            
        } else { 
            echo "<p>Surgió un error</p>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>