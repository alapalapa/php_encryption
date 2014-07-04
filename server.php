<?php
require_once "encrypt.php";
//Se crea el socket
$socket = socket_create(AF_INET,SOCK_STREAM,0);

//direcciones permitidas
$direccion = 0;

//puerto en el que va a operar
$puerto=7000;
 
//bind del socket y el puerto
socket_bind($socket, $direccion,$puerto);

//El puerto se pone a escuchar peticiones 
socket_listen($socket);

//tamaño del buffer, donde se almacena la info
$tamano = 4096;

while(true){
	//Se crean las peticiones que seran aceptadas
    $cliente = socket_accept($socket);

    //Se leen los mensajes del cliente
    $buffer = socket_read($cliente, $tamano);
    $encrypt_obj = new Crypt_string();
    $encrypt = $encrypt_obj->encrypting($buffer);

    //Muestra la informacion en el server
    echo $buffer."\n";
    echo $encrypt."\n";

    //La variable $buffer guarda la infomacion
    $buffer = "Cadena: ".$buffer."\n";
    $encrypt = "Encrypt: ".$encrypt."\n";

    //Escribimos el buffer
    socket_write($cliente, $buffer); 
    socket_write($cliente, $encrypt); 
    socket_close($cliente); //cerramos cliente
}


socket_close($socket);

?>
