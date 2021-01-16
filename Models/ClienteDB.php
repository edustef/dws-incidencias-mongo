<?php

namespace Incidencias;

use Incidencias\ConexionDB;

class ClienteDB
{

    //Insertar incidencia
    public static function newCliente($post)
    {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        $consulta = "INSERT INTO clientes (";
        foreach ($post as $key => $value) {
            $consulta .= $key . ", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ") VALUES (";
        foreach ($post as $key => $value) {
            $consulta .= ":" . $key . ", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ");";

        $conexion = ConexionDB::conectar("incidencias");

        ConexionDB::desconectar();
    }


    public static function getId($movil)
    {

        ConexionDB::desconectar();
        return '1';
    }

    public static function getClientes()
    {
        $resultado = [];

        ConexionDB::desconectar();
        return $resultado;
    }


    //Borrar cliente
    public static function deleteCliente($id)
    {
        ConexionDB::desconectar();
    }
}
