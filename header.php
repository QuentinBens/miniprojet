<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
    <meta name="keywords" content="transition, off-canvas, navigation, effect, 3d, css3, smooth" />
    <meta name="author" content="Codrops" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/slate/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="SidebarTransitions/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="SidebarTransitions/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="SidebarTransitions/css/icons.css" />
    <link rel="stylesheet" type="text/css" href="SidebarTransitions/css/component.css" />
    <link rel="shortcut icon" href="../favicon.ico">

    <title></title>
    <script src="js/modernizr.custom.js"></script>
  </head>
  <body>

    <!-- Mon bouton sidebar-->
  <div id="st-container" class="st-container">
    <div class="st-pusher">
      <div class="main clearfix">
        <div id="st-trigger-effects">
          <button data-effect="st-effect-14"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
        </div>
      </div><!-- /main -->
      <?php include "sidebar.php"; ?>
      <div class="st-content"><!-- this is the wrapper for the content -->
        <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
          <div class="container">
          <header>
            <div class="row">
              <div class="col-md-4 col-md-offset-8">
                <form class="navbar-form navbar-left" action="filtremovies.php" role="search" method="post">
                  <div class="form-group">
                    <span class="fa fa-search"></span>
                    <input type="search" class="form-control" name="search" placeholder="Search movies">
                  </div>
                  <button type="submit" class="btn btn-default">Find</button>
                </form>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h1><i class="fa fa-film" aria-hidden="true"></i> Cinema DataBase</h1>
                </div>
              </div>
            </div>
              <hr>
          </header>
          <?php include 'functions.php';?>
          <?php include "blocstat.php"; ?>
