<?php require ('server.php');?>
<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: sesion.php");
}
?>
<? $query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
      $resource = $conn->query($query); 
      $total = $resource->num_rows;
      ?>

      <?php 
$destinatario="david <davidsalas409@gmail.com>";
$asunto="Contacto desde la página WEB";
$cuerpo="Este es el cuerpor del documeto.";
$cabecera = "From: $nombre<$email>\r\n";
$cabecera .= "Reply-To: $email\r\n";
$cabecera .= "Return-Path: $email\r\n";
$cabecera .= "Errors-To: $email";
mail("$destinatario", "$asunto", "$cuerpo", "$cabecera");
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
    <?php 
$cabecera = "From: ".$row['nombre']."<".$row['email'].">\n";
$cabecera .= "Reply-To: ".$row['email']."\n";
$cabecera .= "Cc: gerente@rayita.cl\n";
?>
    <?php 
$cuerpo="El usuario ".$row['nombre']." a realizado una compra en el sitio web:
Nombre: ".$row['nombre']."
Email: ".$row['email']."
Teléfono: ".$row['telefono']."
Dirección de entrega: ".$row['direccion']."
Pais: ".$row['pais']."
_______________________________________________
";
?>
<?php
$destinatario="davidsalas409@gmail.com.";
$asunto="Venta de rayitas desde el sitio WEB";
mail("$destinatario", "$asunto", "$cuerpo", "$cabecera");
?>
    <?php if($total){?>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  while ($row = $resource->fetch_assoc()){?>
            <tr>
                <td>Rayas <?php echo $row['nombre']?></td>
                <td align="center">$<?php echo number_format($precio=$row['precio']);?></td>
                <td align="center"><?php echo $cantidad=$row['cantidad']?></td>
                <td align="right">$<?php echo number_format($sub=$precio*$cantidad); $subtotal2+=$sub?></td>
            
            </tr>
            <?php }?>
            <tr>
                <td></td>
                <td></td>
                <td>subtotal</td>
                <td><?php echo "$ ",number_format($subtotal2 );
  ?></td>
            </tr>
            <tr>
                <td> </td>
                <td></td>
                <td> <?php echo $envio= "ENVÍO"  ?></td>
                <td> <?php if($subtotal > 50000){
   $envio=0;} else 
   if($subtotal >25000) {$envio=2000;} else {$envio=5000;}
echo "$ ",number_format($envio); ?></td>
            </tr>
            <?php if ($subtotal >= 50000){$subtotal2= $subtotal  ;
 $descuento =  $subtotal2  * 0.10    ;
echo " <tr>
<td> </td>
<td></td>
<td> Descuento 10%</td>
<td> $ $descuento   </td>
</tr> " ; 
}
?>
            <tr>
                <td></td>
                <td></td>
                <td>subtotal</td>
                <td><?php echo "$ ",number_format($subtotal = $subtotal2 - $descuento + $envio);
  ?></td>
            </tr>
            <tr>
                <td> </td>
                <td></td>
                <td>IVA</td>
                <td><?php echo  "$ ",number_format($iva =  $subtotal *.19) ?></td>
            </tr>
            <tr>
                <td> </td>
                <td></td>
                <td>Total</td>
                <td><?php echo "$ ",number_format($final_precio = $subtotal + $iva)?></td>
            </tr>
        </tbody>
    </table>
<?php } else {?>
    <p>No tiene productos en su carro de compra</p>
<?php }?>
    <?php include 'pie.php'; ?>
</body>
</html>