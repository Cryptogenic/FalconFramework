<?php

  /*
    Falcon Framework :: app/Controller.php
    -
    This file provides methods for your controllers to use, and SHOULD NOT BE
    MODIFIED. These functions are very minimal and the setup is automated
    according to the macros set in app/init.php.
  */

  class Controller
  {
    protected $db;

    public function __construct()
    {
      if(MYSQL_USE == "YES")
        $this->db = new PDO('mysql:host=localhost;dbname=' . MYSQL_AREA, MYSQL_USER, MYSQL_PSWD);
      else
        $this->db = false;
    }

    protected function model($model)
    {
      // Create and return an instance of the given model
      require_once('../app/models/' . $model . '.php');

      return new $model($this->db);
    }

    protected function view($view, $data = array())
    {
      // Include in the view needed to be displayed by the controller
      require_once('../app/views/' . $view . '.php');
    }
  }
