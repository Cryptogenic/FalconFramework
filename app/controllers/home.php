<?php

  /*
    Falcon Framework :: app/home.controller.php
    -
    This file is the "home" controller and serves as an example. You will want
    to create more controllers based on what you need, for example authentication
    like login and registration may have an "auth" controller and a dashboard a
    "dashboard" controller. The "home" controller can be used for public areas.

    You are free to modify or even delete this controller if you deem necessary.
  */

  class Home extends Controller
  {
    public function index($argv = NULL)
    {
      $models = array(
        'page'  => $this->model('page')
      );

      $models['page']->title = "Falcon Framework | Home";
      $models['page']->accessibility = 0;
      $models['page']->activeGroup = "None";
      $models['page']->activePage  = "";

      $this->load('index', $models);
    }

    public function login($action = NULL)
    {
      $models = array(
        'page'  => $this->model('page'),
        'user'  => $this->model('user')
      );

      $models['page']->title = "Falcon Framework | Login";
      $models['page']->accessibility = 0;
      $models['page']->activeGroup = "None";
      $models['page']->activePage  = "";

      if($action == "dologin")
      {
        // Validate login
        $result = $models['user']->login($_POST['email'], $_POST['password'], 0);

        if(strpos($result, "S| ") !== false)
          $models['page']->alertSuccess = substr($result, 2);

        if(strpos($result, "E| ") !== false)
          $models['page']->alertError = substr($result, 2);
      }
      else if($action == "doregister")
      {
        // Register user
        $result = $models['user']->register($_POST['email'], $_POST['username'], $_POST['password'], $_POST['passwordConf'], $_POST['referrer']);

        if(strpos($result, "S| ") !== false)
          $models['page']->alertSuccess = substr($result, 2);

        if(strpos($result, "E| ") !== false)
          $models['page']->alertError = substr($result, 2);
      }
      else if($action == "dologout")
      {
        // Destroy session effectively logging the user out
        session_destroy();
      }

      $this->load('login', $models);
    }

    private function load($page, $models)
    {
      if(SECURITY_MAINTENANCE == "OFF" || strpos(SECURITY_MAINTENANCE_ALLOWED, $_SERVER["REMOTE_ADDR"]) !== false)
      {
        $this->view('home/_template/header', array(
          'page' => $models['page']
        ));

        $this->view('home/' . $page, $models);

        $this->view('home/_template/footer', array(
          'page' => $models['page']
        ));
      }
      else
      {
        $this->view('maintenance/index');
      }
    }
  }
