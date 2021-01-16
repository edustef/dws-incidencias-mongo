<?php

namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use MongoDB\Collection;

class IncidenciaDB
{
    //Inserta incidencia
    public static function insertInc($latitud, $longitud, $ciudad, $direccion, $etiqueta, $descripcion, $id_cliente)
    {
        $collection = ConexionDB::conectar('incidencias')->incidencias;

        $collection->insertOne([
            'id_cliente' => $id_cliente,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'ciudad' => $ciudad,
            'direccion' => $direccion,
            'etiqueta' => $etiqueta,
            'descripcion' => $descripcion
        ]);

        ConexionDB::desconectar();
    }

    //Ver incidencias
    public static function getIncidencias()
    {
        $resultado = [];

        ConexionDB::desconectar();
        return $resultado;
    }

    //Insertar incidencia
    public static function newIncidencia($post)
    {

        ConexionDB::desconectar();
    }

    //Borrar incidencia
    public static function deleteIncidencia($id)
    {
        ConexionDB::desconectar();
    }

    //Update incidencia
    public static function updateIncidencia($estado, $id)
    {
        ConexionDB::desconectar();
    }
}
