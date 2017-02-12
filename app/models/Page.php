<?php

  /*
    Falcon Framework :: app/models/Page.php
    -
    This file is the page model, and consists of many properties you may want to
    access in your app, such as the active page, active group, title of the page,
    and it's accessibility.
  */

  class Page
  {
    // General page information
    public $title;
    public $accessibilty;

    // Only important in things like admin panels, can be used for where to display 'class="active"' for example
    public $activeGroup;
    public $activePage;

    // Set by the controller, allows alerts to be displayed on the page depending on the action passed from the view
    public $alertSuccess;
    public $alertError;

    // As the page doesn't need any constructing, leave unimplemented
    public function __construct($db) {}
  }
