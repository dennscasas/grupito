<?php session_start(); ?>
<?php require_once "inc/funciones.php"; ?>
<?php require_once "inc/bbdd.php"; ?>
<?php require_once "inc/encabezado.php"; ?>
<!--< ?php if(!isset($_SESSION["login"])){ 
			header("Location: index.php");
} ?> -->
<main role="main" class="container">
			<h1 class="mt-5">Listado de usuarios</h1>

	<p><a href='insertarusuario.php' class='btn btn-info'>Registrar nuevo usuario</a></p>
	
	<?php 
		$usuarios = seleccionarTodosUsuarios();
			$numUsuarios = count($usuarios);
			
			$usuariosPagina = 2;
			$paginas = ceil ($numUsuarios/$usuariosPagina);
			
			$pagina = recoge("pagina");
			
			if($pagina == false || $pagina<=0 || $pagina>$paginas){
				$pagina=1;
			}
			
			$inicio = ($pagina-1)*$usuariosPagina;
			
			$usuarios = seleccionarUsuarios($inicio ,$usuariosPagina);
	
	?>
	
	
	<table class="table table-striped table-dark">
	  <thead>
		<tr>
		  <th scope="col">Usuario</th>
		  <th scope="col">Contraseña</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach($usuarios as $usuario){
				$user = $usuario['usuario'];
				$password = $usuario['password'];
		 ?>	
		<tr>
		  <th scope="row"><?php echo $user; ?></th>
		  <td><?php echo $password; ?></td>
		   <td><a class="btn btn-warning" href="actualizaruser.php?usuario=<?php echo $user;?>" role="button">Editar</a>
			  <a class="btn btn-danger" href="borraruser.php?usuario=<?php echo $user;?>" role="button">Borrar</a>
		  </td>
		</tr>
		<?php } ?>
	  </tbody>
	</table>
	<a class="btn btn-danger" href="borrarsesion.php" role="button">Cerrar sesión</a>
	<a class="btn btn-info" href="menu.php" role="button">Volver al menú</a>
	<nav aria-label="Page navigation example">
	  <ul class="pagination">
		
		<li class="page-item <?php if($pagina==1){echo "disabled";}?>"><a class="page-link" href="usuarios.php?pagina=<?php echo "$pagina"-1?>">Anterior</a></li>
		<?php for($i=1;$i<=$paginas;$i++){ ?>
		
			<li class="page-item <?php if($i==$pagina){echo "active";} ?>"><a class="page-link" href="usuarios.php?pagina=<?php echo "$i" ?>"><?php echo "$i" ?></a></li>
			
		<?php }?>
		<li class="page-item <?php if($pagina==$paginas){echo "disabled";}?>"><a class="page-link" href="usuarios.php?pagina=<?php echo "$pagina"+1?>">Siguiente</a></li>
	
	  </ul>
	</nav>
</main>	

<?php require_once "inc/pie.php"; ?>