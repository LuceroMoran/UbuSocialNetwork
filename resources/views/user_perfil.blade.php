<?php
session_start();
$user_id = $_SESSION['uid'];
// echo $user_id;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estilosperfil.css">
  <link rel="shortcut icon" href="Images/logo.png">
  <link rel="stylesheet" href="sweetalert/sweetalert.css">
  <title>Mi Perfil</title>

  <script type="text/javascript">
    var user_id = "<?php echo $user_id;?>"
  </script>
</head>
<body ng-app="userperfilapp">

    <div ng-controller="MyProfileMainCtrl" >
      <header>
        <nav class="navbar navbar-fixed-top navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="true">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"> <span><img src="Images/logo.png" align="center" width="50" height="25"/></span></script></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-1">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group" >
                  <input type="text" class="form-control" placeholder="Buscar" ng-model="search.email">
                </div>
                <button ng-click="searchSb()" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="home"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="perfil.html"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                    <li><a ng-click='gotoSettings()'><span ng-click='gotoSettings()' class="glyphicon glyphicon-wrench"></span> Opciones</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><span class=" glyphicon glyphicon-off"></span> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
      </nav>
      </header>


      <aside class="col-md-3 col-xs-12 col-sm-12" id="aside-1">
          <section class="jumbotron1" ng-repeat="info in myinfo">
            <img ng-src="{{info.profile_cover}}" alt="" class="img-responsive img-rounded cover"/>

          </section>

          <div class="container-fluid">
            <div class="row">
              <div align="center" ng-repeat="info in myinfo">
                <img ng-src="{{info.profile_picture}}" alt="" class="img-responsive img-rounded" width="40%"/>
              </div>
            </div>
          </div>

          <section clas="jumbotron2" ng-repeat="info in myinfo">
            <div class="container">
             <h3 class="user_name">{{info.name}}</h3>
            </div>
          </section>

          <div class="container col-md-12">
            <div align="center">
              <caption><h4>Otros contactos</h4></caption>
            </div>
            <div class="row">
              <a href="#" class="btn btn-block btn-danger active">
                <span class="glyphicon glyphicon-play"></span> Canal de Youtube
              </a>
            </div>
            <div class="row" ng-repeat="info in myinfo">
              <a href="{{info.Twitter}}" class="btn btn-block btn-info">
                <span><img src="Images/twitter-logo.png" alt="1" width="20" height="20"/></span> Twitter
              </a>
            </div>
            <div class="row">
              <a href="#" class="btn btn-block btn-primary">
                <span><img src="Images/face.jpg" alt="" width="20" height="20" /></span> Facebook
              </a>
            </div>
          </div>
        </aside>
    </div>





    <div class="main container-fluid col-md-7 col-xs-12 col-sm-12" >
      <div class="container-fluid">
        <ul class="nav nav-tabs nav-justified">
          <li role="presentation"><a href="#posts" id="pestanas">Posts</a></li>
          <li role="presentation"><a ui-sref="seeFollowers" id="pestanas">Seguidores</a></li>
          <li role="presentation"><a href="#"id="pestanas">Mensajes</a></li>
          <li role="presentation"><a ui-sref="postCode"id="pestanas">Publicar código</a></li>
        </ul>
      </div>

      <br>
      <div class="vistas-wrapper" ui-view="content">

      </div>
    </div>
    <!-- <aside class="col-md-2 col-xs-12 col-sm-12 aside2" >
    <div class="container-fluid">
      <caption><h3>Lenguajes mas publicados</h3></caption>
      <div class="list-group ">
        <a href="#" class="list-group-item">
          <span class="badge">9</span>
          Php
        </a>
        <a href="#" class="list-group-item"><span class="badge">6</span>JavaScript</a>
        <a href="#" class="list-group-item"><span class="badge">5</span>Bootstrap</a>
        <a href="#" class="list-group-item"><span class="badge">3</span>Html</a>
      </div>
    </div>
    </aside> -->
  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/user_perfil.js"></script>
  <script src="sweetalert/sweetalert.min.js" ></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
