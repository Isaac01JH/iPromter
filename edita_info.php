<?php
session_start();
include("conexion.php");
//Variable global $_POST

if (isset($_POST["nombre"]) && isset($_POST["apellidoPa"]) && isset($_POST["apellidoMa"]) && isset($_POST["correo"])) {

    //Una vez validadas las variables globales , es decir, que existen, se procede a leer su contenido.
    $Id = $_SESSION["idUsuario"];
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apellidoPa'];
    $apellidom = $_POST['apellidoMa'];
    $correo = $_POST['correo'];





    //Guardar los datos en la base de datos, utilizando sql.
    $query = "UPDATE  usuario SET nombre = '$nombre', apellidoPaterno = '$apellidop', apellidoMaterno = '$apellidom',  correo = '$correo'  WHERE idUsuario = '$Id'";



    if (!$resultado = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }

    echo '<script type="text/javascript">
            alert("Tus datos han  sido actualizados correctamente, inicia sesión para continuar");
            window.location.assign("close.php");
            </script>';
} else {
    echo "hubo un error al intentar leer los datos";
}
