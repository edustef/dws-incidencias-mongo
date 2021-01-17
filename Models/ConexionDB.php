<?php

namespace Incidencias\Models;

use \MongoDB;

class ConexionDB
{
    private static $conexion = 'hello';

    public static function conectar($database)
    {
        self::$conexion = new MongoDB\Client('mongodb://db');

        return self::$conexion->{$database};
    }

    public static function desconectar()
    {
        self::$conexion = null;
    }
}
