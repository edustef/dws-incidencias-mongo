<?php

namespace Incidencias\Models;

use \MongoDB;

class ConexionDB
{
    private static $conexion = null;

    public static function conectar($database, $collection)
    {
        self::$conexion = new MongoDB\Client('mongodb://db');

        return self::$conexion->{$database}->{$collection};
    }

    public static function desconectar()
    {
        self::$conexion = null;
    }
}
