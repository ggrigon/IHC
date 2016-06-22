<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelCertificados;

class Certificados extends Render
{
    public function eventos()
    {
      $this->render('certificados');
    }

    public function getCertificados()
    {
      $certificados = new ModelCertificados();
      $listaCertificados = $certificados->listaCertificados();

      header('Content-Type: application/json');
      $json = json_encode($listaCertificados);
      echo $json;
    }

    public function setCertificado()
    {

    }
}
