<?php

namespace App;

class Init
{
    private $routes;

    public function __construct()
    {
      $this->initPagesRoutes();
      $this->run($this->getUrl());
    }

    private function initPagesRoutes()
    {
      //PAGINAS DE ACESSO
      $this->routes['home'] = array('route' => '/', 'controller' => 'index', 'action' => 'index');
    }

    private function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    private function run($url)
    {
        array_walk($this->routes, function($route) use($url){

          /*AQUI DEVE-SE COLOCAR O CAMIMNHO DE PASTAS DEPOIS DO localhost, CASO TENHA CONFIGURADO UM host APONTANDO
          PARA A PASTA public A LINHA ABAIXO DEVE SER RETIRADA*/
          $route['route'] = '/ihc/public'.$route['route'];

          if ($url == $route['route']){
              $class = "App\\Controllers\\".ucfirst($route['controller']);
              $controller = new $class;
              $controller->$route['action']();
          }
        });
    }
}
