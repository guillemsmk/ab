<?php  
include "basedatos.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=Usuario es obligatorio");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Contraseña es obligatoria");
	    exit();
	}else{
		$sql = "SELECT * FROM usuarios WHERE usuario='$uname' AND contraseña='$pass'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $uname && $row['contraseña'] === $pass) {
            	$_SESSION['usuario'] = $row['usuario'];
            	$_SESSION['nombre'] = $row['nombre'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index2.html");
		        exit();
            }else{
				header("Location: login.php?error=Usuario o contraseña incorrecta");
		        exit();
			}
		}else{
			header("Location: login.php?error=Usuario o contraseña incorrecta");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}