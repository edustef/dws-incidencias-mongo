<?php

namespace Incidencias\Models;

class ClienteDB
{
    //Insertar incidencia
    public static function newCliente($post)
    {
        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);
        $collection = self::conectar();
        $post['id'] = $collection->count() + 1;

        $collection->insertOne($post);

        self::desconectar();
    }


    public static function getId($movil)
    {
        $collection = self::conectar();
        $cliente = $collection->findOne(['movil' => $movil]);

        self::desconectar();
        if (isset($cliente)) {
            return $cliente['id'];
        }

        return false;
    }

    public static function getClientes()
    {

        $resultado = [];
        $collection = self::conectar();
        $cursor = $collection->find();

        foreach ($cursor as $cliente) {
            $resultado[] = new Cliente($cliente['id'], $cliente['nombre'], $cliente['direccion'], $cliente['localidad'], $cliente['movil'], $cliente['dni']);
        }

        self::desconectar();
        return $resultado;
    }


    //Borrar cliente
    public static function deleteCliente($id)
    {
        $collection = self::conectar();
        $collection->deleteOne(['id' => intval($id)]);

        self::desconectar();
    }

    public static function conectar()
    {
        return ConexionDB::conectar('incidencias', 'clientes');
    }

    public static function desconectar()
    {
        ConexionDB::desconectar();
    }
}
