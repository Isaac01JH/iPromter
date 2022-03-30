<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


            <form action="prueba.php"  method="post">
            <input id="radio1" type="radio" name="radio1" value="5"><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" type="radio" name="radio1" value="4"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" type="radio" name="radio1" value="3"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" type="radio" name="radio1" value="2"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" type="radio" name="radio1" value="1"><!--
        --><label for="radio5">★</label>

            <input type="submit" name="operar">
            </form>

            <?php
  if ($_REQUEST['radio1'])
  {
    $radio=$_REQUEST['radio1'];
    echo "el radio es de :".$radio;
  }
  
?>


<h1 class="text-center" style="font-size:50px; margin-left:30px;">
                 <p class="text-light text-center " >estas son pruebas</p>
                </h1>
    
</body>
</html>