<?php function mostrarProductos($productos){?>
    <!-- Example row of columns -->
<div class="row row-cols-1 row-cols-md-3">
<?php foreach($productos as $producto){
?>
  <div class="col mb-4">
    <div class="card">
      <img src="imagenes/<?php echo $producto["imagen"];?>" class="card-img-top" alt="<?php echo $producto['nombre'];?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $producto["nombre"];?></h5>
        <p class="card-text"><?php echo $producto["introDescripcion"];?></p>
		<a href="#" class="btn btn-success">Ahora <?php echo $producto["precioOferta"];?></a>
		<span class="card-text text-danger float-right"><del>Antes <?php echo $producto["precio"];?></del></span>
      </div>
    </div>
  </div>
<?php
}
}
?>
</div> <!-- col rows -->
<?php function mostrarMensaje($mensaje){?>
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-5"><?php echo $mensaje; ?> </h1>
<?php } ?>