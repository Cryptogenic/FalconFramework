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

  	/*
  		Method: App::__construct()

  		Parameters:
  		None

  		Returns:
  		Nothing

  		Description: The class constructor for the App class, calls parseUrl() to parse the URL given by Apache.
  	*/
  	public function __construct()
  	{
  		$url = $this->parseUrl();

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

  		$this->params = $url ? array_values($url) : [];

  		call_user_func_array([$this->controller, $this->method], $this->params);
  	}

  	/*
  		Method: App::parseUrl()

  		Parameters:
  		None

  		Returns:
  		Nothing

  		Description: Parses the url passed via Apache's rewrite engine for our MVC design framework.
  	*/
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
