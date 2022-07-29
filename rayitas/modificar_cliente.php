<?php require ('server.php'); ?>
<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: /sesion.php");
}
?>
<?php
      if(isset($_POST['registrar']) && $_POST['registrar']=="registrar"){
     $query="UPDATE clientes SET  nombre = '$_POST[nombre]' ,email='$_POST[email]',telefono='$_POST[telefono]',pais='$_POST[pais]',direccion='$_POST[direccion]',usuario='$_POST[usuario]',pass='$_POST[pass]' WHERE id =$_SESSION[user_id] ";
     if($conn->query($query)) echo "cambios guardados";
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Mis datos</title>
</head>

<body class="bg-warning">



    <?php include("menu.php");?>
    <?php include 'cabecera.php'; ?>

    <main class="container">
        <article class="row">
            <h1 class="text-center"> Datos del Usuario  </h1>
            <h2></h2>
 <ul class="fs-2 mt-5">
     <li class="border-bottom border-dark">Nombre :<?php echo $_SESSION['nombre']?></li>
     <li class="border-bottom border-dark">Email :<?php echo $_SESSION['email']?></li>
     <li class="border-bottom border-dark">Telefono :<?php echo $_SESSION['telefono']?></li>
     <li class="border-bottom border-dark">País :<?php echo $_SESSION['pais']?></li>
     <li class="border-bottom border-dark">Direccion :<?php echo $_SESSION['direccion']?></li>
     <li class="border-bottom border-dark">Nombre Usuario :<?php echo $_SESSION['usuario']?></li>
     <li class="border-bottom border-dark">Contraseña :<?php echo $_SESSION['pass']?></li>
 </ul>

<form action="" name="enviar" id="enviar" method="post">
<!-- Button trigger modal -->
<button type="button" class="mb-5 mt-5 btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Cambiar datos
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mis datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      

<label class="form-label" for="nombre">Nombre</label>
<input  id ="nombre"class=" form-control" value="<?php echo $_SESSION['nombre']?>" name="nombre" type="text" placeholder="Nombre">


<label class="form-label" for="correo">Correo</label>
<input id="correo" name="email" placeholder="Correo" value="<?php echo $_SESSION['email']?>" class=" form-control" type="email">


<label class="form-label" for="telefono">telefono</label>
<input id="telefono" class=" form-control" name="telefono"value="<?php echo $_SESSION['telefono']?>" placeholder="telefono" type="number">


<label class="form-label" for="pais">País</label>
<select id="pais"name="pais" value="pais" class="form-select" value="<?php echo $_SESSION['pais']?>" aria-label="Default select example">
    <option value="chile">Chile</option>
    <option value="argentina">Argentina</option>
    <option value="Brazil">Brazl</option>
    <option value="<?php echo $_SESSION['pais']?>" selected><?php echo $_SESSION['pais']?></option>
</select>


<label class="form-label" for="direccion">Direccion</label>
<textarea id="dirreccion" class=" form-control"placeholder="<?php echo $_SESSION['direccion']?>" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion']?>" cols="30" rows="4"></textarea>


<label class="form-label" for="usuario">Usuario</label>
<input id="usuario" value="<?php echo $_SESSION['usuario']?>" class=" form-control" type="text"
    name="usuario" placeholder="usuario">


<label class="form-label" for="contrasena">Contraseña</label>
<input  id="contrasena"value="<?php echo $_SESSION['pass']?>" class=" form-control" type="password"
    name="pass" placeholder="contraseña">





    


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
   <input class="btn btn-dark"type="submit"name="registrar"id="registrar"value="registrar">
      </div>
    </div>
  </div>
</div>  
</form>
            

              
        </article>
    </main>

    







    



    <?php include 'pie.php'; ?>
</body>

</html>