<?php require ('../server.php'); 
if(!isset($_SESSION))session_start();?>
<?php 
      if(isset($_POST['modificar']) && $_POST['modificar']=="modificar"){
       $query="UPDATE productos SET nombre='$_POST[nombre]',frase_promocional='$_POST[frase_promocional]',precio='$_POST[precio]',codigo='$_POST[codigo]',
      categoria='$_POST[categoria]',colores='$_POST[color]',descripcion='$_POST[descripcion]',promocion='$_POST[promocion]'
      ,disponibilidad='$_POST[disponibilidad]' WHERE `id` = '$_POST[id]'";
      if($conn->query($query)) header("Location: master.php");
      }
      ?>
      <?php 
if(isset($_GET['idElm']) && $_GET['idElm']<>""){
$query="DELETE FROM productos WHERE id='$_GET[idElm]'";
$conn->query($query);
}
?>




<?php

if($_GET['id']==""){
  header("Location: master.php");
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




    <title>detail</title>

</head>






<body class="bg-warning">
    <?php include '../menu.php';?>
    <?php include '../cabecera.php';?>

   
    <main class="container">
         <?php if($id){?>
        <article class="row border-bottom border-dark">
            <img class="col-8 col-md-6" src="../assets/img/<?php echo $row['codigo']?>.png" alt="">
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

<button type="button" class="mt-5 btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Modificar producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" name="modificar" id="enviar" method="post">

<label class="form-label" for="">Nombre</label>
<input class=" form-control" value="<?php echo $row['nombre']?>" name="nombre" type="text"
    placeholder="Nombre">


<label class="form-label" for="">Frase Promocional</label>
<input name="frase_promocional" placeholder="Frase promocional"
    value="<?php echo $row['frase_promocional']?>" class=" form-control" type="text">


<label class="form-label" for="">Precio</label>
<input class=" form-control" name="precio" placeholder="Precio" value="<?php echo $row['precio']?>"
    type="number">



<label class="form-label" for="">Codigo</label>
<input class=" form-control" name="codigo" placeholder="Codigo" value="<?php echo $row['codigo']?>"
    type="text">



<label class="form-label"  for="">Seleccionar Categoria</label>
<select class="form-select" name="categoria"value="<?php echo $row['categoria']?>" aria-label="Default select example">
    <option value="horizontal">Horizontal</option>
    <option value="vertical">Vertical</option>
    <option value="curva">Curva</option>
</select>



<label class="form-label" for="">Seleccionar color</label><select name="color"
    value="<?php echo $row['color']?>" class="form-select" aria-label="Default select example">
    <option value="rojo">Rojo</option>
    <option value="verde">Verde</option>
    <option value="azul">Azul</option>
    <option value="blanco">Blanco</option>
    <option value="negro">Negro</option>
    <option value="purpura">Purpura</option>

</select>


<label class="form-label" for="">Descripcion</label><input class=" form-control"
    value="<?php echo $row['descripcion']?>" type="text" name="descripcion" placeholder="Descripcion">


<label class="form-label" for="">Promocion</label><input class=" form-control"
    value="<?php echo $row['promocion']?>" type="text" name="promocion" placeholder="Promocion">


<label class="form-label" for="">Disponibilidad</label><input class=" form-control"
    value="<?php echo $row['disponibilidad']?>" type="text " name="disponibilidad"
    placeholder="Disponibilidad">

    <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>" />
  <div class="modal-footer">   
<input class=" btn btn-dark" type="submit" name="modificar" id="enviar" value="modificar">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>
  
     
        
        
      </div>
    </div>
  </div>
</div>




<button type="button" class="mt-5 btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Borrar producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   Esta seguro de eliminar este producto ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a  class=" btn btn-dark"href="/admin/detail.php?idElm=<?php echo $row['id'];?>">Eliminar</a>
      </div>
    </div>
  </div>
</div>
            </ul>


            

            








        </article>
           <?php } else {?>
    <p>No tiene productos en su carro de compra</p>
<?php }?>
    </main>
    



    <?php include '../pie.php'; ?>
</body>

</html>