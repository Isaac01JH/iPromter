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
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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


      <div class="container-fluid" style=" background-color:#1D1D25;">
    
    <div class="container">
      <header>
        <h1 class=" " style="font-size:60px;">
          <p class="text-light text-center " >Conoce a nuestros artistas destacados.</p>
        </h1>

        <h1 class="my-2 " style="font-size:20px;">
          <p class="text-light text-center " >Te presentamos al top 5 artistas que mas han destacado segun las evaluacioes de los visitantes.</p>
        </h1>
      </header>
      <div class="dropdown-divider"></div>
      <!-- separacion-->
    
          
        <div class="container" style="margin-top:50px;">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">

    <?php
                include("conexion.php"); 
                $query = "SELECT  Per.Foto , Art.alias , Art.idArtista, Art.calificacion
                FROM perfil Per INNER JOIN  artista Art 
                ON Per.idArtista = Art.idArtista 
                WHERE Art.calificacion = 5;";
                          
                $resultado = mysqli_query($conexion,$query);

                

              
    
                while($mostrar=mysqli_fetch_array($resultado)  ){ 

                
            ?>
              
              
              <div class="col">
                <img src="data:image/jpg;base64,<?php echo base64_encode($mostrar["Foto"]); ?>" style= "height:250px; width: 200px;"> 
                <h1 class="text-center" style="font-size:20px; color:white; margin-top:10px;"><?php echo $mostrar['alias']?></h1>
                <div class="d-flex justify-content-center" >
                <form action="artistaPruebas.php" method="get" >
                    <button class="btn  btn-lg "  style="border-color:#white; background-color:#23232F; color:white;"  value="<?php echo $mostrar['idArtista'] ?>" name="id" onclick="location.href='artistaPruebas.php'">Ver perfil</button>
                </form>
                </div>
              </div>
            <?php 
            }
          
            ?>

</div>
</div>

 
<footer>
  <footer class="py-3 bg-#1D1D25 mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ipromoter 2020</p>
    </div>
    <!-- /.container -->
 
</footer>

  

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
