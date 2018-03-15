<?php
include_once ("ConfigDatos.php");

//$enlace = mysql_connect($server, $usuarioDB, $claveDB) or die('No pudo conectarse a : ' . mysql_error());


$enlace = mysqli_connect($server, $usuarioDB, $claveDB, $db);
//mysql_select_db($db,$enlace) or die('No se puedo seleccionar la base de datos');
/* cambiar el conjunto de caracteres a utf8 */
if (!$enlace->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $enlace->error);
} else {
   
}


?>
