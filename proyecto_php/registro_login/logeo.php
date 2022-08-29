<?php
    include('../db.php');
   
    $msg = array();
    $user = $_POST['Usuario'];
    $pass = $_POST['Contraseña'];
    $bandera = FALSE;

    $query = "SELECT * FROM usuarios WHERE nombre = '$user'";
    $resultado = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($resultado);
    
    if($row){
       if ($row['contraseña'] == $_POST['Contraseña']){
            $_SESSION['id'] = $row['id'];
            $bandera = TRUE;
            header('Location: perfil.php');
       }else{
        array_push($msg,'Contraseña incorrecta');
        $bandera = TRUE;
       }
    }else{
        array_push($msg,'El usuario ingresado no es correcto');
        $bandera = TRUE;
    };

    if($bandera == TRUE){
        $_SESSION['msg'] = $msg;
        header('Location: login.php');
    }
?>  

