<header class="container">
<div class="row">
<div class="col-6">
<h1 class="text-center">Tienda Virtual
<small>Rayitas S.A. </small></h1>
</div>
<div class="col-6"><h2 class="text-center"><p>Bienvenido <?php if($_SESSION['admin_id']){echo"administrador";}?></p>
<?php echo $_SESSION['nombre'];
  ?>

</h2>

</div>
</div>
</header>


