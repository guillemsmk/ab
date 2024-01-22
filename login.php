<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
     <form action="login2.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Usuario</label>
     	<input type="text" name="uname" placeholder="Usuario"><br>

     	<label>Contraseña</label>
     	<input type="password" name="password" placeholder="Contraseña"><br>

     	<button type="submit">Login</button>
			<a href="registro.php" class="ca">Crear una cuenta</a>
     </form>
</body>
</html>