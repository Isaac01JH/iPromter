<?php

session_start();
if (!isset($_SESSION["nombre"])) {
  header('Location:home.html');
}
?>

<?php
include("conexion.php");
//obtengo el id del artista por medio del boton 

$idUsuario = $_SESSION['idUsuario'];

$query = "SELECT Per.informacion, Per.Foto , Art.alias, Art.idUsuario,
            Red.Facebook , Red.Youtube , Red.Instagram, Red.Soundcloud, Red.Spotify
            FROM perfil Per 
            INNER JOIN  artista Art ON Per.idArtista = Art.idArtista 
            INNER JOIN redessociales Red ON Per.idRedSocial = Red.idRedSocial
            WHERE Art.idUsuario = '$idUsuario'";

$resultado = mysqli_query($conexion, $query);

if (!$resultado = mysqli_query($conexion, $query)) {
  exit(mysqli_error($conexion));
}

if (mysqli_num_rows($resultado) > 0) {
  $fila = mysqli_fetch_assoc($resultado);

  $perfil["info"] = $fila["informacion"];
  $perfil["alias"] = $fila["alias"];
  $perfil["fb"] = $fila["Facebook"];
  $perfil["ig"] = $fila["Instagram"];
  $perfil["sc"] = $fila["Soundcloud"];
  $perfil["yt"] = $fila["Youtube"];
  $perfil["spotiUno"] = $fila["Spotify"];
  $perfil["foto"] = $fila["Foto"];
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>iPromoter "Crea, conoce y triunfa "</title>

  <!--hojas de estilo del navbar-->
  <link rel="stylesheet" href="Cssn/menu-overlay.css">
  <link rel="stylesheet" href="Cssn/scrollbar.css">

  <link rel="shortcut icon" type="image/x-icon" href="copia.ico">
  <link href="Cssn/editaArtista.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



</head>

<body>

  <div class="fullpageMenu" id="nav">
    <div class="nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="destacados.php">Destacados</a></li>
        <li><a href="buscar.php">Buscar</a></li>
        <li><a href="musicos.php">Musicos</a></li>
        <li><a href="perfil_usu.php">perfil</a></li>
        <li> <?php
              error_reporting(0);
              include("conexion.php");

              $id2 = $_SESSION['idUsuario'];
              $query2 = "SELECT idUsuario from artista where idUsuario='$id2'";
              $result = mysqli_query($conexion, $query2);

              if (mysqli_num_rows($result) > 0) {
                // si la mamada existe, has lo que quieras que haga
                echo '<a href="editArtista.php" class="dropdown-item">Perfil de artista</a>';
              } else {
                echo '<a href="formArtista.php" class="dropdown-item">Se artista!</a>';
              }

              ?></li>
        <?php
        if (!isset($_SESSION["nombre"])) {
          echo ' <li><a href="home.html">Inicia sesión</a></li>';
        } else {
          echo ' <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>';
        }
        ?>

      </ul>
    </div>
  </div>
  <span class="menuicon" id="toggle" onclick="menuToggle()"></span>


  <div class="flex-container">
    <div class="titulo">
      <h1>Hola,<?php echo $perfil["alias"] ?>
      </h1>
      <div class="informacion">
        <ul>
          <li>Toda la informacion que coloques en este formulario, será muestra de tu perfil como artista</li>
          <li>Tienes la opcion de poner tus redes sociales asi como tus plataformas de streaming</li>
          <li>Tus datos personales no serán parte de este perfil publico</li>
          
        </ul>
      </div>
    </div>

    <form class="form" enctype="multipart/form-data" action="editArt.php" method="post">
      <div class="item">
        <span class="is-required">Alias</span>
        <input type="text" name="alias" placeholder="Tu alias" value="<?php echo $perfil['alias'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Link de Facebook</span>
        <input type="text" name="face" placeholder="Link de tu Facebook" value="<?php echo $perfil['fb'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Link de Instagram</span>
        <input type="text" name="insta" placeholder="Link de tu Instagram" value="<?php echo $perfil['ig'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Link de YouTube</span>
        <input type="text" name="video" placeholder="Link de cancion de youtube" value="<?php echo $perfil['yt'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Link de Spotify</span>
        <input type="text" name="rolaUno" placeholder="Link de cancion de spotify" value="<?php echo $perfil['spotiUno'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Link de SoundCloud</span>
        <input type="text" name="sound" placeholder="Link de tu Soundcloud" value="<?php echo $perfil['sc'] ?>" required="required">
      </div>
      <div class="item">
        <span class="is-required">Tu informacion</span>
        <textarea maxlength="350" name="informacion" placeholder="Ingresa aqui toda tu informacion que será publica en todo momento ('350 caracteres como maximo')" rows="5"><?php echo $perfil['info'] ?></textarea>
      </div>
      <div class="item">
        <span class="is-required">Tu imagen</span>
        <input style="background: transparent; " required="required" type="file" name="imagen" />
      </div>
      <input type="hidden" name="id" value="<?php echo $idUsuario  ?> ">
      <div class="btn-container">
        <input class="btn" type="image" src="imagenes/play.png" alt="submit" placeholder="enviar">
      </div>
    </form>
  </div>


  <script src="js/menu-overlay.js"></script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>