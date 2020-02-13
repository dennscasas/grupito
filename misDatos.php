<?php session_start(); ?>
<?php require_once("inc/bbdd.php");?>
<?php	$pagina = "Mis Datos";
		$titulo = "Consulta tus datos";
?>
<?php require_once("inc/funciones.php");?>
<?php require_once("inc/encabezado.php");?>
<?php if(!isset($_SESSION["login"])){ 
			header("Location: index.php");
} ?>
<?php
	$_SESSION['login'] = $prueba;
  if(empty($_SESSION['datos'])){
	  $mensaje = "Sin datos";
	  echo $mensaje ;
  }else{
	
	foreach ($_SESSION['datos'] as $user){
		$email = seleccionarUsuario($user);
		$nombre = $email["nombre"];
		$apellidos = $email["apellidos"];
		$direccion = $email["direccion"];
		$telefono = $email["telefono"];
	}
	echo $prueba;
  }
?>

<?php require_once("inc/pie.php");?>
