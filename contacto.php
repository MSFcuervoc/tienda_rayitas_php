<?php require ('server.php');?>
<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: sesion.php");
}
?>    <?php if(isset($_POST['contacto']) && $_POST['contacto']=="contacto"){
$destinatario="david <contacto@rayitas.cl>";
$asunto="Contacto desde la página WEB";
$cuerpo= $_POST['info-email'];
$cabecera = "From: $SESSION[nombre]<$SESSION[email]>\r\n";
$cabecera .= "Reply-To: $SESSION[email]\r\n";
$cabecera .= "Return-Path: $SESSION[email]\r\n";
$cabecera .= "Errors-To: $SESSION[email]";
mail("$destinatario", "$asunto", "$cuerpo", "$cabecera"); }
?>

<!doctype html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Tienda Virtual - Rayitas S.A.</title>
</head>
<body class="bg-warning">
    <?php include 'menu.php'; ?>
    <?php include 'cabecera.php'; ?>


    
<form class="container" action=""method="post" name="contacto">
<div class="mb-3">
    <label class="form-label" for="infoimail">Para contactarse con el administrador Tienda Virtual Rayitas S.A. mandar correo</label>
<textarea class="form-control"name="info-email" id="infoimail" cols="90" rows="10"></textarea>
<input type="submit"name="contacto"value="contacto"class="btn mt-3 btn-dark">
</div>


</form>

    <?php include 'pie.php'; ?>
</body>
</html>
