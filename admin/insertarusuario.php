<?php session_start(); ?>
<?php require_once "inc/funciones.php"; ?>
<?php require_once "inc/bbdd.php"; ?>
<?php require_once "inc/encabezado.php"; ?>
<!-- < ?php if(!isset($_SESSION["login"])){ 
			header("Location: login.php");
} ?> -->
<?php 
	function insertarFormulario($email, $password, $nombre, $apellidos, $direccion $telefono){
?>

<form method="post" >
  <div class="form-group">
    <label for="usuario">Email:</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"/>
  </div>
  <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>"/>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>"/>
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos;?>"/>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion;?>"/>
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>"/>
  </div>
 <button type="submit" class="btn btn-secondary" name="guardar" value="insertarUsuario">Registrar usuario</button>
 <a href='login.php' class='btn btn-dark'>Volver al login</a>
 
</form>

<?php } ?>

<main role="main" class="container">

    <h1 class="mt-5">Registrar usuario</h1>

<?php 

if(!isset($_REQUEST['guardar'])){ 
	$email="";
	$password="";
	$nombre="";
	$apellidos="";
	$direccion="";
	$telefono="";

	insertarFormulario($email, $password, $nombre, $apellidos, $direccion $telefono);
}
else{
	$email=recoge("email");
	$password=recoge("password");
	$nombre=recoge("nombre");
	$apellidos=recoge("apellidos");
	$direccion=recoge("direccion");
	$telefono=recoge("telefono");
	
	$errores="";
	
	if($email == ""){
		$errores = $errores."<li>El campo email no puede estar vacío</li>";
	}
	
	if($password == ""){
		$errores = $errores."<li>El campo contraseña no puede estar vacío</li>";
	}
	
	if($nombre == ""){
		$errores = $errores."<li>El campo nombre no puede estar vacío</li>";
	}

	if($apellidos == ""){
		$errores = $errores."<li>El campo nombre no puede estar vacío</li>";
	}
	
	if($errores != ""){
		echo "<h2>Errores</h2><ul>$errores</ul>";
		
		insertarFormulario($usuario, $password);
	}
	
	else{
		$password = password_hash($password, PASSWORD_DEFAULT );
		$usuario = insertarUsuario($usuario, $password);
		
		if($usuario != ""){
			echo "<div class='alert alert-success' role='alert'>Usuario $usuario registrado correctamente </div>";
			echo "<p><a href='menu.php' class='btn btn-secondary'>Volver al menú</a></p>";
			echo "<p><a href='usuarios.php' class='btn btn-info'>Volver al listado</a></p>";
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>A simple danger alert—check it out! </div>ERROR: Usuario NO registrado";
			insertarFormulario($usuario, $password);
		}
	}
}

?>



<?php require_once "inc/pie.php"; ?>