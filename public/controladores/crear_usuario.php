<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <link rel="alternate" href="../../index.html">
    <style type="text/css" rel="stylesheet">
    .error{
        color: red;
    }
    </style>
</head>
<body>
    <?php
        //Incluir conexión a la base de datos
        include '../../config/conexionBD.php';
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        if(isset($_FILES['img'])){
            $img_nombre=$_FILES['img']['name'];
            $img_tmp=$_FILES['img']['tmp_name'];
            $img_ruta="../../imagenes/".$img_nombre;
            if(copy($img_tmp,$img_ruta)){
                $sql ="INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N','U', null, null)";
                $sql1="INSERT INTO imagen_usuario VALUES (0, '$img_nombre','$img_ruta','$cedula', null, null)";
                if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
                    echo "<p>Usuario Creado</p>";
                    header('Refresh: 1; URL=../../index.html');
                } else {
                    if($conn->errno == 1062){
                        echo "<p class='error'>El usuario ya se encuentra registrado en el sistema </p>";
                    }else{
                        
                    }
                }
            }else{
                $sql ="INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N','U', null, null)";
                $sql1="INSERT INTO imagen_usuario VALUES (0, 'default.png','../../imagenes/default.png','$cedula', null, null)";
                if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
                    echo "<p>Usuario Creado</p>";
                    header('Refresh: 1; URL=../../index.html');
                } else {
                    if($conn->errno == 1062){
                        echo "<p class='error'>El usuario ya se encuentra registrado en el sistema </p>";
                    }
                }
            }
        }
        //Cerrar la base de datos
        $conn->close();
    ?>
</body>
</html>