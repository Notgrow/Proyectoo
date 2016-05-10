<?php
session_start();

if(!isset($_POST['enviar'])){

header('Location: socios.html');

}

require_once('solicitudesBBDD.php');

$mensaje = array('usu'=>$_POST['usuario'],'pass'=>$_POST['password'],'nom'=>$_POST['nombre'],'dir'=>$_POST['direccion'],'tel'=>$_POST['telefono'], 'em'=>$_POST['email']);

   
//array_push($mensaje, array('usu'=>$_POST['usuario'],'pass'=>$_POST['password'],'nom'=>$_POST['nombre'],'tel'=>$_POST['telefono'], 'em'=>$_POST['email']));


 $resul = nuevoUsuario($mensaje);

 if($resul != 1){

    echo "Ha ocurrido un error al enviar el mensaje.";

    }
else
{
 echo "Usuario registrado";   
}
?>