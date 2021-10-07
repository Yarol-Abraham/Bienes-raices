<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
//conectar la base de datos
$db = connectDB();
// instanciar nuestras clases
use Model\ActiveRecord;

ActiveRecord::connectDB($db);
