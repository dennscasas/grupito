<?php session_start(); ?>
<?php require_once("inc/funciones.php");?>
<?php require_once("inc/bbdd.php");?>
<?php
	$idProducto = recoge('id'); //Recojo el id
	$producto= seleccionarProducto($idProducto);

	$nombre = $producto["nombre"];
	$introDescripcion = $producto["introDescripcion"];
	$descripcion = $producto["descripcion"];
	$imagen = $producto["imagen"];
	$precio = $producto["precio"];
	$precioOferta = $producto["precioOferta"];
?>
<?php	$pagina = "producto";
		$titulo = "";
?>
<?php require_once("inc/encabezado.php");?>

<main role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo $nombre;?></h1>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Nuestras ofertas »</a></p>
    </div>
  </div>

  <div class="container">

	<div class="row col-10 mx-auto">
		
		<div class="col-6">
			<p><?php echo $descripcion; ?></p>
			<div class="col-12 mx-auto d-flex justify-content-center">
				<a href="procesarCarrito.php?id=<?php echo $idProducto ?>&op=add" class="btn btn-success text-justify"> Añadir al carrito</a>
			</div>
		</div>
		
		<div class="col-6">
			<img src="imagenes/<?php echo $imagen;?>" alt="<?php echo $nombre; ?>" class="card-img-top rounded"></img>
			
			<div class="row mt-2 mx-auto">
				<span class="text-danger col-6 test-justify display-4">
					Antes: <del><?php echo $precio;?></del>
				</span>
				<span class="text-success col-6 test-right display-4">
					Ahora: <?php echo $precioOferta;?>
				</span>
			</div>
		</div>
		
	</div>


  </div> <!-- /container -->

</main>
<?php require_once("inc/pie.php");?>