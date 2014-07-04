<?php
//cadena para recibir los parametros de la consola
//Eliminar el primer elemento del array el cual es el nombre del archivo

array_shift($argv);

$cadena = $argv;

//Pasar el array a una cadena
$cadena = implode(" ", $cadena);
//$encriptada = md5($cadena);

//direccion ip con la cual se va a trabajar
$host = "127.0.0.1";

//crear el socket
$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

//especificar el puerto sobre el que se va a trabajar
$puerto = 7000;
 
 //conectar hacia el socket
$conexion = socket_connect($socket,$host,$puerto);

$tamano = 4096;
if($conexion){

    //El buffer guarda los datos
    $buffer = $cadena;

    $salida = '';

    //Se escribe en determinado socket los datos
    socket_write($socket,$buffer);

    while($salida = socket_read($socket,$tamano)){
        echo $salida;
    }
 
    }else{
    echo "\nConexion no realizada, puerto: ".$puerto;
    }
 
socket_close($socket);
?>