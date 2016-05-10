<?php

include('conector/conectar.php');

function validarLOGIN ($usu,$pass){

$conexion=conectar('guaudoo');
    
$usuario=mysqli_real_escape_string($conexion,$usu);
$password=mysqli_real_escape_string($conexion,$pass);
    
$cadenaSQL="SELECT * FROM usuarios WHERE user='".$usuario."' AND password='".$password."'";
 
    
$registros=mysqli_query($conexion,$cadenaSQL) or die ('Problemas bbdd'. mysqli_error());
    
    
    if ( $reg=mysqli_fetch_array($registros) ){
    
        mysqli_close($conexion);
    
        return true;
    
    }else{

        mysqli_close($conexion);
        
        return false;	
        
        }
    
    
    

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function mostrarANIMALES ($tip){

$conexion=conectar('tiendamascotas');
    
$tipo=mysqli_real_escape_string($conexion,$tip);
    
$cadenaSQL="SELECT * FROM mascotas WHERE tipo='".$tipo."'";
    
$registros=mysqli_query($conexion,$cadenaSQL) or die ('Problemas bbdd'. mysqli_error($conexion));
    
    $animales=array();
    
    while ( $reg=mysqli_fetch_array($registros) ){
    
    array_push($animales, array('id'=>$reg['id'],'tipo'=>$reg['tipo'],'raza'=>$reg['raza'],'imagen'=>$reg['imagen'],'precio'=>$reg['precio'],'adoptado'=>$reg['adoptado']));  
        
    //LO VA HA MIRAR ROSA PARA PONERLE INDICE
        
    //$clave=$reg['Indice'];         
    //array_push($emails,  '$clave'=>array('Remitente'=>$reg['Remitente'],'Destinatario'=>$reg['Destinatario'],'Asunto'=>$reg['Asunto'],'Mensaje'=>$reg['Mensaje']));   
               
    
    }
    
    //PINTAR EL ARRAY BONITO
    //echo "<pre>";
    //print_r($emails);
    //echo "</pre>";
    
    mysqli_close($conexion);
   
    return $animales;

}

function mostrartodosANIMALES (){

$conexion=conectar('tiendamascotas');
    
    
$cadenaSQL="SELECT * FROM paraadoptar";
    
$registros=mysqli_query($conexion,$cadenaSQL) or die ('Problemas bbdd'. mysqli_error($conexion));
    
    $animales=array();
    
    while ( $reg=mysqli_fetch_array($registros) ){
    
    array_push($animales, array('id'=>$reg['id'],'precioSocio'=>$reg['precioSocio']));  
        
    //LO VA HA MIRAR ROSA PARA PONERLE INDICE
        
    //$clave=$reg['Indice'];         
    //array_push($emails,  '$clave'=>array('Remitente'=>$reg['Remitente'],'Destinatario'=>$reg['Destinatario'],'Asunto'=>$reg['Asunto'],'Mensaje'=>$reg['Mensaje']));   
               
    
    }
    
    //PINTAR EL ARRAY BONITO
    //echo "<pre>";
    //print_r($emails);
    //echo "</pre>";
    
    mysqli_close($conexion);
   
    return $animales;

}


function nuevoUsuario($Mensaje){

$conexion=conectar('tiendamascotas');
    
    //echo "<pre>";
    //print_r($Mensaje);
    //echo "</pre>";
    
    //echo $Mensaje[0]['Remitente']."aaa"; si
    //echo $Mensaje['Destinatario']."aaa"; no error garrafal
    
$us=mysqli_real_escape_string($conexion,$Mensaje['usu']);
$pa=mysqli_real_escape_string($conexion,$Mensaje['pass']);
$no=mysqli_real_escape_string($conexion,$Mensaje['nom']);
$di=mysqli_real_escape_string($conexion,$Mensaje['dir']);
$te=mysqli_real_escape_string($conexion,$Mensaje['tel']);
$em=mysqli_real_escape_string($conexion,$Mensaje['em']);
    
$cadenaSQL="INSERT INTO usuarios (usuario,password,nombre,direccion,telefono,email) VALUES ('$us','$pa','$no','$di','$te','$em')";
    
mysqli_query($conexion,$cadenaSQL) or die ('Problemas bbdd'. mysqli_error());
    
if ( mysqli_affected_rows($conexion) == 1){
    
        mysqli_close($conexion);
        
		return true;
    
}else{
    
        mysqli_close($conexion);
    
		return false;
    
     }

}
function adoptarANIMALES($Iindice){

$conexion=conectar('tiendamascotas');
    
$In=mysqli_real_escape_string($conexion,$Iindice);

//$precio="SELECT precioSocio FROM paraadoptar WHERE id='".$In."'";     
$cadenaSQL="DELETE FROM paraadoptar WHERE id='".$In."'";
   
    
mysqli_query($conexion,$cadenaSQL) or die ('Problemas bbdd'. mysqli_error());
    
if ( mysqli_affected_rows($conexion) ==1){
    
        mysqli_close($conexion);
    
        
    
		return true;
    
}else{
    
        mysqli_close($conexion);
    
		return false;
    
     }

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



?>


