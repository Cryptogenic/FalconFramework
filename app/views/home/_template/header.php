<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $data['page']->title; ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo ASSET_ROOT; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo ASSET_ROOT; ?>/assets/css/scrolling-nav.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="<?php echo ASSET_ROOT; ?>/home/index"><?php echo PROJECT_NAME; ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav nabar">
          <!-- Hidden li included to remove active class from summary link when scrolled up past summary section -->
          <li class="hidden">
            <a class="page-scroll" href="#page-top"></a>
          </li>
          <li>
            <a class="page-scroll" href="#summary">Summary</a>
          </li>
          <li>
            <a class="page-scroll" href="#setup">Quick Setup</a>
          </li>
          <li>
            <a class="page-scroll" href="#download">Download</a>
          </li>
        </ul>
        <!-- Add a margin of 7px to the top to align with the navbar menu -->
        <div class="pull-right" style="margin-top: 7px">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <?php if(empty($_SESSION)): ?>
                Guest
              <?php else: ?>
                <?php echo $_SESSION['user']['name']; ?>
              <?php endif; ?>
              <span class="caret"></span>
            </button>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownAccount">
              <?php if(empty($_SESSION)): ?>
                <li><a href="<?php echo ASSET_ROOT; ?>/home/login">Test Login/Register</a></li>
              <?php else: ?>
                <li><a href="<?php echo ASSET_ROOT; ?>/home/login/dologout">Test Logout</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
