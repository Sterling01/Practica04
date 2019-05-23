# Practica04
Resolucion de problemas sobre PHP y MySQL
2. Crear un repositorio en GitHub
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/a.png)

3. Creación de la Base de Datos
La base de datos se llama hipermedial con tres tablas de acuerdo al diagrama E-R
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/b.png)

4. Sentencias SQL de la estructura de la base de datos.
Creación de tablas

Usuario
CREATE TABLE `usuario` (
 `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
 `usu_cedula` varchar(10) NOT NULL,
 `usu_nombres` varchar(50) NOT NULL,
 `usu_apellidos` varchar(50) NOT NULL,
 `usu_direccion` varchar(75) NOT NULL,
 `usu_telefono` varchar(20) NOT NULL,
 `usu_correo` varchar(30) NOT NULL,
 `usu_password` varchar(255) NOT NULL,
 `usu_fecha_nacimiento` date NOT NULL,
 `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `usu_rol` varchar(1) NOT NULL DEFAULT 'U',
 `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`usu_codigo`),
 UNIQUE KEY `usu_cedula` (`usu_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8

Correo Usuario
CREATE TABLE `correo_usuario` (
 `correo_codigo` int(11) NOT NULL AUTO_INCREMENT,
 `correo_asunto` varchar(50) NOT NULL,
 `correo_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `correo_emisor` varchar(50) NOT NULL,
 `correo_destinatario` varchar(50) NOT NULL,
 `correo_mensaje` varchar(500) NOT NULL,
 `correo_eliminado` varchar(1) NOT NULL DEFAULT 'N',
 `correo_fecha_modificacion` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`correo_codigo`),
 UNIQUE KEY `correo_codigo` (`correo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8

Imagen del usuario
CREATE TABLE `imagen_usuario` (
 `img_codigo` int(11) NOT NULL AUTO_INCREMENT,
 `img_nombre` varchar(100) NOT NULL,
 `img_ruta` varchar(100) NOT NULL,
 `img_usu_codigo` varchar(10) NOT NULL,
 `img_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `img_fecha_modificacion` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`img_codigo`),
 UNIQUE KEY `img_codigo` (`img_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8

5. Desarrollo de los requerimientos del usuario
Conexión con la base de datos
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/c.png)

Registro de los usuarios- Con una cedula, nombre, apellidos, dirección, teléfono, fecha de nacimiento, correo electrónico, contraseña y una imagen. Se valida que los campos no queden vacíos.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/d.png)

Creación de los usuarios con PHP- Se reciben todos los parámetros del formulario y se los almacena en variables PHP, se verifica si estas variables están definidas y se eliminan los espacios o caracteres extraños
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/f.png)

Login– Se inicia sesión con el correo y contraseña del usuario, validando que no estén vacios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/g.png)

Login en PHP- Se reciben los parámetros del formulario de login.html y se almacena en variables y se hace una consulta a la tabla usuarios con el correo y contraseña del usuario y si el resultado de la consulta es mayor que 1 se almacenan datos en las variables globales, se inicia una sesión y se dirige a la pagina del usuario
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/h.png)

Pagina de inicio del usuario- Se muestra la imagen y el nombre del usuario logueado y el listado de correos en su bandeja de entrada. Y un buscador de los correo filtrados por el remitente y ordenados por los mas recientes. Y en otro apartado los mensajes enviados también con la opción de búsqueda y ordenados por los mas recientes
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/i.png)

![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/j.png)

Búsqueda de los correos AJAX- Siempre que se ingrese un carácter se llamara a la función que buscara en la tabla de correos de acuerdo con ese carácter. Y el resultado se mostrará en una tabla.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/k.png)

Buscar correos PHP- Se recibe el carácter y se lo manda a un SELECT de la tabla de los correos y se lo compara que sea igual a cualquier valor del remitente del correo con LIKE
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/l.png)

