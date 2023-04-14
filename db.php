<?php

    #Aqui vamos a iniciar session y va a guardar mensajes :)
    session_start();
    
    echo "HOLA BASE DE DATOS 1";
        $conn= mysqli_connect(
            'localhost',
            'root',
            '',
            'crud-php'
        );
       
        if(isset($conn)){
            echo "BASE DE DATOS CONECTADA";
        }else{
            echo "NO SE CONECTO";
        }

?>