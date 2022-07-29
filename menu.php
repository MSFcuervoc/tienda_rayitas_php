<div class="container-fluid   bg-dark d-flex justify-content-between ">
    <ul class="nav  fs-5 p-3 ">
    <li class="nav-item ">
            <a class="nav-link link-light" aria-current="page" href="/index.php">home</a>
        </li>
        
        <li class="nav-item ">
            <a class="nav-link link-light" aria-current="page" href="/registro.php">Registro</a>
        </li>
        <li class="nav-item ">
            <a class="   nav-link link-light" aria-current="page" href="/sesion.php">iniciar</a>
        </li>
        



          

        <?php if($_SESSION['user_id']|| $_SESSION['admin_id']){?><li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle link-light" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">usuario</a>
    <ul class="dropdown-menu">
    <?php if($_SESSION['user_id'] ){?><li> <a class="dropdown-item" href="/modificar_cliente.php">usuario</a> </li><?php }?>
 <?php if($_SESSION['user_id'] ){?><li > <a class="dropdown-item" href="/contacto.php">contacto</a> </li><?php }?>
 <?php if($_SESSION['user_id']){?><li> <a class="dropdown-item" href="/boleta.php">Boleta</a> </li><?php }?>
     
      <li><hr class="dropdown-divider"></li>
      <?php if($_SESSION['user_id']|| $_SESSION['admin_id']){?><li > <a class="dropdown-item" href="/logout.php">Salir</a> </li><?php } ?>
    </ul>
  </li><?php } ?>
    </ul>
    <form action="" method="get" class=" d-flex">
        <input type="text" name="busqueda">
        <input class="btn-warning" type="submit" name="enviar" value="buscar">
    </form>

    <ul class="nav  fs-5 p-3 ">
    <?php if($_SESSION['admin_id']){?><li class="nav-item "> <a class="nav-link link-light" href="/admin/producto_agregar.php">agregar</a> </li><?php }?>
    <?php if($_SESSION['admin_id']){?><li class="nav-item "> <a class="nav-link link-light" href="/admin/master.php">master</a> </li><?php }?>
    </ul>
</div>


