<?php

  session_start();
  if(!isset($_SESSION["nombre"])){
    header('Location:singin.html');
}
?>

<?php
            include("conexion.php"); 
            //obtengo el id del artista por medio del boton 
            $idArtista = $_GET['id'];

            $query = "SELECT Per.informacion, Per.Foto , Art.alias,
            Red.Facebook , Red.Youtube , Red.Instagram, Red.Soundcloud, Red.Spotify
            FROM perfil Per 
            INNER JOIN  artista Art ON Per.idArtista = Art.idArtista 
            INNER JOIN redessociales Red ON Per.idRedSocial = Red.idRedSocial
            WHERE Per.idArtista = '$idArtista'";
                      
            $resultado = mysqli_query($conexion,$query);

            if(!$resultado = mysqli_query($conexion,$query)){
              exit(mysqli_error($conexion));
          }
          
          if(mysqli_num_rows($resultado)>0){
              $fila = mysqli_fetch_assoc($resultado);
              
              $perfil["info"]=$fila["informacion"];
              $perfil["foto"] = $fila["Foto"];
              $perfil["alias"] =$fila["alias"];
              $perfil["fb"]=$fila["Facebook"];
              $perfil["ig"] = $fila["Instagram"];
              $perfil["sc"] =$fila["Soundcloud"];
              $perfil["yt"] = $fila["Youtube"];
              $perfil["spotiUno"] =$fila["Spotify"];
              
              
          }
  
       ?>

       


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <title>iPromoter "Crea, conoce y triunfa "</title>
    <link rel="shortcut icon"type="image/x-icon" href="copia.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
       <link href="product.css" rel="stylesheet">
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <style>
        #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

#form p {
  text-align: center;
}

#form label {
  font-size: 20px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
  font-size: 100px;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
    </style>
    <style>
        body {
                overflow-x: hidden;
            }   
    </style>
    <body style="background-color: #23232F;">
      <!-- barra de navegación -->
      <nav class="navbar navbar-expand-lg navbar-light background-color:#23232F; ">
          <img src="imagenes/logo.png" style="height:30px;" >
          <p>⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</p>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
          <ul class="navbar-nav nav-fill w-75">
              <a style="font-size:20px; color: white" class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
          <li class="nav-item">
            <a  style=" font-size:20px; color: white" class="nav-link" href="buscar.php">Buscar artista</a>
          </li>
          <li class="nav-item">
            <a   style=" font-size:25px; color: white"class="navbar-brand" href="index.php">iPromoter</a>
          </li>
            <li class="nav-item dropdown">
              <a  style=" font-size:20px; color: white" class="nav-link dropdown-toggle" href="artistas.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorias
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="musicos.php">Musicos</a>
              </div>
            </li>
          </ul>
          <div class="btn-group" style="text-align: right;"   >
  <button type="button" class="btn btn-primary" style=" margin-left:100%; font-size:20px; background-color:#23232F;  border-color:#23232F;"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
    </svg>
  </button>
  <button type="button"   style="  background-color:#23232F; border-color:#23232F;" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      <span class="sr-only">Toggle Dropdown</span>
  </button>
    <div class="dropdown-menu" >
    <a href="#" class="dropdown-item"><?php echo $_SESSION["nombre"] ?></a>
        <a href="perfil_usu.php" class="dropdown-item">Editar perfil</a>
        <?php
            include("conexion.php"); 
            
              $id2= $_SESSION['idUsuario'];
                  $query2 = "SELECT idUsuario from artista where idUsuario='$id2'";
                  $result =mysqli_query($conexion,$query2);

                if(mysqli_num_rows($result) > 0)
                {
                    // si la mamada existe, has lo que quieras que haga
                      echo '<a href="editArtista.php" class="dropdown-item">Editar perfil de artista</a>';
                    }
                    else{
                      echo '<a href="formArtista.php" class="dropdown-item">Se artista!</a>';
                    }

            ?>
        <div class="dropdown-divider"></div>
        <a href="cerrar_sesion.php" class="dropdown-item"> Cerrar sesion</a>
    </div>
