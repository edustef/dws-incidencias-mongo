<?php

namespace Incidencias\Models;

class ClienteDB
{

    //Insertar incidencia
    public static function newCliente($post)
    {
        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);
        $conexion = ConexionDB::conectar("incidencias");

        ConexionDB::desconectar();
    }


    public static function getId($movil)
    {
        $conexion = ConexionDB::conectar("incidencias");

        ConexionDB::desconectar();
        return '1';
    }

    public static function getClientes()
    {
        $resultado = [];
        $conexion = ConexionDB::conectar("incidencias");

        ConexionDB::desconectar();
        return $resultado;
    }


    //Borrar cliente
    public static function deleteCliente($id)
    {
        $conexion = ConexionDB::conectar("incidencias");
        ConexionDB::desconectar();
    }
}
