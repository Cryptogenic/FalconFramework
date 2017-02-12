<?php

  require_once('lib/check.php');

  session_start();

  class User
  {
    public $name;
    public $info;
    public $stats;

    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }

    public function setUser($id)
    {
      if(!$this->db)
        die("The PDO Database object could not be set, this could be because 'MYSQL_USE' is set to 'NO' in the init.php configuration.");

      $id = (int)$id;

      try
      {
        $sql = $this->db->prepare("SELECT * FROM users WHERE `uid` = :id");
        $sql->bindParam(':uid', $id);
        $sql->execute();

        $this->info = $sql->fetch(PDO::FETCH_OBJ);
        $this->name = $this->info->username;
        $this->stats = json_decode($this->info->stats, true);

        unset($sql);

        return true;
      }
      catch (PDOException $e)
      {
        return false;
      }
    }

    public function login($email, $password, $capatcha)
    {
      if(!$this->db)
        die("The PDO Database object could not be set, this could be because 'MYSQL_USE' is set to 'NO' in the init.php configuration.");

      try
      {
        $sql = $this->db->prepare("SELECT * FROM users WHERE `email` = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        $userInfo = $sql->fetch(PDO::FETCH_ASSOC);

        unset($sql);
      }
      catch(PDOException $e)
      {
        if(SECURITY_DEBUG_OUTPUT == "ALL" || SECURITY_DEBUG_OUTPUT == "CRITICAL")
        {
          return "E| An SQL Error Occured: " . $e;
        }
        return "E| An unknown error occured, please contact an administrator!";
      }

      if(!$userInfo)
        return "E| Your username and/or password are incorrect, please try again.";

      if($userInfo['activated'] == 0)
        return "E| Your account has not been verified, please activate your account via the email we sent you at registration.";

      if(password_verify($password, $userInfo["password"]))
      {
        $_SESSION['user'] = array(
          'id' => $userInfo['id'],
          'name'  => $userInfo['username'],
          'login' => 'login'
        );

        return "S| Welcome back! You are now being logged in...";
      }
      else
      {
        return "E| Your username and/or password are incorrect, please try again. ";
      }
    }

    public function register($email, $user, $password, $passwordConfirm, $referrer)
    {
      if(!$this->db)
        die("The PDO Database object could not be set, this could be because 'MYSQL_USE' is set to 'NO' in the init.php configuration.");

      if(empty($email) || empty($user) || empty($password) || empty($passwordConfirm))
        return "E| One or more fields were not completed.";

      if(!checkIntegrityName($user))
        return "E| Usernames can only be alphanumeric, and must be " . INTEGRITY_NAME_MIN . "-" . INTEGRITY_NAME_MAX . " characters in length.";

      if(!checkIntegrityEmail($email))
        return "E| The email you entered does not appear to be a valid email address.";

      if(strlen($password) < 5)
        return "E| Password too short!";

      if($password != $passwordConfirm)
        return "E| Password and it's confirmation do not match, please re-type your password.";

      // Check if user already exists
      try
      {
        $sql = $this->db->prepare("SELECT * FROM users WHERE `username` = :user");
        $sql->bindParam(':user', $user);
        $sql->execute();

        $userInfo = $sql->fetch(PDO::FETCH_ASSOC);

        unset($sql);
      }
      catch(PDOException $e)
      {
        if(SECURITY_DEBUG_OUTPUT == "ALL" || SECURITY_DEBUG_OUTPUT == "CRITICAL")
        {
          return "E| An SQL Error Occured: " . $e;
        }
        return "E| An unknown error occured, please contact an administrator";
      }

      if($userInfo != false)
      return "E| The username '" . htmlspecialchars($user) . "' is already taken. Please choose another username.";

      // Check if email is already being used
      try
      {
        $sql = $this->db->prepare("SELECT * FROM users WHERE `email` = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        $userInfo = $sql->fetch(PDO::FETCH_ASSOC);

        unset($sql);
      }
      catch(PDOException $e)
      {
        if(SECURITY_DEBUG_OUTPUT == "ALL" || SECURITY_DEBUG_OUTPUT == "CRITICAL")
        {
          return "E| An SQL Error Occured: " . $e;
        }
        return "E| An unknown error occured, please contact an administrator";
      }

      if(!empty($userInfo['email']))
        return "E| The email '" . htmlspecialchars($email) . "' is already linked to another account.";

      // Passed all integrity checks, create account
      $password = password_hash($password, PASSWORD_BCRYPT);

      $id     = NULL;

      try
      {
        $sql = $this->db->prepare("
          INSERT INTO users
          (`id`, `email`, `username`, `password`, `activated`)
          VALUES
          (:id, :email, :user, :pswd, 1)"
        );

        $sql->bindParam(':id',      $id);
        $sql->bindParam(':email',   $email);
        $sql->bindParam(':user',    $user);
        $sql->bindParam(':pswd',    $password);

        if($sql->execute())
        {
          unset($sql);

          return "S| Your account has been registered!";
        }

        if(SECURITY_DEBUG_OUTPUT == "ALL" || SECURITY_DEBUG_OUTPUT == "CRITICAL")
        {
          return "E| An Error Occured: " . $sql->errorInfo()[2];
        }

        unset($sql);

        return "E| An unknown error occured, please contact an administrator";
      }
      catch(PDOException $e)
      {
        if(SECURITY_DEBUG_OUTPUT == "ALL" || SECURITY_DEBUG_OUTPUT == "CRITICAL")
        {
          return "E| An SQL Error Occured: " . $e;
        }
        return "E| An unknown error occured, please contact an administrator";
      }
    }
  }
