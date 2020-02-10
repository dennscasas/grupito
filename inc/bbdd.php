<?php include "configuracion.php"; ?>

<?php
//Función para conectarnos a la base de datos.
function conectarBD(){
	try{
		$con = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=UTF8", USER, PASS);
		
		$con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Error: Error al conectar la Base de Datos: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	return $con;
}

//Función para desconectar Base de DAtos
function desconectarBD($con){
	$con = NULL;
	return $con;
}

function seleccionarOfertasPortada($numOfertas){
	$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM productos LIMIT :numOfertas";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':numOfertas', $numOfertas, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}catch(PDOException $e){
		echo "Error: Error al conectar la Base de Datos: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	return $rows;
}
//Seleccionar todas las ofertas
function seleccionarTodasOfertas(){	

$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM productos";
		
		$stmt = $con->prepare($sql);
		
		$stmt->execute();
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}catch(PDOException $e){
		echo "Error: Error al seleccionar todas las ofertas ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	return $rows;
}

function seleccionarProducto($idProducto){
	$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM productos WHERE idProducto=:idProducto";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
	}catch(PDOException $e){
		echo "Error: Error al seleccionar una oferta: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	return $row;
}
//Función para comprobar usuario
function seleccionarUsuario($email){
	$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM usuarios WHERE email=:email";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':email', $email);
				
		$stmt->execute();
		
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	}
		
	catch(PDOException $e){
		echo "Error: Error al comprobar un usuario: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $row;
}

//Función insertar usuario
function insertarUsuario($email, $password, $nombre, $apellidos, $direccion, $telefono){
	$con = conectarBD();
	
	try{
		
		$sql = "INSERT INTO usuarios (email, password, nombre, apellidos, direccion, telefono) VALUES (:email, :password, :nombre, :apellidos, :direccion, :telefono)";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':email',$usuario);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':apellidos',$apellidos);
		$stmt->bindParam(':direccion',$direccion);
		$stmt->bindParam(':telefono',$telefono);
		
		$stmt->execute();
		
	}catch(PDOException $e){
		echo "Error: Error al comprobar un usuario: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $stmt->rowCount();
}

//Función seleccionar todos los usuarios
function seleccionarTodosUsuarios(){
	$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM usuarios"; //Primero hacemos la sentencia sql
		
		$stmt = $con->query($sql); //Llamar al método query
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //Así nos crea un array asociativo
	}
	
	catch(PDOException $e){
		echo "Error: Error al seleccionar todos los usuarios: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $rows;
}
function actualizarUsuario($usuario, $password){
	
	$con = conectarBD();
	
	try{
		$sql = "UPDATE usuarios SET password=:password WHERE usuario=:usuario";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':usuario',$usuario);
		$stmt->bindParam(':password',$password);
		
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Error: Error al actualizar usuario: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $stmt->rowCount();
}

function seleccionarUsuarios($inicio, $usuariosPagina){
$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM usuarios LIMIT :inicio,:usuariosPagina"; //Primero hacemos la sentencia sql
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':usuariosPagina', $usuariosPagina, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //Así nos crea un array asociativo
	}
	
	catch(PDOException $e){
		echo "Error: Error al seleccionar los usuarios: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $rows;
}
//Seleccionar todos los productos
function seleccionarTodosProductos(){
	$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM productos"; //Primero hacemos la sentencia sql
		
		$stmt = $con->query($sql); //Llamar al método query
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //Así nos crea un array asociativo
	}
	
	catch(PDOException $e){
		echo "Error: Error al seleccionar todos los productos: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $rows;
}
//Seleccionar Productos
function seleccionarProductos($inicio, $productosPagina){
$con = conectarBD();
	
	try{
		$sql = "SELECT * FROM productos LIMIT :inicio,:productosPagina"; //Primero hacemos la sentencia sql
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':productosPagina', $productosPagina, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //Así nos crea un array asociativo
	}
	
	catch(PDOException $e){
		echo "Error: Error al seleccionar los productos: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $rows;
}
//Función para añadir producto
function insertarProducto($nombre, $introDescripcion, $descripcion, $imagen, $precio, $precioOferta){
	$con = conectarBD();
	
	try{
		
		$sql = "INSERT INTO productos (nombre, introDescripcion, descripcion, imagen, precio, precioOferta) VALUES (:nombre, :introDescripcion, :descripcion, :imagen, :precio, :precioOferta)";
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':introDescripcion',$introDescripcion);
		$stmt->bindParam(':descripcion',$descripcion);
		$stmt->bindParam(':imagen',$imagen);
		$stmt->bindParam(':precio',$precio);
		$stmt->bindParam(':precioOferta',$precioOferta);
		
		$stmt->execute();
		
	}catch(PDOException $e){
		echo "Error: Error al insertar un producto: ".$e->getMessage();
		
		file_put_contents("PDOErrors.txt", "\r\n".date('j F, Y, g:i a ').$e->getMessage(), FILE_APPEND);
		exit;
	}
	
	return $stmt->rowCount();
}
?>
