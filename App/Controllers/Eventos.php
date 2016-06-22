<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelEventos;

class Eventos extends Render
{
    public function eventos()
    {
      $this->render('eventos');
    }

    public function getEventos()
    {
      $eventos = new ModelEventos();
      $listaEventos = $eventos->listaEventos();

      header('Content-Type: application/json');
      $json = json_encode($listaEventos);
      echo $json;
    }

    public function setEvento()
    {

      $data = file_get_contents("php://input");
      $data = json_decode($data);

      $data->data_ini = str_replace("T03:00:00.000Z", "", $data->data_ini);
      $data->data_ini = str_replace("-", "", $data->data_ini);
      $data->data_fim = str_replace("T03:00:00.000Z", "", $data->data_fim);
      $data->data_fim = str_replace("-", "", $data->data_fim);

      $eventos = new ModelEventos();

      $setEvento = $eventos->cadastraEvento($data);

    }
}
