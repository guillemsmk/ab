<?php 
include "basedatos.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: registro.php?error=Usuario es obligatorio&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: registro.php?error=Contraseña es obligatoria&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: registro.php?error=Contraseña es obligatoria&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: registro.php?error=Nombre es obligatorio&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: registro.php?error=La confirmación de la contraseña no es correcta&$user_data");
	    exit();
	}

	else{

	    $sql = "SELECT * FROM usuarios WHERE usuario='$uname' ";
		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: registro.php?error=Este usuario ya está cogido&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO usuarios(usuario, contraseña, nombre) VALUES('$uname', '$pass', '$nombre')";
           $result2 = mysqli_query($mysqli, $sql2);
           if ($result2) {
           	 header("Location: registro.php?success=Se ha creado la cuenta");
	         exit();
           }else {
	           	header("Location: registro.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: registro.php");
	exit();
}