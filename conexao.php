<?php
/**
* @author Cesar Szpak - Celke - cesar@celke.com.br
* @pagina desenvolvida usando FullCalendar e Bootstrap 4,
* o código é aberto e o uso é free,
* porém lembre-se de conceder os créditos ao desenvolvedor.
*/
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'celke');
define('PORT', 3306);

$conn = new PDO('mysql:host=' . HOST . ';port= ' . PORT . ';dbname=' . DBNAME . ';', USER, PASS);
?>