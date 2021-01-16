<?php

namespace Incidencias;

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

/*
$consulta = "SELECT * FROM empleados";

$conexion = ConexionDB::conectar("2daw");

$stmt = $conexion->prepare($consulta);
$stmt->execute();
$count = $stmt->rowCount();
echo $count;

ConexionDB::desconectar();
*/