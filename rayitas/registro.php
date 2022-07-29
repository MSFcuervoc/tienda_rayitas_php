<?php require ('server.php'); ?>
<?php
      if(isset($_POST['registrar']) && $_POST['registrar']=="registrar"){
      $query="INSERT INTO `clientes` (`id`, `nombre`, `email`, `telefono`, `pais`, `direccion`, `usuario`, `pass`) VALUES (NULL, '$_POST[nombre]', '$_POST[email]', '$_POST[telefono]', '$_POST[pais]', '$_POST[direccion]', '$_POST[usuario]', '$_POST[pass]')";
      $conn->query($query); 
      $ID=$conn->insert_id;
      if($ID) header("Location: sesion.php");
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
    <title>Registro</title>
</head>

<body class="bg-warning">
    <?php include("menu.php");?>
    <?php include 'cabecera.php'; ?>
 <h1> REGISTRO </h1>
    <main class="container">
        <article class="row">
           
            <form action="" name="enviar" id="enviar" method="post">

<label class="form-label" for="">Nombre</label>
<input class=" form-control" name="nombre" type="text" placeholder="Nombre">


<label class="form-label" for="">Correo</label>
<input name="email" placeholder="Correo" class=" form-control" type="email">


<label class="form-label" for="">telefono</label>
<input class=" form-control" name="telefono" placeholder="telefono" type="number">


<label class="form-label" for="">País</label>
<select name="pais" value="pais" class="form-select" aria-label="Default select example">
    <option value="chile">Chile</option>
    <option value="argentina">Argentina</option>
    <option value="Brazil">Brazil</option>
</select>


<label class="form-label" for="direccion">Direccion</label>
<textarea class=" form-control" name="direccion" id="direccion" cols="30" rows="4"></textarea>


<label class="form-label" for="">Usuario</label><input class=" form-control" type="text"
    name="usuario" placeholder="usuario">


<label class="form-label" for="contrasena">Contraseña</label><input class=" form-control" type="password"
    name="pass" placeholder="contraseña">



<input class="mt-3 btn-dark" type="submit" name="registrar" id="registrar" value="registrar">





</form>

              
        </article>
    </main>

    











    <?php include 'pie.php'; ?>
</body>

</html>