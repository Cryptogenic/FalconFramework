<?php

  /*
    Falcon Framework :: app/models/lib/check.php
    -
    This file provides some functions for validity checking, such as checking if
    an email provided is a valid format and if a name passes an integrity check
    with parameters you can set in init.php.
  */

  function checkIntegrityName($username)
  {
    if(!strlen($username))
    return false;

    if(strlen($username) < INTEGRITY_NAME_MIN)
    return false;

    if(strlen($username) > INTEGRITY_NAME_MAX)
    return false;

    return !preg_match('/[^A-za-z0-9]/', $username);
  }

  function checkIntegrityEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }
