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
    <meta charset="utf-8">
    <title>Eliminar datos persona</title>
    <link rel="stylesheet" href="../../../public/estilos/controladores.css">
</head>
<body>
    <span id="titulo">Eliminacion de Usuarios</span>
    <div id="panelInicial">
    <?php
        $codigo=$_GET["codigo"];
        $sql="SELECT * FROM usuario WHERE usu_codigo=$codigo";
        include '../../../config/conexionBD.php';
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                ?>
                <form id="formulario01" method="post" action="../../controladores/admin/eliminar_usuario.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
                    <label for="cedula" id="label1">Cedula</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/>
                    <br>
                    <label for="nombres" id="label1">Nombres</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/>
                    <br>
                    <label for="apellidos" id="label1">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/>
                    <br>
                    <label for="direccion" id="label1">Direccion</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled/>
                    <br>
                    <label for="telefono" id="label1">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/>
                    <br>
                    <label for="fecha" id="label1">Fecha Nacimiento</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/>
                    <br>
                    <label for="correo" id="label1">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/>
                    <br>
                    <input type="submit" id="submit" name="eliminar" value="Eliminar" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="window.location.href='admin_usuarios.php'"/>
                </form>
                <?php
            }
        }else{
                echo "<p>Ha ocurrido un error inesperado</p>";
                echo "<p>" . mysqli_error($conn) . "</p>";
        }
        $conn->close();
    ?>
    </div>
</body>    
</html>