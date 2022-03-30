<?php

  session_start();
  if(!isset($_SESSION["nombre"])){
    header('Location:singin.html');
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

    </head>
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
            <a  style=" font-size:20px; color: white" class="nav-link" href="singin.html">Inicia sesión</a>
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
          <div class="btn-group" style="text-align: left;"   >
    <button type="button" class="btn btn-primary" style=" font-size:20px; background-color:#23232F;  border-color:#23232F;"> Estás logeado como : <?php echo $_SESSION["nombre"]?> </button>
    <button type="button"   style=" background-color:#23232F; border-color:#23232F;" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" >
    <a href="#" class="dropdown-item"><?php echo $_SESSION["correo"] ?></a>
        <a href="perfil_usu.php" class="dropdown-item">Editar perfil</a>
        <a href="formArtista.php" class="dropdown-item">Se artista!</a>
        <div class="dropdown-divider"></div>
        <a href="cerrar_sesion.php" class="dropdown-item"> Cerrar sesion</a>
    </div>
</div>
  </div>
      </nav>



      <div class="container-fluid" style="height: 500px; background-color:#1D1D25;">
      <div class="d-flex flex-row-reverse">
        <div class="p-2" style="margin-left: 50px;">
            <div class="col-lg-5 text-light">
              <h1 class="my-5 " style="font-size:100px;">
                <p class="text-light text-center " > Conoce a nuestros artistas.</p>
                <div class="dropdown-divider"></div>
            </div>
          </div>
        </div>
        <div class="p-2 " style="margin-right: x;">
          <img src="imagenes/PicsArt_02-18-07.11.58.png" style=" height: 500px; position:absolute;top:63px;right:10px;" >
        </div>
        <div class="p-1 " style="margin-right: x;">
          <img src="imagenes/kalid.png" style=" height: 500px; position:absolute;top:63px;right:200px;" >
        </div>
        </div>
      </div>
      </div> 
     






      </div>

      <div class=" album py-5  " style="margin-top: 100px; margin-left:10; ">
      <div class="container">
      <div class="row">
      <?php
                include("conexion.php"); 
                $query = "SELECT  Per.rutaFoto , Art.alias , Art.idArtista
                FROM perfil Per INNER JOIN  artista Art 
                ON Per.idArtista = Art.idArtista ";
                          
                $resultado = mysqli_query($conexion,$query);
    
                while($mostrar=mysqli_fetch_array($resultado)  ){ 

                
            ?>
              
              
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="<?php echo $mostrar['rutaFoto'];?>"  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
            <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <p class="card-text"><?php $mostrar['alias'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
             
              
              
            
        
            <?php 
            }
            ?>
            </div>
      </div>
</div>   
       
     
    






     
              
             
            

           














       

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>