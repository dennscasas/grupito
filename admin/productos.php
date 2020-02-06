<?php session_start(); ?>
<?php require_once "inc/funciones.php"; ?>
<?php require_once "inc/bbdd.php"; ?>
<?php require_once "inc/encabezado.php"; ?>
<main role="main" class="container">
			<h1 class="mt-5">Listado de productos</h1>

	<p><a href='insertarproducto.php' class='btn btn-info'>Registrar nuevo producto</a></p>
	
	<?php 
		$productos = seleccionarTodosProductos();
			$numProductos = count($productos);
			
			$productosPagina = 2;
			$paginas = ceil ($numProductos/$productosPagina);
			
			$pagina = recoge("pagina");
			
			if($pagina == false || $pagina<=0 || $pagina>$paginas){
				$pagina=1;
			}
			
			$inicio = ($pagina-1)*$productosPagina;
			
			$productos = seleccionarProductos($inicio ,$productosPagina);
	
	?>
	
	
	<table class="table table-striped table-dark">
	  <thead>
		<tr>
		  <th scope="col">idProducto</th>
		  <th scope="col">Nombre</th>
		  <th scope="col">Descripción corta</th>
		  <th scope="col">Descripción</th>
		  <th scope="col">Imagen</th>
		  <th scope="col">Precio</th>
		  <th scope="col">Precio oferta</th>
		  <th scope="col">Online</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach($productos as $producto){
				$prod = $producto['idProducto'];
				$nombre = $producto['nombre'];
				$introDescripcion = $producto['introDescripcion'];
				$descripcion = $producto['descripcion'];
				$imagen = $producto['imagen'];
				$precio = $producto['precio'];
				$precioOferta = $producto['precioOferta'];
				$online = $producto['online'];
		 ?>	
		<tr>
		  <th scope="row"><?php echo $prod; ?></th>
		  <td><?php echo $nombre; ?></td>
		  <td><?php echo $introDescripcion; ?></td>
		  <td><?php echo $descripcion; ?></td>
		  <td><?php echo $imagen; ?><img src="img/<?php echo $imagen ;?>" width="173" height="128"/></td>
		  <td><?php echo $precio; ?></td>
		  <td><?php echo $precioOferta; ?></td>
		  <td><?php echo $online; ?></td>
		   <td><a class="btn btn-warning" href="actualizarprod.php?producto=<?php echo $prod;?>" role="button">Editar</a>
			  <a class="btn btn-danger" href="borrarprod.php?producto=<?php echo $prod;?>" role="button">Borrar</a>
		  </td>
		</tr>
		<?php } ?>
	  </tbody>
	</table>
	<a class="btn btn-danger" href="borrarsesion.php" role="button">Cerrar sesión</a>
	<a class="btn btn-info" href="menu.php" role="button">Volver al menú</a>
	<nav aria-label="Page navigation example">
	  <ul class="pagination">
		
		<li class="page-item <?php if($pagina==1){echo "disabled";}?>"><a class="page-link" href="productos.php?pagina=<?php echo "$pagina"-1?>">Anterior</a></li>
		<?php for($i=1;$i<=$paginas;$i++){ ?>
		
			<li class="page-item <?php if($i==$pagina){echo "active";} ?>"><a class="page-link" href="productos.php?pagina=<?php echo "$i" ?>"><?php echo "$i" ?></a></li>
			
		<?php }?>
		<li class="page-item <?php if($pagina==$paginas){echo "disabled";}?>"><a class="page-link" href="productos.php?pagina=<?php echo "$pagina"+1?>">Siguiente</a></li>
	
	  </ul>
	</nav>
</main>	

<?php require_once "inc/pie.php"; ?>