<?php session_start(); ?>
<?php require_once "inc/funciones.php"; ?>
<?php require_once "inc/bbdd.php"; ?>
<?php require_once "inc/encabezado.php"; ?>
<!-- < ?php if(!isset($_SESSION["login"])){ 
			header("Location: login.php");
} ?> -->
<?php 
	function insertarFormulario($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta){
?>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>"/>
  </div>
  <div class="form-group">
    <label for="introDescripcion">Descripción Corta:</label>
    <input type="text" class="form-control" id="introDescripcion" name="introDescripcion" value="<?php echo $introDescripcion;?>"/>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion;?>"/>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen"/>
  </div>
  <div class="form-group">
    <label for="precio">Precio:</label>
    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $precio;?>"/>
  </div>
  <div class="form-group">
    <label for="precioOferta">Precio oferta:</label>
    <input type="text" class="form-control" id="precioOferta" name="precioOferta" value="<?php echo $precioOferta;?>"/>
  </div>
 <button type="submit" class="btn btn-secondary" name="guardar" value="insertarProducto">Registrar producto</button>
 <a href='productos.php' class='btn btn-dark'>Volver al listado</a>
 
</form>

<?php } ?>

<main role="main" class="container">

    <h1 class="mt-5">Registrar producto</h1>

<?php 

if(!isset($_REQUEST['guardar'])){ 
	$nombre="";
	$introDescripcion="";
	$descripcion="";
	$imagen="";
	$precio="";
	$precioOferta="";

	insertarFormulario($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta);
}
else{
	$nombre=recoge("nombre");
	$introDescripcion=recoge("introDescripcion");
	$descripcion=recoge("descripcion");
	$imagen=recoge("imagen");
	$precio=recoge("precio");
	$precioOferta=recoge("precioOferta");
	
	$errores="";
	
	if($nombre == ""){
		$errores = $errores."<li>El campo nombre no puede estar vacío</li>";
	}
	
	if($introDescripcion == ""){
		$errores = $errores."<li>El campo descripcion corta no puede estar vacío</li>";
	}
	
	if($descripcion == ""){
		$errores = $errores."<li>El campo descripcion no puede estar vacío</li>";
	}

	#if($imagen == ""){
	#	$errores = $errores."<li>El campo imagen no puede estar vacío</li>";
	#}
	
	if($precio == ""){
		$errores = $errores."<li>El campo precio no puede estar vacío</li>";
	}
	
	if($precioOferta == ""){
		$errores = $errores."<li>El campo precio oferta no puede estar vacío</li>";
	}
	
	if($errores != ""){
		echo "<h2>Errores</h2><ul>$errores</ul>";
		
		insertarFormulario($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta);
	}
	
	else{
		$producto = insertarProducto($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta);
		
		if($producto != ""){
			echo "<div class='alert alert-success' role='alert'>Producto $producto registrado correctamente </div>";
			echo "<p><a href='index.php' class='btn btn-secondary'>Volver al menú</a></p>";
			echo "<p><a href='productos.php' class='btn btn-info'>Volver al listado</a></p>";
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>A simple danger alert—check it out! </div>ERROR: Producto NO registrado";
			insertarFormulario($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta);
		}
	}
}

?>



<?php require_once "inc/pie.php"; ?>