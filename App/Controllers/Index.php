<?php

namespace App\Controllers;

use src\Pages\Render;

class Index extends Render
{
    public function index()
    {
      $this->render('index');
    }
}
