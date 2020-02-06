<?php session_start();
	  require_once "inc/funciones.php"; 
	  require_once "inc/bbdd.php"; 
      require_once "inc/encabezado.php"; 
	  
function mostrarFormulario($usuario, $password){ ?>
	<form action="" method="POST">
		<h1>Introduce usuario y password</h1>
		<p>
		<label for="email">Email:
			<input type="text" name="email" id="email" value="<?php echo $email; ?>"/>
		</label>
		</p>
		<p>
		<label for="password">Password:
			<input type="password" name="password" id="password" value="<?php echo $password; ?>"/>
		</label>
		</p>
		<button type="submit" class="btn btn-dark" name="enviar" id="enviar" value="Iniciar sesión">Iniciar sesión</button>
		<a href='insertarusuario.php' class='btn btn-secondary'>Registrar usuario</a>
	</form>
	
<?php } ?>

<main role="main" class="container">

    <h1 class="mt-5">Login</h1>

<?php
 
	  if(!isset($_REQUEST['enviar'])){
		  $email = "";
		  $password = "";
		  
		  mostrarFormulario($email, $password);
	  }
	  
	  else{
		  $email = recoge("email");
		  $password = recoge("password");
		  
		  $errores = "";
		  
		  if($email == ""){
			  $errores=$errores."<li>El campo email no puede estar en blanco</li>";
		  }
		  
		  if($password == ""){
			  $errores=$errores."<li>El campo password no puede quedar vacío</li>";
		  }
		  
		  if($errores != ""){
			echo "<ul>";
			echo "$errores";
			echo "</ul>";
			mostrarFormulario($email, $password);
		  }
		  
		  else{
				$email=seleccionarEmail($email,$password);
				$userOk = password_verify($password, $email["password"]);
				
				
				if($userOk){
					$_SESSION["login"]=$email["usuario"];
					header("Location: index.php"); //cambiar menu.php
				}
				else{
					
					echo "Error al loguear, introduce un usuario";
					mostrarFormulario($usuario, $password);
				}
		  }
	  }
?>

<?php require_once "inc/pie.php"; ?>

</main>