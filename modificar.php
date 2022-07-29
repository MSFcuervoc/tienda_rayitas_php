<?php require ('server.php'); ?>
<?php 
      if(isset($_POST['modificar']) && $_POST['modificar']=="modificar"){
      $query="UPDATE compras SET cantidad = '$_POST[cantidad]' WHERE `id` = '$_POST[id]'";
      if($conn->query($query)) header("Location: boleta.php");
      }
      ?>
<?php

        $query_p=" SELECT * FROM productos WHERE 1 AND codigo='$_GET[codigo]'";
        $resource_p = $conn->query($query_p); 
        $total_p = $resource_p->num_rows;
        $row_p = $resource_p->fetch_assoc();
        $query_c=" SELECT * FROM compras WHERE 1 AND id='$_GET[id]'";
        $resource_c = $conn->query($query_c); 
        $total_c = $resource_c->num_rows;
        $row_c = $resource_c->fetch_assoc();
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
            <img class="col-8 col-md-6" src="assets/img/<?php echo $row_p['codigo']?>.png" alt="">
            <ul class="col-8 col-md-6">



                <li class="border-bottom border-dark">Id:<?php echo $row_p['id']?></li>
                <li class="border-bottom border-dark">Nombre:<?php echo $row_p['nombre']?></li>
                <li class="border-bottom border-dark">Frase promocional:<?php echo $row_p['frase_promocional']?></li>
                <li class="border-bottom border-dark">Precio:<?php echo number_format($row_p['precio'])?></li>
                <li class="border-bottom border-dark">Codigo:<?php echo $row_p['codigo']?></li>
                <li class="border-bottom border-dark">Categoría:<?php echo $row_p['categoria']?></li>
                <li class="border-bottom border-dark">Colores:<?php echo $row_p['colores']?></li>
                <li class="border-bottom border-dark">Descripcion:<?php echo $row_p['descripcion']?></li>
                <li class="border-bottom border-dark">Promocion:<?php if ($row_p['promocion']>0){echo "esta en promocion";}
  else {echo "no esta no esta en promocion";}?></li>
                <li class="border-bottom border-dark">Fecha:<?php echo $row_p['fecha']?></li>
                <li class="border-bottom border-dark">Disponibilidad:<?php if ($row_p['disponibilidad']>0){echo "esta disponible";}
  else {echo "no esta disponible";}?></li>


<form id="compra" name="compra" method="post" action="">
<strong>$<?php echo number_format($row_p['precio']);?></strong>
<label for="cantidad">cantidad</label>
<input name="cantidad" type="text" id="cantidad" value="<?php echo $row_c['cantidad']; ?>" size="3" maxlength="3" />
<input name="id" type="hidden" id="id" value="<?php echo $row_c['id']; ?>" />
<input type="submit" name="modificar" id="modificar" value="modificar" />
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