<?php session_start(); ?>
<?php require_once("funciones.php");?>
<?php require_once("inc/bbdd.php");?>
<?php	$pagina = "Carrito";
		$titulo = "Tu compra";
?>
<?php require_once("inc/encabezado.php");?>
<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Tu carrito de la compra</h1>
      <p><a class="btn btn-primary btn-lg" href="producto.php" role="button">Seguir comprando</a></p>
    </div>
  </div>
  <?php
  if(empty($_SESSION['carrito'])){
	  $mensaje = "Carrito vacío";
	  mostrarMensaje($mensaje);
  }else{
  ?>
  
  <div class="container">
<div class="row px-5">
<table class="table table-striped">
  <thead>
    <tr>
		<th scope="col">Producto</th>
		<th scope="col">Cantidad</th>
		<th scope="col">Precio</th>
		<th scope="col">Subtotal</th>
    </tr>
  </thead>
  <?php $total = 0; ?>
  <?php foreach($_SESSION['carrito'] as $id => $cantidad){
				$producto = seleccionarProducto($id);
				$nombre = $producto['nombre'];
				$precio = $producto['precioOferta'];
				$subtotal = $precio*$cantidad;
				$total = $subtotal+$total;
  ?>
  <tbody>
    <tr>
      <td scope="col"><?php echo $nombre; ?></td>
      <td scope="col">
	  <a href="procesarCarrito.php?id=<?php echo"$id";?>&op=remove">
		<i class="fas fa-minus-circle"></i>
		</a> <?php echo $cantidad; ?>
	  <a href="procesarCarrito.php?id=<?php echo"$id";?>&op=add">
		<i class="fas fa-plus-circle"></i>
	  </a></td>
      <td scope="col"><?php echo $precio; ?></td>
      <td scope="col"><?php echo $subtotal; ?></td>
    </tr>
  <?php } ?>
  </tbody>
  <?php 

   
  ?>
  <tfoot>
	<tr>
		<th scope="row" colspan="3" class="text-right">Total</th>
		<td><?php echo $total ?></td>
	</tr>
  </tfoot>
</table>
	<a href="procesarCarrito.php?id=<?php echo "$id"; ?>&op=empty" class="btn btn-danger">Vaciar carrito</a>
	
	<a href="confirmarPedido.php" class="btn btn-success m1-3">Confirmar pedido</a>
</div>
<?php
	$_SESSION['total']=$total;
?>
</div>
  <?php } ?>
</main>











<?php require_once "inc/pie.php"; ?>