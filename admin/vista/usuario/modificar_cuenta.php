<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }else if($_SESSION['usu_rol'] == "A"){
        header("Location: ../../../admin/vista/admin/admin_index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modificar datos persona</title>
    <link rel="stylesheet" href="../../../public/estilos/controladores.css">
</head>
<body>
    <span id="titulo">Modificacion de Usuarios</span>
    <div id="panelInicial">
    <?php
        $codigo=$_SESSION['usu_codigo'];
        $sql="SELECT * FROM usuario WHERE usu_codigo=$codigo";
        include '../../../config/conexionBD.php'; 
        $result=$conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
                <form id="formulario01" method="post" action="../../controladores/usuario/modificar_usuario.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
                    <label for="cedula" id="label1">Cedula</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingresar cedula"/>
                    <br>
                    <label for="nombres" id="label1">Nombres</label>
                    <input type="text" id="nombres" name="nombres" style="text-transform:uppercase"  value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingresar nombres"/>
                    <br>
                    <label for="apellidos" id="label1">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" style="text-transform:uppercase" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingresar apellidos"/>
                    <br>
                    <label for="direccion" id="label1">Direccion</label>
                    <input type="text" id="direccion" name="direccion" style="text-transform:uppercase"  value="<?php echo $row["usu_direccion"]; ?>" required placeholder="Ingresar direccion"/>
                    <br>
                    <label for="telefono" id="label1">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required placeholder="Ingrese el teléfono"/>
                    <br>
                    <label for="fecha" id="label1">Fecha Nacimiento</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento"/>
                    <br>
                    <label for="correo" id="label1">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico"/>
                    <br>
                    <input type="submit" id="submit" name="modificar" value="Modificar"/>
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="window.location.href='cuenta_usuario.php'"/>
                </form>
                <?php   
            }
        }else {
            echo "<p>Ha ocurrido un error inesperado</p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }
        $conn->close()
        ?> 
    </div>
</body>
</html>