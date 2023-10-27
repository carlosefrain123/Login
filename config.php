<?php
    $host='localhost';
    $user='root';
    $dbname='logina';
    $pass="";
    $conn=new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$pass);
    if ($conn==true) {
        //echo "Conexión requerida";
    }else{
        echo "Error de conexion";
    }
?>