</div>
  </div>
      </nav>

      
     
          <!–– Alias del Artista ––>
            <h1 class="my-5 " style="font-size:100px;">
            <p class="text-light text-center " ><?php echo $fila['alias'] ?></p></h1>
          <!––Informacion del artista ––>  

          <div class="row align-items-lg-center">
      <div class="col-8 mx-auto col-md-4 order-md-2 col-lg-5">
      <img style="height: 700px; widht:10px; "class="img-fluid mb-3 mb-md-0"   src="data:image/jpg;base64,<?php echo base64_encode($perfil["foto"]); ?>">
      </div>
      <div class="col-md-8 order-md-1 col-lg-7 text-center text-md-start">
      <p class="mb-3" style="margin-left: 30px; margin-top: 10px; font-size:40px; color:white" >¿Quien soy? </p>  
        <p class="lead mb-4" style="margin-left: 30px; margin-top: 10px; color:white" ><?php echo $perfil['info'] ?></p>   
      </div>
    </div>
            <!––video de yt ––>   

      <?php
          $video = $perfil["yt"];
          $b = explode("/watch?v=", $video);
          $video = $b[0]."/embed/".$b[1];   
          ?>



      <h1 class="my-5 " style="font-size:100px;">
            <p class="text-light text-center " >Mi trabajo en YouTube</p></h1>    
      <div class="d-flex justify-content-center">
      <iframe width="1260" height="600"  src="<?php echo $video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

      <!––rolas de spotify 1 ––> 
      <h1 class="my-5 " style="font-size:100px;">
            <p class="text-light text-center " >Mi trabajo en Spotify</p></h1>  
          <?php
          $nombre = $perfil["spotiUno"];
          $a = explode(".com", $nombre);
          $nombre = $a[0].".com/embed".$a[1];
          ?>

         
 
                <div class="d-flex justify-content-center"> 
                <iframe src="<?php echo $nombre ?>" width="300" height="380"  frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                </div>       
   

            <!––redes sociales ––> 
      <h1 class="my-5 " style="font-size:100px;">
            <p class="text-light text-center " >Sigueme en mis redes sociales</p></h1>  
            <div  class="d-flex justify-content-center">
            <table class="default" style="padding-left: 90%;">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tr>
                <td> </td>
                <td></td>    
                <td></td>   
              </tr>
            </table>
            </div>

<div class="d-flex justify-content-center">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 "><a href=<?php echo $perfil['fb'] ?>><img style="height:100px;" src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/facebook-512.png"></a></div>
    </div>
    <div class="col">
      <div class="p-3 "><a href=<?php echo $perfil['ig'] ?>><img style="height:100px;" src="https://image.flaticon.com/icons/png/512/174/174855.png"></a></div>
    </div>
    <div class="col">
      <div class="p-3"><a href=<?php echo $perfil['sc'] ?>><img style="height:100px; " src="https://mamashelter.com/app/uploads/2020/11/soundcloud.png"></a></div>
    </div>
  </div>
</div>

<h1 class="my-5 " style="font-size:70px;">
<p class="text-light text-center " >Califica a este artista</p>
</h1>  
<div class="d-flex justify-content-center"> 
      <form action="estrellas.php" method="POST">
          
          <p class="clasificacion">
          <input type="hidden" style="color: trasnparent"  name="id" value="<?php echo $idArtista ?>">
        <input id="radio1" type="radio" name="estrellas" value="5"><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" type="radio" name="estrellas" value="4"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" type="radio" name="estrellas" value="3"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" type="radio" name="estrellas" value="2"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" type="radio" name="estrellas" value="1"><!--
        --><label for="radio5">★</label>
      </p>
      <div class="d-flex justify-content-center"> 
      <button type="submit" class="btn btn-primary btn-lg btn-block login-btn"  style=" margin-top: 30px; border-color:white; background-color:#23232F;">calificar</button>
          </div>
            </form>
      
      </div>  
      
      <div  style="margin-top: 100px; padding:10%"> 
       <div id="fb-root" style="background-color: white; ">
        <script async defer crossorigin="anonymous"  src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="Myfzv9J5"></script>
        <div class="fb-comments" s data-href="http://localhost/proyect/singin.html?<?php echo $idArtista?>" data-width="100%" data-numposts="5"></div>
         </div>
      </div>

<footer>
  <footer class="py-3 bg-#1D1D25 mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ipromoter 2020</p>
    </div> 
    <!-- /.contain er -->
  
</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
