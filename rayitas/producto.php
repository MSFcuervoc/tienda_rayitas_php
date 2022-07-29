<?php require ('server.php'); ?>
<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: sesion.php");
}
?>
<?php
      if(isset($_POST['comprar']) && $_POST['comprar']=="comprar"){
      $query="INSERT INTO compras (id,cliente,codigo,nombre, precio,cantidad,fecha) VALUES (NULL,'$_POST[cliente]','$_POST[codigo]','$_POST[nombre]','$_POST[precio]', '$_POST[cantidad]',NOW())";
      $conn->query($query); 
      $ID=$conn->insert_id;
      if($ID) header("Location: boleta.php");
      }
      ?>
<?php
if($_GET['id']==""){
    header("Location: index.php");
}
$id=$_GET['id'];
$query=" SELECT * FROM productos WHERE 1 AND id=$_GET[id]";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
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
    <link rel="stylesheet" href="assets/css/style.css">



    <title>producto</title>

</head>






<body class="bg-warning">
    <?php include 'menu.php';?>
    <?php include 'cabecera.php';?>


    <main class="container">
        <article class="row">
            <img class="col-8 col-md-6" src="assets/img/<?php echo $row['codigo']?>.png" alt="">
            <ul class="col-8 col-md-6">



                <li class="border-bottom border-dark">Id:<?php echo $row['id']?></li>
                <li class="border-bottom border-dark">Nombre:<?php echo $row['nombre']?></li>
                <li class="border-bottom border-dark">Frase promocional:<?php echo $row['frase_promocional']?></li>
                <li class="border-bottom border-dark">Precio:<?php echo number_format($row['precio'])?></li>
                <li class="border-bottom border-dark">Codigo:<?php echo $row['codigo']?></li>
                <li class="border-bottom border-dark">Categoría:<?php echo $row['categoria']?></li>
                <li class="border-bottom border-dark">Colores:<?php echo $row['colores']?></li>
                <li class="border-bottom border-dark">Descripcion:<?php echo $row['descripcion']?></li>
                <li class="border-bottom border-dark">Promocion:<?php if ($row['promocion']>0){echo "esta en promocion";}
  else {echo "no esta no esta en promocion";}?></li>
                <li class="border-bottom border-dark">Fecha:<?php echo $row['fecha']?></li>
                <li class="border-bottom border-dark">Disponibilidad:<?php if ($row['disponibilidad']>0){echo "esta disponible";}
  else {echo "no esta disponible";}?></li>


                <form class=" mt-5 border border-3 border-dark " id="compra" name="compra" method="post" action="">
                    <strong>$<?php echo number_format($row['precio']);?></strong><br />
                    <label for="cantidad">cantidad</label>
                    <input name="cantidad" type="number" id="cantidad" value="1" size="3" maxlength="3" />
                    <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio']; ?>" />
                    <input name="codigo" type="hidden" id="codigo" value="<?php echo $row['codigo']; ?>" />
                    <input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>" />
                    <input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id'];?>" />
                    <input type="submit" name="comprar" id="comprar" value="comprar" />
                </form>
            </ul>





        </article>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <?php include 'pie.php'; ?>
</body>

</html>