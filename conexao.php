<?php

$hostname = "Dellzilla\\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "Braskem",
    "UID" => "",
    "PWD" => "",
);

$conexao = sqlsrv_connect($hostname, $connectionOptions);

if (!$conexao) {
    die(print_r(sqlsrv_errors(), true));
} 
?>
