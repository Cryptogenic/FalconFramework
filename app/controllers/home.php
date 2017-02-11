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
        $this->view('maintenance/index/');
      }
    }
  }
