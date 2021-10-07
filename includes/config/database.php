<?php

function connectDB(): mysqli
{
    $db = new mysqli('localhost', 'root', '', 'bienesraices');
    if (!$db) {
        echo "conexion fallida";
        exit;
    }

    return $db;
}
