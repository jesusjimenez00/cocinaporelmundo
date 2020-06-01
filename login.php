<!DOCTYPE html>
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<html lang="es">
<link rel="stylesheet" type="text/css" href="stile.css">
<link rel="stylesheet" type="text/css" href="fuentes.css">
<head>
<title>Cocina por el mundo | Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="title">
    <!--estilos-->
    <link rel="stylesheet" type="text/css" href="CSS/stile.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
    <style type="text/css">
    * {
        padding:0px;
        margin:0px;
    }
    </style>

    
</head>
<body>
    <div class="logo-box">
               <img src="IMG/cocina_logo.png" align="left">


    <!-- Menu de navegacion -->
    
    

            </div>

                <div id="header">
        <ul class="nav">
            <li><a href="http://localhost/pagina_cocina/index.html"> Inicio </a> </li>

            <li><a href="C:\xampp\htdocs\pagina_cocina\index.html.html"> Recetas </a> 
        <ul>
          <li><a href="http://localhost/pagina_cocina/recetas_mx.html"> Cocina mexicana </a> </li>
          <a href="http://localhost/pagina_cocina/recetas_it.html">  Cocina italiana  </a> 
          <a href="http://localhost/pagina_cocina/recetas_thai.html"> Cocina thai </a> 
          <a href="http://localhost/pagina_cocina/reposteria.html"> reposteria </a> 
          

        </ul>
            </li>
            <li><a href="http://localhost/pagina_cocina/tips.html"> Tips </a> </li>
            <li><a href="http://localhost/pagina_cocina/eventos.html"> Eventos </a> </li>
            <li><a href="http://localhost/pagina_cocina/index2.php"> Productos</a> </li>
            <li><a href="http://localhost/pagina_cocina/contacto.html"> Contacto</a> </li>
     </ul>
 </div>
</body>
</html>

<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index2.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=login_tuto', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave'
        );
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: principal.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
    
require 'frontend/login-vista.php';


?>