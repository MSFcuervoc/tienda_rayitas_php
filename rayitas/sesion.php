<?php require ('server.php'); ?>
<?php if(!isset($_SESSION))session_start();?>
<?php
	if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['clave']) && $_POST['clave']<>"") ){
		$query="SELECT * FROM administrador WHERE 1 AND usuario='$_POST[usuario]' AND pass='$_POST[clave]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['admin_id']=$row['id'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['usuario']=$row['usuario'];
		$_SESSION['pass']=$row['pass'];
		$volver=($_SESSION['volver'])?$_SESSION['volver']:"admin/master.php";
	header("Location: ".$volver);
	} else {
		$error="Usuario/Clave no registrados";       
	}
}
?>
<?php
	if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['clave']) && $_POST['clave']<>"") ){
		$query="SELECT * FROM clientes WHERE 1 AND usuario='$_POST[usuario]' AND pass='$_POST[clave]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['user_id']=$row['id'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['email']=$row['email'];
		$_SESSION['telefono']=$row['telefono'];
		$_SESSION['pais']=$row['pais'];
		$_SESSION['direccion']=$row['direccion'];
		$_SESSION['usuario']=$row['usuario'];
		$_SESSION['pass']=$row['pass'];
		$volver=($_SESSION['volver'])?$_SESSION['volver']:"index.php";
	header("Location: ".$volver);
	} else {
		$error="Usuario/Clave no registrados";
        
	}
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

    <main class="container">
        <article class="row">
            <h2 class="border-bottom border-dark">REGISTRO</h2>
              <form action="" name="iniciar" id="enviar" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Si no estas registrado, ¿que esperas?</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" name="clave"class="form-control" id="exampleInputPassword1">
  </div>
  <input class="mt-3 btn-dark" type="submit" name="ingresar" id="ingresar" value="ingresar">
  
</form>
        </article>
    </main>

  
  










    <?php include 'pie.php'; ?>
</body>

</html>
