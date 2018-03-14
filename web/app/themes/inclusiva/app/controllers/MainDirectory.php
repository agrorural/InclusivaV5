<?php

namespace App;

use Sober\Controller\Controller;

class MainDirectory extends Controller
{
    public static function Data()
    {
        $data = array(
            [
                'responsable' => get_field('dir_responsable'),
                'cargo' => get_field('dir_cargo'),
                'address' => get_field('dir_direccion'),
                'phone' => get_field('dir_telefono'),
                'mail' => get_field('dir_correo'),
                'status' => get_field('dir_situacion'),
                'document' => get_field('dir_resolucion'),
                'cv' => get_field('dir_cv'),
                'dji' => get_field('dir_dji'),
                'img' => get_field('dir_imagen')
            ]
        );

        return  $data;
    }
}