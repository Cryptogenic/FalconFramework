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
  	public $title;
  	public $accessibilty;

  	public $activeGroup;
  	public $activePage;

  	public function __construct($db) {}
  }
