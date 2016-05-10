<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    
<?php

session_start();
session_destroy();
session_start();

if(!isset($_POST['enviar'])){

header('Location: index.html');

}

require_once('solicitudesBBDD.php');

$validar = validarLOGIN($_POST['usu'],$_POST['pass']);

if($validar != 1){
    
echo 'CREDENCIALES INCORRECTAS';

header ('Refresh: 3; url=index.html');

}
else
{
     if(!isset($_SESSION['usuario'])){

$_SESSION['usuario']=$_POST['usu'];
$_SESSION['ope']=$_POST['operacion'];
    echo $_SESSION['ope'];
    echo $_SESSION['usuario'];

    header('Location: socio.php');
   
}
}







?>  
    
</body>
</html>