<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" href="Images/logo.png">
  <link rel="stylesheet" href="css/perfilpublico.css">
<title>Perfil Público</title>
</head>
<body ng-app="publicperfilapp">
  <header>
    <nav class="navbar navbar-fixed-top navbar-default">
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
              <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="home"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="perfil.html"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li><a href="configuracion.html"><span class="glyphicon glyphicon-wrench"></span> Opciones</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><span class=" glyphicon glyphicon-off"></span> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  </header>
  <div class="container col-md-9">
  <div ng-controller="StartPublicController">
    <div align="center"  ng-repeat="info in myinfo">
      <img ng-src="{{info.profile_picture}}" alt="" class="img-responsive img-rounded post-picture" width="40%"/>
    </div>
    <section clas="jumbotron1" ng-repeat="info in myinfo">
      <div class="container col-md-12" align="center">
       <h3>{{info.name}}</h3>
       <button ng-if="!suscrito" name="follow" class="btn btn-warning" ng-click="follow()">Seguir</button>
       <h5 ng-if="suscrito">Siguiendo :)</h5>
      </div>
    </section>

    <div class="container-fluid" id="main">
      <ul class="nav nav-tabs nav-justified">
        <li role="presentation" ui-sref="public_post"><a href="#posts">Posts</a></li>
        <li role="presentation" ui-sref="followers"><a href="publicoseguidores.html">Seguidores</a></li>
      </ul>
    </div>
  </div>


     <div class="vistas-wrapper" ui-view="content"></div>
  </div>


  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/public_profile.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
