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
    <title>Modificar datos persona</title>
    <link rel="stylesheet" href="../../../public/estilos/controladores.css">
</head>
<body>
    <span id="titulo">Modificacion de Contraseña</span>
    <div id="panelInicial">
    <?php
        $codigo=$_GET["codigo"];
    ?>
    <form id="formulario01" method="post" action="../../controladores/admin/cambiar_contrasena_usuario.php">
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
        <label for="contrasena" id="label1">Constraseña actual</label>
        <input type="password" id="contrasena" name="contrasena" value="" required placeholder="Ingresar nueva contraseña">
        <br>
        <input type="submit" id="submit" name="modificar" value="Modificar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="window.location.href='admin_usuarios.php'" />
    </form>
    </div>
</body>
</html>