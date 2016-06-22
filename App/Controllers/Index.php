<?php

namespace App\Controllers;

use src\Pages\Render;

class Index extends Render
{
    public function index()
    {
      $this->render('index');
    }

    public function eventos()
    {
      $this->render('eventos');
    }

    public function certificados()
    {
      $this->render('certificados');
    }

    public function alunos()
    {
      $this->render('alunos');
    }

    public function professores()
    {
      $this->render('professores');
    }

    public function usuarios()
    {
      $this->render('usuarios');
    }
}
