<?php
// Iniciar la sesión para mantener la sesión del usuario
    session_start();
    // Requerir el archivo de base de datos para la conexión
    require_once "../../database/database.php";
    // Verificar si el usuario ha iniciado sesión; si no, redirigir a la página de inicio de sesión
    if($_SESSION['username'] == null){
     // Mostrar mensaje de alerta si el usuario no ha iniciado sesión
    echo "<script>alert('Please login.')</script>";
    // Redirigir a la página de inicio
    header("Refresh:0 , url = ../index.html");
    // Salir del script
    exit();

    }
 // Verificar si se han enviado datos a través del método POST
    if($_POST['name'] != null && $_POST['amount'] != null ){
 // Construir y ejecutar la consulta SQL para insertar un nuevo producto
        $sql = "INSERT INTO product (proname,amount) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
 // Verificar si la consulta se ejecutó con éxito
        if($conn->query($sql)){
 // Mostrar mensaje de éxito
            echo "<script>alert('Success added')</script>";
// Redirigir a la página de lista de productos
            header("Refresh:0 , url = ../list.php");
 // Salir del script
            exit();

        }
        else{
         // Mostrar mensaje de error si la inserción falló
            echo "<script>alert('Add failed')</script>";
             // Redirigir a la página de lista de productos
            header("Refresh:0 , url = ../list.php");
            // Salir del script
            exit();

        }
    }
    else{
    // Mostrar mensaje de alerta si no se completaron todos los campos
        echo "<script>alert('Please fill in information.')</script>";
     // Redirigir a la página de lista de productos   
        header("Refresh:0 , url = ../list.php");
        // Salir del script
        exit();

    }
    mysqli_close($conn);
?>