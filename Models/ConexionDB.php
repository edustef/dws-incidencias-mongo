<?php

namespace Incidencias\Models;

use \MongoDB;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class ConexionDB
{
    private static $conexion = null;

    public static function conectar($database, $collection)
    {
        self::$conexion = new MongoDB\Client($_ENV['MONGODB_URI']);

        return self::$conexion->{$database}->{$collection};
    }

    public static function desconectar()
    {
        self::$conexion = null;
    }
}
