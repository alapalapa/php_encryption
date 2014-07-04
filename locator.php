<?php
/*
PREGUNTAS:
El socket necesita estar en un puerto especifico?
-porque al probarlo con otro server en el puerto 7000 no lo abre ya que marca que el puerto ya esta en uso
lo he probado usando: telnet 127.0.0.1 7000 y me registra en el arreglo de clientes la conexion

El array $clients es correcto usarlo para registrar las conexiones?

*/
    set_time_limit(0);

    $ip = "127.0.0.1";
    $port = 7000;
    $clients = array();

    //Creacion de socket
    if( !$socket = socket_create(AF_INET,SOCK_STREAM,0) ){
        echo "Socket no creado\n";
    }
    echo "Socket creado.. \n";

    //bind the socket
    if( !socket_bind($socket,$ip,$port) ){
        echo "No bining de socket\n";
    }
    echo "Bind de socket hecho..\n";

    //Socket escuchando
    if( !socket_listen($socket) ){
        echo "El socket no esta escuchando\n";
    }
    echo "Esperando conexiones...\n";

    do{
        //Al momento que el cliente conecta se guarda en el arreglo $clients
        $client = socket_accept($socket);
        array_push($clients, $client);

        echo "Se establecio conexion!\n";
        var_dump($clients);

        //Mensaje de envio hacia el cliente
        $message = "\nSe registro tu conexion!\n";
        socket_write($client, $message, strlen($message));

        
       
    } while(true);

    //Cierre del socket
    echo "Fin y cierre del socket\n";

    socket_close($socket);

?>