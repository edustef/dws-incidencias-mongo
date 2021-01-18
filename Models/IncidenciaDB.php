<?php

namespace Incidencias\Models;

class IncidenciaDB
{
    //Ver incidencias
    public static function getIncidencias()
    {
        $resultado = [];
        $collection = self::conectar();

        $cursor = $collection->find();

        foreach ($cursor as $i) {
            $resultado[] = new Incidencia(
                $i['id'],
                $i['latitud'],
                $i['longitud'],
                $i['ciudad'],
                $i['direccion'],
                $i['etiqueta'],
                $i['descripcion'],
                $i['estado'],
                $i['id_cliente']
            );
        }

        self::desconectar();
        return $resultado;;
    }

    //Insertar incidencia
    public static function newIncidencia($post)
    {
        $collection = self::conectar();
        $post['id'] = $collection->count() + 1;

        $collection->insertOne([
            'id' => $post['id'],
            'id_cliente' => $post['id_cliente'],
            'latitud' => $post['latitud'],
            'longitud' => $post['longitud'],
            'ciudad' => $post['ciudad'],
            'direccion' => $post['direccion'],
            'etiqueta' => $post['etiqueta'],
            'descripcion' => $post['descripcion'],
            'estado' => $post['estado'],

        ]);

        ConexionDB::desconectar();
    }

    //Borrar incidencia
    public static function deleteIncidencia($id)
    {
        $collection = self::conectar();
        $collection->deleteOne(['id' => intval($id)]);

        self::desconectar();
    }

    //Update incidencia
    public static function updateIncidencia($estado, $id)
    {
        $collection = self::conectar();
        $collection->updateOne(
            ['id' => intval($id)],
            ['$set' => ['estado' => $estado]]
        );
        self::desconectar();
    }

    public static function conectar()
    {
        return ConexionDB::conectar('incidencias', 'incidencias');
    }

    public static function desconectar()
    {
        ConexionDB::desconectar();
    }
}
