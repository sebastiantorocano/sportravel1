<?php
include_once('../views/enlace.php');


$action = $_POST['action'];


if ($action == "1") {
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-type:   application/x-msexcel; charset=utf-8");
    header("Content-Disposition: filename=InformeInscripciones.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo utf8_decode($_POST['datos_a_enviar']);
}

?>
