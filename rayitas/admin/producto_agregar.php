<?php require ('../server.php'); ?>
<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['admin_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: sesion.php");
}
?>
<?php
      if (isset( $_POST['enviar']) && $_POST['enviar']=="enviar"){
     echo $query="INSERT INTO `productos`(`id`, `nombre`, `frase_promocional`, `precio`, `codigo`, `categoria`, `colores`, `descripcion`, `promocion`, `fecha`, `disponibilidad`)
    VALUES (NULL, '$_POST[nombre]', '$_POST[frase_promocional]', '$_POST[precio]', '$_POST[codigo]', '$_POST[categoria]', '$_POST[color]', '$_POST[descripcion]','$_POST[promocion]',NOW(),'$_POST[disponibilidad]')";
       $conn->query($query); 
     $ID=$conn->insert_id;
    if($ID) header("Location: master.php");
      }
      ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <title>Registro</title>
</head>

<body class="bg-warning">
  
    <?php include("../menu.php");?>
    <?php include '../cabecera.php'; ?>

    <main class="container">
        <article class="row">
            <h3>registro de productos</h3>

            <div>




            </div>

            <form action="" name="enviar" id="enviar" method="post">

                <label class="form-label" for="">Nombre</label>
                <input class=" form-control" name="nombre" type="text" placeholder="Nombre">


                <label class="form-label" for="">Frase Promocional</label>
                <input name="frase_promocional" placeholder="Frase promocional" class=" form-control" type="text">


                <label class="form-label" for="">Precio</label>
                <input class=" form-control" name="precio" placeholder="Precio" type="number">



                <label class="form-label" for="">Codigo</label>
                <input class=" form-control" name="codigo" placeholder="Codigo" type="number">



                <label class="form-label" for="">Seleccionar Categoria</label>
                <select name="categoria" value="categoria" class="form-select" aria-label="Default select example">
                    <option value="horizontal">Horizontal</option>
                    <option value="vertical">Vertical</option>
                    <option value="curva">Curva</option>
                </select>



                <label class="form-label" for="">Seleccionar color</label><select name="color" value="color"
                    class="form-select" aria-label="Default select example">
                    <option value="rojo">Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="azul">Azul</option>
                    <option value="blanco">Blanco</option>
                    <option value="negro">Negro</option>
                    <option value="purpura">Purpura</option>

                </select>


                <label class="form-label" for="">Descripcion</label><input class=" form-control" type="text"
                    name="descripcion" placeholder="Descripcion">


                <label class="form-label" for="">Promocion</label><input class=" form-control" type="text"
                    name="promocion" placeholder="Promocion">


                <label class="form-label" for="">Disponibilidad</label><input class=" form-control" type="text "
                    name="disponibilidad" placeholder="Disponibilidad">


                <input class="mt-3 btn-dark" type="submit" name="enviar" id="enviar" value="enviar">





            </form>





        </article>
    </main>

    </form>











    <?php include '../pie.php'; ?>
</body>

</html>