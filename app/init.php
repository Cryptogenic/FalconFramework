<?php

  /*
    Falcon Framework :: Init.php
    -
    This file will contain important information for your website as well as
    includes. Includes can and should be ignored, however you may want to
    configure macros however you wish. You may feel the need to add or remove
    some to suit your project. Some macros have been setup for you, the following
    macros are suggested to leave in this file but should be modified for your
    project's needs!

      + PROJECT_NAME
      + PROJECT_COMPANY

      + MYSQL_USE
      + MYSQL_HOST
      + MYSQL_AREA
      + MYSQL_USER
      + MYSQL_PSWD

      + SECURITY_DEBUG_OUTPUT
      + SECURITY_CAPATCHA_TOGGLE
      + SECURITY_MAINTENANCE
      + SECURITY_LEVEL
      + SECURITY_MAINTENANCE_ALLOWED

    One macro that you should leave unchanged is ASSET_ROOT, as it is set according
    to your domain and is dynamic!
  */

  // Require in files for MVC - DO NOT EDIT THIS
  require_once('core/App.php');
  require_once('core/Controller.php');

  // View Macros - edit to your needs
  define('PROJECT_NAME',          'Falcon Framework');
  define('PROJECT_COMPANY',       'Falcon Framework');

  // MySQL Credentials - edit to your needs
  //  Note: You should not use the root user in a production environment!!!
  define('MYSQL_USE',   'YES');
  define('MYSQL_HOST', 	'localhost');
  define('MYSQL_AREA', 	'falconframework');
  define('MYSQL_USER', 	'root');
  define('MYSQL_PSWD', 	'');

  // Security Macros - edit to your needs
  //  Recommended Settings for Development:
  //    - SECURITY_DEBUG_OUTPUT     -> ALL
  //    - SECURITY_CAPATCHA_TOGGLE  -> OFF
  //    - SECURITY_MAINTENANCE      -> ON
  //    - SECURITY_LEVEL            -> DEBUG
  //  Recommended Settings for Beta:
  //    - SECURITY_DEBUG_OUTPUT     -> CRITICAL
  //    - SECURITY_CAPATCHA_TOGGLE  -> ON
  //    - SECURITY_MAINTENANCE      -> OFF
  //    - SECURITY_LEVEL            -> DEBUG
  //  Recommended Settings for Production:
  //    - SECURITY_DEBUG_OUTPUT     -> NONE
  //    - SECURITY_CAPATCHA_TOGGLE  -> ON
  //    - SECURITY_MAINTENANCE      -> OFF
  //    - SECURITY_LEVEL            -> PRODUCTION
  define('SECURITY_DEBUG_OUTPUT', 	 'ALL');
  define('SECURITY_CAPATCHA_TOGGLE', 'OFF');
  define('SECURITY_MAINTENANCE', 		 'ON');
  define('SECURITY_LEVEL', 			     'DEBUG');

  // IP Addresses that are allowed to bypass maintenance mode - edit to your needs
  define('SECURITY_MAINTENANCE_ALLOWED', '::1');

  // Integrity check macros for registration - edit to your needs
  define('INTEGRITY_NAME_MIN', 4);
  define('INTEGRITY_NAME_MAX', 10);

  // Root macro for views
  define('ASSET_ROOT',
    'http://' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__) . '/'
  )));