Modificar los datos del usuario- Se cargan los datos del usuario en sesión para que pueda evidenciar que datos va a modificar de su cuenta y al enviar a modificar se hace un UPDATE en la tabla con sus nuevos datos.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/m.png)

Modificar usuario en PHP- Se reciben los datos del formulario y los nuevos valores se los inserta haciendo un UPDATE de su cuenta
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/n.png)

Cambiar la contraseña- Se necesita asegurar que sea el usuario el que cambia la contraseña por eso se pide la antigua contraseña y la nueva para actualizarla.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/o.png)

Cambiar la contraseña en PHP- Se reciben las dos contraseñas y se hace una consulta con la antigua contraseña para encontrar el usuario y si coinciden se actualiza la contraseña del usuario.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/p.png)

Agregar un avatar a la cuenta de usuario- Al momento de registrarse se tiene que agregar una imagen para la cuenta del usuario, pero si no agrega ninguna imagen se le asignara una por defecto
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/q.png)

6. Desarrollo de los requerimientos del administrador.
No puede enviar ni recibir correos- Se realiza por control de sesiones que un administrador no pueda ingresar a la página para la creación de un correo y para no recibir correos al momento de que el destinatario del correo sea el administrador se mostrara un mensaje que no se puede enviar un correo a ese destinatario.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/r.png)

Visualizar el listado de todos los correos- Se hace una consulta de todos los correos extrayendo solo la fecha, el emisor, destinatario y el asunto. Visualizándolos en una tabla
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/s.png)

Eliminar los correos de los usuarios- En la misma tabla se tiene una opción de eliminar que se envía a un PHP con el código del mensaje a eliminar. Se visualiza el contenido del correo y se procede a eliminarlo.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/t.png)

Eliminar correo en PHP- Se cambia el valor de la columna correo_eliminado para que no se siga mostrando para ninguno de los usuarios.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/u.png)

Eliminar, modificar y cambiar la contraseña de los usuarios- En cualquiera de las acciones se evidencia el contenido de lo que se va a cambiar y después hay un botón para ejecutar la acción
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/v.png)

Eliminar, modificar y cambiar la contraseña en PHP- Se hace una consulta con los datos ingresados si se los encuentra se realiza la acción guardando la fecha de la modificación
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/w.png)

Control de las sesiones- Se realiza evaluando el rol del usuario de la sesión iniciada en cada pagina si es un administrador, no podrá visualizar las paginas de los usuarios y viceversa.
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/x.png)

7. Funcionamiento de los requerimientos usuarios
Registro de los usuarios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/y.png)

Inicio de sesion
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/z.png)

Vista de usuario
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/1.png)

Enviar un correo
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/2.png)

Mensajes enviados
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/3.png)

Administracion de la cuenta
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/4.png)

Modificacion de los datos
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/5.png)

Cambiar contraseña
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/6.png)

Correos recibidos
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/7.png)

8. Funcionamiento de los requerimientos administrador
Listado de todos los correos de los usuarios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/8.png)

Eliminacion de un correo
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/9.png)

Listado de todos los usuarios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/10.png)

Eliminacion de los usuarios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/11.png)

Modificacion de los datos de los usuarios
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/12.png)

Cambiar contraseña 
![alt text](https://github.com/Sterling01/Practica04/blob/master/imagenesPractica/13.png)

<strong>RESULTADO(S) OBTENIDO(S)</strong>: Organizar sitios web basados en el lenguaje de programación PHP para persistir información en una base de datos relacional. Realizar consultas de datos con PHP y mostrarlos en una pagina web normal. Realizar validaciones de los formularios. Busqueda de datos en tiempo real.

<strong>CONCLUSIONES</strong>: Una página debe llevar un registro de lo que maneja, es decir debe contener información y que esta esté almacenada y que de acuerdo con su funcionalidad se pueda acceder.
Se necesita de JavaScript, PHP, para que un sistema pueda hacer validaciones, búsquedas, CRUD de la información que se maneja

Información de GitHub
Usuario: Sterling01
URL Practica04: https://github.com/Sterling01/Practica04  


