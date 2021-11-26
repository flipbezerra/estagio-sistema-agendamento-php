<?php
/*  //funcional
    
    $host = 'localhost';
    $user = 'root';
    $password = 'fred123456';
    $db_name = 'projetoDois';
    $port = 21022;

    $conn = mysqli_connect($host, $user, $password, $db_name, $port);
*/
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'projetoDois');
    define('PORT', 3306);

    $conn = new PDO('mysql:host=' . HOST . ';port= ' . PORT . ';dbname=' . DBNAME . ';', USER, PASS);

?>