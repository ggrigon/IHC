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
      $this->routes['eventos'] = array('route' => '/eventos', 'controller' => 'eventos', 'action' => 'eventos');
      $this->routes['certificados'] = array('route' => '/certificados', 'controller' => 'index', 'action' => 'certificados');
      $this->routes['alunos'] = array('route' => '/alunos', 'controller' => 'index', 'action' => 'alunos');
      $this->routes['professores'] = array('route' => '/professores', 'controller' => 'index', 'action' => 'professores');
      $this->routes['usuarios'] = array('route' => '/usuarios', 'controller' => 'index', 'action' => 'usuarios');

      //PAGINAS DE CONTROLE
      $this->routes['getEventos'] = array('route' => '/getEventos', 'controller' => 'eventos', 'action' => 'getEventos');
      $this->routes['setEvento'] = array('route' => '/setEvento', 'controller' => 'eventos', 'action' => 'setEvento');

      $this->routes['getCertificados'] = array('route' => '/getCertificados', 'controller' => 'certificados', 'action' => 'getCertificados');
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
          //$route['route'] = '/ihc/public'.$route['route'];

          if ($url == $route['route']){
              $class = "App\\Controllers\\".ucfirst($route['controller']);
              $controller = new $class;
              $controller->$route['action']();
          }
        });
    }
}
