<?php session_start(); ?>
<?php require_once "inc/funciones.php"; ?>
<?php require_once "inc/bbdd.php"; ?>
<?php require_once "inc/encabezado.php"; ?>
<!-- < ?php if(!isset($_SESSION["login"])){ 
			header("Location: login.php");
} ?> -->
<main role="main" class="container">

	<h2 class="mt-3">Elige el listado al que deseas acceder:</h2>
<div class="card-deck" style="width: 50rem;">
  <div class="card">
    <img class="card-img-top" src="img/productos.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Productos</h5>
      <p class="card-text">Listado de productos.</p>
	  <a href="productos.php" class="btn btn-outline-secondary">Acceder a productos</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/usuarios.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Usuarios</h5>
      <p class="card-text">Listado de usuarios.</p>
	  <a href="listado.php" class="btn btn-outline-secondary">Acceder a usuarios</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/pedidos.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Pedidos</h5>
      <p class="card-text">Listado de pedidos.</p>
	  <a href="listado.php" class="btn btn-outline-secondary">Acceder a pedidos</a>
    </div>
  </div>
</div>
</main>
<?php require_once "inc/pie.php"; ?>