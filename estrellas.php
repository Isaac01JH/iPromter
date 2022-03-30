<?php

    include("conexion.php"); 
    session_start();
    //Variable global $_POST

    if(isset($_REQUEST['estrellas']) && isset($_POST["id"])){
        //Una vez validadas las variables globales , es decir, que existen, se procede a leer su contenido.
        $rate = $_REQUEST['estrellas'];
        $id = $_POST['id'];
        
        $anterior = "SELECT calificacion FROM artista WHERE idArtista = '$id';";
        $ante = mysqli_query($conexion, $anterior);

        if (!$ante = mysqli_query($conexion, $anterior)) {
            exit(mysqli_error($conexion));
        }
    
        if (mysqli_num_rows($ante) > 0) {
            $fila = mysqli_fetch_assoc($ante);
    
            $primero = $fila["calificacion"];
        }

        $suma = $primero + $rate;
    
    
    
        //Guardar los datos en la base de datos, utilizando sql.
        $query = "UPDATE artista SET calificacion = '$suma'  WHERE idArtista = '$id';";
        $resultado = mysqli_query($conexion,$query);

        

        if(!$resultado ){
            exit(mysqli_error($conexion));
        }
        
        echo ("<script language='JavaScript'>
        window.alert('Gracias por calificar a este artista!!')
        window.location.href='art.php?id=$id';
      </script>");


        

    }else{
        echo '<script type="text/javascript">
        alert("Hubo un error al intentar calificar,intenta de nuevo");
        
        </script>';
    }
?>