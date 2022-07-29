<?php require ('server.php'); ?>
<?php 
if(!isset($_SESSION))session_start();

?>
<?php
$max=8;
$pag=0;
if(isset($_GET['pag']) && $_GET['pag'] <>""){
$pag=$_GET['pag'];
}
$inicio=$pag * $max;
$query=" SELECT codigo,id,nombre, frase_promocional, precio FROM productos ORDER BY fecha DESC ";
$query_limit= $query ." LIMIT $inicio,$max";
$resource = $conn->query($query_limit);
if (isset($_GET['total'])) {
$total = $_GET['total'];
} else {
$resource_total = $conn -> query($query);
$total = $resource_total->num_rows;
}
$total_pag = ceil($total/$max)-1;
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

    <title>productos</title>


</head>

<body class="bg-warning">
    <header>
        <?php include 'menu.php'; ?>
    
        <?php include 'cabecera.php'; ?>
        
    </header>

    <main>



        <ul class="pagination justify-content-center ">
            <li class=" page-item previous <?php if($pag-1 < 0){?> disabled<?php }?>"> <a
                    href="index.php?pag=<?php echo $pag -1?>&total=<?php echo $total?>" class=" page-link bg-dark text-white">← Anterior</a>
            </li>
            <li class=" page-item"> <a class="page-link bg-dark text-white"> <?php echo $pag  ?> </a> </li>
            <li class="page-item next <?php if($pag-1 > 0){?> disabled<?php }?>" style="float:right"> <a
                    href="index.php?pag=<?php echo $pag +1?>&total=<?php echo $total?>" class="page-link bg-dark text-white">Siguiente→</a></li>
           
        </ul>





                 
                     
               
            
            <?php if (isset($_GET['enviar'])){
    $busqueda = $_GET['busqueda'];
   
     

      $consulta = $conn->query("SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'");
     
      }
      ?>
 
        <section class="container bg-transparent">
            
        
        
            <div class="row">
            <?php if($busqueda = $_GET['busqueda']){?>
                <?php  while ($row = $consulta->fetch_assoc()){?>

                    <article class=" col-md-3 col-6    mb-5">
                    <div class="card  rounded shadow" >
                        <img src="assets/img/<?php echo $row['codigo']?>.png" class="card-img-top"
                            alt="imagen del producto">
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title"><?php echo $row['nombre']?></h5>
                            <p class="card-text"><?php echo $row['frase_promocional']?></p>
                            <p class="text-right">$ <?php echo $row['precio']?></p>
                            <a href="producto.php?id=<?php echo $row['id']?>" class="btn btn-warning">ver mas</a>
                        </div>
                    </div>
                </article>
                <?php }?>
                <?php  }else{?><?php if($total){?>
                <?php  while ($row = $resource->fetch_assoc()){?>

                <article class="col-md-3 col-6    mb-5">
                    <div class="card rounded shadow" >
                        <img src="assets/img/<?php echo $row['codigo']?>.png" class="card-img-top"
                            alt="imagen del producto">
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title"><?php echo $row['nombre']?></h5>
                            <p class="card-text"><?php echo $row['frase_promocional']?></p>
                            <p class="text-right">$ <?php echo $row['precio']?></p>
                            <a href="producto.php?id=<?php echo $row['id']?>" class="btn btn-warning">ver mas</a>
                        </div>
                    </div>
                </article>
                <?php }?>
                <?php  }else{?>
                <p class="error"> No hay resultados para su consulta </p>
                <?php }?>
                
                <?php }?>
            
            
              </div>

            <div>








                
            
            
              </div>

            <div>


            
            </div>



        </section>


    </main>


    <?php include 'pie.php'; ?>

</body>

</html>