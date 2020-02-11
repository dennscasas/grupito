<?php session_start(); ?>
<?php require_once("inc/bbdd.php");?>
<?php	$pagina = "contacto";
		$titulo = "Contacta con nosotros";
?>
<?php require_once("inc/funciones.php");?>
<?php require_once("inc/encabezado.php");?>
<?php if(!isset($_SESSION["login"])){ 
			header("Location: index.php");
} ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Cerrar sesión</title>
	</head>
	<body>
	<main role="main" class="container">
		<?php
			if(isset($_SESSION["login"])){
				unset($_SESSION["login"]);
			}
		?>
		<h2 class="mt-5">La sesión ha sido cerrada.</h2>
		<a class="btn btn-info" href="index.php" role="button">Volver a la página de inicio</a>
		</main>
	</body>
	
</html>

<?php require_once("inc/pie.php");?>