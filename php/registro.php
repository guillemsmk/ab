<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
     <form action="registro2.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nombre</label>
          <?php if (isset($_GET['nombre'])) { ?>
               <input type="text" 
                      nombre="nombre" 
                      placeholder="Nombre"
                      value="<?php echo $_GET['nombre']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nombre"><br>
          <?php }?>

          <label>Usuario</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Usuario"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Usuario"><br>
          <?php }?>


     	<label>Contraseña</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Contraseña"><br>

          <label>Repetir Contraseña</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Contraseña"><br>

     	<button type="submit">Registrarse</button>
          <a href="login.php" class="ca">¿Ya tienes una cuenta?</a>
     </form>
</body>
</html>