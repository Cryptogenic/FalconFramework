<?php

  /*
    Falcon Framework :: app/App.php
    -
    This file is the core for setting up MVC, and handles URL parsing and such.
    Most of this file you should not touch as controller loading is handled
    dynamically, one line you may wish to edit though is the default controller
    and method to suit your needs, on line 14 and 15.
  */

  class App
  {
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = array();

    public function __construct()
    {
      // Parses the url passed via Apache's rewrite engine for our MVC design framework
      $url = $this->parseUrl();

      // Includes necessary controller should it exist
      if(file_exists('../app/controllers/' . $url[0] . ".php"))
      {
        $this->controller = $url[0];
        unset($url[0]);
      }

      require_once('../app/controllers/' . $this->controller . '.php');

      $this->controller = new $this->controller;

      if(isset($url[1]))
      {
        if(method_exists($this->controller, $url[1]))
        {
          $this->method = $url[1];
          unset($url[1]);
        }
      }

      // Anything after domain/controller/method are arguments to the given method
      $this->params = $url ? array_values($url) : [];

      call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseUrl()
    {
      if(isset($_GET['url']))
      {
        // We must first trim trailing slashes to prevent wasting array space, then filter for security reasons.
        // Finally explode the string to get controllers + parameters.
        return (explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)));
      }
    }
  }
